@extends('layouts.admin')
@section('content')
<div class="card card-compact bg-white rounded-none mt-8">
    <div class="overflow-x-auto ml-12 mr-12">
        <table class="table mt-4 mb-8">
            <!-- head -->
            <thead style="font-size: 18px; line-height:3;">
                <tr>
                    <th class="p-2 text-center">No</th>
                    <th class="w-1/4 p-2 text-center">LKPD</th>
                    <th class="p-2 text-center">Tanggal</th>
                    <th class="p-2 text-center">Pembuat</th>
                    <th class="p-2 text-center">Tags</th>
                    <th class="p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataLkpd as $lkpd)
                {{-- {{ dd($lkpd) }} --}}
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-squircle h-12 w-12">
                                    <img
                                    src="{{ $lkpd->thumbnail_url ?? 'https://via.placeholder.com/150' }}"
                                    alt="Thumbnail LKPD" />
                                </div>
                            </div>
                            <div>
                                <div class="md:text-left font-bold">{{ $lkpd->lkpd_title }}</div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $lkpd->created_at->format('d-m-Y') }}</td>
                    <td>
                        {{ $lkpd->user->name ?? '-' }}
                    </td>
                    <th>
                        @foreach ($lkpd->tags as $tag)
                        <span class="badge badge-ghost badge-sm">{{ $tag->tag_name }}</span><br>
                        @endforeach
                    </th>
                    <th>
                        <div class="grid grid-cols-2 gap-0.1">
                            <div class="col-span-1">
                                <x-button class="btn" wire:click="openLkpdModal" style="background-color:#605DEC; color: white;">
                                    <i class="fa-solid fa-pencil"></i>
                                </x-button>
                            </div>
                            <div class="col-span-1">
                                <button onclick="confirmDelete({{ $lkpd->id }})" class="btn btn-error" style="color: white;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </th>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data LKPD yang tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{-- <x-modal wire:model="viewLkpd" class="backdrop-blur" title="Detail LKPD">
            <div class="space-y-4">
                <p>Judul LKPD : {{ $lkpd->lkpd_title ?? '-' }}</p>
                <p>Deskripsi  : {{ $lkpd->lkpd_description ?? '-' }}</p>
                <p>Jenjang    : {{ $lkpd->jenjang ?? '-' }}</p>
                <p>Kelas      : {{ $lkpd->kelas ?? '-' }}</p>
                <p>Kategori      : {{ $lkpd->category->category_name ?? '-' }}</p>
                <p>Penulis      : {{ $lkpd->user->name ?? '-' }}</p>

            </div>
            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.myModal2 = false" />
                <x-button label="Confirm" class="btn-primary" />
            </x-slot:actions>
        </x-modal> --}}
    </div>
</div>
@endsection