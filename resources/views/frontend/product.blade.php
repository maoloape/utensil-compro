@extends('layouts.layout')

@section('title')
    <title>Produk Kami</title>
@endsection

@section('head')
<style>
    body {
        background-image: url('{{ asset('assets/asset/background.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        max-height: 450px;
    }
    main {
        flex: 1;
        position: relative;
    }

    .see-product {
        border: 4px solid transparent;
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

    .grid-container {
        display: grid;
        grid-template-areas:
            "flatware drinking"
            "tabletop gadgets"
            "knives knives";
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto;
        max-width: auto;
        margin: 0 auto;
    }

    .grid-item {
        position: relative;
        background-size: cover;
        background-position: center;
        color: white;
        font-size: 1.5em;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        height: 400px;
        width: 100%;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        overflow: hidden;
    }

    .flatware {
        grid-area: flatware;
    }

    .drinking {
        grid-area: drinking;
        writing-mode: vertical-rl;
        text-orientation: upright;
        justify-content: flex-start;
        padding: 20px;
    }

    .tabletop {
        grid-area: tabletop;
        writing-mode: vertical-rl;
        text-orientation: upright;
        justify-content: flex-start;
        padding: 20px;
    }

    .gadgets {
        grid-area: gadgets;
    }

    .knives {
        grid-area: knives;
        justify-self: center;
        align-self: center;
        height: 200px;
        width: 100%;
    }
</style>
@endsection

@section('content')

    <!-- Section 1 -->

    <div class="mx-auto" 
        style="margin-top: 0; padding: 240px 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0));">
    </div>

    {{-- Section 2 --}}

    <div class="mx-auto" 
        style="margin-top: 0px; padding: 60px 0;
        background: rgba(42, 42, 42, 42);">
        <div class="mx-auto text-center" style="max-width: 1740px;">
            <h1 class="text-4xl font-bold mb-4 text-white" style="font-size: 54px">-- PRODUK PILIHAN --</h1>
            <div class="col-md-8 mx-auto">
                <div class="row row-cols-2 row-cols-md-4 g-4">
                    <div class="col">
                        <div class="text-center bg-white" 
                            style="position: relative;
                            height: 400px;
                            border-radius: 18px;
                            box-shadow: 0 4px 6px rgba(42, 42, 42, 0.2), 6px 12px 24px rgba(42, 42, 42, 1);
                            background-size: cover;
                            background-position: center;">
                            <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" style="margin-top: 300px; max-width: 100%; height: auto;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center bg-white" 
                            style="position: relative;
                            height: 400px;
                            border-radius: 18px;
                            box-shadow: 0 4px 6px rgba(42, 42, 42, 0.2), 6px 12px 24px rgba(42, 42, 42, 1);
                            background-size: cover;
                            background-position: center;">
                            <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" style="margin-top: 300px; max-width: 100%; height: auto;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center bg-white" 
                            style="position: relative;
                            height: 400px;
                            border-radius: 18px;
                            box-shadow: 0 4px 6px rgba(42, 42, 42, 0.2), 6px 12px 24px rgba(42, 42, 42, 1);
                            background-size: cover;
                            background-position: center;">
                            <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" style="margin-top: 300px; max-width: 100%; height: auto;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center bg-white" 
                            style="position: relative;
                            height: 400px;
                            border-radius: 18px;
                            box-shadow: 0 4px 6px rgba(42, 42, 42, 0.2), 6px 12px 24px rgba(42, 42, 42, 1);
                            background-size: cover;
                            background-position: center;">
                            <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" style="margin-top: 300px; max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mx-auto py-8">
                <a class="see-product text-4x1 mb-4" href="/product" style="margin-top:30px;">All Product</a>
            </div>
        </div>
    </div>

    {{-- section 3 --}}
    <div class="mx-auto" style="padding: 120px 0; background: rgb(42, 42, 42);">
        <div class="py-12 mx-auto" style="max-width: 1540px;">
            <div class="row g-4">
                <div class="col-md-6 px-8">
                    <div class="text-right">
                        <h1 class="text-4xl text-white font-bold mb-4">---------------------------------------</h1>
                        <h1 class="text-4xl text-white font-bold mb-4" style="font-size: 98px">Established in 1966</h1>
                        <a class="see-product text-lg mb-8" href="/about">Read More</a>
                    </div>
                </div>
                
                <div class="col-md-6 px-8">
                    <div class="text-left">
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
        </div>
    </div>

    {{-- section 4 --}}

    <div class="grid-container">
        <div class="grid-item flatware" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
            <h2>Flatware</h2>
        </div>
        <div class="grid-item drinking" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
            <h2>Drinking</h2>
        </div>
        <div class="grid-item tabletop" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
            <h2>Tabletop</h2>
        </div>
        <div class="grid-item gadgets" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
            <h2>Kitchen Gadgets & Tools</h2>
        </div>
        <div class="grid-item knives" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
            <h2>Kitchen Knives</h2>
        </div>
    </div>

    {{-- section 5 --}}
    <div class="mx-auto" 
        style="padding: 120px 0; 
                background-image: url('{{ asset('assets/asset/background.jpg') }}'); 
                background-size: cover;
                background-position: center;">
        <div class="py-12 mx-auto" style="max-width: 1540px;">
            <div class="row g-4">
                <div class="col-md-6 px-8">
                    
                </div>
                
                <div class="col-md-6 px-8">
                    <div class="text-right">
                        <h1 class="text-4xl font-bold mb-4">---------------------------------------</h1>
                        <h1 class="text-4xl font-bold mb-4" style="font-size: 98px">Established in 1966</h1>
                        <a class="see-product text-lg mb-8" style="color: black" href="/promotion">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
