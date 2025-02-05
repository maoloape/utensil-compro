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

    @media (max-width:768px) {
        .gmap_canvas {
            width: 1080px;
            height: 240px;
        }

        .office{
            margin-top: 8rem;
        }
    }
    @media (min-width: 769px) and (max-width: 1280px) {
        .gmap_canvas {
            width: 820px;
            height: 380px;
        }
    }
</style>


@endsection

@section('content')
<div class="w-full lg:min-h-[75vh] min-h-[55vh] bg-cover bg-white bg-center">
    <div class="w-full bg-cover h-full max-h-[22.5rem] lg:max-h-[38.5rem] bg-top-center" style="background-image: url('{{ $page->cover_page_contact }}');">
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

<div class="bg-white office">
    <div class="container mx-auto flex flex-col lg:flex-row justify-center items-center gap-8 pb-12">
        <div class="lg:w-1/2 w-full lg:text-right px-4 lg:px-0 mb-0">
            <div class="flex justify-end">
                <div class="h-1 2xl:w-[40rem] xl:w-[28rem] bg-[#009ac7] rounded-[2rem]"></div>
            </div>
            <h1 class="2xl:text-[7rem] xl:text-[6rem] text-black mb-4 font-[500]">Our <br> <strong class="text-[#0298c6]" style="font-weight: 500"> Offices </strong>  <h1>
        </div>
    
        <div class="lg:w-1/2 w-full text-left mt-8">
            <div class="flex flex-col lg:flex-row w-full lg:w-full pb-12 lg:pt-[6rem] px-4 text-black"> 
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    @foreach($offices as $kantor)
                        <div class="text-left lg:text-left w-full lg:w-full 2xl:text-[1.6rem] xl:text-[1.2rem] lg:py-0 py-2">
                            <p class="font-semibold" style="margin-bottom: 0.25rem;">{{ $kantor->title }}</p> 
                            <p style="margin-bottom: 0;">{{ $kantor->alamat }}</p> 
                            <p style="margin-bottom: 0;">Tel: {{ $kantor->telephone }}</p> 
                            <p style="margin-bottom: 0;">Fax: {{ $kantor->fax }}</p> 
                            <p style="margin-bottom: 0;">Email: <a href="mailto:{{ $kantor->email }}" class="text-black font-bold">{{ $kantor->email }}</a></p> 
                            @if($kantor->whatsapp)
                                <p style="margin-bottom: 0;">WA: {{ $kantor->whatsapp }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @foreach($career as $karir)
                <p class="px-4 m-0 2xl:text-[1.6rem] xl:text=[1.2rem]" style="margin-bottom: 0;"> For career inquires please email to <a href="mailto:{{ $karir->email_career }}" class="text-black font-bold">{{ $karir->email_career }}</a></p> 
            @endforeach
        </div>
    </div>        
</div>

<div class="flex flex-col items-center justify-center bg-white px-12 lg:px-0 mb-12">
    <div class="flex justify-center items-center">
        <div class="h-1 w-[6rem] rounded-lg bg-[#009ac7] mr-4 mb-2 hidden lg:inline-block"></div>
        <h1 class="lg:text-[5rem] text-4xl font-bold text-black">Let's Get in touch</h1>
        <div class="h-1 w-[6rem] rounded-lg bg-[#009ac7] ml-4 mb-2"></div>
    </div>        
    <p class="lg:text-center text-left text-black py-6 lg:text-[2rem]">
        Please complete the form below to get in touch with us.
    </p>

    <form action="#" method="POST" class="lg:max-w-[40rem] w-full">
        <div class="flex gap-6 items-center py-2">
            <div class="flex flex-col w-[8rem]">
                <label for="name" class="text-gray-700 font-semibold lg:text-[1.5rem] mb-0">Name</label>
                <span class="text-sm text-gray-500 mt-0">your full name</span>
            </div>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="w-full py-2 px-2 border-[1px] border-black rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>
        <div class="flex gap-6 items-center py-2">
            <div class="flex flex-col w-[8rem]">
                <label for="email" class="block text-gray-700 font-semibold lg:text-[1.5rem] mb-0">Email</label>
                <span class="text-sm text-gray-500 mt-0">a valid email</span>
            </div>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="w-full pr-12 py-2 px-2 border-[1px] border-black rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>
        <div class="flex gap-6 items-center py-2">
            <div class="flex flex-col w-[8rem]">
                <label for="phone" class="block text-gray-700 font-semibold lg:text-[1.5rem] mb-0">Phone</label>
                <span class="text-sm text-gray-500 mt-0">Number</span>
            </div>
            <input 
                type="text" 
                id="phone" 
                name="phone" 
                class="w-full pr-12 py-2 px-2 border-[1px] border-black rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            >
        </div>
        <div class="flex gap-6 items-center py-2">
            <div class="flex flex-col w-[8rem]">
                <label for="message" class="block text-gray-700 font-semibold lg:text-[1.5rem]">Message</label>
            </div>
            <textarea 
                id="message" 
                name="message" 
                rows="4" 
                class="w-full pr-12 py-2 px-2 border-[1px] border-black rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            ></textarea>
        </div>
        <div class="flex justify-end pt-6">
            <button 
                type="submit" 
                class="lg:text-lg text-black border-2 border-[#009ac7] rounded-[2rem] px-12 py-2"
            >
                Send
            </button>
        </div>
    </form>
    
</div>


@endsection
