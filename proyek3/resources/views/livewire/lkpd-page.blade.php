<div class="container mx-4 px-4 py-8 ">
    <div class="mb-6 mx-36">
        <div class="flex flex-col sm:flex-row gap-4 items-end overflow-x-hidden">
            <!-- Kategori Dropdown -->
            <div class="w-full sm:w-1/4 md:w-1/5">
                <x-select wire:model.live="category_id" id="category" class="mary-select w-full"
                    label="Category"
                    :options="$categories"
                    option-value="id"
                    option-label="category_name"
                    placeholder="Semua"
                    wire:model="category"
                />
            </div>
            <!-- Search Bar -->
            <div class="w-full m:w-3/4 md:w-4/5">
                <input type="text" label="Search LKPD" wire:model.live="search" id="search" placeholder="Search..." class="input input-bordered md:w-1/3">
            </div>
        </div>
    </div>

    <!-- Cards Grid Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mx-36">
        @foreach($lkpdModules as $lkpd)
        <x-card title="{{ $lkpd->lkpd_title }}" subtitle="oleh {{ $lkpd->user->name }}" class="max-w-full border border-gray-300">
            <x-slot:figure>
                <img src="{{asset('storage/'.$lkpd->lkpd_image) ??  $lkpd->lkpd_image ?? 'https://via.placeholder.com/200' }}" alt="{{ $lkpd->lkpd_title }}" class="w-full  border border-b-gray-300" />
            </x-slot:figure>
            <p>Pada Kategori: {{ $lkpd->category->category_name }}</p>
        </x-card>
        @endforeach
    </div>


    <div class="mt-6">
        {{ $lkpdModules->links() }}
    </div>
</div>