<div class="px-60">
                <h2 class="text-lg font-semibold mb-4">Edit Profil Pengguna</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" wire:model="name" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" wire:model="username" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                        @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kolaborator</label>
                        <input type="text" wire:model="collaborator_name" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                        @error('collaborator_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NPSN Sekolah</label>
                        <input type="text" wire:model="npsn" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                        @error('npsn') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tentang Saya</label>
                    <textarea wire:model="about_me" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500"></textarea>
                    @error('about_me') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
                        </div>
                        @error('currentPassword') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                        <div class="relative">
                            <input type="password" wire:model="newPassword" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
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
                        <input type="radio" wire:model="notification_preference" value="none"
                               class="form-radio text-green-500">
                        <span class="ml-2">Tidak Ada</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" wire:model="notification_preference" value="immediate"
                               class="form-radio text-green-500">
                        <span class="ml-2">Langsung</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" wire:model="notification_preference" value="daily"
                               class="form-radio text-green-500">
                        <span class="ml-2">Harian</span>
                    </label>
                </div>
                @error('notification_preference') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4">
                <button type="button" 
                        class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50"
                        onclick="window.location.reload()">
                    Batalkan Perubahan
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                    Simpan Perubahan
                </button>
            </div>