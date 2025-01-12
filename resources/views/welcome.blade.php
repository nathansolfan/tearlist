<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tier List To-Do App</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Main Container -->
    <div class="container mx-auto px-4 py-10">
        <!-- Page Title -->
        <h1 class="text-4xl font-bold text-center mb-8">🎯 Tier List To-Do App</h1>

        <!-- Include the Livewire Component -->
        @livewire('tierlist')
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
