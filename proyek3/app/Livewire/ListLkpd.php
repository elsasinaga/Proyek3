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

    protected $queryString = ['search', 'category_id'];
    public function mount()
    {
        $this->categories = Category::all();
    }
    public function updatedCategoryId()
    {
        $this->resetPage();
    }
    public function render()
    {
        $query = ModuleLkpd::with(['user', 'category', 'tags', 'collaborator']);
       
        if ($this->category_id !== '') {
            $query->where('category_id', $this->category_id);
        }
       
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
        
       
        $lkpdModules = $query->paginate(10);

        return view('livewire.list-lkpd-page', [
            'lkpdModules' => $lkpdModules
        ]);
    }
}