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

    <!-- Header Section: Title and Filter -->
    <div class="flex flex-wrap sm:flex-nowrap w-full items-center justify-between space-y-4 sm:space-y-0">

        <!-- Title: Items Report -->
        <div class="flex items-center space-x-4">
            <div class="ml-2 md:ml-20 md:mr-28 text-xl sm:text-2xl text-gray-500">Items Report</div>
        </div>

        <!-- Filter Form with Automatic Submission -->
        <form method="GET" action="{{ route('section.reportPage.itemsReport') }}" class="flex items-center space-x-4 mr-56">
            <label for="time-filter" class="text-md font-medium text-gray-500">Filter by:</label>
            <select id="time-filter" name="time_filter" class="border p-2 rounded-md text-green-800 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent w-52 h-9" onchange="this.form.submit()">
                <option class=" bg-slate-100" value="1_month_ago" {{ request('time_filter') == '1_month_ago' ? 'selected' : '' }}>1 Month Ago</option>
                <option value="2_weeks_ago" {{ request('time_filter') == '2_weeks_ago' ? 'selected' : '' }}>2 Weeks Ago</option>
                <option value="1_week_ago" {{ request('time_filter') == '1_week_ago' ? 'selected' : '' }}>1 Week Ago</option>
                <option value="yesterday" {{ request('time_filter') == 'yesterday' ? 'selected' : '' }}>Yesterday</option>
                <option value="today" {{ request('time_filter') == 'today' ? 'selected' : '' }}>Today</option>
            </select>
        </form>


        <div class="w-full md:w-auto flex pb-2 justify-end mr-4 pr-3">
            <a href="{{ route('export.pdf') }}">
                <button class="bg-lime-500 px-3 md:px-4 py-2 text-white rounded-md text-xs sm:text-sm font-semibold mr-3 shadow-sm shadow-slate-500" style="font-size: 10px;">PRINT NOW</button>
            </a>
        </div>
    </div>
</div>

    <!-- Table Section -->
    <div class="ml-5 mb-7 mr-5 md:ml-28 md:mr-14 mt-8 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-slate-500 text-xs sm:text-xs md:text-xs text-gray-50 uppercase font-medium h-10">
                        <th class="w-10 px-3 py-2 border border-gray-300">ID</th>
                        <th class="px-3 py-2 border border-gray-300">Name</th>
                        <th class="px-3 py-2 border border-gray-300">Category</th>
                        <th class="px-3 py-2 border border-gray-300">Remaining</th>
                        <th class="w-28 px-3 py-2 border border-gray-300">Sold Item</th>
                        <th class="px-3 py-2 border border-gray-300">Price</th>
                        <th class="px-3 py-2 border border-gray-300">Profit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $index => $category)
                    <tr class="even:bg-slate-100 odd:bg-white text-xs sm:text-sm md:text-base text-gray-800 cursor-pointer hover:bg-gray-200">

                        {{-- <!-- Display Sequential Number --> --}}
                        <td class="px-3 py-2 border border-gray-300 text-center">
                            {{ $categories->firstItem() + $index }} <!-- Sequential Number -->
                        </td>

                        <!-- Image and Name Display -->
                        <td class="px-2 py-1 border border-gray-300 flex items-center space-x-2 h-10">
                            <img src="{{ asset($category->image_path) }}" alt="Image" class="w-8 h-8 object-cover mr-2 border-2 border-slate-400">
                            <span>{{ $category->name }}</span>
                        </td>
                        <td class="px-3 py-2 border border-gray-300">{{ $category->category }}</td>
                        <td class="px-3 py-2 border border-gray-300 text-center">{{ $category->quantity }}</td>
                        <td class="px-3 py-2 border border-gray-300 text-center">{{ $category->sold_quantity }}</td>
                        <td class="px-3 py-2 border border-gray-300 text-left">₱{{ number_format($category->price, 2) }}</td>
                        <td class="px-3 py-2 border border-gray-300 text-left">₱{{ number_format($category->value, 2) }}</td>
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


<script>
    function showPopup(event, itemId, itemName, itemCategory, itemQuantity, itemPrice, itemImagePath) {
    if (event.target.closest('td').classList.contains('w-3')) return;
    document.getElementById('popup-item-name').innerText = itemName;
    document.getElementById('popup-item-category').innerText = itemCategory;
    document.getElementById('popup-item-quantity').innerText = itemQuantity + " unit";
    // document.getElementById('popup-item-price').innerText = "₱" + itemPrice.toFixed(2);
    document.getElementById('popup-item-price').innerText = "₱" + parseFloat(itemPrice). toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2});


    // Update the popup image
    const popupImage = document.getElementById('popup-item-image');
    if (itemImagePath) {
        popupImage.innerHTML = `<img src="${itemImagePath}" alt="Uploaded Image" class="w-full h-auto rounded-md">`;
    } else {
        popupImage.innerHTML = `<p class="text-gray-500">No image uploaded.</p>`;
    }

    document.getElementById('popup').classList.remove('hidden');
}


    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }


    // Listen to input changes for search
    document.getElementById('search-input').addEventListener('input', function () {
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
                            suggestion.addEventListener('click', function () {
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
