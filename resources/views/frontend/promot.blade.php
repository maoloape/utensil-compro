@extends('layouts.layout')

@section('title')
    <title>Prmotion</title>
@endsection

@section('content')
    <div class="w-full min-h-[100vh] bg-cover" style="background-image: url('{{ $page->cover_page_promot }}');">
        <div class="w-full min-h-[100vh] bg-gradient-to-b from-[#2a2a2a]/30 to-[#2a2a2a]/100">
            @include('layouts.topbar')
            <div class="container mx-auto flex justify-center items-center gap-8 min-h-[100vh]">
                <div class="flex items-center justify-center">
                    <div class="bg-white p-10 shadow-lg rounded-lg text-center px-16 py-16">
                        <h1 class="text-6xl font-bold text-red-500">404</h1>
                        <p class="text-xl text-gray-700 mt-4">Page Not Found.</p>
                        <a href="/" class="mt-6 inline-block px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition">Back to Home</a>
                    </div>
                </div>
            </div>        
        </div>
    </div>
    
@endsection
