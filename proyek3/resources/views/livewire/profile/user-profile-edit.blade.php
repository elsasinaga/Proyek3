<div class="max-w-4xl mx-auto p-4">
    <div class="bg-white rounded-lg shadow-sm p-6">
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="updateProfile">
            <!-- Edit Profil Pengguna -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4">Edit Profil Pengguna</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pengguna</label>
                        <input type="text" wire:model="username" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                        @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" wire:model="fullName" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                        @error('fullName') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                        <input type="text" wire:model="asalSekolah" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                        @error('asalSekolah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <input type="text" wire:model="kelas" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                        @error('kelas') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4">Email</h2>
                <div class="flex gap-4 items-end">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" wire:model="email" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <button type="button" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                        Ganti Email
                    </button>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4">Password</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Sekarang</label>
                        <div class="relative">
                            <input type="password" wire:model="currentPassword" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                            <button type="button" class="absolute right-2 top-2.5 text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('currentPassword') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                        <div class="relative">
                            <input type="password" wire:model="newPassword" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                            <button type="button" class="absolute right-2 top-2.5 text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @error('newPassword') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- Notifikasi -->
            <div class="mb-6">
                <h2 class="text-lg font-semibold mb-4">Notifikasi</h2>
                <p class="text-sm text-gray-600 mb-4">Atur kapan notifikasi dikirimkan ke email ketika terdapat komentar yang masuk</p>
                
                <div class="space-y-2">
                    <label class="flex items-center">
                        <input type="radio" wire:model="notifications.tidak_ada" class="form-radio text-green-500">
                        <span class="ml-2">Tidak Ada</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" wire:model="notifications.langsung" class="form-radio text-green-500">
                        <span class="ml-2">Langsung</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" wire:model="notifications.harian" class="form-radio text-green-500">
                        <span class="ml-2">Harian</span>
                    </label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">
                <button type="button" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                    Batalkan Perubahan
                </button>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>