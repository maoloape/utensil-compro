@extends('layouts.layout')

@section('title')
    <title>About Us</title>
@endsection

@section('content')

    <div class="w-full min-h-[100vh] bg-cover bg-center" style="background-image: url('{{ $page->cover_page_about }}');">
        <div class="w-full min-h-[100vh] bg-gradient-to-b from-[#2a2a2a]/30 to-[#2a2a2a]/100">
            @include('layouts.topbar')
            <div class="container mx-auto flex flex-row justify-center items-center gap-8 min-h-[100vh]">
                <div class="w-1/2 text-right">
                    <div class="flex justify-end mb-4">
                        <div class="h-1 w-full bg-[#009ac7] rounded-[2rem]"></div>
                    </div>
                    <h1 class="text-[8rem] text-white font-bold mb-4">{!! str_replace('<strong>', '<strong style="color: #0298c6; font-weight: normal;">', $about->about_title) !!}</h1>
                    {{-- <a class="text-lg text-white borde px-4 py-3" href="/about" style="border: 2px solid; border-color: #009ac7; border-radius:2rem;">Read More</a> --}}
                </div>
            
                <div class="w-1/2 text-left">
                    <h1 class="text-2xl text-white mb-8">
                        {!! str_replace('<strong>', '<strong style="color: #0298c6; font-weight: normal;">', $about->about_content) !!}
                    </h1>
                    <div class="flex flex-row gap-4">
                        @foreach($brands as $brand)
                            <img src="{{ $brand->getLogoUrlAttribute() }}" alt="{{ $brand->name }}" style="height: 5rem; width: auto;">
                        @endforeach
                    </div>
                </div>
            </div>        
        </div>
    </div>

    <div class="w-full mt-0 pb-16 bg-[#2a2a2a]">
        <div class="text-center container text-white">
            <h1 class="text-[6rem]">
                {!! str_replace(
                    ['<strong>', '<em>'],
                    ['<strong style="color: #0298c6; font-weight: normal;">', '<em style="font-size: 3rem;">'],
                    $about->about_tag
                ) !!}
            </h1>
        </div>
    </div>

    

@endsection
