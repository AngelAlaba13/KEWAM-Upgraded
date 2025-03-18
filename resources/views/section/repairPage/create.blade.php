<x-navigationBar>
</x-navigationBar>
<div class="bg-gradient-to-b from-[hsl(0,59%,43%)] to-[#5c0a0a]  min-h-screen w-screen">
    <div
        class="absolute w-[420px] h-[380px] 
         bg-[rgb(255,101,101)] 
         rounded-full blur-[260px] z-[1] animate-bounce
         top-[2%] left-[0%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[320px] h-[280px] 
         bg-[hsl(0,100%,64%)] 
         rounded-full blur-[70px] z-[1] animate-pulse
         top-[2%] left-[5%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[320px] h-[280px] 
     bg-[hsl(0,100%,64%)] 
     rounded-full blur-[280px] z-[1] animate-pulse
     top-[70%] left-[5%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[420px] h-[380px] 
         bg-[hsl(0,100%,63%)] 
         rounded-full blur-[320px] z-[1] 
         top-[72%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[220px] h-[180px] 
     bg-[rgb(254,110,110)] 
     rounded-full blur-[110px] z-[1] animate-pulse
     top-[80%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[320px] h-[290px] 
     bg-[hsl(0,100%,63%)] 
     rounded-full blur-[80px] z-[1] animate-pulse
     top-[20%] left-[89%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[220px] h-[190px] 
 bg-[hsl(0,100%,74%)] 
 rounded-full blur-[60px] z-[1] animate-pulse
 top-[20%] left-[89%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[120px] h-[80px] 
         bg-[#ff4646] 
         rounded-full blur-[110px] z-[1] 
         top-[82%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
    </div>



    <div class="flex flex-col w-full">



        <div class="flex flex-row h-screen w-screen z-50 ">
            <div class="relative h-screen w-[40%] z-50">
                <div
                    class="flex justify-start text-start mt-64 ml-[150px] font-bold text-white text-5xl tracking-wider ">
                    KEWAM Computer and Services Shop
                </div>


                <div
                    class="flex justify-start text-start ml-[150px] mt-7 font-bold font-mono text-white text-xl tracking-wider">

                    <span x-data="{
                        words: ['Laptop Repair', 'PC Installation', 'Piso Wifi Installation', 'New Purchase', 'Laptop Cleaning', 'Upgrading', 'Reformatting'],
                        text: '',
                        index: 0,
                        charIndex: 0,
                        deleting: false,
                        speed: 100,
                        init() {
                            this.loop();
                        },
                        loop() {
                            setInterval(() => {
                                let currentWord = this.words[this.index];
                    
                                if (!this.deleting && this.charIndex < currentWord.length) {
                                    this.text += currentWord[this.charIndex];
                                    this.charIndex++;
                                } else if (this.deleting && this.charIndex > 0) {
                                    this.text = this.text.slice(0, -1);
                                    this.charIndex--;
                                }
                    
                                if (this.charIndex === currentWord.length && !this.deleting) {
                                    setTimeout(() => this.deleting = true, 2000); // Pause before deleting
                                } else if (this.charIndex === 0 && this.deleting) {
                                    this.deleting = false;
                                    this.index = (this.index + 1) % this.words.length; // Cycle through words
                                }
                            }, this.speed);
                        }
                    }" x-text="text">
                    </span>
                    <span class="animate-ping">|</span>
                </div>
            </div>

            <div class="flex flex-col w-[60%] z-50 ">
                <div
                    class="flex flex-col items-center justify-center border-[1px] bg-white bg-opacity-10 border-white/50 m-20 mt-[35px] mb-10 pt-8 rounded-[35px]">
                    <div>

                        <div class="flex center justify-center pb-7">
                            <p class=" text-white text-lg font-medium">ADD SERVICE</p>
                        </div>
                        <form action="{{ route('repairPage.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="flex flex-col w-[41rem]">

                                <div class="flex flex-row justify-between ">
                                    <div class="flex flex-col">
                                        <label class="text-white"> Client Name</label>
                                        <input type="text" name="clientName"
                                            class="w-[340px] px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black">
                                        @error('name')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                            <span class=" text-dan"></span>
                                        @enderror
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="text-white">Contact No</label>
                                        <input type="text" name="contactNo"
                                            class="w-[270px] px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1  mb-5">
                                        @error('contactNo')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex flex-row justify-between">
                                    <div class="flex flex-col">
                                        <label class="text-white">Address</label>
                                        <input type="text" name="address"
                                            class="w-[340px] px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1  mb-5">
                                        @error('address')
                                            <span class="text-red-500 text-xs ">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="flex flex-col ">
                                        <label class="text-white">Price</label>
                                        <input type="number" name="price" min="0" step="0.01"
                                            value="0"
                                            class="w-[270px] px-3 py-1 border border-gray-400 rounded-md remove-spinner mt-1 mb-5">
                                        @error('price')
                                            <br><span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex flex-row justify-between">
                                    <div class="flex flex-col">
                                        <label class="text-white">Service</label>
                                        <input type="text" name="service"
                                            class="w-[340px] px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mb-5">
                                        @error('service')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                            <span class=" text-dan"></span>
                                        @enderror
                                    </div>

                                    <div class="flex flex-col">
                                        <label class="text-white">Service Provider</label>
                                        <input type="text" name="serviceProvider"
                                            class="w-[270px] px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-1 mb-5">
                                        @error('serviceProvider')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label class="text-white">Service Description</label>
                                    <textarea name="serviceDescription" rows="5" cols="40" style="resize: none;"
                                        placeholder="Type a short description" class=" rounded-md mt-1 mb-5"></textarea>
                                </div>

                                <label class="text-white">Status</label>
                                <select
                                    name="status"class="w-[200px] px-3 py-1 border border-gray-400 rounded-md mt-1 remove-spinner mb-5">
                                    <option value="">-- Select a Status --</option>
                                    <option value="Incomplete">Incomplete</option>
                                    <option value="Complete">Complete</option>
                                </select>

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

                            <div class="flex center justify-end mt-4 mb-10">
                                <div>
                                    <button type="submit"
                                        class=" bg-green-600 px-4 py-2 text-white font-semibold rounded-md mr-3 shadow-sm shadow-slate-500"
                                        style="font-size: 10px;">ADD SERVICE</button>
                                </div>

                                <div>
                                    <button type="button"
                                        onclick="window.location.href='{{ route('section.repair') }}'"
                                        class=" bg-slate-500 px-4 py-2 text-white rounded-md mr-3 shadow-sm shadow-slate-500 font-semibold "
                                        style="font-size: 10px;">
                                        BACK
                                    </button>


                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
