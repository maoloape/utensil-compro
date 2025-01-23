<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'asc')->get();
        return view('frontend.home', compact('brands'));
    }
}
