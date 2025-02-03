<nav class="navbar pt-5 bg-gradient-to-b from-[#2a2a2a]/100 to-transparent relative w-full top-0">    
    <div class="container max-w-screen-2xl mx-auto">
        <div class="flex justify-between items-center z-50">
            <a href="/" class="items-center text-white hidden md:flex">
                <img src="{{ asset('assets/logo/logo-utensil.png') }}" alt="Logo" class="h-16" style="width: auto; height:75px;"> 
            </a>
            <a href="/" class="items-center text-white md:hidden flex">
                <img src="{{ asset('assets/logo/logo-utensil-image.png') }}" alt="Logo" class="h-16" style="width: auto; height:45px;"> 
            </a>
            
        </div>
        <div class="lg:hidden flex justify-end">
            <div class="burger-menu flex flex-col cursor-pointer z-50" id="burgerBtn">
                <div class="line1 w-10 h-1 bg-white my-1"></div>
                <div class="line2 w-10 h-1 bg-white my-1"></div>
                <div class="line3 w-10 h-1 bg-white my-1"></div>
            </div>
        </div>
        <div class="hidden md:flex mt-12 space-x-12" id="nav-menu">
            <a href="/about" class="text-white px-4 hover:text-yellow-400 transition">About Us</a>
            <a href="/product" class="text-white px-4 hover:text-yellow-400 transition">Our Product</a>
            <a href="/promotion" class="text-white px-4 hover:text-yellow-400 transition">Promotional Product</a>
            <a href="/contact" class="text-white px-4 hover:text-yellow-400 transition">Contact Us</a>
            <a href="https://wa.me/628111808303" class="text-white hover:text-yellow-400 transition" style="margin-left: 180px">+62-811-180-8303</a>
        </div>
    </div>
    <div class="menu-popup fixed inset-0 bg-black bg-opacity-80 z-10 hidden justify-center items-center pt-24" id="menuPopup">
        <div class="menu-content">
            <ul class="list-menu list-none text-center to-zinc-800">
                <li class="nav-link">
                    <a href="/about" class="text-white text-lg md:text-xl lg:text-2xl font-bold hover:text-red-600">About Us</a>
                </li>
                <li class="nav-link">
                    <a href="/product" class="text-white text-lg md:text-xl lg:text-2xl font-bold hover:text-red-600">Our Product</a>
                </li>
                <li class="nav-link">
                    <a href="/promotion" class="text-white text-lg md:text-xl lg:text-2xl font-bold hover:text-red-600">Promotional Product</a>
                </li>
                <li class="nav-link">
                    <a href="/contact" class="text-white text-lg md:text-xl lg:text-2xl font-bold hover:text-red-600">Contact Us</a>
                </li>
                <li class="nav-link">
                    <a href="https://wa.me/628111808303" class="text-white text-lg md:text-xl lg:text-2xl font-bold hover:text-red-600">+62-811-180-8303</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.getElementById('burgerBtn').addEventListener('click', function() {
        const menuPopup = document.getElementById('menuPopup');
        const burgerMenu = document.getElementById('burgerBtn');
        if (menuPopup.classList.contains('show')) {
            menuPopup.classList.remove('show');
            menuPopup.classList.add('hide');
            burgerMenu.classList.remove('open');
            burgerMenu.classList.add('close');
            setTimeout(() => {
                menuPopup.classList.add('hidden');
                menuPopup.classList.remove('hide');
                burgerMenu.classList.remove('close');
            }, 400);
        } else {
            menuPopup.classList.remove('hidden');
            menuPopup.classList.add('show');
            burgerMenu.classList.add('open');
        }
        if (menuPopup.classList.contains('show')) { 
            document.body.style.overflow = 'hidden';
        } else {    
            document.body.style.overflow = 'auto';
        }
    });
</script>

<style>
    .menu-popup.show {
        display: flex;
        animation: slideIn 0.5s forwards;
    }
    .menu-popup.hide {
        display: flex;
        animation: slideOut 0 .5s forwards;
    }
    @keyframes slideIn {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(0);
        }
    }
    @keyframes slideOut {
        from {
            transform: translateX(0);
        }
        to {
            transform: translateX(100%);
        }
    }
    .burger-menu {
        transition: transform 0.5s ease;
    }
    .burger-menu.open .line1 {
        transform: rotate(42deg) translate(4px, 4px);
        transition: transform 0.5s ease, opacity 0.5s ease;
    }
    .burger-menu.open .line3 {
        opacity: 0;
    }
    .burger-menu.open .line2 {
        transform: rotate(-42deg) translate(4px, -4px);
        transition: transform 0.5s ease, opacity 0.5s ease;
    }
    .burger-menu.close .line1,
    .burger-menu.close .line2 {
        transform: rotate(0) translate(0, 0);
        transition: transform 0.5s ease, opacity 0.5s ease;
    }
    .burger-menu.close .line3 {
        opacity: 1;
    }
    @media (max-width: 768px) {
        .burger-menu {
            transform: scale(0.8);
        }
    }
</style>