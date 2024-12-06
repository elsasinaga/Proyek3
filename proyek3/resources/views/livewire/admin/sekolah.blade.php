@extends('layouts.admin')
@section('content')

<x-button @click="$wire.tambahData = true" class="btn btn-primary text-center mt-5"><i class="fa-solid fa-plus"></i>Tambah Data</x-button>
<div class="card card-compact bg-white rounded-none mt-8">
    <div class="overflow-x auto ml-12 mr-12">
        <table class="table mt-4 mb-8">
            <thead style="font-size: 18px; line-height:3;">
                <th class="p-2 text-center">No</th>
                <th class="p-2 text-center">NPSN</th>
                <th class="p-2 text-center">Nama Sekolah</th>
                <th class="p-2 text-center">Alamat</th>
                <th class="p-2 text-center">Aksi</th>
            </thead>
            
            <tbody>
                @forelse ($dataSekolah as $sekolah)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sekolah->npsn }}</td>
                    <td>{{ $sekolah->school_name }}</td>
                    <td>{{ $sekolah->school_address }}</td>
                    <td>
                        <div class="grid grid-cols-2 gap-0.1">
                            <div class="col-span-1">
                                <x-button class="btn" style="background-color:#605DEC; color: white;">
                                    <i class="fa-solid fa-pencil"></i>
                                </x-button>
                            </div>
                            <div class="col-span-1">
                                {{-- <button class="btn btn-error" style="color: white;">
                                    <i class="fa-solid fa-trash"></i>
                                </button> --}}
                                <button onclick="confirmDelete({{ $sekolah->npsn }})" class="btn btn-error" style="color: white;">
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
        <x-input label="NPSN" wire:model="npsn" />
        <x-input label="Nama Sekolah" wire:model="school_name" />
        <x-input label="Alamat Sekolah" wire:model="school_address" />
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.tambahData = false" />
            <x-button label="Save" class="btn-primary" type="submit" spinner="saveData" />
        </x-slot:actions>
    </x-form>
</x-modal>
<script>
    function confirmDelete(npsn) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            @this.call('deleteData', npsn); // Panggil metode Livewire
        }
    }
</script>
@endsection
