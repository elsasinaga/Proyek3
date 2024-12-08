<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    @livewire('lkpd.lkpd-detail', ['id' => $id])
    @livewireScripts
    
</body>
</html>