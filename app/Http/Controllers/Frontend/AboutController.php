<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content\About;
use App\Models\Page;
use App\Models\Products\Brand;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $page = Page::first();
        $brands = Brand::all();
        $about = About::first(); 
        return view('frontend.about', compact('page', 'brands', 'about'));
    }
}
