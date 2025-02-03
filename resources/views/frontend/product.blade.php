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

<div class="container mx-auto px-4 pt-16 pb-[12rem]">
    <!-- Filter Dropdown (Mobile) -->
    <div class="lg:hidden mb-4">
        <button id="filterToggle" class="w-full bg-[#009ac7] text-white py-2 px-4 rounded-lg">Filter Products</button>
        <div id="filterContent" class="hidden mt-2 bg-white p-4 rounded-lg shadow-md">
            @include('partials.filter')
        </div>
    </div>

    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar Filter (Desktop) -->
        <div class="hidden lg:block w-full lg:w-1/4 bg-white p-4 rounded-lg lg:sticky lg:top-16">
            @include('partials.filter')
        </div>

        <!-- Produk -->
        <div class="w-full lg:w-3/4 grid grid-cols-1 lg:grid-cols-3 gap-4 ml-0 lg:ml-6 pt-4 lg:pt-[4rem]">
            @foreach ($products as $product)
                <div class="bg-white p-4 rounded-[2rem] shadow-lg flex flex-col items-center product"
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
</div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterToggle = document.getElementById('filterToggle');
        const filterContent = document.getElementById('filterContent');

        filterToggle.addEventListener('click', function () {
            filterContent.classList.toggle('hidden');
        });
    });
</script>
@endsection
