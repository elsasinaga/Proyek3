<div class="w-full h-96 relative overflow-hidden">
    <div class="flex transition-transform duration-500" style="transform: translateX(-{{ $currentIndex * 100 }}%);">
        @foreach($lkpdSlides as $index => $slide)
        <section class="w-full flex-shrink-0 h-96 relative flex items-center justify-center">
            <img src="{{ asset('storage/' . $slide->lkpd_image) }}" alt="{{ $slide->lkpd_title }}" class="absolute inset-0 w-full h-full object-cover">
            <div class="relative z-10 text-center bg-black bg-opacity-10 p-6 rounded-lg">
                <h1 class="text-4xl font-bold text-white">{{ $slide->lkpd_title }}</h1>
                <p class="mt-4 text-gray-200">{{ $slide->lkpd_description }}</p>
                <div class="mt-4 text-sm text-gray-300">
                    <p>Penulis: {{ $slide->user->name }}</p>
                    <p>Kategori: {{ $slide->category->name }}</p>
                </div>
            </div>
        </section>
        @endforeach
    </div>

    <!-- Navigation Buttons -->
    <button wire:click="prevSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button wire:click="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        @foreach($lkpdSlides as $index => $slide)
        <span class="indicator w-3 h-3 rounded-full {{ $currentIndex === $index ? 'bg-gray-600' : 'bg-gray-400' }}"></span>
        @endforeach
    </div>
</div>