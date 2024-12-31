@extends('layouts.layout')

@section('title', 'Home')

@section('head')
<style>
    body {
        background-image: url('{{ asset('assets/asset/background.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    main {
        flex: 1;
        position: relative;
    }

    .see-product {
        border: 2px solid transparent;
        border-color: #009ac7; 
        border-radius: 24px; 
        padding: 10px 30px; 
        text-decoration: none; 
        color: white; 
        display: inline-block; 
        transition: all 0.3s ease; 
    }

    .see-product:hover {
        border-color: rgba(255, 255, 255, 0.8); 
        color: rgba(255, 255, 255, 0.8); 
    }

</style>
@endsection

@section('content')

    <!-- Section 1 -->
    <div class="max-w-screen-xl mx-auto pt-32">
        <div class="py-12">
            <div class="flex flex-col lg:flex-row gap-4">
                <div class="lg:w-1/3 text-left">
                    <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mb-9 w-auto h-24">
                    <h1 class="text-4xl text-white font-bold mb-4">Welcome to PT Indonesia Utensil</h1>
                    <p class="text-lg text-white mb-8">Your trusted kitchenware manufacturer since 1966.</p>
                    <a class="see-product text-lg mb-8" href="/product">See Product</a>
                </div>
                
                <!-- Kolom kanan untuk grid item -->
                <div class="lg:w-2/3 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="relative h-96 rounded-lg shadow-lg bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent rounded-lg">
                            <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mt-72 mx-auto w-auto h-auto">
                        </div>
                    </div>
                    <div class="relative h-96 rounded-lg shadow-lg bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent rounded-lg">
                            <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mt-72 mx-auto w-auto h-auto">
                        </div>
                    </div>
                    <div class="relative h-96 rounded-lg shadow-lg bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent rounded-lg">
                            <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mt-72 mx-auto w-auto h-auto">
                        </div>
                    </div>
                    <div class="relative h-96 rounded-lg shadow-lg bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent rounded-lg">
                            <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mt-72 mx-auto w-auto h-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto mt-0 py-16 bg-gradient-to-t from-gray-800 to-transparent">
    </div>

    {{-- Section 2 --}}

    <div class="max-w-screen-xl mx-auto mt-0 py-16 bg-gray-800">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4 text-white" style="font-size: 54px">-- PRODUK PILIHAN --</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="relative h-96 rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mt-72 mx-auto w-auto h-auto">
                </div>
                <div class="relative h-96 rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mt-72 mx-auto w-auto h-auto">
                </div>
                <div class="relative h-96 rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mt-72 mx-auto w-auto h-auto">
                </div>
                <div class="relative h-96 rounded-lg shadow-lg bg-white">
                    <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mt-72 mx-auto w-auto h-auto">
                </div>
            </div>
            <div class="py-8">
                <a class="see-product text-4xl mb-4" href="/product" style="margin-top:30px;">All Product</a>
            </div>
        </div>
    </div>

    {{-- section 3 --}}
    <div class="max-w-screen-xl mx-auto py-32 bg-gray-800">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="lg:w-1/2 text-right">
                <h1 class="text-4xl text-white font-bold mb-4">---------------------------------------</h1>
                <h1 class="text-4xl text-white font-bold mb-4" style="font-size: 98px">Established in 1966</h1>
                <a class="see-product text-lg mb-8" href="/about">Read More</a>
            </div>
            <div class="lg:w-1/2 text-left">
                <p class="text-lg text-white mb-8" style="font-size:24px">PT Indonesia Utensil is an Indonesian stainless kitchenware
                    manufacturer, located in Bandung, Jawa Barat. We have been
                    established since 1966.
                    <br>
                    <br>
                    We started as a manufacturer of stainless steel cutlery. As time
                    progresses, we expanded our production to other related
                    household items, such as kitchen knives, kitchen gadgets & tools.
                    Today, we continue to make a variety of household items, from
                    kitchen tools to lifestyle products such as coffee manual brewing
                    products. Our brands include Tanica, Edelmann, Vinox.
                </p>
            </div>
        </div>
    </div>

    {{-- section 4 --}}

    <div class="max-w-screen-xl mx-auto py-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="relative">
                <img src="{{ asset('assets/asset/background.jpg') }}" alt="Flatware" class="w-full h-auto rounded-lg">
                <h2 class="absolute bottom-4 left-4 text-white text-2xl font-bold">Flatware</h2>
            </div>
            <div class="relative">
                <img src="{{ asset('assets/asset/background.jpg') }}" alt="Tabletop" class="w-full h-auto rounded-lg">
                <h2 class="absolute bottom-4 left-4 text-white text-2xl font-bold">Tabletop</h2>
            </div>
            <div class="relative">
                <img src="{{ asset('assets/asset/background.jpg') }}" alt="Drinking" class="w-full h-auto rounded-lg">
                <h2 class="absolute bottom-4 left-4 text-white text-2xl font-bold">Drinking</h2>
            </div>
            <div class="relative">
                <img src="{{ asset('assets/asset/background.jpg') }}" alt="Kitchen Gadgets" class="w-full h-auto rounded-lg">
                <h2 class="absolute bottom-4 left-4 text-white text-2xl font-bold">Kitchen Gadgets & Tools</h2>
            </div>
            <div class="relative">
                <img src="{{ asset('assets/asset/background.jpg') }}" alt="Kitchen Knives" class="w-full h-auto rounded-lg">
                <h2 class="absolute bottom-4 left-4 text-white text-2xl font-bold">Kitchen Knives</h2>
            </div>
        </div>
    </div>

@endsection
