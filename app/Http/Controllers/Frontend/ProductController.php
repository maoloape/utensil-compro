<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Products\Brand;
use App\Models\Products\Category;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $page = Page::first(); 

        $brandName = $request->input('brand');  
        $categoryNames = $request->input('category'); 

        $products = Product::query();

        if ($brandName) {
            $brand = Brand::where('name', $brandName)->first();
            if ($brand) {
                $products->where('brand_id', $brand->id);
            }
        }        

        if ($categoryNames) {
            $products->whereHas('categories', function ($query) use ($categoryNames) {
                $query->whereIn('name', (array) $categoryNames);
            });
        }

        $products = $products->with('media')->get();

        return view('frontend.product', compact('brands', 'categories', 'products', 'page', 'brandName'));
    }
}
