<x-navigationBar></x-navigationBar>

<div class="flex flex-col w-full">
    <!-- Success Message -->
    @if(session('status'))
        <div id="success-message" class="p-4 fixed top-16 left-1/2 rounded-md transform -translate-x-1/2 z-50 opacity-0 pointer-events-none transition-opacity duration-300
            {{ session('status') == 'Item deleted' ? 'bg-red-500 text-white' : 'bg-green-200 text-green-900' }}"
            role="alert">
            {{ session('status') }}
        </div>
    @endif

    <script>
        window.onload = () => {
            const successMessage = document.getElementById('success-message');
            successMessage.classList.remove('opacity-0', 'pointer-events-none');
            successMessage.classList.add('opacity-100', 'pointer-events-auto');

            setTimeout(() => {
                successMessage.classList.remove('opacity-100', 'pointer-events-auto');
                successMessage.classList.add('opacity-0', 'pointer-events-none');
            }, 3000); // 3000ms = 3 seconds
        };
    </script>

    <!-- Table and Search Section -->
    <div class="flex flex-wrap items-center justify-start pt-4 ml-16 pb-3 md:ml-16 md:pt-2 md:pb-2 md:h-14 md:border-b md:border-gray-300">
        <div class="flex flex-wrap sm:flex-nowrap w-full items-center justify-between space-y-4 sm:space-y-0">
            <!-- Items Label and Search Bar -->
            <div class="flex border-b border-gray-300 pb-2 md:flex-grow md:mr-28 sm:w-auto md:items-center md:justify-start md:border-none space-x-4">
                <div class="ml-2 md:ml-20 md:mr-28 text-xl sm:text-2xl text-gray-500">Items</div>
                <div class="flex bg-gray-200 px-3 py-1 w-80">
                    <input type="text" placeholder="Search" class="w-full text-base sm:text-lg border-none outline-none bg-transparent">
                </div>
            </div>
            <div class="w-full md:w-auto flex pb-2 justify-end mr-4 pr-3">
                <a href="{{ route('section.itemsPage.create') }}">
                    <button class="bg-slate-800 px-3 md:px-4 py-2 text-white rounded-md text-xs sm:text-sm" style="font-size: 10px;">ADD ITEM</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="ml-5 mb-7 mr-5 md:ml-28 md:mr-14 mt-8 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-xs sm:text-sm md:text-base text-gray-600 uppercase font-medium h-10">
                        <th class="w-10 px-3 py-2 border border-gray-300">ID</th>
                        <th class="px-3 py-2 border border-gray-300">Name</th>
                        <th class="px-3 py-2 border border-gray-300">Category</th>
                        <th class="w-20 px-3 py-2 border border-gray-300">Quantity</th>
                        <th class="px-3 py-2 border border-gray-300">Price</th>
                        <th class="px-3 py-2 border border-gray-300">Value</th>
                        <th class="w-3 px-3 py-2 border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr class="even:bg-gray-100 odd:bg-white text-xs sm:text-sm md:text-base text-gray-800 cursor-pointer hover:bg-gray-200"
                        onclick="showPopup(event, {{ $category->id }}, '{{ $category->name }}', '{{ $category->category }}', {{ $category->quantity }}, {{ $category->price }})">
                        <td class="px-3 py-2 border border-gray-300 text-center">{{ $category->id }}</td>
                        <td class="px-3 py-2 border border-gray-300">{{ $category->name }}</td>
                        <td class="px-3 py-2 border border-gray-300">{{ $category->category }}</td>
                        <td class="px-3 py-2 border border-gray-300 text-center">{{ $category->quantity }}</td>
                        <td class="px-3 py-2 border border-gray-300 text-left">₱{{ number_format($category->price, 2) }}</td>
                        <td class="px-3 py-2 border border-gray-300 text-left">₱{{ number_format($category->value, 2) }}</td>
                        <td class="px-3 py-2 border border-gray-300">
                            <a href="{{ route('itemsPage.edit', $category->id) }}">
                                <img src="{{ asset('imgs/edit.png') }}" alt="Edit" class="ml-5">
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-600">No items found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex center justify-center mt-5 mb-4">
            {{ $categories->links('vendor.pagination.custom-tailwind') }}
        </div>
    </div>
</div>

<!-- Pop-up -->
<div id="popup" class="fixed inset-0  bg-black bg-opacity-50 hidden z-50 flex justify-center items-center">
    <div class="bg-white p-5 rounded-lg shadow-lg max-w-lg w-1/4 relative">

        <div class="flex justify-start items-start mb-5">
            <button onclick="closePopup()" class="absolute top-2 right-2">
                <img src="{{asset('imgs/x.png')}}" alt="Close">
            </button>
        </div>

        <label class="flex justify-center">Upload Product Image</label>
            <div class="mb-5" id="popup-item-image"></div>

            <p id="popup-item-name" class="flex justify-center font-bold text-xl"></p>

            <p id="popup-item-category" class="flex justify-center  text-xs"></p>

            <div class="flex justify-between mt-14">
                <p id="popup-item-quantity" class="flex justify-start"></p>

                <p id="popup-item-price" class="flex justify-end font-bold"></p>
            </div>

    </div>
</div>


<script>
    function showPopup(event, itemId, itemName, itemCategory, itemQuantity, itemPrice) {
        if (event.target.closest('td').classList.contains('w-3')) return;
        document.getElementById('popup-item-name').innerText = itemName;
        document.getElementById('popup-item-category').innerText = itemCategory;
        document.getElementById('popup-item-quantity').innerText = "x" + itemQuantity;
        document.getElementById('popup-item-price').innerText = "₱" + itemPrice.toFixed(2);
        document.getElementById('popup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }
</script>
