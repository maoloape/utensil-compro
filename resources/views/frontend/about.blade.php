@extends('layouts.layout')

@section('title')
    <title>About Us</title>
@endsection

@section('style')
<style>
    /* CSS untuk Swiper pada tampilan mobile */
    @media (max-width: 768px) {
        .swiper-container {
            width: 100%;
            overflow: hidden;
        }
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }
</style>
@endsection

@section('content')

    <div class="w-full min-h-[100vh] bg-cover bg-center" style="background-image: url('{{ $page->cover_page_about }}');">
        <div class="w-full min-h-[100vh] bg-gradient-to-b from-[#2a2a2a]/30 to-[#2a2a2a]/100">
            @include('layouts.topbar')
            <div class="container mx-auto flex flex-col lg:flex-row justify-center items-center gap-0 lg:gap-8 min-h-[100vh]">
                <div class="lg:w-1/2 w-full lg:text-right pt-[6rem] lg:pt-0">
                    <div class="flex justify-end mb-4">
                        <div class="h-1 w-full bg-[#009ac7] rounded-[2rem]"></div>
                    </div>
                    <h1 class="lg:text-[10rem] text-[3rem] text-white mb-4">{!! str_replace('<strong>', '<strong style="color: #0298c6; font-weight: 100;">', $about->about_title) !!}</h1>
                    {{-- <a class="text-lg text-white borde px-4 py-3" href="/about" style="border: 2px solid; border-color: #009ac7; border-radius:2rem;">Read More</a> --}}
                </div>
            
                <div class="lg:w-1/2 w-full text-left">
                    <h1 class="text-lg md:text-xl lg:text-[2rem] text-white mb-8" style="line-height: 1.25">
                        {!! str_replace('<strong>', '<strong style="color: #0298c6;">', $about->about_content) !!}
                    </h1>
                    <div class="flex-row gap-4 hidden lg:flex">
                        @foreach($brands as $brand)
                            <img class="h-[5rem]" src="{{ $brand->getLogoUrlAttribute() }}" alt="{{ $brand->name }}">
                        @endforeach
                    </div>
                    
                    <div class="swiper-container inline-block lg:hidden">
                        <div class="swiper-wrapper">
                            @foreach($brands as $brand)
                                <div class="swiper-slide">
                                    <img src="{{ $brand->getLogoUrlAttribute() }}" alt="{{ $brand->name }}" class="lg:h-[5rem] h-[3rem] w-auto">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>

    <div class="w-full mt-0 lg:pt-0 pt-12 pb-16 bg-[#2a2a2a]">
        <div class="text-center container text-white">
            <h1 class="lg:text-[6rem]">
                {!! str_replace(
                    ['<strong>', '<em>'],
                    ['<strong style="color: #0298c6; font-weight: normal;">', '<em class="lg:text-[3rem] text-[1.25rem]">'],
                    $about->about_tag
                ) !!}
            </h1>
        </div>
    </div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.swiper-container', {
            loop: true, 
            autoplay: {
                delay: 0, 
                disableOnInteraction: false, 
            },
            speed: 700, 
            slidesPerView: 'auto', 
            spaceBetween: 10, 
            breakpoints: {
                320: {
                    slidesPerView: 4,
                },
                480: {
                    slidesPerView: 4,
                },
                768: {
                    slidesPerView: 4,
                },
            },
        });
    });
</script>
@endsection
