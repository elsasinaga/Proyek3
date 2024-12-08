<div class="container mx-auto px-[60px]">
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <!-- Kategori di bagian atas -->
        <div class="text-left text-[#00BCD4] mb-4 text-sm">
            {{ $lkpd->category->name ?? 'Uncategorized' }}
        </div>
        
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold mb-2 text-left">{{ $lkpd->lkpd_title }}</h1>
            <p class="text-gray-500 text-sm text-left">
                Dibuat oleh 
                <span class="font-bold">{{ $lkpd->user->name }}</span>
                @foreach($collaborators as $collaborator)
                    , <span class="font-bold">{{ $collaborator }}</span>
                @endforeach
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

                @if (session()->has('notification'))
                    <div class="fixed top-4 right-4 bg-green-500 text-white py-2 px-4 rounded-md shadow-lg">
                        {{ session('notification') }}
                    </div>
                @endif

                <button 
                    wire:click.prevent="showDownloadNotification"
                    class="bg-white text-gray-500 text-2xl p-2 rounded-md w-10 h-10 flex justify-center items-center shadow-sm hover:bg-gray-50"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                </button>
            </div>
            
            @if($lkpd->lkpd_image)
                <img src="{{ asset('storage/' . $lkpd->lkpd_image) }}" alt="{{ $lkpd->lkpd_title }}" class="w-full h-auto rounded-lg">
            @endif
        </div>

        <!-- Tags Section -->
        <div class="mt-4">
            <div class="text-gray-600 text-sm font-semibold mb-2">Tags :</div>
            <div class="flex gap-2">
                @foreach($tags as $tag)
                    <button class="bg-white text-black border border-black py-1 px-4 rounded-md hover:bg-gray-100 transition-colors duration-200">
                        {{ $tag->tag_name }}
                    </button>
                @endforeach

            </div>
        </div>


        <!-- Description -->
        <div class="mt-8">
            <p class="text-gray-700 mb-4 max-w-[800px] text-justify">
                {{ $lkpd->lkpd_description }}
            </p>

            <hr class="border-t-4 border-gray-500 my-4">

            <!-- Material Section -->
            <div class="mt-8 text-center">
                <h2 class="text-lg font-bold mb-4">Bahan dan Alat</h2>
                @if($lkpd->material_image)
                    <img src="{{ asset('storage/' . $lkpd->material_image) }}" alt="Bahan dan Alat" class="mx-auto w-full h-auto rounded-lg max-w-sm">
                @endif
                <p class="mt-4 text-left">{{ $lkpd->material_name }}</p>
            </div>

            <!-- Steps Section -->
            <div class="mt-8 text-center">
                @foreach($steps as $index => $step)
                    <div class="mb-8">
                        <h3 class="font-semibold text-lg mb-4">Langkah {{ $index + 1 }}</h3>
                        <div class="flex flex-col items-center">
                            @if($step->gambar_langkah)
                                <img src="{{ asset('storage/' . $step->gambar_langkah) }}" 
                                     alt="Langkah {{ $index + 1 }}" 
                                     class="w-3/4 md:w-1/2 rounded-lg mb-4">
                            @endif
                            <p class="text-gray-700 text-left max-w-2xl mb-8">
                                {{ $step->deskripsi_langkah }}
                            </p>
                        </div>
                        <hr class="w-1/2 mx-auto border-t border-gray-300 my-4">
                    </div>
                @endforeach
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