<x-navigationBar></x-navigationBar>
<div class="bg-gradient-to-r from-[#9e3636] to-[#821111]  min-h-screen w-full">

    <div
        class="absolute w-[220px] h-[180px] 
         bg-[#ff6a6a] 
         rounded-full blur-[95px] z-[1] animate-pulse
         top-[3%] left-[10%] translate-x-[-100%] translate-y-[10%]">
    </div>

    <div
        class="absolute w-[220px] h-[180px] 
         bg-[rgb(255,143,143)] 
         rounded-full blur-[95px] z-[1] animate-pulse
         top-[3%] left-[10%] translate-x-[-100%] translate-y-[10%]">
    </div>

    <div
        class="absolute w-[420px] h-[380px] 
     bg-[#ff4949] 
     rounded-full blur-[230px] z-[1] animate-bounce
     top-[3%] left-[60%] translate-x-[-100%] translate-y-[10%]">
    </div>

    <div
        class="absolute w-[320px] h-[280px] 
     bg-[hsl(0,100%,75%)] 
     rounded-full blur-[100px] z-[1] animate-bounce
     top-[3%] left-[60%] translate-x-[-100%] translate-y-[10%]">
    </div>

    <div
        class="absolute w-[620px] h-[480px] 
        bg-[rgb(239,62,62)] 
        rounded-full blur-[170px] z-[1]
        top-[0%] left-[60%] translate-x-[-100%] translate-y-[10%]">
    </div>

    <div
        class="absolute w-[620px] h-[480px] 
        bg-[rgb(255,119,119)] 
        rounded-full blur-[80px] z-[1]
        top-[30%] left-[60%] translate-x-[-100%] translate-y-[10%]">
    </div>

    <div
        class="absolute w-[420px] h-[380px] 
         bg-[hsl(0,100%,63%)] 
         rounded-full blur-[175px] z-[1] animate-pulse
         top-[0%] left-[85%] translate-x-[-100%] translate-y-[10%]">
    </div>

    <div
        class="absolute w-[420px] h-[380px] 
         bg-[hsl(0,100%,73%)] 
         rounded-full blur-[205px] z-[1] animate-pulse
         top-[60%] left-[35%] translate-x-[-100%] translate-y-[10%]">
    </div>

    <div
        class="absolute w-[420px] h-[380px] 
         bg-[rgb(255,69,69)] 
         rounded-full blur-[270px] z-[1] animate-pulse
         top-[60%] left-[65%] translate-x-[-100%] translate-y-[10%]">
    </div>

    <div
        class="absolute w-[320px] h-[280px] 
         bg-[rgb(255,37,37)] 
         rounded-full blur-[100px] z-[1] animate-pulse
         top-[80%] left-[95%] translate-x-[-100%] translate-y-[10%]">
    </div>


    <div class="flex flex-col w-full p-6 z-50">
        <h1 class="text-2xl font-semibold text-white mb-16 ml-24">Sell Item</h1>

        <!-- Display status messages -->
        @if (session('status'))
            <div
                class=" bg-green-200 text-green-900 rounded-md p-4 fixed top-16 left-1/2 transform -translate-x-1/2 z-50 opacity-100 pointer-events-auto transition-opacity duration-300 status-message">
                {{ session('status') }}
            </div>
        @endif


        <!-- Display No Items Available -->
        @if ($categories->count() == 0)
            <p>No items available.</p>
        @else
            <div class="grid grid-cols-4 gap-12 ml-[150px] mr-[125px] z-50">
                @foreach ($categories as $category)
                    <div class="bg-gradient-to-b from-white to-red-200 rounded-xl shadow-md p-4 w-[290px]">


                        <!-- Item Image -->
                        <div class=" w-full h-[140px] bg-white mb-3">
                            <img src="{{ asset($category->image_path ?? 'category.png') }}" alt="{{ $category->name }}"
                                class="w-full h-full object-contain rounded-md border-2 border-gray-300">
                        </div>

                        <!-- Item Info -->
                        <h2 class="text-lg font-semibold text-gray-800 underline pb-1">{{ $category->name }}</h2>
                        <p class="text-xs text-gray-500">Category: {{ $category->category }}</p>
                        <p class="text-sm font-semibold text-gray-700 mt-5">Price:
                            ₱{{ number_format($category->price, 2) }}</p>
                        <p class="text-xs text-gray-500 mt-1">Available Stock: {{ $category->quantity }}</p>

                        <!-- Quantity Control -->
                        <div class="flex items-center justify-center my-4 mt-7">
                            <button class="bg-red-500 text-white px-3 rounded-md text-xl border-[0.5px] border-gray-400"
                                data-id="{{ $category->id }}" data-action="decrease">-</button>
                            <input id="quantity-{{ $category->id }}" type="number" value="1" min="1"
                                max="{{ $category->quantity }}"
                                class="w-16 mx-4 text-center border border-gray-300 rounded-md" readonly>
                            <button class="bg-red-500 text-white px-3 rounded-md text-xl border-[0.5px] border-gray-400"
                                data-id="{{ $category->id }}" data-action="increase">+</button>
                        </div>

                        <!-- Sell Button -->
                        <form action="{{ route('itemsPage.sell.submit', $category->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" id="hidden-quantity-{{ $category->id }}"
                                value="1">
                            <button type="submit"
                                class="bg-green-600 px-4 py-2 text-white text-sm font-bold rounded-md text-center w-full block">
                                Sell Item
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const increaseButtons = document.querySelectorAll('button[data-action="increase"]');
            const decreaseButtons = document.querySelectorAll('button[data-action="decrease"]');

            increaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = document.getElementById('quantity-' + button.dataset.id);
                    let quantity = parseInt(input.value);
                    const max = parseInt(input.getAttribute('max'));

                    if (quantity < max) {
                        quantity++;
                        input.value = quantity;
                        document.getElementById('hidden-quantity-' + button.dataset.id).value =
                            quantity;
                    }
                });
            });

            decreaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = document.getElementById('quantity-' + button.dataset.id);
                    let quantity = parseInt(input.value);

                    if (quantity > 1) {
                        quantity--;
                        input.value = quantity;
                        document.getElementById('hidden-quantity-' + button.dataset.id).value =
                            quantity;
                    }
                });
            });

            // Auto-hide session status after 3 seconds
            const statusMessage = document.querySelector('.status-message');
            if (statusMessage) {
                setTimeout(function() {
                    statusMessage.classList.remove('opacity-100');
                    statusMessage.classList.add('opacity-0');
                }, 3000);
            }
        });
    </script>

</div>
