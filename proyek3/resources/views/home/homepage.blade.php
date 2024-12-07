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
    <div class="container mx-auto max-w-screen-lg px-6 py-12">
        <div class="grid grid-cols-3 gap-6 text-center">
            <div>
                <h3 class="text-green-600 font-bold text-xl">introduction part 1</h3>
                <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div>
                <h3 class="text-green-600 font-bold text-xl">introduction part 2</h3>
                <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div>
                <h3 class="text-green-600 font-bold text-xl">introduction part 3</h3>
                <p class="text-gray-600 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>

    <!-- Divider Line -->
    <hr class="border-t border-gray-300 my-0 mx-6">

    <!-- Modul Section -->
    <div class="container mx-auto max-w-screen-lg px-6 py-10">
        @livewire('lkpd-home')
    </div>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center">
        <p class="text-gray-500">&copy; 2024 Politeknik Negeri Bandung</p>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts

</body>
</html>
