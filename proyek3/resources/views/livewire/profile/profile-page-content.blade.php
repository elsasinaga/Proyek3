<div>
    <div class="w-full mx-auto">
        <div class="relative bg-gray-100">
            <img src="{{asset('storage/profile-images/header-background.png') }}" 
                 alt="Background" 
                 class="w-full h-36 object-cover" style="object-position: 50% 35%;">
        </div>
        
        <!-- Gambar Profil Pengguna -->
        <div class="mt-8 px-60">
            <div class="flex items-start relative">
                <div class="flex-shrink-0 relative border-gray-300" style="top: -100px; ">
                    <img src="{{ $profile->profile_image ? Storage::url($profile->profile_image) : asset('storage/profile-images/default_profile.png') }}" 
                         alt="Profile" 
                         class="w-40 h-40 rounded-full border-2 border-gray-200 {{ !$profile->profile_image ? 'bg-gray-200' : '' }}">
                </div>  
                
                <!-- Informasi Data Pengguna -->
                <div class="ml-6 flex-grow">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-2xl font-bold mb-1">{{ $user->name }}</h1>
                            <div class="flex items-center"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 640 512">
                                    <path d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96 48 96C21.5 96 0 117.5 0 144L0 464c0 26.5 21.5 48 48 48l208 0 0-96c0-35.3 28.7-64 64-64s64 28.7 64 64l0 96 208 0c26.5 0 48-21.5 48-48l0-320c0-26.5-21.5-48-48-48L473.7 96 337.8 5.4zM96 192l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM96 320l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-16 0 0-16c0-8.8-7.2-16-16-16z"/>
                                </svg>
                                    {{ $school }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-4 mr-2" viewBox="0 0 448 512">
                                    <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l352 0 0 256c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256z"/>
                                </svg>
                                    Bergabung {{ $user->created_at->format('d F Y') }}
                                </p>
                            </div>
                        </div>

                        <div class="flex space-x-2">
                            <button 
                                wire:click="openSettings"
                                class="p-2 rounded-md bg-gray-200 hover:bg-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512" fill="none" stroke="currentColor" stroke-width="15">
                                    <path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 2 0 0-160 80 80 0 1 0 0 160z"/>
                                </svg>
                            </button>
                            <button 
                                wire:click="openLkpdForm"
                                class="px-4 py-2 bg-green-500 text-white text-sm rounded-md hover:bg-green-600">
                                <i class="fa-solid fa-plus"></i> <b>+</b> Tambahkan LKPD
                            </button>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p class="text-sm text-gray-600">
                            {{ $profile->about_me }}
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-right space-x-8 text-gray-500 border-b border-gray-200 relative">
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="mt-8 px-60">
            <div class="flex space-x-8 justify-end">
                <div class="flex space-x-8">
                    <!-- Comments Tab -->
                    <button 
                        wire:click="setTab('komentar')"
                        class="flex items-center pb-4 border-b-2 {{ $activeTab === 'komentar' ? 'border-green-500 text-green-500' : 'border-transparent hover:border-gray-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span>Komentar</span>
                    </button>

                    <!-- Favorites Tab -->
                    <button 
                        wire:click="setTab('favorit')"
                        class="flex items-center pb-4 border-b-2 {{ $activeTab === 'favorit' ? 'border-green-500 text-green-500' : 'border-transparent hover:border-gray-300' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <span>Favorit</span>
                    </button>

                    <!-- LKPD Tab -->
                    <button 
                        wire:click="setTab('lkpd')"
                        class="flex items-center pb-4 border-b-2 {{ $activeTab === 'lkpd' ? 'border-green-500 text-green-500' : 'border-transparent hover:border-gray-300' }}">
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
                @livewire('profile.komentar-tab', ['user' => $user])
            @elseif ($activeTab === 'favorit')
                @livewire('profile.favorit-tab', ['user' => $user])
            @elseif ($activeTab === 'lkpd')
                @livewire('profile.lkpd-tab', ['user' => $user, 'activeSubTab' => $activeLkpdTab])
            @endif
        </div>
    </div>
</div>