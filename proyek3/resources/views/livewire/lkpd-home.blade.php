<div>
    @if (!empty($pluggedModules) && count($pluggedModules) > 0)
        <a href="{{ url('/lkpd?category_id=' . $pluggedModules->first()->category_id) }}" class="block text-2xl font-bold mb-6 text-green-600 flex items-center hover:text-green-800 transition-colors duration-300">
            Modul Plugged
            <svg class="w-6 h-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <div class="grid grid-cols-3 gap-6">
            @foreach($pluggedModules as $module)
            <div class="bg-white p-4 rounded-[9px] shadow-md">
                <img src="{{ asset('storage/' . $module->lkpd_image) }}" alt="{{ $module->lkpd_title }}" class="w-full h-40 object-cover rounded-[9px]">
                <h3 class="mt-4 font-semibold">{{ $module->lkpd_title }}</h3>
                <p class="text-gray-600">{{ $module->user->name }}</p>
            </div>
            @endforeach
        </div>
    @endif

    @if (!empty($unpluggedModules) && count($unpluggedModules) > 0)
        <a href="{{ url('/lkpd?category_id=' . $unpluggedModules->first()->category_id) }}" class="block text-2xl font-bold mt-12 mb-6 text-green-600 flex items-center hover:text-green-800 transition-colors duration-300">
            Modul Unplugged
            <svg class="w-6 h-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <div class="grid grid-cols-3 gap-6">
            @foreach($unpluggedModules as $module)
            <div class="bg-white p-4 rounded-[9px] shadow-md">
                <img src="{{ asset('storage/' . $module->lkpd_image) }}" alt="{{ $module->lkpd_title }}" class="w-full h-40 object-cover rounded-[9px]">
                <h3 class="mt-4 font-semibold">{{ $module->lkpd_title }}</h3>
                <p class="text-gray-600">{{ $module->user->name }}</p>
            </div>
            @endforeach
        </div>
    @endif
</div>