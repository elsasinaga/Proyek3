<div>
    @if (empty($favorites))
        <!-- Jika Tidak Ada Data Favorit -->
        <div class="text-center py-8 mb-24">
            <div class="mb-8">
                <svg class="mx-auto w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </div>
            <p class="text-gray-500">Anda Belum Memberikan Status Favorit Untuk LKPD. Tambahkan Terlebih Dahulu.</p>
        </div>
    @else
        <!-- Jika Ada Data Favorit -->
        <div>
            <!-- LKPD Favorit -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-24">    
                @foreach ($favorites as $item)
                    <div class="border rounded-lg overflow-hidden">
                        <a href="{{ url('/lkpd/detail/'.$item['lkpd_id']) }}">
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
    @endif
</div>