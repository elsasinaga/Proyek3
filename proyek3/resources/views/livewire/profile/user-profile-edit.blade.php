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
                    <img src="{{asset('storage/profile-images/header-background.png') }}" 
                        alt="Background" 
                        class="w-full h-36 object-cover" style="object-position: 50% 35%;">
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
                                    <img class="w-full h-full object-cover bg-gray-200" src="{{asset('storage/profile-images/default_profile.png')}}" alt="Profile photo">
                                @endif

                                <!-- Hover Overlay for Upload -->
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <label class="text-white text-center cursor-pointer">
                                        <span>Change Photo</span>
                                        <input type="file" class="hidden" wire:model="temp_image" accept="image/*">
                                    </label>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 text-center mt-2">Maks. 2MB</p>
                        </div>

                        <!-- Profile Information - Adjusted margins -->
                        <div class="ml-6 flex-grow -mt-4">
                            <div class="flex flex-col">
                                <h1 class="text-2xl font-bold">{{ $username }}</h1>
                                <div class="flex items-center mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 448 512">
                                        <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l352 0 0 256c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256z"/>
                                    </svg>
                                    <p class="text-sm text-gray-600">{{ $created_at->format('d F Y') }}</p>
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
                            <select wire:model="npsn" class="w-full p-2 border border-gray-300 rounded bg-white">
                                <option value="">Pilih Sekolah</option>
                                @foreach ($this->getSchools() as $school)
                                    <option value="{{ $school->npsn }}">{{ $school->school_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-600">Email</label>
                            <input type="text" value="{{ $email }}"
                                class="w-full p-2 border border-gray-300 rounded" placeholder="Email" readonly>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-gray-600">Tentang Saya</label>
                            <textarea class="w-full p-2 border border-gray-300 rounded" wire:model="about_me"></textarea>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Section 2: Email -->
            <!-- <div class="px-60 flex items-center mb-4">
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
            </div> -->


            <!-- Section 3: Password -->
            <div class="px-60 flex items-center mb-4">
                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                <h2 class="text-xl font-semibold text-gray-800">Password</h2>
            </div>
            
            <div class="px-60 grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                {{-- Current Password Input --}}
                <div class="border-l-4 border-gray-300 pl-5">
                    <label class="block text-gray-600">Password Sekarang</label>
                    <div class="relative">
                        <input 
                            type="{{ $showCurrentPassword ? 'text' : 'password' }}"
                            wire:model="currentPassword"
                            class="w-full p-2 border border-gray-300 rounded pr-10" 
                            placeholder="Current Password"
                        >
                        <button 
                            type="button"
                            wire:click="toggleCurrentPassword"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
                        >
                            @if($showCurrentPassword)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            @endif
                        </button>
                    </div>
                </div>

                {{-- New Password Input --}}
                <div>
                    <label class="block text-gray-600">Password Baru</label>
                    <div class="relative">
                        <input 
                            type="{{ $showNewPassword ? 'text' : 'password' }}"
                            wire:model="newPassword"
                            class="w-full p-2 border border-gray-300 rounded pr-10" 
                            placeholder="New Password"
                        >
                        <button 
                            type="button"
                            wire:click="toggleNewPassword"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none"
                        >
                            @if($showNewPassword)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecapound" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            @endif
                        </button>
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
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded" wire:click="backToProfile">Batalkan Perubahan</button>
                <button class="px-4 py-2 bg-green-500 text-white rounded" wire:click="updateProfile">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>