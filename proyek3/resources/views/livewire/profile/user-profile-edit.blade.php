<div class="w-full mx-auto">
    <div class="bg-white rounded-lg">
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="updateProfile">
            <div class="w-full mx-auto">
                <div class="relative bg-gray-100">
                    <img src="your-background-image.jpg" alt="Background" class="w-full h-36 object-cover">
                </div>
                <div class="mt-4 px-60">
                    <div class="flex items-start relative">
                        <!-- Profile Image - Adjusted positioning and margins -->
                        <div class="flex-shrink-0 relative" style="top: -100px;">
                            <div class="w-40 h-40 rounded-full border-2 border-gray-200 overflow-hidden relative group">
                                @if ($temp_image)
                                    <img class="w-full h-full object-cover" src="{{ $temp_image->temporaryUrl() }}" alt="Profile photo">
                                @elseif($profile_image)
                                    <img class="w-full h-full object-cover" src="{{ Storage::url($profile_image) }}" alt="Profile photo">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-500">
                                        No Image
                                    </div>
                                @endif

                                <!-- Hover Overlay for Upload -->
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <label class="text-white text-center cursor-pointer">
                                        <span>Change Photo</span>
                                        <input type="file" class="hidden" wire:model="temp_image" accept="image/*">
                                    </label>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 text-center mt-2">Maks. 1MB</p>
                        </div>

                        <!-- Profile Information - Adjusted margins -->
                        <div class="ml-6 flex-grow -mt-4">
                            <div class="flex flex-col">
                                <h1 class="text-2xl font-bold">{{ $username }}</h1>
                                <div class="flex items-center mt-1">
                                    <i class="fas fa-graduation-cap w-5 h-5 mr-2 text-gray-600"></i>
                                    <p class="text-sm text-gray-600">{{ $created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 1: Profile -->
            <div class="px-60 flex items-center mb-4">
                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                <h2 class="text-xl font-semibold text-gray-800">Edit Profil Pengguna</h2>
            </div>
            <div class="mx-60 mb-6">
                <div class="border-l-4 border-gray-300 pl-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-600">Nama Pengguna</label>
                            <input type="text" wire:model="username" 
                                class="w-full p-2 border border-gray-300 rounded" placeholder="Username">
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-gray-600">Nama Lengkap</label>
                            <input type="text" wire:model="name" 
                                class="w-full p-2 border border-gray-300 rounded" placeholder="Full Name">
                        </div>
                        <div>
                            <label class="block text-gray-600">Asal Sekolah</label>
                            <input type="text" value="{{ $schoolName }}" 
                                class="w-full p-2 border border-gray-300 rounded" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-600">Kelas</label>
                            <input type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Class" disabled>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-gray-600">Tentang Saya</label>
                            <textarea class="w-full p-2 border border-gray-300 rounded" wire:model="about_me"></textarea>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Section 2: Email -->
            <div class="px-60 flex items-center mb-4">
                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                <h2 class="text-xl font-semibold text-gray-800">Email</h2>
            </div>
            <div class="px-60 mb-8">
                <div class="border-l-4 border-gray-300 pl-5">
                        <label class="block text-gray-600 mb-1">Email</label>
                        <div class="flex items-center">
                            <input type="email" class="flex-1 w-1/2 p-2 border border-gray-300 rounded" value="{{ $email }}" readonly>
                            <button class="ml-2 px-4 py-2 bg-green-500 text-white rounded">Ganti Email</button>
                    </div>
                </div>
            </div>


            <!-- Section 3: Password -->
            <div class="px-60 flex items-center mb-4">
                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                <h2 class="text-xl font-semibold text-gray-800">Password</h2>
            </div>

            <div class="px-60 mb-6">
                <div class="border-l-4 border-gray-300 pl-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-600">Password Sekarang</label>
                            <input type="password" class="w-full p-2 border border-gray-300 rounded" wire:model="currentPassword" >
                        </div>
                        <div>
                            <label class="block text-gray-600">Password Baru</label>
                            <input type="password" class="w-full p-2 border border-gray-300 rounded" placeholder="New Password">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: Notifications -->
            <div class="px-60 flex items-center mb-4">
                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                <h2 class="text-xl font-semibold text-gray-800">Notifikasi</h2>
            </div>
            <div class="px-60 mb-10">
                <div class="border-l-4 border-gray-300 pl-5">
                    <p class="text-gray-600 mb-2">Atur kapan notifikasi dikirimkan ke email ketika terdapat komentar yang masuk</p>
                    <div class="flex">
                        <button type="button"
                            class="px-4 py-2 rounded-l-lg transition-colors duration-200
                                {{ $temp_notification_preference === 'none' ? 'bg-green-500 text-white' : 'bg-white text-gray-700 border border-green-500' }}"
                            wire:click="selectNotificationPreference('none')">
                            Tidak Ada
                        </button>
                        <button type="button"
                            class="px-4 py-2 transition-colors duration-200
                                {{ $temp_notification_preference === 'immediate' ? 'bg-green-500 text-white' : 'bg-white text-gray-700 border-t border-b border-green-500' }}"
                            wire:click="selectNotificationPreference('immediate')">
                            Langsung
                        </button>
                        <button type="button"
                            class="px-4 py-2 rounded-r-lg transition-colors duration-200
                                {{ $temp_notification_preference === 'daily' ? 'bg-green-500 text-white' : 'bg-white text-gray-700 border border-green-500' }}"
                            wire:click="selectNotificationPreference('daily')">
                            Harian
                        </button>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="px-60 flex justify-end mb-20">
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded">Batalkan Perubahan</button>
                <button class="px-4 py-2 bg-green-500 text-white rounded" wire:click="updateProfile">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>