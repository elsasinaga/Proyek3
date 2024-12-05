<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
    <!-- Bagian 1: Logo -->
    <div class="flex items-center">
        <img src="/path-to-your-logo.png" alt="Logo" class="h-10 w-auto">
    </div>

    <!-- Bagian 2: Beranda dan LKPD -->
    <div class="flex space-x-6">
        <a href="/home" class="text-green-600 hover:text-green-800 font-bold">Beranda</a>
        <a href="/lkpd" class="text-green-600 hover:text-green-800 font-bold">LKPD</a>
    </div>

    <!-- Bagian 3: Search Bar -->
    <div class="flex items-center w-1/3 relative">
            <div class="relative w-full">
                <input 
                    wire:model.live="search" 
                    type="text" 
                    class="w-full py-2 pl-10 pr-4 rounded-[9px] border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600" 
                    placeholder="Cari LKPD berdasarkan judul, penulis, atau tag ..."
                >
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.42-1.42l5.3 5.3a1 1 0 01-1.42 1.42l-5.3-5.3zM8 14a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
                    </svg>
                </div>
                @if($search)
                    <button 
                        wire:click="clearSearch" 
                        class="absolute inset-y-0 right-0 flex items-center pr-3"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 hover:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @endif
            </div>

            <!-- Search Results Dropdown -->
            @if($isSearching && count($searchResults) > 0)
                <div class="absolute top-full left-0 w-full mt-2 bg-white rounded-md shadow-lg z-50">
                    <div class="py-2">
                        @foreach($searchResults as $result)
                            <a href="/lkpd/{{ $result->id }}" class="block px-4 py-2 hover:bg-gray-100">
                                <div class="flex flex-col">
                                    <span class="font-medium text-gray-900">{{ $result->lkpd_title }}</span>
                                    <span class="text-sm text-gray-600">{{ $result->user->name }}</span>
                                    @if($result->tags->count() > 0)
                                        <div class="flex gap-1 mt-1">
                                            @foreach($result->tags->take(3) as $tag)
                                                <span class="text-xs px-2 py-1 bg-gray-100 rounded-full text-gray-600">
                                                    {{ $tag->tag_name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @elseif($isSearching && count($searchResults) === 0)
                <div class="absolute top-full left-0 w-full mt-2 bg-white rounded-md shadow-lg z-50">
                    <div class="px-4 py-3 text-sm text-gray-700">
                        Tidak ada hasil yang ditemukan
                    </div>
                </div>
            @endif
        </div>

    <!-- Bagian 4: Tombol Login/Register atau Tambah dan Profil (Kondisi Login) -->
    <div class="flex space-x-4">
        @if($isLoggedIn)
        <!-- Jika Pengguna Belum Login -->
        <button class="px-4 py-2 rounded-[9px] border border-green-600 text-green-600 hover:bg-green-50 font-bold">
                Masuk
            </button>
            <button class="px-4 py-2 rounded-[9px] bg-green-600 text-white hover:bg-green-700 font-bold">
                Register
            </button>    
        
        @else
        <!-- Jika Pengguna Sudah Login -->
        <button class="flex items-center px-4 py-2 rounded-[9px] border border-green-600 text-green-600 hover:bg-green-50 font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                TAMBAH
        </button>

            <!-- Profil & Dropdown dengan Alpine.js -->
            <div x-data="{ open: false }" class="relative">
                <!-- Foto Profile -->
                <img 
                    src="{{ $profile->profile_image ? Storage::url($profile->profile_image) : asset('storage/profile-images/default_profile.png') }}" 
                    alt="Profile" 
                    @click="open = !open" 
                    class="w-10 h-10 rounded-full border-2 border-gray-200 {{ !$profile->profile_image ? 'bg-gray-400' : '' }} cursor-pointer"
                >

                <!-- Dropdown Menu -->
                <div 
                    x-show="open" 
                    @click.away="open = false" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 transform scale-95" 
                    x-transition:enter-end="opacity-100 transform scale-100" 
                    x-transition:leave="transition ease-in duration-150" 
                    x-transition:leave-start="opacity-100 transform scale-100" 
                    x-transition:leave-end="opacity-0 transform scale-95" 
                    class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg py-1 z-10"
                >
                    <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                    <a href="/logout" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
                </div>
            </div>
        @endif
    </div>
</nav>
