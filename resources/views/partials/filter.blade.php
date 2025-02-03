<div class="flex justify-between items-center">
    <h2 class="text-lg font-semibold">Filters</h2>
    <button id="clearFilters" class="text-sm text-black border-2 border-[#009ac7] rounded-full px-4 py-2">Clear all</button>
</div>
<div class="h-0.5 w-full bg-[#009ac7] mt-4 rounded-2xl"></div>

<!-- Brand Filter -->
<div class="mt-4">
    <h3 class="font-semibold px-4">Brand</h3>
    <ul class="mt-2 brand-filter">
        @foreach ($brands as $brand)
            <li class="py-2 px-4 cursor-pointer" data-brand-id="{{ $brand->id }}" data-cover-background="{{ $brand->cover_background_url }}">
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
            <li class="py-2 px-4 cursor-pointer" data-category-id="{{ $category->id }}">
                <span>&bull;</span> {{ $category->name }}
            </li>
        @endforeach
    </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const brandFilters = document.querySelectorAll('.brand-filter li');
        const categoryFilters = document.querySelectorAll('.category-filter li');
        const clearButton = document.getElementById('clearFilters');

        function filterProducts() {
            const selectedBrandElement = document.querySelector('.brand-filter li.active');
            const selectedBrand = selectedBrandElement ? selectedBrandElement.dataset.brandId : null;
            const selectedCategories = Array.from(document.querySelectorAll('.category-filter li.active'))
                .map(li => li.dataset.categoryId);

            const products = document.querySelectorAll('.product');

            products.forEach(product => {
                const productBrand = product.dataset.brandId;
                const productCategories = product.dataset.categoryId.split(',');

                const brandMatch = !selectedBrand || productBrand === selectedBrand;
                const categoryMatch = selectedCategories.length === 0 || selectedCategories.some(cat => productCategories.includes(cat));

                product.classList.toggle('hidden', !(brandMatch && categoryMatch));
            });
        }

        brandFilters.forEach(li => {
            li.addEventListener('click', function () {
                brandFilters.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                filterProducts();
            });
        });

        categoryFilters.forEach(li => {
            li.addEventListener('click', function () {
                this.classList.toggle('active');
                filterProducts();
            });
        });

        clearButton.addEventListener('click', function () {
            brandFilters.forEach(b => b.classList.remove('active'));
            categoryFilters.forEach(c => c.classList.remove('active'));
            filterProducts();
        });
    });
</script>
