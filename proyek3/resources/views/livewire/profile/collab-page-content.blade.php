<div>
    <div class="w-full mx-auto">
        <div class="relative bg-gray-100">
            <img src="{{ asset('storage/profile-images/header-background.png') }}" 
                 alt="Background" 
                 class="w-full h-36 object-cover" style="object-position: 50% 35%;">
        </div>
        
        <!-- Gambar Profil Pengguna -->
        <div class="mt-8 px-60">
            <div class="flex items-start relative">
                <div class="flex-shrink-0 relative border-gray-300" style="top: -100px; ">
                    <img src="{{ $profile['profile_image'] ? Storage::url($profile['profile_image']) : asset('storage/profile-images/default_profile.png') }}" 
                         alt="Profile" 
                         class="w-40 h-40 rounded-full border-2 border-gray-200 {{ !$profile['profile_image'] ? 'bg-gray-200' : '' }}">
                </div>  
                
                <!-- Informasi Data Pengguna -->
                <div class="ml-6 flex-grow">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-2xl font-bold mb-1">{{ $collaborator_name }}</h1>
                            <div class="flex items-center"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 640 512">
                                    <path d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96 48 96C21.5 96 0 117.5 0 144L0 464c0 26.5 21.5 48 48 48l208 0 0-96c0-35.3 28.7-64 64-64s64 28.7 64 64l0 96 208 0c26.5 0 48-21.5 48-48l0-320c0-26.5-21.5-48-48-48L473.7 96 337.8 5.4zM96 192l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM96 320l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-16 0 0-16c0-8.8-7.2-16-16-16z"/>
                                </svg>
                                {{ $school ?? 'Sekolah Tidak Diketahui' }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-4 mr-2" viewBox="0 0 448 512">
                                    <path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l352 0 0 256c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256z"/>
                                </svg>
                                Bergabung {{ $collaborator['created_at']->format('d F Y') }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <p class="text-sm text-gray-600">
                            {{ $profile['about_me'] ?? 'Tidak ada deskripsi.' }}
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-right space-x-8 text-gray-500 border-b border-gray-200 relative">
            </div>
        </div>

        <!-- Informasi LKPD yang Dibuat -->
        <div class="mt-8 px-60">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-24">    
                @foreach ($lkpdVerif as $item)
                    <div class="border rounded-lg overflow-hidden">
                        <a href="{{ url('/lkpd/detail/' . $item['lkpd_id']) }}">
                            <img src="{{ $item['lkpd_image'] ?? '/path-to-default-image.jpg' }}" alt="{{ $item['lkpd_title'] }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold">{{ $item['lkpd_title'] }}</h3>
                                <div class="flex items-center mt-2 space-x-4">
                                    <span class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        32
                                    </span>
                                    <span class="flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        <p>{{ $item['like_count'] }} Suka</p>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>