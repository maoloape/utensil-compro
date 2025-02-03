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

        $brandId = $request->input('brand_id');
        $categoryIds = $request->input('category_ids');

        $products = Product::query();

        if ($brandId) {
            $products->where('brand_id', $brandId);
        }

        if ($categoryIds) {
            $products->whereIn('category_id', $categoryIds);
        }

        $products = $products->with('media')->get();

        return view('frontend.product', compact('brands', 'categories', 'products','page'));
    }

     // public function index(Request $request)
    // {
    //     $brands = Brand::all();
    //     $categories = Category::all();
    //     $page = Page::first(); 

    //     $brandId = $request->input('brand_id');
    //     $categoryIds = $request->input('category_ids', []);

    //     $products = Product::query();

    //     if ($brandId) {
    //         $products->where('brand_id', $brandId);
    //     }

    //     if ($categoryIds) {
    //         $products->whereHas('categories', function ($query) use ($categoryIds) {
    //             $query->whereIn('categories.id', (array) $categoryIds);
    //         });
    //     }

    //     $products = $products->with('media')->paginate(9)->appends(request()->query());

    //     if ($request->ajax()) {
    //         return view('frontend.partials.products', compact('products'))->render();
    //     }

    //     return view('frontend.product', compact('brands', 'categories', 'products', 'page'));
    // }
}
