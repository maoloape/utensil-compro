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

    @media (min-width: 769px) and (max-width: 1024px) {
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

    @media (max-width: 768px) {
        #slider-container {
            overflow-x: hidden;
            /* margin: 6px;
            padding: 2px; */
        }
        #slider {
            width: 74%;
            padding: 0;
            margin: 0;

        }
        #slider > div {
            width: 74%;
            margin: 0;
            /* padding: 4px; */
            padding-left: 4px;
            padding-right: 12px; 
        }
    }
</style>
@endsection

@section('content')
    @php
        $activeBrand = $brands->sortBy('id')->first();
        $activeBrand->products()->get()
    @endphp

    {{-- Halaman Utama --}}
    <div class="w-full min-h-[100vh] bg-cover bg-center" id="background" style="background-image: url('{{ $activeBrand->getCoverBackgroundUrl }}');">
        <div class="w-full min-h-[100vh] bg-gradient-to-b from-[#2a2a2a]/30 to-[#2a2a2a]/100">
            @include('layouts.topbar')
            <div class="flex flex-col lg:flex-row gap-4 mx-auto items-center justify-center h-full pt-[5rem] lg:pt-[10rem] container">

                <div class="lg:w-1/3 text-left md:w-1/2 w-full mb-6 lg:mb-0">
                    <img id="brand-logo" src="{{ $activeBrand->getFirstMediaUrl('brand-logo') }}" alt="Logo" class="mb-9 w-auto h-16 lg:h-24 top show">
                    <p id="brand-description" class="2xl:text-[1rem] xl:text-[0.8rem] lg:text-lg text-white mb-8 show"></p>
                    <a id="see-product-link" class="text-[1rem] lg:text-lg text-white border-2 border-[#009ac7] rounded-[2rem] px-4 py-3" href="{{ route('product', ['brand' => $activeBrand->name]) }}">
                        See Product
                    </a>
                </div>
                <div class="lg:w-2/3 relative md:w-1/4">
                    <div id="slider-container" class="overflow-hidden">
                        <div id="slider" class="flex items-center">
                            @foreach($brands as $index => $brand)
                                <div 
                                    class="shrink-0 w-1/3 md:w-1/4 lg:w-1/3 px-6 clickable-slide overflow-y-hidden" 
                                    data-index="{{ $index }}"
                                    data-cover-background-url="{{ $brand->getFirstMediaUrl('brand-cover-background') }}" 
                                    data-id="{{ $brand->id }}" 
                                    data-logo-url="{{ $brand->getFirstMediaUrl('brand-logo') }}"
                                    data-logo-hitam="{{ $brand->getFirstMediaUrl('brand-logo-hitam') }}"
                                    data-description="{{ str_replace('&nbsp;', '', strip_tags($brand->description)) }}"
                                    data-brand="{{ $brand->name }}"
                                >
                                    <div class="relative h-[20rem] lg:h-[30rem] rounded-[16px] shadow-lg bg-cover bg-center cursor-pointer lg:p-0 p-2" 
                                        style="background-image: url('{{ $brand->getFirstMediaUrl('brand-cover') }}');">
                                        <div class="absolute inset-0 bg-gradient-to-b from-black/10 to-black/90 rounded-[16px] flex flex-col items-center justify-end p-6">
                                            <img src="{{ $brand->getFirstMediaUrl('brand-logo') }}" alt="Logo" class="w-auto h-16 pb-2 lg:h-20 lg:pb-8 mx-0">
                                            <p class="hidden description">{{ str_replace('&nbsp;', '', strip_tags($activeBrand->description)) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                
                    <div class="items-center justify-center mt-6 space-x-4 flex">
                        <button id="prevBtn" class="lg:w-20 lg:h-20 w-10 h-10 border border-white rounded-full flex items-center justify-center">
                            <span class="text-white text-[1rem] lg:text-[2rem] font-bold">&lt;</span>
                        </button>
                        <button id="nextBtn" class="lg:w-20 lg:h-20 w-10 h-10 border border-white rounded-full flex items-center justify-center">
                            <span class="text-white text-[1rem] lg:text-[2rem] font-bold">&gt;</span>
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

    {{-- Product Pilihan Berdasarkan Brand --}}
    <div class="w-full mt-0 py-16 bg-[#2a2a2a]">
        <div class="text-center container">
            <div class="flex justify-center items-center mb-4">
                <div class="h-1 w-[6rem] rounded-lg bg-[#009ac7] mr-4 mb-2"></div>
                <h1 class="2xl:text-[4rem] xl:text-[3rem] text-white">PRODUK PILIHAN</h1>
                <div class="h-1 w-[6rem] rounded-lg bg-[#009ac7] ml-4 mb-2"></div>
            </div>
            <div class="absolute h-full bg-[#009ac7]"></div>
            <div class="flex justify-center items-center">
                <button id="prevProduct" class="w-10 h-10 border border-white rounded-full flex items-center justify-center mr-4">
                    <span class="text-white text-[1rem] font-bold">&lt;</span>
                </button>
                <div id="product-slider" class="grid grid-cols-1 lg:grid-cols-4 gap-4 pb-12" style="overflow: hidden;">
                   {{-- show product --}}
                </div>
                
                <button id="nextProduct" class="w-10 h-10 border border-white rounded-full flex items-center justify-center ml-4">
                    <span class="text-white text-[1rem] font-bold">&gt;</span>
                </button>
            </div>
            <div class="py-12">
                <a class="text-[1rem] lg:text-lg text-white border-2 border-[#009ac7] rounded-[2rem] px-4 py-3" href="/product">All Product</a>
            </div>
        </div>
    </div>
    {{-- About Home --}}
    <div class="bg-[#2a2a2a]">
        <div class="container mx-auto flex flex-col md:flex-row justify-center items-center gap-8 pb-12">
            <div class="w-full md:w-1/2 text-right md:text-center mb-0 lg:mb-8">
                <div class="hidden lg:flex justify-center md:justify-end mb-0 lg:mb-4">
                    <div class="h-1 w-full md:w-1/2 bg-[#009ac7] rounded-[2rem]"></div>
                </div>
                <h1 class="hidden lg:block xl:text-[7rem] 2xl:text-[9.4rem] lg:text-[7rem] text-white mb-4">{!! str_replace('<strong>', '<strong style="color: #0298c6;">', $about->about_title) !!}</h1>
                <h1 class="lg:hidden text-[48px] md:text-[64px] text-left lg:text-[98px] text-white mb-4">{!! str_replace('<strong>', '<strong style="color: #0298c6;">', $about->about_title) !!}</h1>
                    <a class="text-[1rem] lg:text-lg text-white border-2 border-[#009ac7] rounded-[2rem] px-4 py-3 hidden lg:inline-block" href="/about">Read More</a>
                <div class="flex lg:hidden justify-center md:justify-end">
                    <div class="h-1 w-full bg-[#009ac7] rounded-[2rem]"></div>
                </div>
            </div>
            
            <div class="w-full md:w-1/2 lg:text-left md:text-center">
                <h1 class="text-lg md:text-xl lg:text-[1.4rem] 2xl:text-[2rem] text-white mb-8 xl:pr-12 lg:pr-0" style="line-height: 1.25">
                    {!! str_replace('<strong>', '<strong style="color: #0298c6;">', $about->about_content) !!}
                </h1>
                <a class="text-[1rem] lg:text-lg text-white border-2 border-[#009ac7] rounded-[2rem] px-4 py-3 inline-block lg:hidden" href="/about">Read More</a>
            </div>
        </div>        
    </div>

    {{-- Category List Home --}}
    {{-- Desktop --}}
    <div class="w-full hidden lg:inline">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 h-screen" style="display: grid">
            @foreach($categories as $category)
                <a href="/product?category%5B%5D={{ str_replace(' ', '+', str_replace('&', '%26', $category->name)) }}" 
                   class="col-span-{{ $category->col_span ?? 1 }} row-span-{{ $category->row_span ?? 1 }} text-decoration-none relative block overflow-hidden"
                   style="background-image: url('{{ $category->image_url }}'); background-size: cover; background-position: center; grid-column: span {{ $category->col_span ?? 1 }}">
    
                    @if($category->div_class == 1)
                        <div class="w-full h-full bg-gradient-to-b from-[#2a2a2a]/0 to-[#2a2a2a]/100 flex justify-start items-end p-4 transition-transform duration-100 scale-100 hover:scale-110">
                    @elseif($category->div_class == 2)
                        <div class="absolute right-0 top-0 flex justify-start items-end h-full p-4" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                    @elseif($category->div_class == 3)
                        <div class="absolute left-0 bottom-0 flex justify-start items-end p-4" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                    @endif
    
                        <div class="pl-4 flex flex-col">
                            @if($category->div_garis == 1)
                                <div class="h-[8rem] w-1 rounded-lg bg-[#009ac7]"></div> 
                            @elseif($category->div_garis == 2)
                                <div class="h-1 w-[8rem] rounded-lg bg-[#009ac7] mb-2"></div> 
                            @endif
                            
                            <p class="text-{{ $category->text_color }} 2xl:text-[4.5rem] xl:text-[3rem] lg:text-[3rem] font-serif font-bold leading-none">{{ $category->name }}</p>
                        </div>
    
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    
    {{-- Mobile --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:hidden">
        @foreach($categories as $category)
        <a href="/product?category%5B%5D={{ str_replace(' ', '+', str_replace('&', '%26', $category->name)) }}" class="col-span-1 text-decoration-none overflow-hidden w-full h-full"
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

    {{-- Promotional Home --}}
    {{-- Desktop --}}
    <div class="hidden lg:inline-block w-full max-h-screen bg-cover" style="background-image: url('assets/cover/cover-promot-home.png') ">
        <div class="container">
            <div class="text-right py-12 pr-12">
                <div class="flex justify-end mb-4">
                    <div class="h-1 w-[40%] bg-[#009ac7] rounded-[2rem]"></div>
                </div>
                <h1 class="text-[48px] md:text-[64px] xl:text-[6rem] 2xl:text-[9.4rem] text-black font-bold mb-4">Promotional <br> Product</h1>
                <div class="flex justify-end mb-4">
                    <p class="text-[1.2rem] xl:text-[1.4rem] 2xl:text-[1.775rem]"> Countless institutions have used our products in their various <br>
                        advertisement campaigns to promote the quality and versatility of <br>
                        their own products or services. Our products ensure your <br>
                        promotion will be successful, impactful and sustainable through a <br>
                        range of high market appeal quality products.</p>
                </div>
                
                <a class="text-[1rem] lg:text-lg text-black border-2 border-[#009ac7] rounded-[2rem] px-4 py-3" href="/promot">Read More</a>
            </div>
        </div>
    </div>
    {{-- Mobile --}}
    <div class="w-full max-h-screen bg-cover" style="background-image: url('assets/cover/cover-promot-home.png') ">
        <div class="lg:hidden w-full max-h-screen bg-[#2a2a2a] bg-opacity-80">
            <div class="container">
                <div class="text-left py-16 md:py-20 lg:py-24">
                    <div class="flex justify-start mb-4">
                        <div class="h-1 w-[40%] bg-[#009ac7] rounded-[2rem]"></div>
                    </div>
                    <h1 class="text-[48px] md:text-[64px] lg:text-[98px] text-white font-bold mb-4">Promotional <br> Product</h1>
                    <div class="flex justify-end mb-4">
                        <p class="text-[1.2rem] md:text-[1.5rem] lg:text-[1.775rem] text-white"> Countless institutions have used our products in their various <br>
                            advertisement campaigns to promote the quality and versatility of <br>
                            their own products or services. Our products ensure your <br>
                            promotion will be successful, impactful and sustainable through a <br>
                            range of high market appeal quality products.</p>
                    </div>
                    
                    <a class="text-[1rem] lg:text-lg text-white border-2 border-[#009ac7] rounded-[2rem] px-4 py-3" href="/promot">Read More</a>
                </div>
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
    const brandDescriptionElement = document.getElementById("brand-description");

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

    function updateSeeProductLink(brandName) {
        const seeProductLink = document.getElementById("see-product-link");
        seeProductLink.href = `/product?brand=${encodeURIComponent(brandName)}`;
    }

    function updateSlider() {
        slider.style.transition = "transform 0.5s ease-in-out";
        slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`;

        const realIndex = (currentSlide - visibleSlides + totalSlides) % totalSlides;
        sliderNumber.textContent = (realIndex + 1).toString().padStart(2, '0');

        const activeSlide = slider.children[currentSlide];
        const brandCoverBackgroundUrl = activeSlide.getAttribute('data-cover-background-url');
        const getLogoUrl = activeSlide.getAttribute('data-logo-url');
        const brandDescription = activeSlide.getAttribute('data-description');
        const brandName = activeSlide.getAttribute('data-brand');

        background.style.backgroundImage = `url(${brandCoverBackgroundUrl})`;
        brandLogo.src = getLogoUrl;
        brandDescriptionElement.textContent = brandDescription;

        brandLogo.classList.remove('show');
        brandDescriptionElement.classList.remove('show');

        setTimeout(() => {
            brandLogo.classList.add('show');
            brandDescriptionElement.classList.add('show');
        }, 300);

        const progress = ((realIndex + 1) / totalSlides) * 100;
        const progressFill = document.getElementById("progressFill");
        progressFill.style.width = `${progress}%`;

        updateSeeProductLink(brandName);

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
        }, 10000);
    }

    const slides = document.querySelectorAll(".clickable-slide");

    updateSlider();
    autoSlide();

    let activeProducts = [];
    let activeProductIndex = 0;
    let visibleProducts = 4;
    let maxProducts = 8;

    function updateProducts() {
        const productContainer = document.getElementById("product-slider");
        productContainer.innerHTML = "";

        if (!activeProducts || activeProducts.length === 0) return;

        const activeSlide = window.activeSlide || document.querySelector(".active-slide");
        const brandLogoUrl = activeSlide ? activeSlide.getAttribute('data-logo-hitam') : "";

        activeProducts.slice(activeProductIndex, activeProductIndex + visibleProducts).forEach((product, index) => {
            const productElement = document.createElement("div");
            productElement.classList.add("flex-1", "px-0", "lg:px-6");

            if (window.innerWidth <= 768 && index > 0) {
                productElement.style.display = "none";
            }

            productElement.innerHTML = `
                <div class="relative h-[24rem] w-[13.25rem] 2xl:h-[30rem] 2xl:w-[20rem] xl:h-[24rem] xl:w-[16rem] rounded-[16px] shadow-lg bg-white flex flex-col justify-center items-center">
                    <img src="${brandLogoUrl}" alt="Logo Hitam" class="w-auto h-12 mt-8 lg:mt-0 mb-2">
                    <img src="${product.image_url}" alt="${product.name}" class="w-auto h-40 mb-4">
                    <h3 class="text-center font-bold text-xl">${product.name}</h3>
                    <p class="text-center text-gray-500 mb-8 lg:mb-0">${product.type}</p>
                </div>
            `;

            productContainer.appendChild(productElement);
        });
    }

    function prevProduct() {
        if (activeProductIndex > 0) {
            activeProductIndex--;
        } else {
            activeProductIndex = activeProducts.length - visibleProducts; 
        }
        updateProducts();
    }

    function nextProduct() {
        if (activeProductIndex < activeProducts.length - visibleProducts) {
            activeProductIndex++;
        } else {
            activeProductIndex = 0; 
        }
        updateProducts();
    }


    document.getElementById("prevProduct").addEventListener("click", prevProduct);
    document.getElementById("nextProduct").addEventListener("click", nextProduct);

    function fetchProductsByBrand(brandId) {
        fetch(`/products-by-brand/${brandId}`)
            .then(response => response.json())
            .then(data => {
                activeProducts = data.slice(0, maxProducts);
                activeProductIndex = 0;
                updateProducts();
            })
            .catch(error => {
                console.error("Error loading products:", error);
                const productContainer = document.getElementById("product-slider");
                productContainer.innerHTML = "<p>Failed to load products.</p>";
            });
    }

    function updateProductsByBrand(brandId) {
        fetchProductsByBrand(brandId);
    }

    slides.forEach(slide => {
        slide.addEventListener("click", () => {
            const targetIndex = parseInt(slide.getAttribute("data-index"), 10);
            const realTarget = targetIndex + visibleSlides;
            currentSlide = realTarget;

            updateSlider();
            updateProductsByBrand(slide.getAttribute("data-id"));
        });
    });

    prevBtn.addEventListener("click", () => {
        currentSlide--;
        updateSlider();
        checkForReset();
        updateProductsByBrand(slider.children[currentSlide].getAttribute("data-id"));
    });

    nextBtn.addEventListener("click", () => {
        currentSlide++;
        updateSlider();
        checkForReset();
        updateProductsByBrand(slider.children[currentSlide].getAttribute("data-id"));
    });

</script>

@endsection