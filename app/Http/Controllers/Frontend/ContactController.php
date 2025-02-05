<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content\About;
use App\Models\Content\Career;
use App\Models\Content\Office;
use App\Models\Page;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {   
        $page = Page::first();
        $offices = Office::orderBy('id', 'asc')->get();
        $career = Career::all();

        return view('frontend.contact', compact('page', 'offices', 'career'));
    }
}
