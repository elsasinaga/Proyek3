<div>
    <!-- LKPD Sub Tabs -->
    <div class="flex mb-16 justify-center">
        <button 
            wire:click="$set('activeSubTab', 'upload')"
            class="px-4 py-2 rounded-l-lg hover:bg-green-600 {{ $activeSubTab === 'upload' ? 'bg-green-500 text-white hover:bg-green-500' : 'bg-white border border-green-500' }}"
        >
            Upload (3)
        </button>
        <button 
            wire:click="$set('activeSubTab', 'draft')"
            class="px-4 py-2 rounded-r-lg hover:bg-green-600 {{ $activeSubTab === 'draft' ? 'bg-green-500 text-white hover:bg-green-500' : 'bg-white border-t border-b border-r border-green-500' }}"
        >
            Draft (1)
        </button>
    </div>

    <!-- LKPD Content -->
    @if ($activeSubTab === 'upload')
        <div class="grid grid-cols-3 gap-6 mb-24">
            <!-- Your existing LKPD cards -->
            @foreach(range(1,3) as $index)
            <div class="border rounded-lg overflow-hidden">
                <img src="/path-to-your-image.jpg" alt="LKPD" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold">Menyusun Algoritma dengan Berpikir Komputasional untuk Menyelesaikan Masalah</h3>
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
    @else
        <div class="grid grid-cols-3 gap-6 mb-24">
            <!-- Draft LKPD card -->
            <div class="border rounded-lg overflow-hidden">
                <img src="/path-to-draft-image.jpg" alt="Draft LKPD" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold">Draft: Menyusun Algoritma Baru</h3>
                    <div class="mt-2">
                        <span class="inline-block bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-sm">Draft</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>