<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

            <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body class="font-sans antialiased">
    <div class="flex flex-col min-h-screen bg-gray-100">
        {{-- navigation --}}
        @include('layouts.navigation')

        {{-- main --}}
        <main class="flex-1 justify-start overflow-hidden overflow-y-auto">
            @yield('content')
        </main>
        {{-- footer --}}
        @include('layouts.footer')
    </div>
</body>
</html>