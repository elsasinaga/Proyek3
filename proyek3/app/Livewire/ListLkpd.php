<?php
namespace App\Livewire;
use App\Models\ModuleLkpd;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ListLkpd extends Component
{
    use WithPagination;
    
    public $categories;
    public $category_id = '';
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    
    protected $queryString = [
        'search', 
        'category_id',
        'sortField',
        'sortDirection'
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedCategoryId()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        
        $this->resetPage();
    }

    public function render()
    {
        $query = ModuleLkpd::with(['user', 'category', 'tags', 'collaborator'])
                            ->withCount('likes');;
       
        if ($this->category_id !== '') {
            $query->where('category_id', $this->category_id);
        }
        
        // Filtering
        if ($this->search !== '') {
            $query->where(function ($q) {
                $q->whereRaw('LOWER(lkpd_title) LIKE ?', '%' . strtolower($this->search) . '%')
                  ->orWhereHas('tags', function ($q) {
                      $q->whereRaw('LOWER(tag_name) LIKE ?', '%' . strtolower($this->search) . '%');
                  })
                  ->orWhereHas('user', function ($q) {
                      $q->whereRaw('LOWER(name) LIKE ?', '%' . strtolower($this->search) . '%');
                  })
                  ->orWhereRaw('LOWER(lkpd_description) LIKE ?', '%' . strtolower($this->search) . '%');
            });
        }
        
        // Sorting
        if ($this->sortField === 'user_name') {
            $query->join('users', 'module_lkpds.user_id', '=', 'users.id')
                  ->orderBy('users.name', $this->sortDirection)
                  ->select('module_lkpds.*');
        } else {
            $query->orderBy($this->sortField, $this->sortDirection);
        }
       
        $lkpdModules = $query->paginate(12);
        
        return view('livewire.list-lkpd', [
            'lkpdModules' => $lkpdModules
        ]);
    }
}