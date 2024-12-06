<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    <!-- Tambahkan div wrapper dengan flex -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white text-black flex flex-col fixed h-full">
            <div class="p-6 text-4xl font-bold" style="color: #013CC6;">Lkpd.</div>
            <!--* Navbar khusus Admin *-->
            <ul class="menu p-4 flex-grow" style="color: #8E8E8E;">
                <li><a href="{{ route('admin.dashboard') }}" class="text-lg mt-2 {{ request()->routeIs('admin.dashboard') ? 'text-custom-blue font-bold bg-gray-50' : 'text-gray-500 hover:text-custom-blue' }}">Dashboard</a></li>
                <li><a href="{{ route('admin.sekolah') }}" class="text-lg mt-2 {{ request()->routeIs('admin.sekolah') ? 'text-custom-blue font-bold bg-gray-50' : 'text-gray-500 hover:text-custom-blue' }}">Sekolah</a></li>
                <li><a href="{{ route('admin.tags') }}" class="text-lg mt-2 {{ request()->routeIs('admin.tags') ? 'text-custom-blue font-bold bg-gray-50' : 'text-gray-500 hover:text-custom-blue' }}">Tags</a></li>
                <li><a href="{{ route('admin.lkpd') }}" class="text-lg mt-2 {{ request()->routeIs('admin.lkpd') ? 'text-custom-blue font-bold bg-gray-50' : 'text-gray-500 hover:text-custom-blue' }}">LKPD</a></li>
            </ul>
            <div class="p-4">
                {{--* <a href="{{ route('logout') }}" class="text-red-400 hover:text-red-300">Logout</a> *--}}
            </div>
        </aside>

        <main class="flex-grow p-6 ml-64 bg-gray-100">
            <div class="grid grid-cols-12 gap-4 items-center">
                <div class="col-span-5">
                    <form>   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
                        </div>
                    </form>
                </div>
                <div class="col-span-5"></div>
                
                <div class="col-span-2 flex justify-center">
                    <button class="flex items-center bg-white text-gray-200 px-4 py-2 rounded hover:bg-blue-100 mr-4">
                        <i class="fas fa-bell"></i>
                    </button>
                    <div class="w-10 h-10 overflow-hidden bg-gray-200 flex items-center justify-center">
                        {{-- @if($profilePicture)
                        <img src="{{ $profilePicture }}" alt="Profile Picture" class="w-full h-full object-cover">
                        @else --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
        <script>
    function openEditModal(id) {
    // Panggil Livewire untuk memuat data berdasarkan ID
    @this.call('loadData', id);

    // Buka modal DaisyUI
    const modal = document.getElementById('my_modal_3');
    modal.showModal();
}

    function confirmDelete(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            @this.call('deleteData', id); // Panggil metode Livewire
        }
    }
</script>
    <script>
        window.addEventListener('show-form', event => {
            $('#form').modal('show');
        })
    </script>
    @livewireScripts
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
</body>
</html>