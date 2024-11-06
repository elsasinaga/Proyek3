<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    @livewire('navbar')
    @livewire('profile.user-profile-edit')
    @livewireScripts
</body>
</html>