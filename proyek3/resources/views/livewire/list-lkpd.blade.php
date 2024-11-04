<div class="px-60 flex items-center mb-4">
    <div class="grid grid-cols-3 gap-6 mb-24">
        <!-- Your existing LKPD cards -->
        @foreach($lkpdModules as $lkpd)
        <div class="border rounded-lg overflow-hidden">
            <img src="{{asset('storage/'.$lkpd->lkpd_image) ??  $lkpd->lkpd_image ?? 'https://via.placeholder.com/200' }}" alt="{{ $lkpd->lkpd_title }}" alt="LKPD" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-semibold" value="{{ $lkpd->lkpd_title }}"></h3>
                <h4 value="{{ $lkpd->user->name }}"></h4>
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
                        8
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>