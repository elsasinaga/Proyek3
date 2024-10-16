<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row gap-4 items-end">
            <!-- Kategori Dropdown -->
            <div class="w-full sm:w-1/2 md:w-1/3">
                <div class="mt-6 w-2/5">
                    <x-select wire:model.live="category_id" id="category" class="mary-select w-full"
                        label="Category"
                        :options="$categories"
                        option-value="id"
                        option-label="category_name"
                        placeholder="Semua"
                        wire:model="category"
                    />
                </div>
            </div>
            <!-- Search Bar -->
            <div class="w-full sm:w-1/2 md:w-2/3">
                <input type="text" wire:model.live="search" id="search" placeholder="Search..." class="input input-bordered md:w-1/3">
            </div>
        </div>
    </div>

    <!-- Cards Grid Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($lkpdModules as $lkpd)
        <x-card title="{{ $lkpd->lkpd_title }}" subtitle="oleh {{ $lkpd->user->name }}" shadow separator>
            <figure>
                <img class="w-full h-48 object-cover rounded-t-lg" src="{{ $lkpd->lkpd_image ?? 'https://via.placeholder.com/200' }}" alt="{{ $lkpd->lkpd_title }}">
            </figure>
        </x-card>
    @endforeach

    </div>

    <div class="mt-6">
        {{ $lkpdModules->links() }}
    </div>
</div>