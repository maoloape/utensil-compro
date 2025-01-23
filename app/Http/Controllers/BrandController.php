<?php

namespace App\Http\Controllers;

use App\Models\Products\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getProducts($id)
    {
        $brand = Brand::with('products')->findOrFail($id);

        $products = $brand->products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'type' => $product->type,
                'image_url' => $product->image_url,
                'logo_url' => $product->logo_url,
            ];
        });

        return response()->json($products);
    }
}
