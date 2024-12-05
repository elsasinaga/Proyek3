<div class="mt-8 mb-8">
    <div class="px-60 mb-12">
        <div class="flex items-start justify-between space-x-6">
            <!-- Category Dropdown -->
            <div class="w-1/4">
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                    Kategori
                </label>
                <div class="relative">
                    <div class="absolute left-3 top-3 h-5 w-5 text-gray-400 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <select 
                        wire:model.live="category_id"
                        id="category" 
                        class="w-full bg-white border border-gray-300 rounded-lg p-2.5 pl-10 pr-10 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 appearance-none shadow-sm"
                        @click="open = !open"
                    >
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <div class="absolute right-3 top-3 h-5 w-5 text-gray-400 pointer-events-none transition-transform duration-200"
                        :class="{ 'rotate-180': open }">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Search Input -->
            <div class="w-1/2">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                    Pencarian
                </label>
                <div class="relative">
                    <div class="absolute left-3 top-3 h-5 w-5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                    </div>
                    <input 
                        wire:model.live.debounce.300ms="search"
                        type="text" 
                        id="search"
                        placeholder="Cari berdasarkan judul, tag, penulis, atau deskripsi..." 
                        class="w-full bg-white border border-gray-300 rounded-lg p-2.5 pl-10 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 shadow-sm"
                    />
                </div>
            </div>

            <!-- Sort Dropdown -->
            <div class="w-1/4">
                <label for="sort" class="block text-sm font-medium text-gray-700 mb-2">
                    Urutkan
                </label>
                <div class="relative">
                    <div class="absolute left-3 top-3 h-5 w-5 text-gray-400 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M11 5h10M11 9h7M11 13h4M3 17h18M3 12l5 5m0-5l-5 5"/>
                        </svg>
                    </div>
                    <select 
                        wire:model.live="sortField"
                        id="sort" 
                        class="w-full bg-white border border-gray-300 rounded-lg p-2.5 pl-10 pr-10 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 appearance-none shadow-sm"
                        @click="sortOpen = !sortOpen"
                    >
                        <option value="created_at">Tanggal Dibuat</option>
                        <option value="lkpd_title">Judul</option>
                        <option value="user_name">Penulis</option>
                    </select>
                    <button 
                        wire:click="$set('sortDirection', sortDirection === 'asc' ? 'desc' : 'asc')"
                        class="absolute right-3 top-3 h-5 w-5 text-gray-400 transition-transform duration-200"
                        :class="{ 'rotate-180': sortDirection === 'asc' }"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>

    <!-- LKPD Cards Section -->
    <div class="px-60 flex items-center mb-4">
        <div class="grid grid-cols-3 gap-6 mb-24">
            @foreach($lkpdModules as $lkpd)
            <div class="border rounded-lg overflow-hidden">
                        <a href="{{ url('/lkpd/detail/'.$lkpd->id) }}"> <!-- Tambahkan tag <a> -->
                    <img src="{{ asset('storage/'.$lkpd->lkpd_image) ??  $lkpd->lkpd_image ?? 'https://via.placeholder.com/200' }}" 
                        alt="{{ $lkpd->lkpd_title }}" 
                        class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <h3 class="font-semibold">{{ $lkpd->lkpd_title }}</h3>
                    <h4>{{ $lkpd->user->name }}</h4>
                    <div class="flex items-center mt-2 space-x-4">
                        <span class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            32
                        </span>
                        <span class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            8
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>