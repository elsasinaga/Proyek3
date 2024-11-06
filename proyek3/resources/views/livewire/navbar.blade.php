<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
    <!-- Bagian 1: Logo -->
    <div class="flex items-center">
        <img src="/path-to-your-logo.png" alt="Logo" class="h-10 w-auto">
    </div>

    <!-- Bagian 2: Beranda dan LKPD -->
    <div class="flex space-x-6">
        <a href="/" class="text-green-600 hover:text-green-800 font-bold">Beranda</a>
        <a href="/lkpd" class="text-green-600 hover:text-green-800 font-bold">LKPD</a>
    </div>

    <!-- Bagian 3: Search Bar -->
    <div class="flex items-center w-1/3">
        <div class="relative w-full">
            <input type="text" 
                class="w-full py-2 pl-10 pr-4 rounded-[9px] border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-600" 
                placeholder="Cari">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.9 14.32a8 8 0 111.42-1.42l5.3 5.3a1 1 0 01-1.42 1.42l-5.3-5.3zM8 14a6 6 0 100-12 6 6 0 000 12z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Bagian 4: Tombol Login/Register atau Tambah dan Profil (Kondisi Login) -->
    <div class="flex space-x-4">
        @if($isLoggedIn)
            <!-- Jika Pengguna Sudah Login -->
            <button class="flex items-center px-4 py-2 rounded-[9px] border border-green-600 text-green-600 hover:bg-green-50 font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                TAMBAH
            </button>
            <a href="/profile" class="flex items-center">
                <img src="/path-to-profile-icon.png" alt="Profile" class="h-10 w-10 rounded-full border border-gray-300">
            </a>
        @else
            <!-- Jika Pengguna Belum Login -->
            <button class="px-4 py-2 rounded-[9px] border border-green-600 text-green-600 hover:bg-green-50 font-bold">
                Masuk
            </button>
            <button class="px-4 py-2 rounded-[9px] bg-green-600 text-white hover:bg-green-700 font-bold">
                Register
            </button>
        @endif
    </div>
</nav>
