<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Tag;
use App\Models\Category;

class Tags extends Component
{
    public $dataTag;
    public $tag_name;
    public $selectedCategory;
    public $categories;
    public $tambahData = false;
    public $modalVisible = false;
    public $isEditing = false;
    public $tagId = null;

    public function mount()
    {
        $this->dataTag = Tag::all();
        $this->categories = Category::all();
    }

    public function createData()
    {
        $this->resetFields();
        $this->isEditing = false;
        $this->modalVisible = true;
    }

    public function saveData()
    {
        $this->validate([
            'tag_name' => 'required|string|max:255',
            'selectedCategory' => 'required|exists:categories,id',
        ]);

        Tag::create([
            'tag_name' => $this->tag_name,
            'category_id' => $this->selectedCategory,
        ]);

        $this->reset(['tag_name', 'selectedCategory']);
        $this->tambahData = false;
        $this->dataTag = Tag::all();
    }

    public function editData($id)
    {
        $tag = Tag::findOrFail($id);
        // dd($tag);
        $this->tagId = $tag->id;
        $this->tag_name = $tag->tag_name;
        $this->selectedCategory = $tag->category_id;
        $this->isEditing = true;
        $this->modalVisible = true;
    }

    public function updateData()
    {
        $this->validate([
            'tag_name' => 'required|string|max:255',
            'selectedCategory' => 'required|exists:categories,id',
        ]);

        $tag = Tag::findOrFail($this->tagId);
        $tag->update([
            'tag_name' => $this->tag_name,
            'category_id' => $this->selectedCategory,
        ]);

        $this->closeModal();
        $this->dataTag = Tag::all();
    }

    public function deleteData($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        $this->dataTag = Tag::all();
    }

    public function closeModal()
    {
        $this->modalVisible = false;
        $this->tambahData = false;
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->tagId = null;
        $this->tag_name = '';
        $this->selectedCategory = null;
    }

    public function render()
    {
        return view('livewire.admin.tags', [
            'dataTag' => $this->dataTag,
            'categories' => $this->categories
        ]);
    }
}