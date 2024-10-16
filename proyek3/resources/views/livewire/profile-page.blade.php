<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="">
    <div class="w-full mx-auto">
        <div class="relative bg-gray-100 margin">
            <img src="your-background-image.jpg" alt="Background" class="w-full h-36 object-cover">
            <div class="absolute bottom-0 left-1/4 transform -translate-x-1/2 translate-y-1/2">
                <img src="your-profile-image.jpg" alt="Profile" class="w-36 h-36 rounded-full border-2 border-gray">
            </div>
        </div>
        <div class="mt-8 px-60">
            <!-- Bagian Nama dan Tombol Pengaturan -->
            <div class="flex justify-between items-center mb-4">
                <div>
                    <!-- Nama dan Sekolah -->
                    <h1 class="text-2xl font-bold mb-1 ml-[240px]">Theresa Webb</h1>
                    <div class="flex items-center ml-[240px]">
                        <img src="school-logo.png" alt="Logo Sekolah" class="w-5 h-5 mr-2">
                        <p class="text-sm text-gray-600">SMKN 1 Cimahi • Bergabung 10 September 2024</p>
                    </div>
                </div>
                <!-- Tombol Pengaturan -->
                <button class="text-gray-500 hover:text-gray-700">
                    <!-- Icon gear settings (gunakan ikon font-awesome atau material icons) -->
                    <i class="fas fa-cog text-xl"></i>
                </button>
            </div>

            <!-- Tombol Tambahkan LKPD -->
            <div class="flex justify-end mb-6">
                <button class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                    + Tambahkan LKPD
                </button>
            </div>

            <!-- Tombol Message dan Call -->
            <div class="flex space-x-4 mb-6 ml-[240px]">
                <button class="px-6 py-2 bg-white text-gray-700 rounded-full border border-gray-300 hover:bg-gray-100">
                    Message
                </button>
                <button class="px-6 py-2 bg-white text-gray-700 rounded-full border border-gray-300 hover:bg-gray-100">
                    Call
                </button>
            </div>

            <!-- Navigation Tabs -->
            <div class="flex justify-center space-x-8 text-sm font-medium text-gray-500 border-b border-gray-200">
                <button class="text-pink-500 border-b-2 border-pink-500 pb-2">Profile</button>
                <button class="pb-2 hover:text-gray-700">Calendar</button>
                <button class="pb-2 hover:text-gray-700">Recognition</button>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>