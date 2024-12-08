@extends('layouts.admin')
@section('content')

<x-button @click="$wire.tambahData = true" class="btn btn-primary text-center mt-5"><i class="fa-solid fa-plus"></i>Tambah Data</x-button>
<div class="card card-compact bg-white rounded-none mt-8">
    <div class="overflow-x auto ml-12 mr-12">
        <table class="table mt-4 mb-8">
            <thead style="font-size: 18px; line-height:3;">
                <th class="p-2 text-center">No</th>
                <th class="w-1/3 p-2 text-center">Nama Tag</th>
                <th class="p-2 text-center">Kategori</th>
                <th class="p-2 text-center">Aksi</th>
            </thead>
            
            <tbody>
                @forelse ($dataTag as $tags)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tags->tag_name }}</td>
                    <td>{{ $tags->category->category_name }}</td>
                    <td>
                        <div class="grid grid-cols-2 gap-0.1">
                            <div class="col-span-1">
                                {{-- <x-button wire:click="edit({{ $tags->id }})" class="btn" style="background-color:#605DEC; color: white;">
                                    <i class="fa-solid fa-pencil"></i>
                                </x-button> --}}
                                {{-- <x-button @click="$wire.editData({{ $tags->id }})" class="btn" style="background-color:#605DEC; color: white;">
                                    <i class="fa-solid fa-pencil"></i>
                                </x-button> --}}

                                <button wire:click="editData({{ $tags->id }})" class="btn btn-primary">Edit</button>
                                {{-- <button onclick="openEditModal({{ $tags->id }})">Open Modal</button> --}}
                            </div>
                            <div class="col-span-1">
                                <button onclick="confirmDelete({{ $tags->id }})" class="btn btn-error" style="color: white;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data LKPD yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<x-modal wire:model="tambahData" title="Tambah Data" class="backdrop-blur" separator>
    <x-form wire:submit="saveData">
        <x-input label="Nama Tag" wire:model="tag_name" />
        <div>
            <label>Kategori</label>
            <select wire:model="selectedCategory" class="select select-primary w-full">
                <option selected>Pilih Kategori</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                @endforeach
            </select>
        </div>
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.tambahData = false" />
            <x-button label="Save" class="btn-primary" type="submit" spinner="saveData" />
        </x-slot:actions>
    </x-form>
</x-modal>

<x-modal wire:model="modalVisible" title="{{ $isEditing ? 'Edit Data' : 'Tambah Data' }}" class="backdrop-blur" separator>
    <x-form wire:submit.prevent="{{ $isEditing ? 'updateData' : 'saveData' }}">
        <x-input label="Nama Tag" wire:model="tag_name" />
        <div>
            <label>Kategori</label>
            <select wire:model="selectedCategory" class="select select-primary w-full">
                <option selected>Pilih Kategori</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                @endforeach
            </select>
        </div>
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.closeModal" />
            <x-button label="{{ $isEditing ? 'Update' : 'Save' }}" class="btn-primary" type="submit" />
        </x-slot:actions>
    </x-form>
</x-modal>

@endsection
