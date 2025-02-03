<div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-4 px-12">
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
<div class="pagination-container mt-6 px-12 flex items-center justify-center py-12">
    {{ $products->withQueryString()->links() }}
</div>
