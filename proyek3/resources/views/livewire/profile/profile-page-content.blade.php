<div>
    <div class="w-full mx-auto">
        <!-- Section Background and Profile Image -->
        <div class="relative bg-gray-100">
            <img src="your-background-image.jpg" alt="Background" class="w-full h-36 object-cover">
        </div>
        <div class="mt-8 px-60">
            <!-- Bagian Profil (Gambar di Kiri, Nama dan Info di Kanan) -->
            <div class="flex items-start relative">
                <!-- Gambar Profil di Kiri -->
                <div class="flex-shrink-0 relative" style="top: -100px;">
                    <img src="your-profile-image.jpg" alt="Profile" class="w-40 h-40 rounded-full border-2 border-gray-200">
                </div>
                <!-- Konten Utama (Nama, Info, dan Tombol) -->
                <div class="ml-6 flex-grow">
                    <div class="flex justify-between items-start">
                        <!-- Nama dan Info -->
                        <div>
                            <h1 class="text-2xl font-bold mb-1">Theresa Webb</h1>
                            <div class="flex items-center">
                            <i class="fas fa-graduation-cap w-5 h-5 mr-2 text-gray-600"></i>
                                <p class="text-sm text-gray-600">SMKN 1 Cimahi • Bergabung 10 September 2024</p>
                            </div>
                        </div>
                        <!-- Tombol-tombol -->
                        <div class="flex space-x-2">
                            <button class="p-2 rounded-md bg-gray-200 hover:bg-gray-300" icon="x-heroicon-o-cog-8-tooth">
                                <i class="fas fa-cog w-5 h-5"></i>
                                Setting
                            </button>
                            <button class="px-4 py-2 bg-green-500 text-white text-sm rounded-md hover:bg-green-600">
                                <i class="fa-solid fa-plus"></i> Tambahkan LKPD
                            </button>
                        </div>
                    </div>
                    <!-- Deskripsi -->
                    <div class="mt-4">
                        <p class="text-sm text-gray-600">
                            Saya seorang pengajar dan developer yang memiliki minat besar dalam teknologi pendidikan dan pengembangan aplikasi. Fokus saya adalah membuat pembelajaran lebih interaktif dan inovatif bagi para siswa. 
                        </p>
                    </div>
                </div>
            </div>
            <!-- Line -->
            <div class="flex justify-right space-x-8 text-gray-500 border-b border-gray-200 relative">
            </div>
        </div>
        <!-- Navigation Tabs -->
        <div class="mt-8 px-60">
            <div class="flex space-x-8 justify-end">
                <div class="flex space-x-8">
                    <!-- Komentar Tab -->
                    <button 
                        wire:click="setTab('komentar')"
                        class="flex items-center pb-4 border-b-2 {{ $activeTab === 'komentar' ? 'border-green-500 text-green-500' : 'border-transparent hover:border-gray-300' }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span>Komentar</span>
                    </button>

                    <!-- Favorit Tab -->
                    <button 
                        wire:click="setTab('favorit')"
                        class="flex items-center pb-4 border-b-2 {{ $activeTab === 'favorit' ? 'border-green-500 text-green-500' : 'border-transparent hover:border-gray-300' }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <span>Favorit</span>
                    </button>

                    <!-- LKPD Tab -->
                    <button 
                        wire:click="setTab('lkpd')"
                        class="flex items-center pb-4 border-b-2 {{ $activeTab === 'lkpd' ? 'border-green-500 text-green-500' : 'border-transparent hover:border-gray-300' }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>LKPD</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Tab Contents -->
        <div class="mt-8 px-60">
            @if ($activeTab === 'komentar')
                @livewire('profile.komentar-tab')
            @elseif ($activeTab === 'favorit')
                @livewire('profile.favorit-tab')
            @elseif ($activeTab === 'lkpd')
                @livewire('profile.lkpd-tab', ['activeSubTab' => $activeLkpdTab])
            @endif
        </div>
    </div>
</div>