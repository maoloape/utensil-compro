<div class="w-full hidden lg:inline">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 h-screen">
        @foreach($categories as $category)
            <a href="/product?category%5B%5D={{ str_replace(' ', '+', str_replace('&', '%26', $category->name)) }}" 
               class="col-span-{{ $category->col_span ?? 1 }} row-span-{{ $category->row_span ?? 1 }} text-decoration-none relative block overflow-hidden"
               style="background-image: url('{{ $category->image_url }}'); background-size: cover; background-position: center;">

                {{-- Menentukan div class berdasarkan class_type --}}
                @if($category->div_class == 1)
                    <div class="w-full h-full bg-gradient-to-b from-[#2a2a2a]/0 to-[#2a2a2a]/100 flex justify-start items-end p-4 transition-transform duration-100 scale-100 hover:scale-110">
                @elseif($category->div_class == 2)
                    <div class="absolute right-0 top-0 flex justify-start items-end h-full p-4" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                @elseif($category->div_class == 3)
                    <div class="absolute left-0 bottom-0 flex justify-start items-end p-4" style="writing-mode: vertical-rl; transform: rotate(180deg);">
                @endif

                    <div class="pl-4 flex flex-col">
                        {{-- Menentukan div garis berdasarkan garis_type --}}
                        @if($category->div_garis == 1)
                            <div class="h-[8rem] w-1 rounded-lg bg-[#009ac7]"></div> {{-- Garis vertikal --}}
                        @elseif($category->div_garis == 2)
                            <div class="h-1 w-[8rem] rounded-lg bg-[#009ac7] mb-2"></div> {{-- Garis horizontal --}}
                        @endif
                        
                        <p class="text-black text-[4.5rem] font-serif font-bold leading-none">{{ $category->name }}</p>
                    </div>

                </div>
            </a>
        @endforeach
    </div>
</div>
