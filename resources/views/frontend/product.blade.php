@extends('layouts.layout')

@section('head')
<style>
    body {
        background-image: url('{{ asset('assets/asset/product-background.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto py-8">
    <!-- Main content goes here -->
    <div class="text-center bg-white bg-opacity-75 p-8 rounded-lg">
        <h1 class="text-4xl font-bold mb-4">Welcome to PT Indonesia Utensil</h1>
        <p class="text-lg mb-8">Your trusted kitchenware manufacturer since 1966.</p>
        <img src="{{ asset('assets/asset/catalog.jpg') }}" alt="Catalog" class="mx-auto">
    </div>
</div>
    <!-- Main content goes here -->
    <div class="py-10 mx-auto" style="max-width: 1760px; padding-top: 120px;">
        <div class="bg-white bg-opacity-75 p-8 rounded-lg"> 
            <h1 class="text-4xl font-bold mb-4">Our Products</h1>
            <p class="text-lg mb-8">Explore our wide range of kitchenware products.</p>
        </div>
    </div>
@endsection
