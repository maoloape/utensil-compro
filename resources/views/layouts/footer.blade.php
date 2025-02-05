<footer class="bg-gray-800 text-white max-h-screen">
    <div class="flex flex-col">
        <div class="flex flex-col lg:flex-row w-full items-center lg:gap-8 gap-0 bg-[#2a2a2a] lg:pt-0 pt-12">
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-start relative">
                <div class="absolute bg-[#4d4d4d] rounded-b-[80px] rounded-t-none shadow-2xl lg:-top-[13.9rem] lg:right-0 hidden lg:inline-block">
                    <img src="{{ asset('assets/asset/catalogue.png') }}" alt="Catalogue" class="relative w-[28rem] h-auto object-contain py-12 px-12">
                    {{-- <button class="absolute inset-y-1/2 -right-6 transform translate-y-[-50%] bg-gray-600 text-white w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                        &gt;
                    </button> --}}
                </div>
                <div class="relative bg-[#4d4d4d] rounded-lg shadow-2xl inline-block lg:hidden">
                    <img src="{{ asset('assets/asset/catalogue.png') }}" alt="Catalogue" class="relative w-[16rem] h-auto object-contain py-12 px-12">
                    {{-- <button class="absolute inset-y-1/2 -right-6 transform translate-y-[-50%] bg-gray-600 text-white w-10 h-10 rounded-full shadow-lg flex items-center justify-center">
                        &gt;
                    </button> --}}
                </div>
            </div>
                
            <div class="w-full lg:w-1/2 py-10 lg:px-12 px-4 mt-[1rem]">
                <div class="flex-1 h-1 lg:w-[28rem] bg-[#0298c6] mb-2 "></div>
                <h3 class="lg:text-[6rem]">Download <br> Our Catalogue</h3>
                <form class="mt-4 w-full flex flex-row lg:flex-row items-center lg:items-start">
                    <input type="email" placeholder="Please insert your e-mail to get our catalogue"
                        class="w-4/5 lg:w-1/2 bg-white h-[2.75rem] text-white rounded-full px-4 py-2 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 z-10">
                    <button type="submit" class="border-2 border-[#009ac7] border-l-0 rounded-r-full hover:bg-[#009ac7] px-4 py-2 text-white font-semibold ml-[-1.2rem] z-1">Submit</button>                
                </form>
                <p class="text-white pt-2"> Please insert your e-mail to get our catalogue</p>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row w-full h-auto">
            <div class="lg:w-1/2 w-full lg:text-right px-4 lg:px-0 mb-0 bg-[#666666]">
                <div class="flex justify-end mb-4 lg:pt-[7rem] pt-[2rem]">
                    <div class="h-1 w-[25rem] bg-[#009ac7] rounded-[2rem]"></div>
                </div>
                <h1 class="lg:text-[7rem] text-white mb-4">Hubungi <br> Kami <h1>
            </div>          
            <div class="lg:w-1/2 w-full text-left mt-0 bg-[#b2b2b2] pb-12 pt-4 lg:pt-0">
                <div class="flex flex-col lg:flex-row w-full lg:w-full pb-12 lg:pt-[6rem] px-4 text-black"> 
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        @foreach($office as $kantor)
                            <div class="text-left lg:text-left w-full lg:w-full lg:text-[1.6rem] lg:py-0 py-2">
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
            </div>
        </div>
    </div>
    <div class="border-t border-gray-700 py-6 text-center text-white lg:text-[1.25rem] bg-[#2a2a2a] px-12 lg:px-0">
        Copyright © 2020 PT Indonesia Utensil. All rights reserved
    </div>
</footer>
