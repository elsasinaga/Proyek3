<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage || LKPD</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    @livewire('navbar')
    <!-- Slider -->
    @livewire('slider')

    <!-- Introduction Section -->
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-3 gap-6 text-center">
            <div class="bg-white p-6 rounded-[9px] shadow-md">
                <h3 class="text-green-600 font-bold text-xl">introduction part 1</h3>
                <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="bg-white p-6 rounded-[9px] shadow-md">
                <h3 class="text-green-600 font-bold text-xl">introduction part 2</h3>
                <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="bg-white p-6 rounded-[9px] shadow-md">
                <h3 class="text-green-600 font-bold text-xl">introduction part 3</h3>
                <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>

    <!-- Divider Line -->
    <hr class="border-t border-gray-300 my-0 mx-6">

    <!-- Modul Section -->
    <div class="container mx-auto px-6 py-10">
        <a href="#" class="block text-2xl font-bold mb-6 text-green-600 flex items-center hover:text-green-800 transition-colors duration-300">
            Modul Plugged 
            <svg class="w-6 h-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-[9px] shadow-md">
                <img src="https://unsplash.com/photos/red-pencil-on-top-of-mathematical-quiz-paper-rD2dc_2S3i0" alt="Computational Thinking" class="w-full h-40 object-cover rounded-[9px]">
                <h3 class="mt-4 font-semibold">Computational Thinking</h3>
                <p class="text-gray-600">Pak Aris di Bandung</p>
            </div>
            <div class="bg-white p-4 rounded-[9px] shadow-md">
                <img src="/path-to-image.png" alt="Bahasa Indonesia" class="w-full h-40 object-cover rounded-[9px]">
                <h3 class="mt-4 font-semibold">Modul Pembelajaran Bahasa Indonesia</h3>
                <p class="text-gray-600">Pak Aris di Bandung</p>
            </div>
            <div class="bg-white p-4 rounded-[9px] shadow-md">
                <img src="/path-to-image.png" alt="3D Jellyfish" class="w-full h-40 object-cover rounded-[9px]">
                <h3 class="mt-4 font-semibold">3D Printed Mechanical Jellyfish</h3>
                <p class="text-gray-600">Pak Aris di Bandung</p>
            </div>
        </div>

        <a href="#" class="block text-2xl font-bold mt-12 mb-6 text-green-600 flex items-center hover:text-green-800 transition-colors duration-300">
            Modul Unplugged 
            <svg class="w-6 h-6 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white p-4 rounded-[9px] shadow-md">
                <img src="/path-to-image.png" alt="Unplugged 1" class="w-full h-40 object-cover rounded-[9px]">
                <h3 class="mt-4 font-semibold">Computational Thinking</h3>
                <p class="text-gray-600">Pak Aris di Bandung</p>
            </div>
            <div class="bg-white p-4 rounded-[9px] shadow-md">
                <img src="/path-to-image.png" alt="Unplugged 2" class="w-full h-40 object-cover rounded-[9px]">
                <h3 class="mt-4 font-semibold">Computational Thinking</h3>
                <p class="text-gray-600">Pak Aris di Bandung</p>
            </div>
            <div class="bg-white p-4 rounded-[9px] shadow-md">
                <img src="/path-to-image.png" alt="Unplugged 3" class="w-full h-40 object-cover rounded-[9px]">
                <h3 class="mt-4 font-semibold">Computational Thinking</h3>
                <p class="text-gray-600">Pak Aris di Bandung</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center">
        <p class="text-gray-500">&copy; 2024 Politeknik Negeri Bandung</p>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts

</body>
</html>
