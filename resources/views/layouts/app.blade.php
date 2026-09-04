<!DOCTYPE html>
<html lang="en" @auth class="group/shell" @endauth>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    @auth
        <script>
            try {
                if (localStorage.getItem('tracker-nav-compact') === '1') {
                    document.documentElement.setAttribute('data-compact', '');
                }
            } catch (e) {}
        </script>
    @endauth
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-body-main font-sans text-body tracking-letter antialiased">
    @include('layouts.partials.icons')
    @auth
        @include('layouts.partials.sidebar')
    @endauth

    <main @class([
        'min-h-screen bg-background-content px-layout-x py-layout-y',
        'ml-nav transition-[margin-left] duration-fast ease-smooth group-data-compact/shell:ml-nav-compact' => auth()->check(),
        'flex items-center justify-center' => auth()->guest(),
    ])>
        @yield('content')
    </main>
</body>
</html>
