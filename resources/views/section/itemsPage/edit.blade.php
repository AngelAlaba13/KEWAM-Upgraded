<x-navigationBar></x-navigationBar>
<div class="bg-gradient-to-r from-[rgb(201,67,67)] to-[#821111]  min-h-screen w-screen">
    <div
        class="absolute w-[420px] h-[380px] 
            bg-[#ff5f5f] 
            rounded-full blur-[200px] z-[1] animate-pulse
            top-[70%] left-[10%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[420px] h-[380px] 
            bg-[rgb(255,157,157)] 
            rounded-full blur-[200px] z-[1] animate-pulse
            top-[70%] left-[80%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[320px] h-[280px] 
            bg-[rgb(255,159,159)] 
            rounded-full blur-[150px] z-[1] animate-pulse
            top-[50%] left-[40%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[120px] h-[80px] 
            bg-[hsl(0,100%,86%)] 
            rounded-full blur-[100px] z-[1] animate-pulse
            top-[50%] left-[40%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[420px] h-[380px] 
            bg-[rgb(255,57,57)] 
            rounded-full blur-[150px] z-[1]
            top-[0%] left-[85%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[320px] h-[280px] 
            bg-[hsl(0,100%,82%)] 
            rounded-full blur-[150px] z-[1]
            top-[0%] left-[85%] translate-x-[-50%] translate-y-[-50%]">
    </div>


    <div class="flex flex-col w-full z-50">

        <div class="md:ml-[64px] pt-4 pb-4 z-50">
            <div class=" flex w-full items-center justify-between h-7 ">
                <div class="flex justify-start">



                </div>



                <form action="{{ route('itemsPage.destroy', $itemsPage->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class=" bg-red-600 px-5 py-2 text-white rounded-md mr-7 font-bold shadow-inner shadow-white"
                        style="font-size: 11px;">DELETE</button>
                </form>

            </div>

        </div>

        <div
            class="pl-12 pr-12 mb-7 pb-9 pt-8 md:ml-32 mr-[70px] mt-8 bg-white bg-opacity-80 rounded-[30px] overflow-hidden block  border-[0.5px] border-opacity-60 border-white  z-50">

            <div class="flex center justify-center mb-12">
                <p class=" text-black text-3xl font-medium">EDIT ITEM</p>
            </div>

            <form action="{{ route('itemsPage.update', $itemsPage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-row mb-10 mt-12  z-50">
                    <div class="flex flex-col w-[450px] justify-start mb-3 ml-10  z-50">
                        <div class="flex flex-col mb-10">
                            <label class="text-black">Name</label>
                            <input type="text" name="name"
                                class="w-[395px] px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-2 mr-20"
                                value="{{ $itemsPage->name }}">
                            @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class=" flex flex-col mb-10">
                            <label class="text-black">Category</label>
                            <input type="text" name="category"
                                class="w-[395px] px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-2"
                                value="{{ $itemsPage->category }}">
                            @error('category')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col md:flex-row md:justify-start mb-3">
                            <div>
                                <label class="text-black">Quantity</label>
                                <input type="number" name="quantity" min="1" max="9999" step="1"
                                    value="{{ $itemsPage->quantity }}"
                                    class=" w-16 px-3 py-1 border border-gray-400 rounded-md mt-2 mr-14 ml-1 mb-5">
                                @error('quantity')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="text-black">Price</label>
                                <input type="number" name="price" min="0" step="0.01"
                                    value="{{ $itemsPage->price }}"
                                    class="w-40 px-3 py-1 border border-gray-400 rounded-md mt-2 ml-1 remove-spinner mb-5">
                                @error('price')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
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

                    </div>

                    <div class="">
                        <label class="flex mb-3 text-black">Uploaded Product Image</label>
                        <!-- Display current image if available -->
                        <div class="overflow-hidden rounded-xl">
                            @if ($itemsPage->image_path)
                                <img src='{{ asset($itemsPage->image_path) }}' alt="Current Image" class=" w-80"
                                    width="100" class="w-full h-auto object-cover rounded-lg shadow-lg">
                            @endif
                        </div>
                    </div>
                </div>



                <div class="flex center justify-end">
                    <div>
                        <button type="submit"
                            class=" bg-green-600 px-4 py-2 text-white rounded-md mr-2 font-bold shadow-sm shadow-slate-500"
                            style="font-size: 11px;">UPDATE ITEM</button>
                    </div>


                    <div>
                        <button type="button" onclick="window.location.href='{{ route('section.items') }}'"
                            class="bg-white px-4 py-2 text-black rounded-md mr-1 font-bold shadow-sm shadow-slate-500"
                            style="font-size: 11px;">
                            BACK
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
