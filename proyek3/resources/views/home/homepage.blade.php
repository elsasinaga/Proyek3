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
                <h3 class="text-green-600 font-bold text-xl">Step by Step</h3>
                <p class="text-gray-600 mt-2">Kami hadir untuk membantu Anda menyelesaikan setiap tantangan dengan panduan praktis dan terarah. Langkah demi langkah, Anda akan menemukan solusi yang mudah dipahami dan dapat diterapkan langsung dalam kehidupan sehari-hari.</p>
            </div>
            <div>
                <h3 class="text-green-600 font-bold text-xl">Jawaban atas Masalah Anda</h3>
                <p class="text-gray-600 mt-2">Kami mengerti tantangan yang Anda hadapi, mulai dari sulitnya menemukan panduan terstruktur hingga kebutuhan komunitas yang mendukung. Platform ini adalah jawaban bagi Anda yang mencari solusi sederhana dan efisien.</p>
            </div>
            <div>
                <h3 class="text-green-600 font-bold text-xl">Batasan yang Jelas</h3>
                <p class="text-gray-600 mt-2">Fokus kami adalah menghadirkan panduan yang relevan, praktis, dan mudah diikuti untuk siapa saja. Tanpa kerumitan, tanpa batasan kreativitas – hanya panduan yang benar-benar membantu Anda mencapai tujuan Anda.</p>
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
