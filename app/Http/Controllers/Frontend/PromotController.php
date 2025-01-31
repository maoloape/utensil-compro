<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PromotController extends Controller
{
    public function index()
    {   
        $page = Page::first(); 
        return view('frontend.promot', compact('page'));
    }
}
