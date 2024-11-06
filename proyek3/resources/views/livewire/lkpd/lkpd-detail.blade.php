<div class="container mx-auto px-[60px]">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <!-- Kategori di bagian atas -->
        <div class="text-left text-[#00BCD4] mb-4 text-sm">Plugged</div>
        
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold mb-2 text-left">Build an Arduino Pistol-grip Transmitter for RC Cars With 1KM Range!</h1>
            <p class="text-gray-500 text-sm text-left">
                Dibuat oleh 
                <span class="font-bold">shino aulia putri</span>, 
                <span class="font-bold">aul</span>, 
                <span class="font-bold">udin</span>, 
                <span class="font-bold">gita</span>
            </p>
        </div>

        <!-- Image Section with Buttons -->
        <div class="relative mb-8 text-center">
            <div class="absolute top-2 right-2 z-10 flex gap-2">
                <!-- Button Love dengan SVG dan Tailwind -->
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
                        wire:loading.class="opacity-50"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            stroke-width="2" 
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364l-1.318 1.318-1.318-1.318a4.5 4.5 0 00-6.364 0z" 
                        />
                    </svg>
                </button>
                <!-- Button Link -->
                @if (session()->has('notification'))
                    <div 
                        class="fixed top-4 right-4 bg-green-500 text-white py-2 px-4 rounded-md shadow-lg" 
                        wire:poll.2s="hideNotification"
                    >
                        {{ session('notification') }}
                    </div>
                @endif

                <!-- Tombol untuk memicu notifikasi -->
                <button 
                    class="bg-white text-gray-500 text-2xl p-2 rounded-md w-10 h-10 flex justify-center items-center shadow-sm hover:bg-gray-50"
                    wire:click.prevent="showDownloadNotification"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </button>
            </div>
            <!-- Gambar -->
            <img src="{{ asset('images/arduino-transmitter.png') }}" alt="Arduino Pistol-grip Transmitter" class="w-full h-auto rounded-lg">
        </div>

        <!-- Tags Section -->
        <div class="mt-4">
            <!-- Text "Tags :" -->
            <div class="text-gray-600 text-sm font-semibold mb-2">Tags :</div>
            
            <!-- Tag Buttons - Changed to rectangular shape -->
            <div class="flex gap-2">
                <button class="bg-white text-black border border-black py-1 px-4 rounded-md hover:bg-gray-100 transition-colors duration-200">
                    Robot
                </button>
                <button class="bg-white text-black border border-black py-1 px-4 rounded-md hover:bg-gray-100 transition-colors duration-200">
                    Engineering
                </button>
            </div>
        </div>

        <!-- Section Tambahan Gambar dan Deskripsi -->
        <div class="mt-8">
            <p class="text-gray-700 mb-4 max-w-[800px] text-justify">
                Hari ini, kami akan merakit dan memasang kabel pada pemancar radio pistol-grip berbasis Arduino yang sepenuhnya menggunakan elektronik kompatibel dengan Arduino...
            </p>

    
            <hr class="border-t-4 border-gray-500 my-4">

            <!-- Judul Bagian "Bahan dan Alat" -->
            <div class="mt-8 text-center">
                <!-- Judul Bagian "Bahan dan Alat" -->
                <h2 class="text-lg font-bold mb-4">Bahan dan Alat</h2>
                
                <!-- Gambar - Centered -->
                <img src="{{ asset('images/arduino-transmitter.png') }}" alt="Arduino Pistol-grip Transmitter" class="mx-auto w-full h-auto rounded-lg max-w-sm">
            </div>

            
            <!-- Deskripsi Alat dan Bahan -->
            <ul class="list-decimal list-inside mt-4 text-gray-700">
                <li>Arduino Nano Microcontroller Board (x1)</li>
                <li>NRF24L01 + PA + LNA Transceiver dengan power adapter (x1)</li>
                <li>Joystick (x2)</li>
                <li>Potensiometer (x2)</li>
                <li>Selector toggle (x4)</li>
                <li>Pushbutton (x5)</li>
                <li>OLED Display (x1)</li>
                <li>Buzzer (x1)</li>
                <li>LED 3mm (x4)</li>
                <li>LED untuk indikasi pengisian daya (x2)</li>
                <li>Boost converter 5V (x1)</li>
            </ul>
        </div>

        <div class="mt-8 text-center">
        <!-- Judul Section Langkah-langkah Pemasangan -->
            
            <hr class="border-t-4 border-gray-500 my-4">

            @for ($i = 1; $i <= 5; $i++)
                <div class="mb-8">
                    <!-- Judul Langkah -->
                    <h3 class="font-semibold text-lg mb-4">Langkah {{ $i }}: Mencetak Bagian 3D</h3>
                    
                    <!-- Container Gambar dan Deskripsi -->
                    <div class="flex flex-col items-center">
                        <!-- Gambar Langkah (Tengah) -->
                        <img src="{{ asset('images/langkah.png') }}" alt="Langkah {{ $i }}" class="w-3/4 md:w-1/2 rounded-lg mb-4">
                        
                        <!-- Penjelasan Langkah (Rata Kiri) -->
                        <p class="text-gray-700 text-left max-w-2xl mb-8">
                            Cetak semua bagian menggunakan printer 3D berdasarkan desain yang telah dibuat di Fusion 360. Setelah bagian tercetak, lepaskan material pendukung dan siapkan untuk perakitan.
                        </p>
                    </div>
                    <hr class="w-1/2 mx-auto border-t border-gray-300 my-4">
                </div>
            @endfor
        </div>
        <div class="max-w-2xl mx-auto mt-8 p-6 bg-white rounded-lg shadow-md border-t border-gray-300">
            <div class="text-center my-8">
            <!-- Full-width button with download icon -->
                <button class="bg-green-500 border border-green-500  text-white py-3 px-6 rounded-md shadow-md hover:bg-green-300 transition-colors duration-200 w-full max-w-lg mx-auto flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3v10m0 0l-4-4m4 4l4-4M5 19h14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Evaluasi
                </button>
            </div>

        <!-- Judul Komentar -->
            <h2 class="text-lg font-bold mb-4">Komentar (5)</h2>
    <!-- Button Evaluasi di atas komentar -->

                    

            <!-- Formulir Komentar -->
            <div class="mb-6">
                <textarea placeholder="Tulis komentar" class="w-full h-24 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400" rows="4"></textarea>
                <button class="mt-4 bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition-colors duration-200">
                    Kirim Komentar
                </button>
            </div>

            <!-- Daftar Komentar -->
            <div class="space-y-6">         <!-- Komentar Utama -->
                <div class="flex items-start space-x-4">
                    <img src="https://via.placeholder.com/40" alt="User avatar" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <div class="flex items-center space-x-2">
                            <span class="font-semibold">guest10</span>
                            <span class="text-sm text-gray-500">Feb. 8, 2022</span>
                        </div>
                        <p class="text-gray-700">Tutorialnya sangat membantu!</p>

                        <!-- Tombol Balas -->
                        <button class="mt-2 text-sm text-gray-500 flex items-center space-x-1 hover:text-gray-700">
                            <span>💬</span> <!-- Chat bubble emoji -->
                            <span>Replay</span>
                        </button>

                        <!-- Balasan -->
                        <div class="ml-10 mt-3">
                            <div class="flex items-start space-x-4">
                                <img src="https://via.placeholder.com/40" alt="User avatar" class="w-8 h-8 rounded-full">
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <span class="font-semibold">Sakamoto</span>
                                        <span class="text-sm text-gray-500">Feb. 20, 2022</span>
                                    </div>
                                    <p class="text-gray-700">Benar Sekali</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="w-full mx-auto border-t border-gray-300 my-4">

                <!-- Komentar Lainnya -->
                <div class="flex items-start space-x-4">
                    <img src="https://via.placeholder.com/40" alt="User avatar" class="w-10 h-10 rounded-full">
                    <div>
                        <div class="flex items-center space-x-2">
                            <span class="font-semibold">Sakamoto</span>
                            <span class="text-sm text-gray-500">Feb. 30, 2022</span>
                        </div>
                        <p class="text-gray-700">Menarik</p>


                        <button class="mt-2 text-sm text-gray-500 flex items-center space-x-1 hover:text-gray-700">
                            <span>💬</span> <!-- Chat bubble emoji -->
                            <span>Replay</span>
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>