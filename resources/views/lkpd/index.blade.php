<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row gap-4 items-end">
            <!-- Kategori Dropdown -->
            <div class="w-full sm:w-1/2 md:w-1/3">
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select wire:model.live="category_id" id="category" class="mary-select w-full">
                    <option value="">Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Search Bar -->
            <div class="w-full sm:w-1/2 md:w-2/3">
                <input type="text" wire:model.live="search" id="search" placeholder="Search..." class="mary-input w-full">
            </div>
        </div>
    </div>

    <!-- Cards Grid Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($lkpdModules as $lkpd)
            <div class="mary-card">
                <img class="w-full h-48 object-cover rounded-t-lg" src="{{ $lkpd->lkpd_image ?? 'https://via.placeholder.com/200' }}" alt="{{ $lkpd->lkpd_title }}">
                <div class="p-4">
                    <h3 class="text-sm font-semibold mb-1 truncate">{{ $lkpd->lkpd_title }}</h3>
                    <p class="text-xs text-gray-600 mb-2">oleh {{ $lkpd->user->name }}</p>
                    <p class="text-xs text-gray-500 mb-2">{{ $lkpd->category->category_name }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $lkpdModules->links() }}
    </div>
</div>