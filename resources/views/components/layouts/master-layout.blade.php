<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieApp</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans bg-gray-900 text-white">

    <x-navigation />
    <x-navigation-sm />

    {{ $slot }}

    <script src="{{ mix('js/app.js') }}"></script>
    @livewireScripts

    @yield('scripts')
</body>
</html>
