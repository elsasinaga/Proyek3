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
                @if ($moduleLkpd->collaborator && $moduleLkpd->collaborator->count() > 0)
                    berkolaborasi dengan
                    @foreach($moduleLkpd->collaborator as $collab)
                        <span class="font-bold">
                            {{ $collab->collaborator_name }}
                        </span>
                    @endforeach
                @endif
            </p>
        </div>
        <!-- Image Section with Buttons -->
        <div class="relative mb-8 text-center">
            <div class="absolute top-2 right-2 z-10 flex gap-2">
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
                    wire:click.prevent="showDownloadNotification"
                    class="bg-white text-gray-500 text-2xl p-2 rounded-md w-10 h-10 flex justify-center items-center shadow-sm hover:bg-gray-50"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </button>
            </div>
            
            @if($moduleLkpd->material_image)
                <img src="{{ asset('storage/' . $moduleLkpd->material_image) }}" alt="{{ $moduleLkpd->lkpd_title }}" class="w-full h-auto rounded-lg">
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
                    <img src="{{ asset('storage/' . $moduleLkpd->material_image) }}" alt="Bahan dan Alat" class="mx-auto w-full h-auto rounded-lg max-w-sm">
                @endif
                <p class="mt-4 text-left">{{ $moduleLkpd->material_name }}</p>
            </div>
        </div>
    </div>

    <!-- Notification -->
    @if($showNotification)
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('notification') }}
        </div>
    @endif
</div>