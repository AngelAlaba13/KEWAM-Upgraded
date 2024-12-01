<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Navigation Bar</title>

    <script>
        function toggleNav() {
            const nav = document.getElementById('nav-menu');
            nav.classList.toggle('hidden');
        }

        window.onclick = function(event) {
            const nav = document.getElementById('nav-menu');
            const button = document.getElementById('menu-button');

            if (!button.contains(event.target) && !nav.contains(event.target)) {
                nav.classList.add('hidden');
            }
        };
    </script>


</head>
<body class="bg-stone-50">
    <div class="flex justify-start relative">
        {{-- medium size screens --}}
        <button id="menu-button" class=" md:hidden mb-4 fixed top-1 left-1 p-2 z-50 " onclick="toggleNav()">
            <img src="{{asset('imgs/menu.png')}}" alt="Menu" title="Menu" class=" ml-1">
            <p class="text-xs mb-20 group-hover:text-orange-700 group-active:text-green-700 group-hover:font-bold transition-colors duration-100">MENU</p>
        </button>

    </div>


    <div id="nav-menu"  class="fixed left-0 top-16 hidden bg-slate-900 shadow-lg p-4 z-20 text-slate-50 md:fixed md:top-0 md:left-0 md:flex flex-col items-center md:bg-slate-900 md:h-screen w-16 drop-shadow-md md:z-10">

            <img src="{{asset('imgs/logo.jpg')}}" class="mt-5 mb-11 mx-auto">



        <a href="{{route('section.home')}}" class="flex flex-col items-center mt-5 group">
            <img src="{{asset('imgs/home.png')}}" alt="Home" title="Home" class="mb-1 w-5 h-5">
            <p class="text-xs mb-14 group-hover:text-orange-700 group-active:text-green-700 group-hover:font-bold transition-colors duration-100">Home</p>
        </a>

        <a href="{{route('section.items')}}" class="flex flex-col items-center group">
            <img src="{{asset('imgs/products.png')}}" alt="Items" title="Items"  class="mb-1 w-5 h-5">
            <p class="text-xs mb-14 group-hover:text-orange-700 group-active:text-green-700 group-hover:font-bold transition-colors duration-100">Items</p>
        </a>

        <a href="{{route('section.repair')}}" class="flex flex-col items-center group">
            <img src="{{asset('imgs/repair.png')}}" alt="Items" title="Repair Services" class="mb-1 w-5 h-5">
            <p class="text-xs mb-10 text-center group-hover:text-orange-700 group-active:text-green-700 group-hover:font-bold transition-colors duration-100">Services</p>
        </a>

    </div>


</body>
</html>
