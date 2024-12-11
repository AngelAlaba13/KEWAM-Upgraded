<x-navigationBar></x-navigationBar>

<div class="flex flex-col w-full p-6">
    <h1 class="text-2xl font-semibold text-gray-500 mb-5 ml-24">Sell Item</h1>

    <!-- Display status messages -->
    @if(session('status'))
        <div class=" bg-green-200 text-green-900 rounded-md p-4 fixed top-16 left-1/2 transform -translate-x-1/2 z-50 opacity-100 pointer-events-auto transition-opacity duration-300 status-message">
            {{ session('status') }}
        </div>
    @endif


    <!-- Display No Items Available -->
    @if($categories->count() == 0)
        <p>No items available.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12 ml-32 mr-16">
            @foreach ($categories as $category)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <!-- Item Image -->
                    <div class="w-full h-40 bg-gray-200 mb-4">
                        <img src="{{ asset($category->image_path ?? 'category.png') }}"
                             alt="{{ $category->name }}"
                             class="w-full h-full object-cover rounded-md">
                    </div>

                    <!-- Item Info -->
                    <h2 class="text-lg font-semibold text-gray-800">{{ $category->name }}</h2>
                    <p class="text-sm text-gray-500">Category: {{ $category->category }}</p>
                    <p class="text-md font-semibold text-gray-700 mt-2">Price: ₱{{ number_format($category->price, 2) }}</p>
                    <p class="text-md text-gray-500 mt-1">Available Stock: {{ $category->quantity }}</p>

                    <!-- Quantity Control -->
                    <div class="flex items-center justify-center my-4">
                        <button class="bg-gray-300 px-3 py-1 rounded-md text-xl" data-id="{{ $category->id }}" data-action="decrease">-</button>
                        <input id="quantity-{{ $category->id }}" type="number" value="1" min="1" max="{{ $category->quantity }}" class="w-16 mx-4 text-center border border-gray-300 rounded-md" readonly>
                        <button class="bg-gray-300 px-3 py-1 rounded-md text-xl" data-id="{{ $category->id }}" data-action="increase">+</button>
                    </div>

                    <!-- Sell Button -->
                    <form action="{{ route('itemsPage.sell.submit', $category->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="hidden-quantity-{{ $category->id }}" value="1">
                        <button type="submit" class="bg-green-600 px-4 py-2 text-white font-bold rounded-md text-center w-full block">
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
                document.getElementById('hidden-quantity-' + button.dataset.id).value = quantity;
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
                document.getElementById('hidden-quantity-' + button.dataset.id).value = quantity;
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
