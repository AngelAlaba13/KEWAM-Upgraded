<x-navigationBar></x-navigationBar>
<div class="flex flex-row">

    <!-- Main Card Container -->
    <a href="{{ route('section.reportPage.itemsReport') }}">
        <div
            class="flex flex-col bg-slate-500 bg-opacity-15 items-center justify-center ml-24 mt-7 w-52 rounded-xl shadow-lg border-gray-400 border-r-2 border-b-4">

            <!-- Image Section -->
            <img src="{{ asset('imgs/itemsrep.png') }}" class=" mt-8 mb-10 w-24 rounded-full border-4 border-green-500"
                alt="Items Report">

            <!-- Title Section (Green Bar) -->
            <div class="bg-green-500 w-full h-16 flex items-center justify-center rounded-b-xl shadow-md">
                <p class="text-white font-bold text-xl">ITEMS</p>
            </div>
        </div>
    </a>


    <!-- Main Card Container -->
    <a href="">
        <div
            class="flex flex-col bg-slate-500 bg-opacity-15 items-center justify-center ml-5 mt-7 w-52 rounded-xl shadow-lg border-gray-400 border-r-2 border-b-4">

            <!-- Image Section -->
            <img src="{{ asset('imgs/servicesrep (1).png') }}"
                class=" mt-8 mb-10 w-24 rounded-full border-4 border-green-500" alt="Items Report">

            <!-- Title Section (Green Bar) -->
            <div class="bg-green-500 w-full h-16 flex items-center justify-center rounded-b-xl shadow-md">
                <p class="text-white font-bold text-xl">SERVICES</p>
            </div>
        </div>
    </a>
</div>
