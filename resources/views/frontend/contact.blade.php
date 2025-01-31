@extends('layouts.layout')

@section('title')
    <title>Contact</title>
@endsection

@section('style')

<style>
    .mapouter {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .gmap_canvas {
        overflow: hidden;
        background: none;
        width: 1080px;
        height: 540px;
    }

    .gmap_iframe {
        width: 100%;
        height: 100%;
    }
</style>


@endsection

@section('content')

<div class="w-full min-h-[85vh] bg-cover bg-white bg-center">
    <div class="w-full bg-cover h-full max-h-[30rem] bg-top-center" style="background-image: url('{{ $page->cover_page_contact }}');">
            <div class="w-full h-full max-h-[30rem] bg-gradient-to-b from-transparent via-[#2a2a2a]/0 to-transparent">
            @include('layouts.topbar')
            <div class="container mx-auto flex flex-col justify-center items-center gap-8 pt-[8rem]">
                <div class="mapouter flex justify-center items-center">
                    <div class="gmap_canvas rounded-[2rem]">
                        <iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Jl. Kopo Bihbul No.131&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white mt-0">
    <div class="container mx-auto flex flex-row justify-center items-center gap-8 mt-0 pb-12">
        <div class="w-1/2 text-right">
            <div class="flex justify-end mb-4">
                <div class="h-1 w-[40rem] bg-[#009ac7] rounded-[2rem]"></div>
            </div>
            <h1 class="text-[6rem] text-black mb-4">Our <br> <strong class="text-[#0298c6]" style="font-weight: normal"> Office </strong>  <h1>
        </div>
    
        <div class="w-1/2 text-left">
            <div class="flex flex-col lg:flex-row w-full lg:w-1/2 pb-12 pt-[6rem] px-4 text-black"> 
                <div class="text-left lg:text-left w-full lg:w-1/2"> 
                    <p class="font-semibold" style="margin-bottom: 0.25rem;">Bandung (Factory)</p> 
                    <p style="margin-bottom: 0;">Jalan Kopo Bihbul No. 131</p> 
                    <p style="margin-bottom: 0;">Bandung, Jawa Barat 40225, Indonesia</p> 
                    <p style="margin-bottom: 0;">Tel: 022-540-7772 / 73</p> 
                    <p style="margin-bottom: 0;">Fax: 022-540-2831</p> 
                    <p style="margin-bottom: 0;">Email: <a href="mailto:bandung@indoutensil.com" class="text-black font-bold">bandung@indoutensil.com</a></p> 
                </div> 
                <div class="text-left lg:text-left w-full lg:w-1/2"> 
                    <p class="font-semibold" style="margin-bottom: 0;">Jakarta (Marketing)</p> 
                    <p style="margin-bottom: 0;">Tel: +6221-391-6949</p> 
                    <p style="margin-bottom: 0;">Fax: +6221-392-7090</p> 
                    <p style="margin-bottom: 0;">Email: <a href="mailto:jkt@indoutensil.com" class="text-black font-bold">jkt@indoutensil.com</a></p> 
                    <p style="margin-bottom: 0;">WA: +62-811-180-8303</p> 
                </div> 
            </div>
            <p class="px-4 m-0" style="margin-bottom: 0;">Email: <a href="mailto:bandung@indoutensil.com" class="text-black font-bold">bandung@indoutensil.com</a></p> 
        </div>
    </div>        
</div>

<div class="min-h-screen flex flex-col items-center justify-center bg-white">
    <div class="flex justify-center items-center">
        <div class="h-1 w-[6rem] rounded-lg bg-[#009ac7] mr-4 mb-2"></div>
        <h1 class="text-4xl font-bold text-black">Let's Get in touch</h1>
        <div class="h-1 w-[6rem] rounded-lg bg-[#009ac7] ml-4 mb-2"></div>
    </div>        
    <p class="text-center text-black mb-12">
        Please complete the form below to get in touch with us.
    </p>

    <form action="#" method="POST" class="space-y-2 w-[42rem]">
        <!-- Name Field -->
        <div class="flex gap-6 items-center py-2">
            <!-- Label dan Span -->
            <div class="flex flex-col w-[8rem]">
                <label for="name" class="text-gray-700 font-semibold">Name</label>
                <span class="text-sm text-gray-500">your full name</span>
            </div>
            <!-- Input -->
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="w-full py-2 border border-black rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>
        
    
        <!-- Email Field -->
        <div class="flex gap-6 items-center py-2">
            <div class="flex flex-col w-[8rem]">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <span class="text-sm text-gray-500">a valid email</span>
            </div>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="w-full pr-12 py-2 border border-black rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>
    
        <!-- Phone Field -->
        <div class="flex gap-6 items-center py-2">
            <div class="flex flex-col w-[8rem]">
                <label for="phone" class="block text-gray-700 font-semibold">Phone</label>
                <span class="text-sm text-gray-500">Number</span>
            </div>
            <input 
                type="text" 
                id="phone" 
                name="phone" 
                class="w-full pr-12 py-2 border border-black rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>
    
        <!-- Message Field -->
        <div class="flex gap-6 items-center py-2">
            <div class="flex flex-col w-[8rem]">
                <label for="message" class="block text-gray-700 font-semibold">Message</label>
            </div>
            <textarea 
                id="message" 
                name="message" 
                rows="4" 
                class="w-full pr-12 py-2 border border-black rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            ></textarea>
        </div>
    
        <!-- Submit Button -->
        <div class="flex justify-end pt-6">
            <button 
                type="submit" 
                class="px-6 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1"
            >
                Send
            </button>
        </div>
    </form>
    
</div>


@endsection
