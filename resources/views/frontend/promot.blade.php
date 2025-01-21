@extends('layouts.layout')

@section('title')
    <title>Prmotion</title>
@endsection

@section('head')
<style>
    body {
        background-image: url('{{ asset('assets/asset/promot-background.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@endsection

@section('content')
    <div class="py-10 mx-auto" style="max-width: 1760px; padding-top: 120px;">
        <div class="bg-white bg-opacity-75 p-8 rounded-lg"> 
            <h1 class="text-4xl font-bold mb-4">Promotional Products</h1>
            <p class="text-lg mb-8">Check out our latest promotional products.</p>
        </div>
    </div>
@endsection
