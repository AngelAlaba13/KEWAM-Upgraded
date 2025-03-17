@vite(['resources/css/app.css', 'resources/js/app.js'])


<div x-data="starField()" class="bg-gradient-to-r from-[#961c1c] to-[hsl(0,87%,15%)]">
    <!-- Blurred Circsssle -->
    <div
        class="absolute w-[420px] h-[380px] 
             bg-[#ff3b3b] 
             rounded-full blur-[210px] z-[1] animate-pulse 
             top-[0%] left-[85%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[420px] h-[380px] 
             bg-[rgb(255,142,142)] 
             rounded-full blur-[175px] z-[1] 
             top-[60%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[120px] h-[80px] 
         bg-[rgb(255,246,246)] 
         rounded-full blur-[85px] z-[1] animate-pulse
         top-[60%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[420px] h-[380px] 
             bg-[#ff6666ac] 
             rounded-full blur-[200px] z-[1] animate-pulse
             top-[120%] left-[85%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[420px] h-[380px] 
             bg-[hsl(0,60%,40%)] 
             rounded-full blur-[200px] z-[1] animate-pulse 
             top-[60%] left-[5%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[280px] h-[230px] 
             bg-[hsl(0,100%,58%)] 
             rounded-full blur-[90px] z-[1] 
             top-[10%] left-[0%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    {{-- here --}}
    <div
        class="absolute w-[420px] h-[380px] 
             bg-[#ff9797] 
             rounded-full blur-[200px] z-[1] 
             top-[150%] left-[10%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    {{-- second page --}}
    <div
        class="absolute w-[320px] h-[280px] 
         bg-[hsl(0,100%,85%)] 
         rounded-full blur-[200px] z-[1] 
         top-[120%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[440px] h-[390px] 
             bg-[#9522228a] 
             rounded-full blur-[120px] z-[1] 
             top-[20%] left-[0%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    {{-- stocks and services --}}
    <div
        class="absolute w-[420px] h-[380px] 
         bg-[hsl(0,100%,84%)] 
         rounded-full blur-[210px]  z-[1] 
         top-[220%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[420px] h-[380px] 
        bg-[rgb(255,36,36)] 
        rounded-full blur-[210px]  z-[1]  animate-pulse
        top-[300%] left-[0%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[320px] h-[280px] 
        bg-[rgb(139,28,28)] 
        rounded-full blur-[200px] z-[1] 
        top-[240%] left-[85%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[320px] h-[280px] 
     bg-[#ff6868] 
     rounded-full blur-[230px] z-[1]  
     top-[300%] left-[85%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[320px] h-[280px] 
        bg-[rgb(255,41,41)] 
        rounded-full blur-[200px] z-[1] 
        top-[390%] left-[87%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    {{-- sales chart --}}

    <div
        class="absolute w-[520px] h-[480px] 
        bg-[#fe8585] 
        rounded-full blur-[280px] z-[1] animate-pulse
        top-[420%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[320px] h-[280px] 
    bg-[rgb(255,41,41)] 
    rounded-full blur-[150px] z-[1] animate-pulse
    top-[480%] left-[17%] translate-x-[-50%] translate-y-[-50%]">
    </div>
    <div
        class="absolute w-[320px] h-[280px] 
        bg-[rgb(255,41,41)] 
        rounded-full blur-[170px] z-[1] 
        top-[500%] left-[85%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div
        class="absolute w-[420px] h-[280px] 
    bg-[rgb(37,7,7)] 
    rounded-full blur-[390px] z-[1] animate-bounce
    top-[530%] left-[0%] translate-x-[-50%] translate-y-[-50%]">
    </div>

    <div class="absolute inset-0 z-1 pointer-events-none">
        <div class="absolute w-full h-full">
            <!-- Stars (Multiple instances for depth) -->
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-pulse left-[17%] top-[45%]">
            </div>
            <div
                class="absolute w-[3px] h-[3px] bg-white rounded-full opacity-100 animate-twinkle left-[30%] top-[40%]">
            </div>
            <div
                class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-twinkle left-[32%] top-[45%]">
            </div>
            <div
                class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-twinkle left-[35%] top-[60%]">
            </div>
            <div class="absolute w-[3px] h-[3px] bg-white rounded-full opacity-50 animate-twinkle left-[50%] top-[20%]">
            </div>
            <div class="absolute w-[4px] h-[4px] bg-white rounded-full opacity-100 animate-pulse left-[65%] top-[53%]">
            </div>

            <div class="absolute w-[3px] h-[3px] bg-white rounded-full opacity-50 animate-twinkle left-[80%] top-[20%]">
            </div>
            <div class="absolute w-[3px] h-[3px] bg-white rounded-full opacity-50 animate-twinkle left-[90%] top-[30%]">
            </div>
            <div class="absolute w-[3px] h-[3px] bg-white rounded-full opacity-30 animate-twinkle left-[85%] top-[40%]">
            </div>
            <div
                class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-twinkle left-[68%] top-[57%]">
            </div>
            <div class="absolute w-[4px] h-[4px] bg-white rounded-full opacity-40 animate-pulse left-[20%] top-[90%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-pulse left-[47%] top-[55%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-50 animate-pulse left-[17%] top-[26%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-50 animate-pulse left-[20%] top-[60%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-60 animate-pulse left-[10%] top-[40%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-pulse left-[55%] top-[53%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-pulse left-[33%] top-[55%]">
            </div>

            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-pulse left-[60%] top-[35%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-pulse left-[90%] top-[60%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-pulse left-[70%] top-[50%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-70 animate-pulse left-[65%] top-[28%]">
            </div>

            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-pulse left-[40%] top-[35%]">
            </div>
            <div class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-50 animate-pulse left-[29%] top-[25%]">
            </div>
            <div
                class="absolute w-[2px] h-[2px] bg-white rounded-full opacity-100 animate-twinkle left-[68%] top-[37%]">
            </div>
        </div>
    </div>

    <div class="flex flex-col w-full overflow-x-hidden">
        <div class="fixed left-0 right-0 pt-6 pb-6 z-30 transition-transform duration-300  " id="navbar">
            <div class="flex w-full justify-between items-center h-5 ">
                <div class="ml-2 md:ml-10 md:mr-20 text-xl sm:text-2xl text-white">
                    KEWAM Computer Repair and Services
                </div>
                <div class="flex flex-row justify-end">
                    <a href="#topper">
                        <div
                            class="ml-2 md:ml-2 md:mr-16 text-md sm:text-md font-bold text-white hover:text-yellow-500">
                            Top
                        </div>
                    </a>
                    <a href="#top">
                        <div
                            class="ml-2 md:ml-2 md:mr-16 text-md sm:text-md font-bold text-white hover:text-yellow-500">
                            Summary
                        </div>
                    </a>
                    <a href="#status">
                        <div
                            class="ml-2 md:ml-2 md:mr-16 text-md sm:text-md font-bold text-white hover:text-yellow-500">
                            Status
                        </div>
                    </a>
                    <a href="#logs">
                        <div
                            class="ml-2 md:ml-2 md:mr-16 text-md sm:text-md font-bold text-white hover:text-yellow-500">
                            Logs
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <script>
            let lastScrollTop = 0;
            const navbar = document.getElementById('navbar');

            window.addEventListener('scroll', () => {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollTop > lastScrollTop) {
                    // Scroll Down - Hide the navbar
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    // Scroll Up - Show the navbar
                    navbar.style.transform = 'translateY(0)';
                }
                lastScrollTop = Math.max(scrollTop, 0); // Ensure lastScrollTop is never negative
            });
        </script>


        <div id="topper" class="flex flex-col animate-fade-in z-20">
            <div class="flex justify-center mt-64 font-bold font-mono text-white text-9xl tracking-wider ">
                EXPLORE
            </div>

            <div x-data="{
                active: 'home',
                positions: { home: 'left-3', items: 'left-[14rem]', services: 'left-[27rem]', report: 'left-[40rem]' },
                loading: false,
                redirect(url) {
                    this.loading = true;
                    setTimeout(() => { window.location.href = url; }, 2500); // 1.5 seconds before redirect
                }
            }" class="flex flex-row justify-evenly mt-10 h-44 p-14 pl-44 pr-44 relative">

                <!-- Futuristic Loading Overlay -->
                <div x-show="loading"
                    class="fixed inset-0 flex z-50 items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300">
                    <div class="flex flex-col items-center relative">
                        <!-- Neon Loader Rings -->
                        <div class="relative w-20 h-20">
                            <div
                                class="absolute inset-0 w-full h-full border-4 border-white-300 border-opacity-60 rounded-full animate-ping">
                            </div>
                            <div
                                class="absolute inset-0 w-full h-full border-4 border-red-500 border-opacity-90 rounded-full animate-spin">
                            </div>
                            <div
                                class="absolute inset-0 w-full h-full border-4 border-green-300 border-opacity-50 rounded-full animate-pulse">
                            </div>
                        </div>

                        <!-- Glitching Futuristic Text -->
                        <p class="mt-6 text-lg font-mono text-white relative">
                            <span class="animate-pulse">LOADING</span>
                            <span class="absolute inset-0 text-red-50 opacity-70 animate-glitch">LOADING</span>
                        </p>
                    </div>
                </div>

                <div
                    class="relative flex flex-row items-center justify-center rounded-full border-[0.3px] p-3 pl-4 pt-8 pb-8 border-white z-40">

                    <!-- Sliding Border -->
                    <div class="absolute h-12 w-44 rounded-full border-[3px] border-white transition-all duration-500 z-40"
                        :class="positions[active]">
                    </div>

                    <!-- Navigation Items -->
                    <a href="#" @click.prevent="active = 'home'; redirect('{{ route('section.home') }}')">
                        <div class="relative flex items-center justify-center w-44 h-12 rounded-full cursor-pointer transition-all duration-300 text-white z-20
                            hover:bg-red-800 hover:text-white"
                            :class="active === 'home' ? 'bg-red-800 text-white' : ''">
                            Home
                        </div>
                    </a>

                    <a href="#" @click.prevent="active = 'items'; redirect('{{ route('section.items') }}')">
                        <div class="relative flex items-center justify-center w-44 ml-8 h-12 rounded-full cursor-pointer transition-all duration-300 text-white z-20
                            hover:bg-red-800 hover:text-white"
                            :class="active === 'items' ? 'bg-red-800 text-white' : ''">
                            Items
                        </div>
                    </a>

                    <a href="#" @click.prevent="active = 'services'; redirect('{{ route('section.repair') }}')">
                        <div class="relative flex items-center justify-center w-44 ml-8 h-12 rounded-full cursor-pointer transition-all duration-300 text-white z-20
                            hover:bg-red-800 hover:text-white"
                            :class="active === 'services' ? 'bg-red-800 text-white' : ''">
                            Services
                        </div>
                    </a>

                    <a href="#"
                        @click.prevent="active = 'report'; redirect('{{ route('section.reportPage.itemsReport') }}')">
                        <div class="relative flex items-center justify-center w-44 ml-8 h-12 rounded-full cursor-pointer transition-all duration-300 text-white z-20
                            hover:bg-red-800 hover:text-white"
                            :class="active === 'report' ? ' bg-red-800 text-white' : ''">
                            Report
                        </div>
                    </a>

                </div>
            </div>







            <span id="top"></span>
            <div class="flex justify-center mt-36 font-bold font-mono text-white text-6xl tracking-wider ">
                <!-- Reduced ml-40 to ml-8 -->
                Inventory Summary
            </div>

            <div class="flex items-center justify-evenly mt-14 z-20 p-3">
                <!-- Inventory Cards -->
                <div class="flex flex-row items-center justify-evenly h-[20rem] w-[78rem] rounded-[2rem]">
                    <div
                        class="bg-white flex flex-col items-center justify-center w-64 h-56 border-r-2 border-r-slate-300  rounded-xl hover:bg-slate-200 hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                        <img src="{{ asset('imgs/item.png') }}" alt="Quantity" class="w-9 h-9 mb-5">
                        <p class="text-3xl font-bold">{{ $itemCount }}</p>
                        <p class="text-gray-600 font-medium">Items</p>
                    </div>

                    <div
                        class="bg-white flex flex-col items-center justify-center w-64 h-56 border-r-2 border-r-slate-300 rounded-xl shadow-slate-400 shadow-sm hover:bg-slate-200 hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                        <img src="{{ asset('imgs/category.png') }}" alt="Quantity" class="w-10 h-11 mb-5">
                        <p class="text-3xl font-bold">{{ $categoryCount }}</p>
                        <p class="text-gray-600 font-medium mb-2">Item Categories</p>
                    </div>

                    <div
                        class="bg-white flex flex-col items-center justify-center w-64 h-56 border-r-2 border-r-slate-300  rounded-xl hover:bg-slate-200 hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                        <img src="{{ asset('imgs/quantity.png') }}" alt="Quantity" class="w-9 h-9 mb-6">
                        <p class="text-3xl font-bold">{{ $totalQuantity }}</p>
                        <p class="text-gray-600 font-medium">Quantity</p>
                    </div>

                    <div
                        class="bg-white flex flex-col items-center justify-center w-64 h-56 border-r-2 border-r-slate-300  rounded-xl hover:bg-slate-200 hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                        <img src="{{ asset('imgs/value.png') }}" alt="Quantity" class="w-9 h-9 mb-6">
                        <p class="text-3xl font-bold">{{ $SoldItems }}</p>
                        <p class="text-gray-600 font-medium">Sold Items</p>
                    </div>
                </div>


            </div>
            <div class="flex justify-center text-center mt-1 font-bold font-mono text-white text-2xl tracking-wider">
                <span x-data="{ text: '', fullText: 'These are the latest in your shop', index: 0, deleting: false }" x-init="let interval = setInterval(() => {
                    if (!deleting && index < fullText.length) {
                        text += fullText[index];
                        index++;
                    } else if (deleting && index > 0) {
                        text = text.slice(0, -1);
                        index--;
                    }
                
                    if (index === fullText.length) {
                        setTimeout(() => deleting = true, 2000); // Pause before deleting
                    } else if (index === 0 && deleting) {
                        deleting = false;
                    }
                }, 60)" x-text="text">
                </span>
                <span class="animate-ping">|</span>
            </div>


        </div>

        <div class="flex justify-center mt-44 font-bold font-mono text-white text-6xl tracking-wider z-20">
            <!-- Reduced ml-40 to ml-8 -->
            STOCKS & SERVICES
        </div>

        <div class="flex flex-col mt-20 z-20 mb-48 ">

            <div
                class="flex justify-start items-center font-bold font-mono text-white text-2xl tracking-wider pl-44 mb-10">
                <!-- Reduced ml-40 to ml-8 -->
                Items Stock Count
            </div>

            <div class="flex flex-col items-center justify-evenly ">
                <div class=" ">
                    <div class="bg-white shadow-md shadow-slate-400 w-[60rem] h-[25rem] rounded-2xl">

                        <canvas id="itemChart" class=""></canvas>
                    </div>
                </div>

            </div>

            <div
                class="flex justify-start items-center font-bold font-mono text-white text-2xl tracking-wider pl-44 mt-24 mb-10">
                <!-- Reduced ml-40 to ml-8 -->
                Service Prices Rate
            </div>

            <div class="flex flex-col items-center justify-evenly">
                <div class="flex flex-row gap-7 ">
                    <div class="bg-white shadow-md shadow-slate-400 w-[50rem] h-[25rem] rounded-2xl">
                        <!-- Smaller size for the canvas -->
                        <canvas id="serviceChart" style="width: 100%; height: 230px;"></canvas>
                    </div>

                    <div class="">
                        <p class=" ml-28 mt-7 mb-4 text-xl text-white">Status of Service</p>
                        <div class="">
                            <!-- Doughnut chart canvas -->
                            <canvas id="doughnutChart" style=""></canvas>
                        </div>
                    </div>
                </div>
            </div>


        </div>



        <span id="status"></span>
        <div
            class="flex justify-center items-center font-bold font-mono text-white text-5xl tracking-wider pt-20 mb-10 z-20">
            Sales Chart
        </div>

        <div class="flex flex-row justify-center mt-5 z-20">
            <div class="">
                <div class="bg-white shadow-md shadow-slate-400 w-[70rem] h-[30rem] rounded-2xl">
                    <!-- Smaller size for the canvas -->
                    <canvas id="salesChart" style=""></canvas>
                </div>
            </div>
        </div>


    </div>

    <!-- Logs Section -->
    <div class="text-md text-white font-medium z-50" id="logs">
        <p class="flex justify-center items-center font-bold font-mono text-white text-5xl tracking-wider mt-40 z-50">
            Recent Activities</p>

        <div class="flex flex-col items-center justify-center">
            <div
                class=" flex flex-col pl-12 pr-12 w-[65rem] pt-10 pb-10 m-10 mb-5 rounded-3xl bg-white bg-opacity-15 border-[0.5px] z-50">
                @if ($logs->isNotEmpty())
                    <div class="max-h-[300px] overflow-y-auto">
                        <ul>
                            @foreach ($logs->take(5) as $log)
                                <!-- Show only 5 logs initially -->
                                <li
                                    class="bg-red-200 text-black text-sm pt-2 pb-2 pl-4 mb-3 shadow border-b border-white flex justify-between items-center">
                                    <span>{{ $log->message }}</span>
                                    <span class="text-xs text-gray-600 pr-4">
                                        {{ $log->created_at->format('d M Y \a\t h:i A') }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="text-gray-600">No recent activities.</p>
                @endif
            </div>
            @if ($logs->count() > 5)
                <!-- Check if there are more than 5 logs -->
                <button id="showMoreBtn" class=" text-sm underline text-white hover:underline mb-20">Show
                    More
                    Logs</button>
            @endif

        </div>

    </div>

</div>

<!-- Modal for All Logs -->
<div id="logModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-8 rounded-md shadow-lg max-w-lg w-full">
        <span class="text-xl text-gray-800 font-bold">All Logs</span>
        <ul class="mt-4 max-h-[400px] overflow-y-auto">
            @foreach ($logs as $log)
                <li
                    class="bg-red-400 bg-opacity-25 text-gray-600 text-sm pt-2 pb-2 pl-4 mb-3 shadow border-b border-gray-400 flex justify-between items-center">
                    <span>{{ $log->message }}</span>
                    <span class="text-xs text-gray-400 pr-2">
                        {{ $log->created_at->format('d M Y \a\t h:i A') }}
                    </span>
                </li>
            @endforeach
        </ul>
        <button onclick="closeModal()" class="mt-4 w-full bg-red-600 text-white py-2 rounded-md">Close</button>
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

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Item chart configuration
    const itemCtx = document.getElementById('itemChart');
    new Chart(itemCtx, {
        type: 'bar',
        data: {
            labels: @json($itemlabels), // Pass the labels dynamically
            datasets: [{
                label: 'Highest Quantity',
                data: @json($itemdata), // Pass the data dynamically
                borderWidth: 1,
                barThickness: 25, // Set a fixed bar width for all bars
                backgroundColor: 'orange', // Set all bars to orange color
            }]
        },
        options: {
            responsive: true, // Ensure chart is responsive
            scales: {
                y: {
                    beginAtZero: true,
                    max: {{ $itemAdjustedMax }}
                },
                x: {
                    categoryPercentage: 0.5, // Adjusts the space for categories
                    barPercentage: 0.5, // Adjusts bar width within each category
                    ticks: {
                        font: {
                            size: 8, // Smaller font size for the x-axis labels
                        },
                        rotation: 0, // Set rotation to 0 for horizontal labels
                        autoSkip: true, // Skip labels if they overlap
                        maxRotation: 0, // Prevent the labels from rotating
                        minRotation: 0 // Prevent the labels from rotating
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 13, // Smaller font size for the legend
                            family: "'Arial', sans-serif",
                        },
                        color: '#333', // Color of the legend text
                        usePointStyle: true, // Remove the color square
                        boxWidth: 0, // Remove the box next to the label
                    }
                },
                tooltip: {
                    backgroundColor: '#333', // Tooltip background color
                    bodyColor: '#fff', // Tooltip text color
                }
            },
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            },
            elements: {
                bar: {
                    borderRadius: 3, // Optional: Rounded corners on bars
                }
            },
            responsiveAnimationDuration: 1000, // Adjust responsiveness delay
            maintainAspectRatio: false, // Prevents aspect ratio distortion when resizing
        }
    });

    // Service chart configuration
    const serviceCtx = document.getElementById('serviceChart');
    new Chart(serviceCtx, {
        type: 'bar',
        data: {
            labels: @json($service), // Pass the service names dynamically
            datasets: [{
                label: 'Highest Service Rate',
                data: @json($servicePrice), // Pass the price data dynamically
                borderWidth: 1,
                barThickness: 25, // Set a fixed bar width for all bars
                backgroundColor: 'green', // Set all bars to green color
            }]
        },
        options: {
            responsive: true, // Ensure chart is responsive
            scales: {
                y: {
                    beginAtZero: true,
                    max: {{ $ServiceAdjustedMax }} // Use the dynamically passed max value
                },
                x: {
                    categoryPercentage: 0.5, // Adjusts the space for categories
                    barPercentage: 0.5, // Adjusts bar width within each category
                    ticks: {
                        font: {
                            size: 8, // Smaller font size for the x-axis labels
                        },
                        rotation: 0, // Rotate the labels vertically
                        autoSkip: true, // Skip labels if they overlap
                        maxRotation: 0, // Prevent labels from rotating further
                        minRotation: 0 // Prevent labels from rotating in the other direction
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 13, // Smaller font size for the legend
                            family: "'Arial', sans-serif",
                        },
                        color: '#333', // Color of the legend text
                        usePointStyle: true, // Remove the color square
                        boxWidth: 0, // Remove the box next to the label
                    }
                },
                tooltip: {
                    backgroundColor: '#333', // Tooltip background color
                    bodyColor: '#fff', // Tooltip text color
                }
            },
            layout: {
                padding: {
                    left: 20,
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            },
            elements: {
                bar: {
                    borderRadius: 3, // Optional: Rounded corners on bars
                }
            },
            responsiveAnimationDuration: 1000, // Adjust responsiveness delay
            maintainAspectRatio: false, // Prevents aspect ratio distortion when resizing
        }
    });
</script>


<script>
    const doughnutCtx = document.getElementById('doughnutChart');
    new Chart(doughnutCtx, {
        type: 'doughnut',
        data: {
            labels: ['Complete', 'Incomplete'], // Labels for the chart segments
            datasets: [{
                label: 'Status of Services', // Dataset label
                data: [{{ $completeCount }}, {{ $incompleteCount }}], // Dynamic data
                backgroundColor: ['#2ea802', '#FF5733'], // Colors for each section
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true, // Ensure legend is visible
                    position: 'left', // Place the legend on the left

                    labels: {
                        font: {
                            size: 13, // Font size for the legend
                            family: "'Arial', sans-serif",
                            weight: 'normal', // Default weight is normal
                        },
                        color: 'white', // Color of the legend text
                        usePointStyle: false, // Use point style for the legend (circle)
                        boxWidth: 18, // Width of the color box
                        padding: 15, // Add some padding between the box and label
                    },
                    padding: {
                        top: 40, // Adjust the top padding to create space above the legend
                        left: 10,
                        right: 10,
                        bottom: 10,
                    }
                },
                tooltip: {
                    backgroundColor: '#333', // Dark background for the tooltip
                    bodyColor: '#fff', // White text for better contrast
                    borderColor: '#ffcc00', // Optional: Add a border color
                    borderWidth: 1, // Optional: Define border width
                    padding: {
                        top: 5, // Adjust top padding
                        bottom: 10, // Adjust bottom padding
                        left: 5, // Wider left padding
                        right: 30 // Wider right padding
                    },
                    cornerRadius: 4, // Rounds the corners of the tooltip
                    titleFont: {
                        size: 11, // Bold and readable title font size
                        weight: 'bold',
                        family: "'Arial', sans-serif", // Font family
                    },
                    bodyFont: {
                        size: 10, // Slightly smaller body text size
                        family: "'Arial', sans-serif",
                    },
                    callbacks: {
                        label: function(context) {
                            const label = context.label; // Segment label
                            const value = context.raw; // Segment value
                            const total = context.dataset.data.reduce((sum, val) => sum + val,
                                0); // Calculate total
                            const percentage = ((value / total) * 100).toFixed(1); // Calculate percentage
                            return `${label}: ${value} (${percentage}%)`; // Custom tooltip text
                        }
                    },
                },

            },
            maintainAspectRatio: false, // Allows better responsiveness
            onClick: function(e) {
                // Custom behavior when a legend item is clicked
                const legendItems = e.target.legend.legendItems;
                legendItems.forEach(item => {
                    // Change font weight to bold on click
                    item.fontWeight = item.hidden ? 'normal' : 'bold';
                    // Redraw the chart with updated legend style
                    this.update();
                });
            }
        }
    });
</script>


<style>
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(-50px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 1s ease-out;
    }
</style>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const itemCtx = document.getElementById('salesChart');

        // Chart data passed from the controller
        const salesData = @json($sales_data); // Converts PHP array to JavaScript object
        const labels = @json($labels); // Converts PHP array to JavaScript array

        // Prepare the dataset for the chart
        const chartData = {
            labels: labels,
            datasets: [{
                label: 'Sales',
                data: labels.map(label => salesData[label] || 0), // Map the data to the labels
                borderWidth: 1,
                fill: false, // This removes the fill for the line chart
                borderColor: 'orange', // Set the line color to orange
                tension: 0.1 // Makes the line less curved
            }]
        };

        // Chart configuration
        new Chart(itemCtx, {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                animation: {
                    duration: 1200, // Time for the animation (1 second)
                    easing: 'easeOut ', // Easing function for a bounce effect
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: Math.max(...Object.values(salesData)) + 50000 // Dynamic max value
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 10, // Adjust size of x-axis labels
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 13,
                                family: "'Arial', sans-serif",
                            },
                            color: '#333',
                            usePointStyle: true,
                            boxWidth: 0,
                        }
                    },
                    tooltip: {
                        backgroundColor: '#333',
                        bodyColor: '#fff',
                    }
                },
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                },
                elements: {
                    line: {
                        borderWidth: 2, // Adjust line width
                    }
                },
                responsiveAnimationDuration: 1000,
                maintainAspectRatio: false,
            }
        });
    });
</script>
