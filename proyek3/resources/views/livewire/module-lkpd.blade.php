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
                    <div class="mt-4">
                        <x-input label="Tambahkan Kolaborasi" placeholder="Tambahkan Kolaborasi" icon="o-user" wire:model="kolaborasi" />
                    </div>
                    <div class="mt-4">
                        @livewire('tags')
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
                        @livewire('LkpdSteps', ['initialSteps' => $steps])
                    </div>

                @endif
        
                <div class="mt-4 flex justify-between">
                    @if($currentStep > 1)
                        <x-button label="Previous" wire:click="previousStep" />
                    @endif
                    @if($currentStep < 3)
                        <x-button label="Next" wire:click="nextStep" />
                    @else
                        <x-button label="Submit" wire:click="submitForm" />
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>