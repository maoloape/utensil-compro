@extends('layouts.layout')

@section('title')
    <title>Tentang Kami</title>
@endsection

@section('head')
<style>
    body {
        background-image: url('{{ asset('assets/asset/about-background.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@endsection

@section('content')
    <div class="py-10 mx-auto" style="max-width: 1760px; padding-top: 120px;">
        <div class="bg-white bg-opacity-75 p-8 rounded-lg"> 
            <h1 class="text-4xl font-bold mb-4">About Us</h1>
            <p class="text-lg mb-8">Learn more about our company and history.</p>
        </div>
    </div>
@endsection
