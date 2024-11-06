<div class="w-full h-96 relative overflow-hidden">
    <div class="flex transition-transform duration-500" style="transform: translateX(-{{ $currentIndex * 100 }}%);">
        <!-- Slide 1 -->
        <section class="w-full flex-shrink-0 h-96 bg-purple-100 flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800">Ini Warna Ungu</h1>
                <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula.</p>
            </div>
        </section>

        <!-- Slide 2 -->
        <section class="w-full flex-shrink-0 h-96 bg-blue-100 flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800">Ini Warna Biru</h1>
                <p class="mt-4 text-gray-600">Curabitur ac leo nunc. Vestibulum et mauris vel ante finibus maximus.</p>
            </div>
        </section>

        <!-- Slide 3 -->
        <section class="w-full flex-shrink-0 h-96 bg-pink-100 flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800">Ini Warna Pink</h1>
                <p class="mt-4 text-gray-600">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.</p>
            </div>
        </section>
    </div>

    <!-- Arrows -->
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
        <span class="indicator w-3 h-3 rounded-full {{ $currentIndex === 0 ? 'bg-gray-600' : 'bg-gray-400' }}"></span>
        <span class="indicator w-3 h-3 rounded-full {{ $currentIndex === 1 ? 'bg-gray-600' : 'bg-gray-400' }}"></span>
        <span class="indicator w-3 h-3 rounded-full {{ $currentIndex === 2 ? 'bg-gray-600' : 'bg-gray-400' }}"></span>
    </div>
</div>
