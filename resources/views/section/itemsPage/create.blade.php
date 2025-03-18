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

    <div class="flex flex-row h-screen w-screen z-50">
        <div class="relative h-screen w-[50%] z-50">
            <div class="flex justify-start text-start mt-72 ml-[180px] font-bold text-white text-6xl tracking-wider ">
                KEWAM Computer and Services Shop
            </div>


            <div
                class="flex justify-start text-start ml-[180px] mt-7 font-bold font-mono text-white text-2xl tracking-wider">
                <span class="mr-3">New </span>
                <span x-data="{
                    words: ['Laptop', 'PC Parts', 'Computer', 'Item', 'Cellphone', 'Girlfriend?'],
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

        <div class="flex flex-col w-[50%] z-50">



            <div
                class="flex flex-col items-center justify-center border-[1px] bg-white bg-opacity-10 border-white/50 m-28 mt-[80px] mb-10 p-24 pt-10 pb-10 rounded-[35px]">
                <p class=" text-white text-xl font-medium">Add Item</p>
                <form action="{{ route('itemsPage.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-col mt-8">
                        <label class="text-white">Name</label>
                        <input type="text" name="name"
                            class="w-[415px] px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-2">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                            <span class=" text-dan"></span>
                        @enderror
                    </div>




                    <div class="flex flex-col mt-5">
                        <label class="text-white">Category</label>
                        <input type="text" name="category"
                            class=" w-[415px] px-4 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-1 focus:ring-black focus:border-black mt-2">
                        @error('category')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="flex flex-col md:flex-row md:justify-start mt-5">
                        <div>
                            <label class="text-white ">Quantity</label>
                            <input type="number" name="quantity" min="1" max="9999" step="1"
                                value="1"
                                class=" w-[120px] px-3 py-1 border border-gray-400 rounded-md mt-2 mr-10 ml-1 ">
                            @error('quantity')
                                <br><span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="text-white">Price</label>
                            <input type="number" name="price" min="0" step="0.01" value="0"
                                class="w-[210px] px-3 py-1 border border-gray-400 rounded-md mt-2 ml-1 remove-spinner">
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

                    <div class="flex flex-col mt-6">
                        <label class="text-white ">Upload Product Image</label>
                        <input type="file" id="productImage" name="image" accept=".jpeg, .jpg, .png"
                            class=" md:w-[415px] px-3 py-2 border bg-white bg-opacity-20 border-gray-400 text-white rounded-md mt-3">
                    </div>


                    <div class="flex center justify-end mt-14">
                        <div>
                            <button type="submit"
                                class=" bg-green-600 shadow-inner px-4 py-2 text-white rounded-md mr-3 shadow-white font-bold "
                                style="font-size: 12px;">ADD ITEM</button>
                        </div>

                        <div>
                            <button type="button" onclick="window.location.href='{{ route('section.items') }}'"
                                class=" bg-white px-4 py-2 text-black rounded-md mr-3 shadow-sm shadow-slate-500 font-bold "
                                style="font-size: 12px;">
                                BACK
                            </button>


                        </div>
                    </div>


                </form>
            </div>


        </div>

    </div>




</div>
