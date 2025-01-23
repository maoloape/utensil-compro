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
    {{-- section 3 --}}
    <div class="w-full py-16 bg-[#2a2a2a]">
        <div class="container mx-auto flex flex-col lg:flex-row gap-8">
            <div class="lg:w-1/2 text-right">
                <div class="flex justify-end mb-4">
                    <div class="h-1 w-full rounded-lg bg-[#009ac7]"></div>
                </div>
                <h1 class="text-[98px] text-white font-bold mb-4">Established <br> in <span class="text-[#009ac7]">1966</span></h1>
                <a class="text-lg text-white borde px-4 py-3" href="/about" style="border: 2px solid; border-color: #009ac7; border-radius:2rem;">Read More</a>
            </div>
            <div class="lg:w-1/2 text-left">
                <p class="text-2xl text-white mb-8">PT Indonesia Utensil is an Indonesian stainless kitchenware
                    manufacturer, located in Bandung, Jawa Barat. We have been
                    established since 1966.
                    <br>
                    <br>
                    We started as a manufacturer of stainless steel cutlery. As time
                    progresses, we expanded our production to other related
                    household items, such as kitchen knives, kitchen gadgets & tools.
                    Today, we continue to make a variety of household items, from
                    kitchen tools to lifestyle products such as coffee manual brewing
                    products. Our brands include Tanica, Edelmann, Vinox
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
