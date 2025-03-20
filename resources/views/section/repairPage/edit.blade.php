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

    <div class="flex flex-col w-full">

        <div class="md:ml-24 pt-4 pb-4 z-50">
            <div class=" flex w-full items-center justify-between h-7">
                <div class="flex justify-start">
                </div>

                @if ($repairPage)
                    <form action="{{ route('repairPage.destroy', $repairPage->id) }}" method="POST"
                        style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 px-5 py-2 text-white rounded-md mr-7 font-bold shadow-inner shadow-white"
                            style="font-size: 11px;">DELETE</button>
                    </form>
                @else
                    <p>Repair page not found. Repair Page: {{ var_dump($repairPage) }}</p>
                @endif

            </div>

        </div>

        <div
            class="ml-5 mr-5 pl-12 pr-12 mb-7 pb-9 pt-8 md:ml-[130px] md:mr-[70px] mt-6 bg-white bg-opacity-80  rounded-[30px] overflow-hidden shadow-lg block  border-b-2 border-r-2 border-slate-400 z-50">

            <div class="flex center justify-center mb-10">
                <p class=" text-black text-3xl font-medium">EDIT SERVICE</p>
            </div>

            <form action="{{ route('repairPage.update', $repairPage->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col md:flex-row justify-between mb-3 z-50">
                    <div class="flex flex-col mb-5 md:mb-3 z-50">
                        <label> Client Name</label>
                        <input type="text" name="clientName" value="{{ $repairPage->clientName }}"
                            class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mr-72 mb-5">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            <span class=" text-dan"></span>
                        @enderror


                        <label>Contact No</label>
                        <input type="text" name="contactNo" value="{{ $repairPage->contactNo }}"
                            class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mb-5">
                        @error('contactNo')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror


                        <label>Address</label>
                        <input type="text" name="address" value="{{ $repairPage->address }}"
                            class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mb-5">
                        @error('address')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <label>Price</label>
                        <input type="number" name="price" min="0" step="0.01"
                            value="{{ $repairPage->price }}"
                            class="w-40 px-3 py-1 border border-gray-400 rounded-md mt-1 remove-spinner mb-5">
                        @error('price')
                            <br><span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                        <label>Status</label>
                        <select name="status"
                            class="px-3 py-1 border border-gray-400 rounded-md mt-1 remove-spinner mb-5">
                            <option value="">-- Select a Status --</option>
                            <option value="Incomplete" @selected($repairPage->status === 'Incomplete')>Incomplete</option>
                            <option value="Complete" @selected($repairPage->status === 'Complete')>Complete</option>
                        </select>


                    </div>

                    <div class=" start md:ml-28 z-50">
                        <label class="">Service</label>
                        <input type="text" name="service" value="{{ $repairPage->service }}"
                            class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mr-64 mb-5">
                        @error('service')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            <span class=" text-dan"></span>
                        @enderror

                        <div class="flex flex-col">
                            <label class="">Service Description</label>
                            <textarea name="serviceDescription" rows="5" cols="40" style="resize: none;"
                                placeholder="Type a short description" class="rounded-md mt-1 mb-5">{{ old('serviceDescription', $repairPage->serviceDescription) }}</textarea>

                        </div>

                        <label>Service Provider</label>
                        <input type="text" name="serviceProvider" value="{{ $repairPage->serviceProvider }}"
                            class="w-full px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mb-5">
                        @error('serviceProvider')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div class="flex center justify-end z-50">
                    <div>
                        <button type="submit"
                            class=" bg-green-600 px-4 py-2 text-white rounded-md mr-1 font-bold shadow-sm shadow-slate-500"
                            style="font-size: 11px;">UPDATE ITEM</button>
                    </div>


                    <div>
                        <button type="button" onclick="window.location.href='{{ route('section.repair') }}'"
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
