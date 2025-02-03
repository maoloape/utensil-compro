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

    .pagination {
        display: flex;
        list-style: none;
        gap: 8px;
    }

    .pagination li a {
        padding: 8px 12px;
        background-color: #009ac7;
        color: white;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .pagination li a:hover {
        background-color: #007b9a;
    }

</style>
@endsection

@section('content')
<div id="page-header" class="w-full bg-cover h-[30rem] bg-top-center" style="background-image: url('{{ $page->cover_page_contact }}');">
    @include('layouts.topbar')
</div>

<div class="container mx-auto px-4 py-16">
    <!-- Filter Dropdown (Mobile) -->
    <div class="lg:hidden mb-4">
        <button id="filterToggle" class="w-full bg-[#009ac7] text-white py-2 px-4 rounded-lg">Filter Products</button>
        <div id="filterContent" class="hidden mt-2 bg-white p-4 rounded-lg shadow-md">
            @include('partials.filter')
        </div>
    </div>

    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar Filter (Desktop) -->
        <div class="flex flex-col lg:flex-row">
            <!-- Sidebar Filter (Desktop) -->
            <div class="hidden lg:block w-full lg:w-1/4 bg-white p-4 rounded-lg lg:sticky lg:top-16">
                @include('partials.filter')
            </div>
        
            <!-- Produk -->
            <div class="w-full lg:w-3/4">
                @include('frontend.partials.products', ['products' => $products])
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const brandFilters = document.querySelectorAll('.brand-filter li');
        const categoryFilters = document.querySelectorAll('.category-filter li');
        const clearButton = document.getElementById('clearFilters');
        const productContainer = document.querySelector('.grid'); 

        function fetchProducts(page = 1) {
            const selectedBrandElement = document.querySelector('.brand-filter li.active');
            const selectedBrand = selectedBrandElement ? selectedBrandElement.dataset.brandId : null;
            const selectedCategories = Array.from(document.querySelectorAll('.category-filter li.active'))
                .map(li => li.dataset.categoryId);

            const params = new URLSearchParams();
            if (selectedBrand) params.append('brand_id', selectedBrand);
            if (selectedCategories.length > 0) selectedCategories.forEach(cat => params.append('category_ids[]', cat));
            if (page > 1) params.append('page', page);

            fetch(`?${params.toString()}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.text())
            .then(data => {
                document.querySelector('.grid').innerHTML = data;
                attachPaginationEvents();
            });

            history.pushState(null, '', window.location.pathname);
        }

        function attachPaginationEvents() {
            const paginationLinks = document.querySelectorAll('.pagination a');

            paginationLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const page = new URL(this.href).searchParams.get('page');
                    const params = new URLSearchParams(this.href.split('?')[1]);
                    params.delete('page');
                    fetchProducts(page, params.toString());
                });
            });
        }

        function fetchProducts(page, params) {
            const selectedBrandElement = document.querySelector('.brand-filter li.active');
            const selectedBrand = selectedBrandElement ? selectedBrandElement.dataset.brandId : null;
            const selectedCategories = Array.from(document.querySelectorAll('.category-filter li.active'))
                .map(li => li.dataset.categoryId);

            const newParams = new URLSearchParams();
            if (selectedBrand) newParams.append('brand_id', selectedBrand);
            if (selectedCategories.length > 0) selectedCategories.forEach(cat => newParams.append('category_ids[]', cat));
            if (page > 1) newParams.append('page', page);
            newParams.append('params', params);

            fetch(`?${newParams.toString()}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.text())
            .then(data => {
                document.querySelector('.grid').innerHTML = data;
                attachPaginationEvents();
            });

            history.pushState(null, '', window.location.pathname);
        }

        brandFilters.forEach(li => {
            li.addEventListener('click', function () {
                brandFilters.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                fetchProducts();
            });
        });

        categoryFilters.forEach(li => {
            li.addEventListener('click', function () {
                this.classList.toggle('active');
                fetchProducts();
            });
        });

        clearButton.addEventListener('click', function () {
            brandFilters.forEach(b => b.classList.remove('active'));
            categoryFilters.forEach(c => c.classList.remove('active'));
            fetchProducts();
        });

        attachPaginationEvents();
    });

</script>

@endsection
