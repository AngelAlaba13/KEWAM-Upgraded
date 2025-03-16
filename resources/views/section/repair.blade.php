<x-navigationBar></x-navigationBar>
<div class="bg-gradient-to-b from-red-50 to-red-50  min-h-screen w-full">

    <div class="flex flex-col w-full">
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
                }, 3000); // 3000ms = 3 seconds
            };
        </script>

        <!-- Table and Search Section -->
        <div
            class="flex flex-wrap items-center justify-start pt-4 ml-16 pb-3 md:ml-16 md:pt-2 md:pb-2 md:h-16 md:border-b md:border-gray-300 bg-red-800 z-50">
            <div
                class="flex flex-wrap sm:flex-nowrap w-full items-center justify-between space-y-4 sm:space-y-0 bg-slate-400">
                <!-- Items Label and Search Bar -->
                <div
                    class="flex border-b border-gray-300 pb-2 md:flex-grow md:mr-28 sm:w-auto md:items-center md:justify-start md:border-none space-x-4 ">
                    <div class="ml-2 md:ml-20 md:mr-28 text-xl sm:text-2xl text-white">Services</div>

                    <div class="flex pt-1">
                        <form action="{{ route('section.repair') }}" method="GET">

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

                    <form action="{{ route('section.repair') }}" method="GET">
                        <div id="suggestions" class="absolute top-11 bg-green-100 border border-gray-300 z-50 hidden"
                            style="width: 269px; left: 360px">

                        </div>
                    </form>


                </div>
                <div class="w-full md:w-auto flex pb-2 justify-end mr-4 pr-3">
                    <a class="" href="{{ url('/view-pdf/serviceSheet.pdf') }}" target="_blank">
                        <button
                            class="flex flex-row bg-green-600 px-3 md:px-4 py-2 text-white rounded-md text-xs sm:text-sm font-bold mr-3 shadow-sm shadow-slate-500"
                            style="font-size: 12px;">
                            <img class="mr-2 w-3 h-3 mt-1" src="{{ asset('imgs/download.png') }}" alt="export">
                            <p class="">SERVICE SHEET</p>
                        </button>
                    </a>

                    <a href="{{ route('section.repairPage.create') }}">
                        <button
                            class="bg-green-600 px-3 md:px-4 py-2 text-white rounded-md text-xs sm:text-sm font-bold mr-3 shadow-sm shadow-slate-500"
                            style="font-size: 12px;">ADD CLIENT</button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="ml-5 mb-7 mr-5 md:ml-28 md:mr-14 mt-8 bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-green-600 text-xs sm:text-sm md:text-xs text-white uppercase font-medium h-10">
                            <th class="w-10 px-3 py-2 border border-gray-300">ID</th>
                            <th class="px-3 py-2 border border-gray-300">Client Name</th>
                            <th class="px-3 py-2 border border-gray-300">Service</th>
                            <th class="px-3 py-2 border border-gray-300">Service Provider</th>
                            <th class="px-3 py-2 border border-gray-300">Price</th>
                            <th class="px-3 py-2 border border-gray-300">Status</th>
                            <th class="px-3 py-2 border border-gray-300">Description</th>
                            <th class="w-3 px-3 py-2 border border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $index => $service)
                            <tr class="even:bg-green-50 odd:bg-white text-xs sm:text-sm md:text-sm text-gray-800 cursor-pointer hover:bg-gray-200"
                                onclick="showPopup(event, {{ $service->id }}, '{{ $service->clientName }}', '{{ $service->contactNo }}', '{{ $service->address }}', '{{ $service->service }}', '{{ $service->serviceProvider }}', {{ $service->price }}, '{{ $service->status }}', '{{ $service->serviceDescription }}')">
                                <td class="px-3 py-2 border border-gray-300 text-center">
                                    {{ $services->firstItem() + $index }}</td>
                                <td class="px-2 py-1 border border-gray-300 truncate max-w-xs overflow-hidden">
                                    {{ Str::limit($service->clientName, 12) }}</td>
                                <td class="px-3 py-2 border border-gray-300 truncate max-w-xs overflow-hidden">
                                    {{ Str::limit($service->service, 20) }}</td>
                                <td class="px-3 py-2 border border-gray-300 truncate max-w-xs overflow-hidden">
                                    {{ Str::limit($service->serviceProvider, 12) }}</td>
                                <td class="px-3 py-2 border border-gray-300">₱{{ number_format($service->price, 2) }}
                                </td>
                                <td class="px-3 py-2 border border-gray-300 text-center">{{ $service->status }}</td>
                                <td class="px-3 py-2 border border-gray-300 truncate max-w-xs overflow-hidden">
                                    {{ Str::limit($service->serviceDescription, 50) }}
                                    <!-- Truncate description to 50 characters -->
                                </td>

                                <td class="px-3 py-2 border border-gray-300">
                                    <a href="{{ route('repairPage.edit', $service->id) }}">
                                        <img src="{{ asset('imgs/edit.png') }}" alt="Edit"
                                            class="ml-5 border-b border-b-slate-600 pb-1">
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center  pt-8 text-gray-600">No items found.</td>
                            </tr>
                        @endforelse
                    </tbody>



                </table>
            </div>
            <div class="flex center justify-center mt-5 mb-4">
                {{ $services->links('vendor.pagination.custom-tailwind') }}
            </div>
        </div>
    </div>




    <!-- Pop-up -->
    <div id="popup"
        class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex justify-center items-center transition-opacity duration-300 ease-in-out">
        <div class="bg-white p-5 rounded-lg shadow-lg max-w-lg w-1/2 relative">

            <!-- Header -->
            <div class="flex justify-between items-center border-b pb-3 mb-5">
                <p class="text-gray-500 font-medium text-2xl">Service Details</p>
                <button onclick="closePopup()" class="absolute top-2 right-5 font-bold text-xl">
                    &times;
                </button>
            </div>

            <!-- Client Name and Details -->
            <p id="popup-service-clientName" class="flex flex-col justify center text-center font-bold text-xl"></p>
            <p id="popup-service-clientContactNumber" class="text-center text-sm text-gray-500 mb-3"></p>

            <!-- Content -->
            <div class="flex flex-col space-y-4 mb-1">
                <!-- Address -->
                <div class="flex justify-between">
                    <p class="font-bold text-gray-700">Address:</p>
                    <p id="popup-service-clientAddress" class="text-gray-900 ml-6"></p>
                </div>

                <!-- Service -->
                <div class="flex justify-between">
                    <p class="font-bold text-gray-700">Service:</p>
                    <p id="popup-service-repairService" class="text-gray-900"></p>
                </div>

                <!-- Service Provider -->
                <div class="flex justify-between">
                    <p class="font-bold text-gray-700">Service Provider:</p>
                    <p id="popup-service-serviceProvider" class="text-gray-900"></p>
                </div>

                <!-- Status -->
                <div class="flex justify-between">
                    <p class="font-bold text-gray-700">Status:</p>
                    <p id="popup-service-serviceDescription" class="text-gray-900"></p>
                </div>

                <!-- Price -->
                <div class="flex justify-between">
                    <p class="font-bold text-gray-700">Price:</p>
                    <p id="popup-service-servicePrice" class="text-gray-900"></p>
                </div>

                <!-- Service Description -->
                <div class="flex flex-col">
                    <p class="font-bold text-gray-700 mb-1">Service Description:</p>
                    <p id="popup-service-status" class="text-gray-900"></p>
                </div>

                <div class="flex justify-center">
                    <button onclick="generatePDF()"
                        class="bg-yellow-400 mt-3 text-gray-800 px-4 py-2 rounded-md w-full shadow-md shadow-slate-400 font-bold">PRINT</button>
                </div>
            </div>
        </div>
    </div>





    <script>
        function showPopup(event, itemId, clientName, clientContactNumber, clientAddress, repairService, serviceProvider,
            servicePrice, serviceDescription, serviceStatus) {
            if (event.target.closest('td').classList.contains('w-3')) return;
            document.getElementById('popup-service-clientName').innerText = clientName;
            document.getElementById('popup-service-clientContactNumber').innerText = clientContactNumber;
            document.getElementById('popup-service-clientAddress').innerText = clientAddress;
            document.getElementById('popup-service-repairService').innerText = repairService;
            document.getElementById('popup-service-serviceProvider').innerText = serviceProvider;
            document.getElementById('popup-service-servicePrice').innerText = "₱" + parseFloat(servicePrice).toLocaleString(
                undefined, {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });

            document.getElementById('popup-service-serviceDescription').innerText = serviceDescription;
            document.getElementById('popup-service-status').innerText = serviceStatus;


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
                fetch(`/search/service-suggestions?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        suggestionsDiv.innerHTML = '';

                        if (data.length) {
                            suggestionsDiv.classList.remove('hidden');
                            data.forEach(item => {
                                const suggestion = document.createElement('div');
                                suggestion.classList.add('px-3', 'py-2', 'cursor-pointer');
                                suggestion.textContent = `${item.clientName} - ${item.service}`;

                                // Add event listener to the suggestion for clicking
                                suggestion.addEventListener('click', function() {
                                    // Set the input field to the suggestion value
                                    document.getElementById('search-input').value = item
                                        .clientName;

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

    <script>
        function generatePDF() {
            // Get data from the popup
            const clientName = document.getElementById('popup-service-clientName').innerText;
            const clientContact = document.getElementById('popup-service-clientContactNumber').innerText;
            const clientAddress = document.getElementById('popup-service-clientAddress').innerText;
            const service = document.getElementById('popup-service-repairService').innerText;
            const serviceProvider = document.getElementById('popup-service-serviceProvider').innerText;
            const price = document.getElementById('popup-service-servicePrice').innerText;
            const description = document.getElementById('popup-service-serviceDescription').innerText;
            const status = document.getElementById('popup-service-status').innerText;

            // Send data to the backend via POST request
            fetch('{{ route('generatePDF') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        clientName,
                        clientContact,
                        clientAddress,
                        service,
                        serviceProvider,
                        price,
                        description,
                        status
                    })
                })
                .then(response => response.blob())
                .then(blob => {
                    // Create an object URL for the PDF blob
                    const url = URL.createObjectURL(blob);

                    // Open the PDF in a new tab
                    const newTab = window.open();
                    newTab.document.location = url;

                })
                .catch(error => console.error('Error:', error));
        }
    </script>

</div>
