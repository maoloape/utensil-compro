@extends('layouts.layout')

@section('title')
    <title>Home</title>
@endsection

@section('content')
<div class="w-full min-h-[100vh] bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
    <div class="w-full min-h-[100vh] bg-gradient-to-b from-[#2a2a2a]/0 to-[#2a2a2a]/100">
        @include('layouts.topbar')
        <div class="flex flex-col lg:flex-row gap-4 mx-auto items-center justify-center h-full pt-[12rem] container">
            <div class="lg:w-1/3 text-left">
                <img src="{{ asset('assets/asset/logo.png') }}" alt="Logo" class="mb-9 w-auto h-24">
                <h1 class="text-4xl text-white font-bold mb-4">Welcome to PT Indonesia Utensil</h1>
                <p class="text-lg text-white mb-8">Your trusted kitchenware manufacturer since 1966.</p>
                <a class="see-product text-lg mb-8" href="/product">See Product</a>
            </div>

            <div class="lg:w-2/3 relative">
                <div id="slider-container" class="overflow-hidden">
                    <div id="slider" class="flex items-center">
                        <div class="shrink-0 w-1/4 px-4">
                            <div class="relative h-96 rounded-lg shadow-lg bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
                                <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/90 rounded-lg flex flex-col items-center justify-end p-4">
                                    <h3 class="text-white font-bold text-lg">EDELMANN</h3>
                                </div>
                            </div>
                        </div>
                        <div class="shrink-0 w-1/4 px-4">
                            <div class="relative h-96 rounded-lg shadow-lg bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
                                <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/90 rounded-lg flex flex-col items-center justify-end p-4">
                                    <h3 class="text-white font-bold text-lg">VINOX</h3>
                                </div>
                            </div>
                        </div>
                        <div class="shrink-0 w-1/4 px-4">
                            <div class="relative h-96 rounded-lg shadow-lg bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
                                <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/90 rounded-lg flex flex-col items-center justify-end p-4">
                                    <h3 class="text-white font-bold text-lg">SUNNY</h3>
                                </div>
                            </div>
                        </div>
                        <div class="shrink-0 w-1/4 px-4">
                            <div class="relative h-96 rounded-lg shadow-lg bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
                                <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/90 rounded-lg flex flex-col items-center justify-end p-4">
                                    <h3 class="text-white font-bold text-lg">NEXT</h3>
                                </div>
                            </div>
                        </div>
                        <div class="shrink-0 w-1/4 px-4">
                            <div class="relative h-96 rounded-lg shadow-lg bg-cover bg-center" style="background-image: url('{{ asset('assets/asset/background.jpg') }}');">
                                <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/90 rounded-lg flex flex-col items-center justify-end p-4">
                                    <h3 class="text-white font-bold text-lg">EXTRA</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center justify-center mt-6 space-x-4">
                    <button id="prevBtn" class="w-10 h-10 border border-white rounded-full flex items-center justify-center">
                        <span class="text-white text-lg font-bold">&lt;</span>
                    </button>
                    <button id="nextBtn" class="w-10 h-10 border border-white rounded-full flex items-center justify-center">
                        <span class="text-white text-lg font-bold">&gt;</span>
                    </button>
                    <div class="flex-1 h-1 bg-white"></div>
                    <span id="sliderNumber" class="text-white font-bold text-xl">01</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const slider = document.getElementById("slider");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const sliderNumber = document.getElementById("sliderNumber");

    let currentSlide = 0;
    const visibleSlides = 4;
    const totalSlides = slider.children.length;

    // Clone the first and last slides for smooth looping
    for (let i = 0; i < visibleSlides; i++) {
        slider.appendChild(slider.children[i].cloneNode(true)); // Clone awal ke akhir
        slider.insertBefore(slider.children[totalSlides - 1].cloneNode(true), slider.children[0]); // Clone akhir ke awal
    }

    // Update slider after cloning
    const slideWidth = slider.children[0].offsetWidth + 16; // Width + gap
    slider.style.transform = `translateX(-${visibleSlides * slideWidth}px)`; // Adjust initial position

    // Update slider position and slider number
    function updateSlider() {
        slider.style.transition = "transform 0.5s ease-in-out";
        slider.style.transform = `translateX(-${(currentSlide + visibleSlides) * slideWidth}px)`;

        // Update the slider number based on the current slide
        const currentSlideNumber = (currentSlide % totalSlides) + 1;
        sliderNumber.textContent = currentSlideNumber.toString().padStart(2, '0');
    }

    // Check if we should reset the slider
    function checkForReset() {
        if (currentSlide >= totalSlides) {
            currentSlide = 0; // Reset the slider to the first slide
            slider.style.transition = "none"; // Disable transition during reset
            slider.style.transform = `translateX(-${visibleSlides * slideWidth}px)`; // Reset position to the first visible slide
        } else if (currentSlide < 0) {
            currentSlide = totalSlides - 1; // Set to last slide when going backward
            slider.style.transition = "none"; // Disable transition during reset
            slider.style.transform = `translateX(-${(currentSlide + visibleSlides) * slideWidth}px)`; // Reset to last visible slide
        }
    }

    // Button click events
    prevBtn.addEventListener("click", () => {
        currentSlide--;
        updateSlider();
        checkForReset(); // Check if we need to reset
    });

    nextBtn.addEventListener("click", () => {
        currentSlide++;
        updateSlider();
        checkForReset(); // Check if we need to reset
    });

    updateSlider();
</script>
@endsection