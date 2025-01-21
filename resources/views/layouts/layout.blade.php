<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield('title')
    @yield('style')
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            font-family: 'Myriad Pro', sans-serif;
        }

        .container{
            max-width: 1740px;
        }
    </style>
</head>
<body>
    {{-- @include('layouts.topbar') --}}
    <main class="w-full">
        @yield('content')
    </main>
    <div class="w-full">
        @include('layouts.footer')
    </div>
</body>
</html>