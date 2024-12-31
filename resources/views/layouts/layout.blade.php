<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield('head')
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
        }
        main {
            flex: 1;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(42, 42, 42, 0.4);
            /* background: linear-gradient(to top, rgba(42, 42, 42, 0.8), rgba(42, 42, 42, 0.3)); */
            z-index: 1;
        }
        .content {
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="w-full content">
        @include('layouts.topbar')
    </div>
    <main class="w-full content">
        @yield('content')
    </main>
    <div class="content">
        @include('layouts.footer')
    </div>
    @vite('resources/js/app.js')
</body>
</html>
