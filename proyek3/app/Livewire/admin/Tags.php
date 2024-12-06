<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Tag;
use App\Models\Category;

class Tags extends Component
{
    public $dataTag, $tagName, $category;
    public bool $tambahData = false;
    public bool $modalVisible = false;
    public $isEditing = false;
    public $tagId = null;
    public $tag_name;
    public $selectedCategory;
    public $categories; // Data kategori untuk dropdown

    public function createData()
    {
        $this->resetFields();
        $this->isEditing = false;
        $this->modalVisible = true;
    }

    public function editData($id)
{
    $tag = Tag::findOrFail($id);

    $this->tagId = $tag->id;
    $this->tag_name = $tag->tag_name;
    $this->selectedCategory = $tag->category_id;
    $this->isEditing = true;
    $this->modalVisible = true;
}

private function resetFields()
{
    $this->tagId = null;
    $this->tag_name = '';
    $this->selectedCategory = null;
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

    session()->flash('message', 'Data berhasil diperbarui.');
    $this->closeModal();
}



    public function mount()
    {
        $this->dataTag = Tag::all();
        $this->categories = Category::all();
    }

    public function edit(Tag $tags)
    {
        dd($tags);
        // $this->dispatchBrowserEvent('show-form');
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

        return redirect()->to('/admin/tags')->with('message', 'Data Tags berhasil ditambahkan.');
    }

    public function deleteData($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        $this->dataTag = Tag::all();
        return redirect()->to('/admin/tags')->with('message', 'Data Tags berhasil dihapus.');
        // session()->flash('message', 'Data berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.admin.tags');
    }
}
