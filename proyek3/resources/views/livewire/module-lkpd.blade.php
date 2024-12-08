
<div>
    <div>
        <div class="flex justify-center mt-12 mb-12">
            <ul class="steps steps-vertical lg:steps-horizontal w-3/6">
                <li class="step {{ $currentStep >= 1 ? 'step-success': '' }}">Informasi Dasar</li>
                <li class="step {{ $currentStep >= 2 ? 'step-success': '' }}">Bahan-Bahan</li>
                <li class="step {{ $currentStep >= 3 ? 'step-success': '' }}">Langkah</li>
            </ul>
        </div>
        <div class="text-center font-bold text-2xl">Tambah LKPD</div>
        <div class="text-center mb-8">Masukkan informasi yang dibutuhkan untuk menambahkan LKPD</div>
        
        <div class="flex items-center justify-center">
            <div class="mt-8 w-2/4">
                <div>
                    @if($currentStep === 1)
                        <x-input label="Judul" placeholder="Judul LKPD" wire:model="judul"/>
                        <div class="grid grid-cols-2 mt-4">
                            <div class="mr-4">
                                <x-select 
                                    label="Jenjang"
                                    :options="$jenjangOption"
                                    option-value="jenjang"
                                    option-label="jenjang"
                                    placeholder="Pilih jenjang"
                                    wire:model="jenjang"
                                />
                            </div>
                            <div class="ml-4">
                                <x-select 
                                    label="Kelas"
                                    :options="$kelasOptions"
                                    option-value="id"
                                    option-label="kelas"
                                    placeholder="Pilih kelas"
                                    wire:model="kelas"
                                />
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-select 
                                label="Category"
                                :options="$categories"
                                option-value="id"
                                option-label="category_name"
                                placeholder="Pilih Kategori"
                                wire:model="category"
                            />
                        </div>
                        <div>
    <label for="tags" class="block">Pilih Tags:</label>
    <input id="tag-search" class="border p-2 w-full" placeholder="Cari Tags...">

    <div id="tag-options" class="mt-2 space-y-2">
        @foreach($tags as $tag)
            <div class="tag-option hidden">
                <input type="checkbox" value="{{ $tag->id }}" class="tag-checkbox">
                <label>{{ $tag->tag_name }}</label>
            </div>
        @endforeach
    </div>

    {{-- <h4 class="mt-4">Tags yang Dipilih:</h4>
    <ul id="selected-tags">
        @foreach($selectedTags as $tagId)
            <li>{{ $tags->find($tagId)->tag_name ?? 'Tidak ditemukan' }}</li>
        @endforeach
    </ul> --}}
</div>

                    @elseif($currentStep === 2)
                        <div class="mt-4">
                            <x-textarea
                                label="Introduction"
                                wire:model="introduction"
                                hint="Max 1000 chars"
                                rows="5"
                            />
                        </div>
                        <div class="mt-4">
                            <x-input type="file" label="Upload Gambar Introduction" wire:model="gambarIntroduction" />
                        </div>
                        <div class="mt-4">
                            <x-textarea
                                label="Bahan-Bahan"
                                wire:model="bahanBahan"
                                rows="3"
                            />
                        </div>
                        <div class="mt-4">
                            <x-input type="file" label="Upload Gambar Bahan" wire:model="gambarBahanBahan"  />
                        </div>
                    @elseif($currentStep === 3)
                        <div>
                            {{-- @livewire('LkpdSteps', ['initialSteps' => $steps]) --}}
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
                        </div>
                    @endif

                    <div class="mt-4 flex justify-between">
                        @if($currentStep > 1)
                            <x-button label="Previous" wire:click="previousStep" />
                        @endif
                        @if($currentStep < 3)
                            <x-button label="Next" wire:click="nextStep" />
                        @else
                            <x-button label="Submit" wire:click.prevent="submitForm" wire:loading.attr="disabled" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@script
<script>
    document.getElementById('tag-search').addEventListener('input', function() {
        let searchQuery = this.value.toLowerCase();
        let options = document.querySelectorAll('.tag-option');
        
        options.forEach(option => {
            let label = option.querySelector('label').textContent.toLowerCase();
            option.classList.toggle('hidden', !label.includes(searchQuery));
        });
    });

    document.querySelectorAll('.tag-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            let selectedTags = [];
            document.querySelectorAll('.tag-checkbox:checked').forEach(checked => {
                selectedTags.push(checked.value);
            });
            console.log('livewireloaded');
            // Use Livewire API to update the selectedTags property
            Livewire.emit('updateSelectedTags', selectedTags);
        });
    });
</script>


@endscript