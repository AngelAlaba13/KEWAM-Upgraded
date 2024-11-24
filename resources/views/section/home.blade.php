<x-navigationBar></x-navigationBar>

<div class="flex flex-col w-full">
    <div class="md:ml-16 pt-4 pb-4 border-b border-gray-300">
        <div class=" flex w-full items-center justify-between h-7">
                <div class="ml-2 md:ml-20 md:mr-28 text-xl sm:text-2xl text-gray-500">
                    Dashboard
                </div>
        </div>
    </div>


    <div class=" flex flex-col md:ml-16 w-full">
        <div class="text-md text-gray-600 font-medium mb-4 ml-40 mt-9">Inventory Summary</div>

        <div class="flex w-full pl-28 pr-44 justify-evenly">
            <div class=" bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm ">
                <img src="{{asset('imgs/item.png')}}" alt="Quantity" class="w-9 h-9 mb-5">
                <p class=" text-3xl font-bold">{{ $itemCount }}</p>
                <p class="text-gray-600 font-medium">Items</p>

            </div>

            <div class=" bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm">
                <img src="{{asset('imgs/category.png')}}" alt="Quantity" class="w-10 h-11 mb-5">
                <p class=" text-3xl font-bold">{{ $categoryCount }}</p>
                <p class="text-gray-600 font-medium mb-2">Categories</p>
            </div>


            <div class=" bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm">
                <img src="{{asset('imgs/quantity.png')}}" alt="Quantity" class="w-9 h-9 mb-6">
                <p class=" text-3xl font-bold">{{ $totalQuantity }}</p>
                <p class="text-gray-600 font-medium">Quantity</p>
            </div>


            <div class=" bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm">
                <img src="{{asset('imgs/value.png')}}" alt="Quantity" class="w-9 h-9 mb-6">
                <p class=" text-xl font-bold ">₱{{ $totalValue }}</p>
                <p class="text-gray-600 font-medium">Total Value</p>
            </div>
        </div>
    </div>


    <div class=" flex flex-col md:ml-16 w-full">
        <div class="text-md text-gray-600 font-medium mb-4 ml-40 mt-12">Recent Activities</div>

</div>

