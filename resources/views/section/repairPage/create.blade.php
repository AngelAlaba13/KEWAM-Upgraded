<x-navigationBar>
</x-navigationBar>


<div class="flex flex-col w-full">

    <div class="md:ml-24 pt-4 pb-4 border-b border-gray-300">
        <div class=" flex w-full items-center justify-start h-7">
            <div class="hidden md:flex">
                <a href="{{ route(('section.repair'))}}">
                    <button class=" flex bg-slate-900 px-4 py-2 text-white rounded-md" style="font-size: 10px;">
                        <img src="{{ asset('imgs/back.png')}}" alt="back to items" class=" w-4 mr-2">
                        BACK</button>
                </a>
            </div>

            <div class=" ml-20 md:ml-12 text-xl text-gray-500">
                Add Service
            </div>

        </div>

    </div>

    <div class="ml-5 mr-5 pl-12 pr-12 mb-7 pb-9 pt-8 md:ml-28 md:mr-14 mt-10 bg-zinc-200 rounded-xl overflow-hidden shadow-lg block  border-b-2 border-r-2 border-slate-400">

        <div class="flex center justify-center mb-10">
            <p class=" text-gray-500 text-3xl font-medium">ADD SERVICE</p>
        </div>
        <form action="{{ route('repairPage.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col md:flex-row justify-between mb-3">
                <div class="flex flex-col mb-5 md:mb-3">
                    <label> Client Name</label>
                    <input type="text" name="name" class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mr-72 mb-5">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        <span class=" text-dan"></span>
                    @enderror


                    <label>Contact No</label>
                    <input type="text" name="contactNo" class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mb-5">
                    @error('contactNo')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror


                    <label>Address</label>
                    <input type="text" name="address" class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mb-5">
                    @error('address')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror

                    <label>Price</label>
                    <input type="number" name="price" min="0" step="0.01" value="0" class="w-40 px-3 py-1 border border-gray-400 rounded-md mt-1 remove-spinner mb-5">
                    @error('price')
                    <br><span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror

                    <label>Status</label>
                    <select name="status"class=" px-3 py-1 border border-gray-400 rounded-md mt-1 remove-spinner mb-5">
                        <option value="">-- Select a Status --</option>
                        <option value="inprocess">Incomplete</option>
                        <option value="complete">Complete</option>
                    </select>

                </div>

                <div class=" start md:ml-28">
                    <label class="">Service</label>
                    <input type="text" name="service" class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mr-64 mb-5">
                    @error('service')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        <span class=" text-dan"></span>
                    @enderror

                    <div>
                        <label class="">Service Description</label>
                        <textarea name="serviceDescription" rows="5" cols="40" style="resize: none;" placeholder="Type a short description" class=" rounded-md mt-1 mb-5"></textarea>
                    </div>

                    <label>Service Provider</label>
                    <input type="text" name="serviceProvider" class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mb-5">
                    @error('serviceProvider')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>



    <style>
        /* Remove spinner for price input only */
        input.remove-spinner::-webkit-outer-spin-button,
        input.remove-spinner::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        input.remove-spinner {
        -moz-appearance: textfield;
        }
    </style>

            <div class="flex center justify-end ">
                <div>
                    <button type="submit" class=" bg-green-600 px-4 py-2 text-white font-semibold rounded-md mr-3 shadow-sm shadow-slate-500" style="font-size: 10px;">ADD SERVICE</button>
                </div>

                <div>
                    <button type="button" onclick="window.location.href='{{ route('section.repair') }}'" class=" bg-slate-500 px-4 py-2 text-white rounded-md mr-3 shadow-sm shadow-slate-500 font-semibold " style="font-size: 10px;">
                        BACK
                    </button>


                </div>
            </div>


        </form>
    </div>
</div>




