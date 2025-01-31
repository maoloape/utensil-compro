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
</style>
@endsection

@section('content')
    @php
        $activeBrand = $brands->sortBy('id')->first();
        $activeBrand->products()->get()
    @endphp

    <div class="w-full min-h-[100vh] bg-cover bg-center" id="background" style="background-image: url('{{ $activeBrand->getCoverBackgroundUrl }}');">
        <div class="w-full min-h-[100vh] bg-gradient-to-b from-[#2a2a2a]/30 to-[#2a2a2a]/100">
            @include('layouts.topbar')
            <div class="flex flex-col lg:flex-row gap-4 mx-auto items-center justify-center h-full pt-[10rem] container">
                <div class="lg:w-1/3 text-left">
                    <img id="brand-logo" src="{{ $activeBrand->getFirstMediaUrl('brand-logo') }}" alt="Logo" class="mb-9 w-auto h-24 top show">
                    <p id="brand-description" class="text-lg text-white mb-8 show">{{ $activeBrand->description }}</p>
                    <a class="text-lg text-white borde px-4 py-3" href="/product" style="border: 2px solid; border-color: #009ac7; border-radius:2rem;">See Product</a>
                </div>
                <div class="lg:w-2/3 relative">
                    <div id="slider-container" class="overflow-hidden">
                        <div id="slider" class="flex items-center">
                            @foreach($brands as $index => $brand)
                                <div 
                                    class="shrink-0 w-1/3 px-6 clickable-slide" 
                                    data-index="{{ $index }}"
                                    data-cover-background-url="{{ $brand->getFirstMediaUrl('brand-cover-background') }}" 
                                    data-id="{{ $brand->id }}" 
                                    data-logo-url="{{ $brand->getFirstMediaUrl('brand-logo') }}"
                                >
                                    <div class="relative h-[30rem] rounded-[16px] shadow-lg bg-cover bg-center cursor-pointer" 
                                        style="background-image: url('{{ $brand->getFirstMediaUrl('brand-cover') }}');">
                                        <div class="absolute inset-0 bg-gradient-to-b from-black/10 to-black/90 rounded-[16px] flex flex-col items-center justify-end p-6">
                                            <img src="{{ $brand->getFirstMediaUrl('brand-logo') }}" alt="Logo" class="w-auto h-12">
                                            <p class="hidden description">{{ $brand->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex items-center justify-center mt-6 space-x-4">
                        <button id="prevBtn" class="w-20 h-20 border border-white rounded-full flex items-center justify-center">
                            <span class="text-white text-[2rem] font-bold">&lt;</span>
                        </button>
                        <button id="nextBtn" class="w-20 h-20 border border-white rounded-full flex items-center justify-center">
                            <span class="text-white text-[2rem] font-bold">&gt;</span>
                        </button>
                        <div id="progressBar" class="flex-1 h-1 bg-white relative">
                            <div id="progressFill" class="absolute h-full bg-[#009ac7] transition-all duration-500"></div>
                        </div>
                        <span id="sliderNumber" class="text-white font-bold text-[4rem]">01</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mt-0 py-16 bg-[#2a2a2a]">
        <div class="text-center container">
            <div class="flex justify-center items-center mb-4">
                <div class="h-1 w-[6rem] rounded-lg bg-[#009ac7] mr-4 mb-2"></div>
                <h1 class="text-4xl font-bold text-white">PRODUK PILIHAN</h1>
                <div class="h-1 w-[6rem] rounded-lg bg-[#009ac7] ml-4 mb-2"></div>
            </div>
            <div class="absolute h-full bg-[#009ac7]"></div>
            <div class="flex justify-center items-center">
                <button id="prevProduct" class="w-10 h-10 border border-white rounded-full flex items-center justify-center mr-4">
                    <span class="text-white text-[1rem] font-bold">&lt;</span>
                </button>
                <div id="product-slider" class="grid grid-cols-4 gap-4 pb-12" style="overflow: hidden;">
                    <!-- Produk akan diperbarui secara dinamis -->z
                </div>
                
                <button id="nextProduct" class="w-10 h-10 border border-white rounded-full flex items-center justify-center ml-4">
                    <span class="text-white text-[1rem] font-bold">&gt;</span>
                </button>
            </div>
            <div class="py-12">
                <a class="text-lg text-white borde px-4 py-3" href="/product" style="border: 2px solid; border-color: #009ac7; border-radius:2rem;">All Product</a>
            </div>
        </div>
    </div>

    <div class="bg-[#2a2a2a]">
        <div class="container mx-auto flex flex-row justify-center items-center gap-8 py-12">
            <div class="w-1/2 text-right">
                <div class="flex justify-end mb-4">
                    <div class="h-1 w-full bg-[#009ac7] rounded-[2rem]"></div>
                </div>
                <h1 class="text-[98px] text-white font-bold mb-4">{!! str_replace('<strong>', '<strong style="color: #0298c6;">', $about->about_title) !!}</h1>
                <a class="text-lg text-white borde px-4 py-3" href="/about" style="border: 2px solid; border-color: #009ac7; border-radius:2rem;">Read More</a>
            </div>
        
            <div class="w-1/2 text-left">
                <h1 class="text-2xl text-white mb-8">
                    {!! str_replace('<strong>', '<strong style="color: #0298c6;">', $about->about_content) !!}
                </h1>
            </div>
        </div>        
    </div>
    
    <div class="w-full">
        <div class="grid grid-cols-4 grid-rows-2 h-screen">
            <div class="col-span-2 row-span-1 bg-gray-200 flex items-center justify-center text-white text-2xl font-bold" style="background-image: url('flatware.jpg'); background-size: cover;">
                Flatware
            </div>
            
            <div class="col-span-1 row-span-1 bg-gray-400 flex items-center justify-center text-white text-2xl font-bold rotate-180 [writing-mode:vertical-rl]" style="background-image: url('drinking.jpg'); background-size: cover;">
                Drinking
            </div>
            
            <div class="col-span-1 row-span-2 bg-gray-600 flex items-center justify-center text-white text-2xl font-bold" style="background-image: url('knives.jpg'); background-size: cover;">
                Kitchen Knives
            </div>
            
            <div class="col-span-1 row-span-1 bg-gray-300 flex items-center justify-center text-white text-2xl font-bold rotate-180 [writing-mode:vertical-rl]" style="background-image: url('tabletop.jpg'); background-size: cover;">
                Tabletop
            </div>
            
            <div class="col-span-2 row-span-1 bg-gray-500 flex items-center justify-center text-white text-2xl font-bold" style="background-image: url('gadgets.jpg'); background-size: cover;">
                Kitchen Gadgets & Tools
            </div>
        </div>
    </div>
    
    <div class="w-full max-h-screen bg-cover" style="background-image: url('assets/cover/cover-promot-home.png') ">
        <div class="container">
            <div class="text-right py-16">
                <div class="flex justify-end mb-4">
                    <div class="h-1 w-[40%] bg-[#009ac7] rounded-[2rem]"></div>
                </div>
                <h1 class="text-[98px] text-black font-bold mb-4">Promotional <br> Product</h1>
                <div class="flex justify-end mb-4">
                    <p class="text-[1.775rem]"> Countless institutions have used our products in their various <br>
                        advertisement campaigns to promote the quality and versatility of <br>
                        their own products or services. Our products ensure your <br>
                        promotion will be successful, impactful and sustainable through a <br>
                        range of high market appeal quality products.</p>
                </div>
                
                <a class="text-lg text-black borde px-4 py-3" href="/about" style="border: 2px solid; border-color: #009ac7; border-radius:2rem;">Read More</a>
            </div>
        </div>        
    </div>

@endsection

@section('script')
<script>
    // Slider utama
    const slider = document.getElementById("slider");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const sliderNumber = document.getElementById("sliderNumber");
    const background = document.getElementById("background");
    const brandLogo = document.getElementById("brand-logo");
    const brandDescription = document.getElementById("brand-description");

    let currentSlide = 0;
    const visibleSlides = 3; 
    const totalSlides = slider.children.length;
    let autoSlideTimer;

    const firstSlides = [];
    const lastSlides = [];
    for (let i = 0; i < visibleSlides; i++) {
        firstSlides.push(slider.children[i].cloneNode(true));
        lastSlides.push(slider.children[totalSlides - 1 - i].cloneNode(true));
    }

    firstSlides.forEach(slide => slider.appendChild(slide));
    lastSlides.reverse().forEach(slide => slider.insertBefore(slide, slider.firstChild));

    const slideWidth = slider.children[0].offsetWidth + 24;
    slider.style.transform = `translateX(-${visibleSlides * slideWidth}px)`; 
    currentSlide = visibleSlides;

    function updateSlider() {
        slider.style.transition = "transform 0.5s ease-in-out";
        slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`;

        const realIndex = (currentSlide - visibleSlides + totalSlides) % totalSlides;
        sliderNumber.textContent = (realIndex + 1).toString().padStart(2, '0');

        const activeSlide = slider.children[currentSlide];
        const brandCoverBackgroundUrl = activeSlide.getAttribute('data-cover-background-url');
        const getLogoUrl = activeSlide.getAttribute('data-logo-url');
        const brandDesc = activeSlide.querySelector('.description').textContent;

        background.style.backgroundImage = `url(${brandCoverBackgroundUrl})`;
        brandLogo.src = getLogoUrl;
        brandDescription.textContent = brandDesc;

        brandLogo.classList.remove('show');
        brandDescription.classList.remove('show');

        setTimeout(() => {
            brandLogo.classList.add('show');
            brandDescription.classList.add('show');
        }, 300);

        const progress = ((realIndex + 1) / totalSlides) * 100;
        const progressFill = document.getElementById("progressFill");
        progressFill.style.width = `${progress}%`;

        // Muat produk berdasarkan slide aktif
        const brandId = activeSlide.getAttribute('data-id');
        window.activeSlide = activeSlide;
        fetchProductsByBrand(brandId);
    }

    function checkForReset() {
        if (currentSlide >= totalSlides + visibleSlides) {
            currentSlide = visibleSlides;
            slider.style.transition = "none";
            slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
            setTimeout(() => {
                slider.style.transition = "transform 0.5s ease-in-out";
            }, 0);
        } else if (currentSlide < visibleSlides) {
            currentSlide = totalSlides + visibleSlides - 1;
            slider.style.transition = "none";
            slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
            setTimeout(() => {
                slider.style.transition = "transform 0.5s ease-in-out";
            }, 0);
        }
    }

    function autoSlide() {
        clearInterval(autoSlideTimer);
        autoSlideTimer = setInterval(() => {
            currentSlide = (currentSlide + 1) % (totalSlides + visibleSlides);
            if (currentSlide < visibleSlides) {
                currentSlide = visibleSlides;
            } else if (currentSlide >= totalSlides + visibleSlides) {
                currentSlide = visibleSlides;
            }
            updateSlider();
        }, 5000);
    }

    const slides = document.querySelectorAll(".clickable-slide");

    slides.forEach(slide => {
        slide.addEventListener("click", () => {
            const targetIndex = parseInt(slide.getAttribute("data-index"), 10);
            const realTarget = targetIndex + visibleSlides;
            currentSlide = realTarget;

            updateSlider();
            autoSlide();
        });
    });

    prevBtn.addEventListener("click", () => {
        currentSlide--;
        updateSlider();
        checkForReset();
        autoSlide();
    });

    nextBtn.addEventListener("click", () => {
        currentSlide++;
        updateSlider();
        checkForReset();
        autoSlide();
    });

    updateSlider();
    autoSlide();

    function fetchProductsByBrand(brandId) {
        const productContainer = document.getElementById("product-slider"); 
        productContainer.innerHTML = "<p>Loading products...</p>";

        fetch(`/products-by-brand/${brandId}`)
            .then(response => response.json())
            .then(data => {
                productContainer.innerHTML = "";
                data.forEach(product => {
                    const productElement = document.createElement("div");
                    productElement.classList.add("flex-1", "px-6"); 
                    productElement.style.width = "25%";
                    productElement.innerHTML = `
                        <div class="relative h-[30rem] w-[20rem] rounded-[16px] shadow-lg bg-white flex flex-col justify-center items-center">
                            <img src="${product.image_url}" alt="${product.name}" class="w-auto h-40 mb-4">
                            <h3 class="text-center font-bold text-xl">${product.name}</h3>
                            <p class="text-center text-gray-500">${product.type}</p>
                        </div>
                    `;
                    productContainer.appendChild(productElement);
                });
            })
            .catch(error => {
                console.error("Error loading products:", error);
                productContainer.innerHTML = "<p>Failed to load products.</p>";
            });
    }

</script>

@endsection
