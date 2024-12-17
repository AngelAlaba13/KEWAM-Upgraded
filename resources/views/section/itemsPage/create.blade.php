<x-navigationBar>
</x-navigationBar>


<div class="flex flex-col w-full">

    <div class="md:ml-24 pt-4 pb-4 border-b border-gray-300">
        <div class=" flex w-full items-center justify-start h-7">
            <div class="hidden md:flex">
                <a href="{{ route(('section.items'))}}">
                    <button class=" flex bg-slate-900 px-4 py-2 text-white rounded-md" style="font-size: 10px;">
                        <img src="{{ asset('imgs/back.png')}}" alt="back to items" class=" w-4 mr-2">
                        BACK</button>
                </a>
            </div>

            <div class=" ml-20 md:ml-12 text-xl text-gray-500">
                Add Item
            </div>

        </div>

    </div>

    <div class="ml-5 mr-5 pl-12 pr-12 mb-7 pb-9 pt-8 md:ml-28 md:mr-14 mt-10 bg-zinc-200 rounded-xl overflow-hidden shadow-lg block  border-b-2 border-r-2 border-slate-400">

        <div class="flex center justify-center mb-10">
            <p class=" text-gray-500 text-3xl font-medium">ADD ITEM</p>
        </div>
        <form action="{{ route('itemsPage.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col md:flex-row justify-between mb-3">
                <div class=" mb-5 md:mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="w-96 px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-2">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                        <span class=" text-dan"></span>
                    @enderror
                </div>

                <div class="start ">
                    <label class=" md:ml-32">Upload Product Image</label>
                    <input type="file" id="productImage" name="image" accept=".jpeg, .jpg, .png"
                        class="mb-3 md:mb-0 md:w-72 px-3 py-2 border border-gray-400 rounded-md mt-2 md:ml-32">
                </div>
            </div>

            <div class="flex flex-col mb-5 md:mb-7">
                <label>Category</label>
                <input type="text" name="category" class=" w-96 px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-2">
                @error('category')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <div class="flex flex-col md:flex-row md:justify-start mb-3">
                <div>
                  <label>Quantity</label>
                  <input type="number" name="quantity" min="1" max="9999" step="1" value="1"
                         class=" w-16 px-3 py-1 border border-gray-400 rounded-md mt-2 mr-12 ml-1 mb-5">
                         @error('quantity')
                            <br><span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                </div>

                <div>
                  <label>Price</label>
                  <input type="number" name="price" min="0" step="0.01" value="0"
                         class="w-40 px-3 py-1 border border-gray-400 rounded-md mt-2 ml-1 remove-spinner mb-5">
                         @error('price')
                            <br><span class="text-red-500 text-xs">{{ $message }}</span>
                         @enderror
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

              </div>


            <div class="flex center justify-end ">
                <div>
                    <button type="submit" class=" bg-green-600 px-4 py-2 text-white rounded-md mr-3 shadow-sm shadow-slate-500 font-semibold " style="font-size: 10px;">ADD ITEM</button>
                </div>

                <div>
                    <button type="button" onclick="window.location.href='{{ route('section.items') }}'" class=" bg-slate-500 px-4 py-2 text-white rounded-md mr-3 shadow-sm shadow-slate-500 font-semibold " style="font-size: 10px;">
                        BACK
                    </button>


                </div>
            </div>


        </form>
    </div>
</div>




