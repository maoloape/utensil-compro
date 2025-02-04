@extends('layouts.layout')

@section('title')
    <title>Home</title>
@endsection

@section('style')
<style>
    #progressFill {
        width: 0%;
        transition: width 0.5s ease;
    }

    #background {
        transition: background-image 1s ease-in-out;
    }

    #brand-logo {
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    #brand-logo.show {
        opacity: 1;
        transform: translateY(0);
    }

    #brand-description {
        opacity: 0;
        transform: translateY(-20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    #brand-description.show {
        opacity: 1;
        transform: translateY(0);
    }

    #product-slider {
        overflow: hidden;
    }

    #product-slider > div {
        width: 25%;
        display: inline-block;
    }

    @media (max-width: 768px) {
        #slider-container {
            overflow-x: hidden;
            /* margin: 6px;
            padding: 2px; */
        }
        #slider {
            width: 100%;
            padding: 0;
            margin: 0;

        }
        #slider > div {
            width: 100%;
            margin: 0;
            /* padding: 4px; */
            padding-left: 4px;
            padding-right: 12px; 
        }
    }
</style>
@endsection

@section('content')
    {{-- Mobile --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:hidden">
        @foreach($categories as $category)
            <a href="/product" class="col-span-1 text-decoration-none overflow-hidden w-full h-full"
                style="background-image: url('{{ $category->getImageUrlAttribute() }}'); background-size: cover;">
                <div class="w-full h-[15rem] bg-gradient-to-b from-[#2a2a2a]/0 to-[#2a2a2a]/100 flex justify-start items-end py-4 px-4 transition-transform duration-100 scale-100 hover:scale-110">
                    <div class="flex flex-col">
                        <div class="h-1 w-[8rem] rounded-lg bg-[#009ac7] mb-2"></div>
                        <p class="text-white text-[2rem]">{{ $category->name }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection

@section('script')

@endsection