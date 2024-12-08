<div>
    @foreach ($steps as $index => $step)
        <div class="mt-4">
            <h3 class="text-lg font-semibold">Langkah {{ $index + 1 }}</h3>
            
            <div class="mt-4">
                <x-input type="file" label="Upload Foto" wire:model="steps.{{ $index }}.gambarLangkah" class="border-dashed border-2 border-gray-400"  />
            </div>
            
            <div class="mt-4">
                <x-input label="Judul Langkah" wire:model="steps.{{ $index }}.judulLangkah" inline />
            </div>
            
            <div class="mt-4">
                <x-textarea
                    label="Deskripsi Mengenai Langkah"
                    wire:model="steps.{{ $index }}.deskripsiLangkah"
                    rows="3"
                    inline
                />
            </div>
        </div>
        <hr class="my-4">
    @endforeach

    <!-- Tombol untuk menambah langkah baru -->
    <div class="mt-4">
        <button class="bg-blue-500 text-white px-4 py-2 rounded" wire:click="addStep">Tambah Langkah</button>
    </div>
</div>