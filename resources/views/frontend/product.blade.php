@extends('layouts.layout')

@section('title')
    <title>Our Product</title>
@endsection

@section('style')
<style>
    .brand-filter li, .category-filter li {
        display: block;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: box-shadow 0.3s ease-in-out;
    }

    .brand-filter li.active, .category-filter li.active {
        border: 1px solid #007bff;
        width: 70%;
        color: #000;
    }

    .brand-filter li:hover, .category-filter li:hover {
        background-color: #007bff;
        width: 70%;
        color: #fff;
    }
</style>
@endsection

@section('content')
    <div id="page-header" class="w-full bg-cover h-[30rem] bg-center" style="background-image: url('{{ $page->cover_page_product }}');">
        @include('layouts.topbar')
    </div>

    <div class="container mx-auto px-4 pt-16 flex flex-col lg:flex-row pb-[12rem]">
        <!-- Sidebar Filter -->
        <div class="w-full md:w-1/4 bg-white p-4 rounded-lg">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold">Filters</h2>
                <button id="clearFilters" class="text-sm text-black border-2 border-[#009ac7] rounded-full px-4 py-2">Clear all</button>
            </div>
            <div class="h-0.5 w-full bg-[#009ac7] mt-4 rounded-2xl"></div>
            
            <!-- Brand Filter -->
            <div class="mt-4 lg:px-4">
                <h3 class="font-semibold">Brand</h3>
                <ul class="mt-2 brand-filter">
                    @foreach ($brands as $brand)
                        <li class="py-2 cursor-pointer" 
                            data-brand-name="{{ $brand->name }}" 
                            data-cover-background="{{ $brand->cover_background_url }}">
                            <span>&bull;</span> {{ $brand->name }}
                        </li>
                    @endforeach
                </ul>                
            </div>

            <!-- Categories Filter -->
            <div class="mt-6 lg:px-4">
                <h3 class="font-semibold">Categories</h3>
                <ul class="mt-2 category-filter">
                    @foreach ($categories as $category)
                        <li class="py-2 cursor-pointer" 
                            data-category-name="{{ $category->name }}">
                            <span>&bull;</span> {{ $category->name }}
                        </li>
                    @endforeach
                </ul>                
            </div>

        </div>
        
        <!-- Produk -->
        <div class="w-auto grid grid-cols-1 lg:grid-cols-3 gap-4 lg:ml-6 pt-[4rem]">
            @foreach ($products as $product)
                <div class="bg-white p-4 rounded-[2rem] 2xl:h-[24rem] 2xl:w-[24rem] xl:h-[20rem] xl:w-[18rem] shadow-lg flex flex-col justify-center items-center product"
                    data-brand-id="{{ $product->brand_id }}"
                    data-category-id="{{ $product->categories->pluck('id')->join(',') }}">
                    <img src="{{ $product->getImageUrlAttribute() }}" alt="{{ $product->name }}" class="h-32 object-contain">
                    <div class="mt-2 text-center items-center justify-center">
                        <img src="{{ $product->brand->logo_hitam_url }}" alt="Brand Logo" class="h-12 py-2 object-contain mx-auto">                    
                        <h3 class="mt-2 font-semibold">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-sm">{{ $product->type }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const brandFilters = document.querySelectorAll('.brand-filter li');
        const categoryFilters = document.querySelectorAll('.category-filter li');
        const pageHeader = document.getElementById("page-header");
        const clearButton = document.getElementById("clearFilters");

        function updateURL(selectedBrandName = null, selectedCategoryNames = []) {
            const url = new URL(window.location.href);

            if (selectedBrandName) {
                url.searchParams.set('brand', selectedBrandName);
            } else {
                url.searchParams.delete('brand');
            }

            url.searchParams.delete('category[]');

            selectedCategoryNames.forEach(catName => {
                url.searchParams.append('category[]', catName);
            });

            window.location.href = url.toString();
        }

        function initializeFilters() {
            const urlParams = new URLSearchParams(window.location.search);
            const selectedBrandName = urlParams.get('brand');
            const selectedCategoryNames = urlParams.getAll('category[]');

            if (selectedBrandName) {
                brandFilters.forEach(li => {
                    if (li.dataset.brandName === selectedBrandName) {
                        li.classList.add('active');
                        updateBackground(li);
                    }
                });
            }

            categoryFilters.forEach(li => {
                if (selectedCategoryNames.includes(li.dataset.categoryName)) {
                    li.classList.add('active');
                }
            });
        }

        function updateBackground(selectedBrandElement) {
            if (selectedBrandElement) {
                const coverBackground = selectedBrandElement.dataset.coverBackground;
                if (coverBackground) {
                    pageHeader.style.backgroundImage = `url('${coverBackground}')`;
                }
            } else {
                pageHeader.style.backgroundImage = `url('{{ $page->cover_page_product }}')`;
            }
        }

        brandFilters.forEach(li => {
            li.addEventListener("click", function () {
                const selectedBrandName = this.dataset.brandName;

                brandFilters.forEach(b => b.classList.remove("active"));
                this.classList.add("active");

                const selectedCategoryNames = Array.from(document.querySelectorAll('.category-filter li.active'))
                    .map(cat => cat.dataset.categoryName);

                updateURL(selectedBrandName, selectedCategoryNames);
            });
        });

        categoryFilters.forEach(li => {
            li.addEventListener("click", function () {
                this.classList.toggle("active"); 

                const selectedBrandElement = document.querySelector('.brand-filter li.active');
                const selectedBrandName = selectedBrandElement ? selectedBrandElement.dataset.brandName : null;

                const selectedCategoryNames = Array.from(document.querySelectorAll('.category-filter li.active'))
                    .map(cat => cat.dataset.categoryName);

                updateURL(selectedBrandName, selectedCategoryNames);
            });
        });

        clearButton.addEventListener("click", function () {
            brandFilters.forEach(b => b.classList.remove("active"));
            categoryFilters.forEach(c => c.classList.remove("active"));

            const url = new URL(window.location.href);
            url.searchParams.delete('brand');
            url.searchParams.delete('category[]');

            window.location.href = url.toString();
        });

        initializeFilters();
    });
</script>
@endsection


