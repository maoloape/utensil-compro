@extends('layouts.layout')

@section('title')
    <title>Product</title>
@endsection

@section('content')
<div class="mt-0 py-12 bg-[#2a2a2a]">
    <div class="container mx-auto flex flex-col lg:flex-row gap-8">
        <div class="lg:w-1/2 text-right">
            <div class="flex justify-end mb-4">
                <div class="h-1 w-full bg-[#009ac7]"></div>
            </div>
            <h1 class="text-[98px] text-white font-bold mb-4">Established in 1966</h1>
            <a class="text-lg text-white borde px-4 py-3" href="/about" style="border: 2px solid; border-color: #009ac7; border-radius:2rem;">Read More</a>
        </div>
        <div class="lg:w-1/2 text-left">
            <p class="text-2xl text-white mb-8">PT Indonesia Utensil adalah produsen peralatan dapur stainless steel asal Indonesia, yang terletak di Bandung, Jawa Barat. Kami telah berdiri sejak tahun 1966.
                <br>
                <br>
                Kami memulai sebagai produsen peralatan makan stainless steel. Seiring waktu, kami memperluas produksi kami ke barang-barang rumah tangga lainnya, seperti pisau dapur, alat dapur & peralatan. Saat ini, kami terus membuat berbagai barang-barang rumah tangga, dari peralatan dapur hingga produk gaya hidup seperti produk pembuatan kopi manual. Merek kami termasuk Tanica, Edelmann, Vinox.
            </p>
        </div>
    </div>
</div>
@endsection
