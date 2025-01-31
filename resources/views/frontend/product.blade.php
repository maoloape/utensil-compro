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
        width: 65%;
        color: #000;
    }

    .brand-filter li:hover, .category-filter li:hover {
        background-color: #007bff;
        width: 65%;
        color: #fff;
    }
</style>
@endsection

@section('content')
    <div id="page-header" class="w-full bg-cover h-[30rem] bg-top-center" style="background-image: url('{{ $page->cover_page_contact }}');">
        @include('layouts.topbar')
    </div>

    <div class="container mx-auto px-4 pt-16 flex pb-[12rem]">
        <!-- Sidebar Filter -->
        <div class="w-1/4 bg-white p-4 rounded-lg">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold">Filters</h2>
                <button class="text-sm text-black border-[2px] border-[#009ac7] rounded-full px-4 py-2">Clear all</button>
            </div>
            <div class="h-0.5 w-full bg-[#009ac7] mt-4 rounded-[2rem]"></div>
            
            <!-- Brand Filter -->
            <div class="mt-4">
                <h3 class="font-semibold px-4">Brand</h3>
                <ul class="mt-2 brand-filter">
                    @foreach ($brands as $brand)
                    <li class="py-2 px-4" data-brand-id="{{ $brand->id }}" data-cover-background="{{ $brand->cover_background_url }}">
                        <span>&bull;</span> {{ $brand->name }}
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Categories Filter -->
            <div class="mt-6">
                <h3 class="font-semibold px-4">Categories</h3>
                <ul class="mt-2 category-filter">
                    @foreach ($categories as $category)
                        <li class="py-2 px-4" data-category-id="{{ $category->id }}">
                            <span>&bull;</span> {{ $category->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <!-- Produk -->
        <div class="w-3/4 grid grid-cols-3 gap-4 ml-6 pt-[4rem]">
            @foreach ($products as $product)
                <div class="bg-white p-4 rounded-[2rem] shadow-lg flex flex-col items-center product"
                    data-brand-id="{{ $product->brand_id }}"
                    data-category-id="{{ $product->categories->pluck('id')->join(',') }}">
                    <img src="{{ $product->getImageUrlAttribute() }}" alt="{{ $product->name }}" class="h-32 object-contain">
                    <div class="mt-2 text-center">
                        <span class="bg-green-600 text-white text-xs px-2 py-1 rounded">{{ $product->brand->name }}</span>
                        <h3 class="mt-2 font-semibold">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-sm">{{ $product->type }}</p>
                        <p class="text-gray-500 text-sm">{{ $product->categories->pluck('name')->join(', ') }}</p>
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

        function filterProducts() {
            const selectedBrandElement = document.querySelector('.brand-filter li.active');
            const selectedBrand = selectedBrandElement ? selectedBrandElement.dataset.brandId : null;
            const selectedCategories = Array.from(document.querySelectorAll('.category-filter li.active'))
                .map((li) => li.dataset.categoryId);

            const products = document.querySelectorAll('.product');

            products.forEach((product) => {
                const productBrand = product.dataset.brandId;
                const productCategories = product.dataset.categoryId.split(',');

                const brandMatch = !selectedBrand || productBrand === selectedBrand;
                const categoryMatch = selectedCategories.length === 0 || selectedCategories.some(cat => productCategories.includes(cat));

                if (brandMatch && categoryMatch) {
                    product.classList.remove('hidden');
                } else {
                    product.classList.add('hidden');
                }
            });

            updateBackground(selectedBrandElement);
        }

        function updateBackground(selectedBrandElement) {
            if (selectedBrandElement) {
                const coverBackground = selectedBrandElement.dataset.coverBackground;
                if (coverBackground) {
                    pageHeader.style.backgroundImage = `url('${coverBackground}')`;
                }
            } else {
                pageHeader.style.backgroundImage = `url('{{ $page->cover_page_contact }}')`;
            }
        }

        brandFilters.forEach((li) => {
            li.dataset.coverBackground = li.getAttribute('data-cover-background'); 

            li.addEventListener("click", function () {
                brandFilters.forEach((b) => b.classList.remove("active"));
                this.classList.add("active");
                filterProducts();
            });
        });

        categoryFilters.forEach((li) => {
            li.addEventListener("click", function () {
                this.classList.toggle("active");
                filterProducts();
            });
        });

        document.querySelector('button').addEventListener("click", function () {
            brandFilters.forEach((b) => b.classList.remove("active"));
            categoryFilters.forEach((c) => c.classList.remove("active"));
            filterProducts();
        });
    });


</script>

@endsection