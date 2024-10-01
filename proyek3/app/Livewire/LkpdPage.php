<?php

namespace App\Livewire;

use App\Models\ModuleLkpd;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class LkpdPage extends Component
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

    public function updatedSearch()
    {
        $this->resetPage();
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
                $q->where('lkpd_title', 'like', '%' . $this->search . '%')
                  ->orWhereHas('tags', function ($q) {
                      $q->where('tag_name', 'like', '%' . $this->search . '%');
                  })
                  ->orWhereHas('user', function ($q) {
                      $q->where('name', 'like', '%' . $this->search . '%');
                  })
                  ->orWhere('lkpd_description', 'like', '%' . $this->search . '%');
            });
        }
       
        $lkpdModules = $query->paginate(10);

        return view('livewire.lkpd-page', [
            'lkpdModules' => $lkpdModules
        ]);
    }
}
