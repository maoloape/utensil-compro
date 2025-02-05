<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    @yield('title')
    @yield('style')
    <link rel="icon" type="image/png" href="{{ asset('assets/logo/logo-utensil-image.png') }}">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            font-family: "Raleway", serif;
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

    @yield('script')
</body>
</html>