<div class="px-60 py-8">
    <div class="flex flex-wrap items-center gap-4 mb-6">
        <!-- Kategori Dropdown -->
        <div class="flex items-center mr-4">
            <label class="block font-medium mb-2">Kategori</label>
            <div class="inline-block relative w-40">
                <select wire:model="category_id" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-1 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="flex-1 mr-4">
            <label class="block font-medium mb-2">Search</label>
            <input type="text" wire:model="search" placeholder="Search..." class="block w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        </div>
    </div>

    <!-- Cards Grid Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($lkpdModules as $lkpd)
            <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4">
                <div class="w-full flex justify-center mb-4">
                    <img class="w-52 h-52 object-cover" src="{{ $lkpd->lkpd_image ?? 'https://via.placeholder.com/200' }}" alt="{{ $lkpd->lkpd_title }}">
                </div>
                <hr class="mb-4 border-gray-300">
                <div class="text-gray-700 text-sm font-semibold">
                    {{ $lkpd->lkpd_title }} oleh {{ $lkpd->user->name }} di {{ $lkpd->category->category_name }}
                </div>
                <div class="mt-2">
                    <strong>Tags:</strong>
                    @foreach($lkpd->tags as $tag)
                        <span class="bg-gray-200 rounded-full px-2 py-1 text-xs text-gray-700 mr-2">{{ $tag->tag_name }}</span>
                    @endforeach
                </div>
                <div class="mt-2">
                    <strong>Collaborators:</strong>
                    @foreach($lkpd->collaborator as $collab)
                        <span class="bg-gray-200 rounded-full px-2 py-1 text-xs text-gray-700 mr-2">{{ $collab->name }}</span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>