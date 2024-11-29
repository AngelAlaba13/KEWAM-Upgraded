<x-navigationBar></x-navigationBar>

<div class="flex flex-col w-full overflow-x-hidden">
    <div class="md:ml-16 pt-4 pb-4 border-b border-gray-300">
        <div class="flex w-full items-center justify-between h-7">
            <div class="ml-2 md:ml-20 md:mr-28 text-xl sm:text-2xl text-gray-500">
                Dashboard
            </div>
        </div>
    </div>

    <div class="flex flex-col md:ml-16">
        <div class="text-md text-gray-600 font-medium mb-4 ml-40 mt-9"> <!-- Reduced ml-40 to ml-8 -->
            Inventory Summary
        </div>

        <div class="flex w-full px-32 justify-evenly">
            <!-- Inventory Cards -->
            <div class="bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm">
                <img src="{{ asset('imgs/item.png') }}" alt="Quantity" class="w-9 h-9 mb-5">
                <p class="text-3xl font-bold">{{ $itemCount }}</p>
                <p class="text-gray-600 font-medium">Items</p>
            </div>

            <div class="bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm">
                <img src="{{ asset('imgs/category.png') }}" alt="Quantity" class="w-10 h-11 mb-5">
                <p class="text-3xl font-bold">{{ $categoryCount }}</p>
                <p class="text-gray-600 font-medium mb-2">Categories</p>
            </div>

            <div class="bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm">
                <img src="{{ asset('imgs/quantity.png') }}" alt="Quantity" class="w-9 h-9 mb-6">
                <p class="text-3xl font-bold">{{ $totalQuantity }}</p>
                <p class="text-gray-600 font-medium">Quantity</p>
            </div>

            <div class="bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm">
                <img src="{{ asset('imgs/value.png') }}" alt="Quantity" class="w-9 h-9 mb-6">
                <p class="text-xl font-bold">₱{{ $totalValue }}</p>
                <p class="text-gray-600 font-medium">Total Value</p>
            </div>
        </div>
    </div>

    <!-- Logs Section -->
    <div class="text-md text-gray-600 font-medium ml-40 mt-5 mb-20">
        <p class="text-md text-gray-600 font-medium mb-4 ml-16 mt-9">Recent Activities</p>
        <div class=" flex flex-col pl-16 pr-40">
            @if($logs->isNotEmpty())
                <div class="max-h-[300px] overflow-y-auto">
                    <ul>
                        @foreach($logs->take(5) as $log) <!-- Show only 5 logs initially -->
                            <li class="bg-slate-400 bg-opacity-25 text-gray-600 text-sm pt-2 pb-2 pl-4 mb-3 shadow border-b border-gray-400 flex justify-between items-center">
                                <span>{{ $log->message }}</span>
                                <span class="text-xs text-gray-400 pr-4">
                                    {{ $log->created_at->format('d M Y \a\t h:i A') }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @if($logs->count() > 5) <!-- Check if there are more than 5 logs -->
                    <button id="showMoreBtn" class=" text-sm mt-2 underline text-blue-600 hover:underline">Show More Logs</button>
                @endif
            @else
                <p class="text-gray-600">No recent activities.</p>
            @endif
        </div>
    </div>

</div>

<!-- Modal for All Logs -->
<div id="logModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-md shadow-lg max-w-lg w-full">
        <span class="text-xl text-gray-800 font-bold">All Logs</span>
        <ul class="mt-4 max-h-[400px] overflow-y-auto">
            @foreach($logs as $log)
                <li class="bg-slate-400 bg-opacity-25 text-gray-600 text-sm pt-2 pb-2 pl-4 mb-3 shadow border-b border-gray-400 flex justify-between items-center">
                    <span>{{ $log->message }}</span>
                    <span class="text-xs text-gray-400 pr-2">
                        {{ $log->created_at->format('d M Y \a\t h:i A') }}
                    </span>
                </li>
            @endforeach
        </ul>
        <button onclick="closeModal()" class="mt-4 w-full bg-red-500 text-white py-2 rounded-md">Close</button>
    </div>
</div>

<script>
    // Show modal when "Show More Logs" is clicked
    document.getElementById('showMoreBtn').addEventListener('click', function() {
        document.getElementById('logModal').classList.remove('hidden');
    });

    // Close modal
    function closeModal() {
        document.getElementById('logModal').classList.add('hidden');
    }
</script>
