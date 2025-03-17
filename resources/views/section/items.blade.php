<x-navigationBar></x-navigationBar>
<div class="bg-gradient-to-b from-red-50 to-red-50  min-h-screen w-full">

    <div class="flex flex-col w-full z-50">
        <!-- Success Message -->
        @if (session('status'))
            <div id="success-message"
                class="p-4 fixed top-16 left-1/2 rounded-md transform -translate-x-1/2 z-50 opacity-0 pointer-events-none transition-opacity duration-300
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
                }, 5000); // 3000ms = 3 seconds
            };
        </script>

        <!-- Table and Search Section -->
        <div
            class="flex flex-wrap items-center justify-start pt-4 ml-16 pb-3 md:ml-16 md:pt-2 md:pb-2 md:h-16 md:border-b md:border-gray-300 bg-red-800 z-50">
            <div class="flex flex-wrap sm:flex-nowrap w-full items-center justify-between  ">
                <!-- Items Label and Search Bar -->
                <div
                    class="flex flex-row md:justify-start items-center border-b border-gray-300 pb-2 md:flex-grow md:mr-28 sm:w-auto md:border-none space-x-4 ">
                    <div class=" flex flex-row items-center ml-2 md:ml-20 md:mr-28 text-xl sm:text-2xl text-white">
                        Items
                    </div>
                    <div class="flex pt-1">
                        <form action="{{ route('section.items') }}" method="GET">
                            <div class="flex items-center bg-white h-[38px] w-80 shadow-inner shadow-gray-300">
                                <input type="text" name="query" id="search-input" placeholder="Search"
                                    class="w-full text-base border-none outline-none bg-transparent pl-2">

                                <div class=" fixed ml-[265px] bg-red-400 h-[38px] w-14">
                                    <button type="submit"
                                        class=" px-3 md:px-4 py-2 text-white rounded-md text-xs sm:text-sm"
                                        style="font-size: 10px;">
                                        <img src="{{ asset('imgs/search.png') }}" alt="back to items" class=" w-4 mt-1">
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <form action="{{ route('section.items') }}" method="GET">
                        <div id="suggestions"
                            class="absolute top-[50px] bg-red-100 opacity-90 border border-gray-300 z-50 hidden"
                            style="width: 266px; left: 329px">

                        </div>
                    </form>


                </div>
                <div class="w-full md:w-auto flex pb-2 justify-end pr-3">
                    <a href="{{ route('section.itemsPage.sell') }}">
                        <button
                            class="bg-yellow-400 px-3 md:px-4 py-2 text-black rounded-md text-xs sm:text-sm font-bold shadow-inner shadow-white"
                            style="font-size: 13px;">SELL ITEM</button>
                    </a>
                </div>

                <div class="w-full md:w-auto flex pb-2 justify-end mr-4 pr-3 ">
                    <a href="{{ route('section.itemsPage.create') }}">
                        <button
                            class="bg-white px-3 md:px-4 py-2  rounded-md text-xs sm:text-sm font-bold mr-3 shadow-inner shadow-white text-black"
                            style="font-size: 13px;">ADD ITEM</button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div
            class="ml-5 mb-7 mr-5 md:ml-28 md:mr-14 mt-8 bg-white rounded-lg shadow-lg overflow-hidden border-[0.5px] border-black z-40">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr
                            class="bg-gradient-to-r from-red-600 to-red-400 text-xs sm:text-xs md:text-xs text-gray-50 uppercase font-medium h-10">
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
                        @forelse ($categories as $index => $category)
                            <tr class="even:bg-red-50 odd:bg-white text-xs sm:text-sm md:text-base text-gray-800 cursor-pointer hover:bg-gray-200"
                                onclick="showPopup(event, {{ $category->id }}, '{{ $category->name }}', '{{ $category->category }}', {{ $category->quantity }}, {{ $category->price }}, '{{ asset($category->image_path) }}')">
                                <!-- Display Sequential Number -->
                                <td class="px-3 py-2 border border-gray-300 text-center">
                                    {{ $categories->firstItem() + $index }} <!-- Sequential Number -->
                                </td>

                                <!-- Image and Name Display -->
                                <td class="px-2 py-1 border border-gray-300 flex items-center space-x-2 h-10">
                                    <img src="{{ asset($category->image_path) }}" alt="Image"
                                        class="w-8 h-8 object-cover mr-2 border-2 border-slate-400">
                                    <span>{{ $category->name }}</span>
                                </td>
                                <td class="px-3 py-2 border border-gray-300">{{ $category->category }}</td>
                                <td class="px-3 py-2 border border-gray-300 text-center">{{ $category->quantity }}</td>
                                <td class="px-3 py-2 border border-gray-300 text-left">
                                    ₱{{ number_format($category->price, 2) }}</td>
                                <td class="px-3 py-2 border border-gray-300 text-left">
                                    ₱{{ number_format($category->value, 2) }}</td>
                                <td class="px-3 py-2 border border-gray-300">
                                    <a href="{{ route('itemsPage.edit', $category->id) }}">
                                        <img src="{{ asset('imgs/edit.png') }}" alt="Edit"
                                            class="ml-6 border-b border-b-slate-600 pb-1">
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
    <div id="popup"
        class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center transition-opacity duration-300 ease-in-out">
        <div
            class="bg-gradient-to-b from-white to-red-100 p-6 rounded-xl shadow-2xl max-w-lg w-1/3 relative animate-fadeInUp">

            <!-- Header -->
            <div class="flex justify-between items-center border-b pb-3 mb-5">
                <p class="text-red-500 text-opacity-70 font-medium text-lg">Item Details</p>
                <button onclick="closePopup()" class="absolute top-2 right-5 font-bold text-xl">
                    &times;
                </button>
            </div>

            <!-- Item Name and Category -->
            <p id="popup-item-name" class="text-center font-bold text-2xl text-gray-">Item Name</p>
            <p id="popup-item-category" class="text-center text-sm text-black italic mb-5">Item Category</p>

            <!-- Image Container -->
            <div class="flex flex-col items-center">
                <div class="flex justify-center mt-2 w-80 h-[250px] overflow-hidden border-2 border-zinc-400 rounded-lg shadow-md transform hover:scale-105 transition-transform duration-300 ease-in-out"
                    id="popup-item-image">
                    <img src="" alt="Item Image" class="w-full h-full object-cover rounded-md">
                </div>
            </div>

            <!-- Quantity and Price -->
            <div class="flex flex-col justify-between mt-8 px-3">
                <div class="flex">
                    <p class="font-bold">Quantity: </p>
                    <p id="popup-item-quantity" class=" text-gray-700 ml-1">Quantity: <span class="">0</span></p>
                </div>
                <div class="flex ">
                    <p class="font-bold">Price: </p>
                    <p id="popup-item-price" class=" text-green-600 ml-1 font-semibold">Price: <span
                            class=" text-sky-800">0.00</span>
                    </p>
                </div>
            </div>

        </div>
    </div>


    <script>
        function showPopup(event, itemId, itemName, itemCategory, itemQuantity, itemPrice, itemImagePath) {
            if (event.target.closest('td').classList.contains('w-3')) return;
            document.getElementById('popup-item-name').innerText = itemName;
            document.getElementById('popup-item-category').innerText = itemCategory;
            document.getElementById('popup-item-quantity').innerText = itemQuantity + " unit";
            // document.getElementById('popup-item-price').innerText = "₱" + itemPrice.toFixed(2);
            document.getElementById('popup-item-price').innerText = "₱" + parseFloat(itemPrice).toLocaleString(undefined, {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            // 

            // Update the popup image
            const popupImage = document.getElementById('popup-item-image');
            if (itemImagePath) {
                popupImage.innerHTML =
                    `<img src="${itemImagePath}" alt="Uploaded Image" class="w-full object-contain bg-white h-auto rounded-md">`;
            } else {
                popupImage.innerHTML = `<p class="text-gray-500">No image uploaded.</p>`;
            }

            document.getElementById('popup').classList.remove('hidden');
        }


        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }


        // Listen to input changes for search
        document.getElementById('search-input').addEventListener('input', function() {
            const query = this.value;
            const suggestionsDiv = document.getElementById('suggestions');

            if (query.length >= 2) {
                fetch(`/search/suggestions?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        suggestionsDiv.innerHTML = '';

                        if (data.length) {
                            suggestionsDiv.classList.remove('hidden');
                            data.forEach(item => {
                                const suggestion = document.createElement('div');
                                suggestion.classList.add('px-3', 'py-2', 'cursor-pointer');
                                suggestion.textContent = `${item.name} - ${item.category}`;

                                // Add event listener to the suggestion for clicking
                                suggestion.addEventListener('click', function() {
                                    // Set the input field to the suggestion value
                                    document.getElementById('search-input').value = item.name;

                                    // Submit the form to search with the suggestion
                                    document.querySelector('form').submit();
                                });

                                suggestionsDiv.appendChild(suggestion);
                            });
                        } else {
                            suggestionsDiv.classList.add('hidden');
                        }
                    });
            } else {
                suggestionsDiv.classList.add('hidden');
            }
        });
    </script>

</div>
