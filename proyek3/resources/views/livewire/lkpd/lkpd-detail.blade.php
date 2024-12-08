<div class="container mx-auto px-[60px]">
    
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <!-- Category Section -->
        <div class="text-left text-[#00BCD4] mb-4 text-sm">
            {{ $moduleLkpd->category->category_name ?? 'Uncategorized' }}
        </div>
        
        <!-- Header Section with Collaborators -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold mb-2 text-left">{{ $moduleLkpd->lkpd_title }}</h1>
            <p class="text-gray-500 text-sm text-left">
                Dibuat oleh 
                <span class="font-bold">{{ $moduleLkpd->user->name ?? 'Unknown' }}</span>
                berkolaborasi dengan
                @if ($moduleLkpd->collaborator->isNotEmpty())
                    <span class="font-bold">{{ $collaboratorString }}</span>
                @else
                    <p>No tags found for this module.</p>
                @endif
            </p>
        </div>
        <!-- Image Section with Buttons -->
        <!-- Image Section with Buttons -->
        <div class="relative mb-8 text-center">
            <!-- Buttons Section -->
            <div class="relative z-10 flex gap-2 justify-end mb-4">
                <button 
                    wire:click.prevent="toggleLove"
                    wire:loading.attr="disabled"
                    class="bg-white text-2xl p-2 rounded-md w-10 h-10 flex justify-center items-center transition-colors duration-150 shadow-sm hover:bg-gray-50"
                >
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="{{ $isLoved ? 'red' : 'none' }}" 
                        viewBox="0 0 24 24" 
                        stroke="currentColor" 
                        class="w-6 h-6 {{ $isLoved ? 'text-red-500' : 'text-black' }} transition-colors duration-150"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364l-1.318 1.318-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>

                <button 
                    wire:click.prevent="downloadPdf"
                    class="bg-white text-gray-500 text-2xl p-2 rounded-md w-10 h-10 flex justify-center items-center shadow-sm hover:bg-gray-50"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </button>
            </div>

            <!-- Image Section -->
            @if($moduleLkpd->lkpd_image)
                <div class="mt-8">
                    <img src="{{ asset('storage/' . $moduleLkpd->lkpd_image) }}" 
                        alt="{{ $moduleLkpd->lkpd_title }}" 
                        class="w-full h-auto rounded-lg">
                </div>
            @endif
        </div>

        
        <!-- Tags and Collaborator Section -->
        <div class="space-y-4">
            <!-- Tags Section -->
            <div>
                <div class="text-gray-600 text-sm font-semibold mb-2">Tags:</div>
                <div class="flex flex-wrap gap-2">
                    @if ($moduleLkpd->tags->isNotEmpty())
                        @foreach ($moduleLkpd->tags as $tag)
                            <button class="bg-white text-black border border-black py-1 px-4 rounded-md hover:bg-gray-100 transition-colors duration-200">
                                {{ $tag->tag_name }}
                            </button>
                        @endforeach
                    @else
                        <p>No tags found for this module.</p>
                    @endif
                </div>
            </div>



        <!-- Description -->
        <div class="mt-8">
            <p class="text-gray-700 mb-4 max-w-[800px] text-justify">
                {{ $moduleLkpd->lkpd_description }}
            </p>

            <hr class="border-t-4 border-gray-500 my-4">

            <!-- Material Section -->
            <div class="mt-8 text-center">
                <h2 class="text-lg font-bold mb-4">Bahan dan Alat</h2>
                @if($moduleLkpd->material_image)
                    <div class="flex items-center justify-center">
                        <div class="md:w-1/3">
                            <img 
                                src="{{ asset('storage/' . $moduleLkpd->material_image) }}"
                                alt="Bahan dan Alat" 
                                class="mx-auto w-full h-auto rounded-lg max-w-sm"
                            >
                        </div>
                    </div>
                @endif
                                <p class="mt-4 text-left">{{ $moduleLkpd->material_name }}</p>
            </div>
        </div>
    </div>

    <hr class="border-t-4 border-gray-500 my-4">
    <h2 class="text-2xl font-bold mb-12 text-center">Langkah-Langkah</h2>

    <div class="relative space-y-16">

        @foreach ($moduleLkpd->lkpdSteps()->orderBy('step_number')->get() as $index => $step)
            <div class="relative">
                <!-- Header Langkah -->
                <div class="relative text-center mb-8">
                    <div class="border-t border-gray-300 w-1/2 mx-auto mb-4"></div> <!-- Garis atas -->
                    <h3 class="text-lg font-semibold text-gray-900">
                        Langkah {{ $step->step_number }}: {{ $step->step_title }}
                    </h3>
                </div>

                <!-- Gambar Langkah -->
                @if($step->step_image)
                    <div class="flex items-center justify-center">
                        <div class="md:w-1/3">
                        
                                <img 
                            src="{{ $step->step_image ? Storage::url($step->step_image) : asset('storage/steps/default_step.png') }}" 
                            alt="Langkah {{ $step->step_number }}"
                            class="w-3/4 max-w-lg h-auto rounded-lg shadow-md"
                        >
                        </div>
                    </div>
                @endif

                <!-- Deskripsi Langkah -->
                <p class="text-gray-700 text-justify leading-relaxed">
                    {{ $step->step_description }}
                </p>
            </div>
        @endforeach
    </div>
    <hr class="border-t-4 border-gray-500 my-4">
    <div class="mt-8 text-center">
        <button
            class="bg-green-100 border border-green-500 text-green-700 py-2 px-20 w-[400px] rounded-lg shadow-sm hover:bg-green-200 transition duration-150"
            wire:click="downloadRubrik"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                class="w-6 h-6 inline mr-2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                />
            </svg>
            Rubrik Penilaian
        </button>
    </div>


        
    

    <!-- Notification -->
    @if($showNotification)
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('notification') }}
        </div>
    @endif
</div>