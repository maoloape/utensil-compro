<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content\About;
use App\Models\Products\Brand;
use App\Models\Products\Category;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'asc')->get();
        $product = Product::all();
        $about = About::first(); 
        $categories = Category::all(); // Add this line
        return view('frontend.home', compact('brands', 'product', 'about', 'categories')); // Update this line
    }

    public function fetchProductsByBrand($brandId)
    {
        $products = Product::where('brand_id', $brandId)->get();
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'id' => $product->id,
                'name' => $product->name,
                'type' => $product->type,
                'image_url' => $product->getImageUrlAttribute(),
                'brand_id' => $product->brand_id,
            ];
        }
        return response()->json($data);
    }
}
