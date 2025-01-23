<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public function index()
    // {
    //     return view('frontend.product');
    // }

    public function getProductsByBrand($id)
    {
        $products = Product::where('brand_id', $id)->get();

        return response()->json($products);
    }

}
