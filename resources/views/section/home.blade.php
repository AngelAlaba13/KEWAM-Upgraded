<x-navigationBar></x-navigationBar>

<div class="flex flex-col w-full overflow-x-hidden" id="top">
    <div class="fixed left-0 right-0 md:ml-16 pt-4 pb-4 border-b border-gray-300 bg-gray-200 z-40 transition-transform duration-300" id="navbar">
        <div class="flex w-full justify-between items-center h-5">
            <div class="ml-2 md:ml-14 md:mr-20 text-xl sm:text-2xl text-gray-500">
                KEWAM Computer Repair and Services
            </div>
            <div class="flex flex-row justify-end">
                <a href="#top">
                    <div class="ml-2 md:ml-2 md:mr-16 text-md sm:text-md font-bold text-gray-700">
                        Summary
                    </div>
                </a>
                <a href="#status">
                    <div class="ml-2 md:ml-2 md:mr-16 text-md sm:text-md font-bold text-gray-700">
                        Status
                    </div>
                </a>
                <a href="#logs">
                    <div class="ml-2 md:ml-2 md:mr-16 text-md sm:text-md font-bold text-gray-700">
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



    <div class="flex flex-col md:ml-16 animate-fade-in z-10">
        <div class="text-md text-gray-600 font-medium mb-4 ml-40 mt-24"> <!-- Reduced ml-40 to ml-8 -->
            Inventory Summary
        </div>

        <div class="flex w-full px-24 justify-evenly">
            <!-- Inventory Cards -->
            <div class="bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm hover:bg-slate-200 hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                <img src="{{ asset('imgs/item.png') }}" alt="Quantity" class="w-9 h-9 mb-5">
                <p class="text-3xl font-bold">{{ $itemCount }}</p>
                <p class="text-gray-600 font-medium">Items</p>
            </div>

            <div class="bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm hover:bg-slate-200 hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                <img src="{{ asset('imgs/category.png') }}" alt="Quantity" class="w-10 h-11 mb-5">
                <p class="text-3xl font-bold">{{ $categoryCount }}</p>
                <p class="text-gray-600 font-medium mb-2">Item Categories</p>
            </div>

            <div class="bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm hover:bg-slate-200 hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                <img src="{{ asset('imgs/quantity.png') }}" alt="Quantity" class="w-9 h-9 mb-6">
                <p class="text-3xl font-bold">{{ $totalQuantity }}</p>
                <p class="text-gray-600 font-medium">Quantity</p>
            </div>

            <div class="bg-slate-400 bg-opacity-15 flex flex-col items-center justify-center w-44 h-40 border-r-2 border-r-slate-300 rounded-md shadow-slate-400 shadow-sm hover:bg-slate-200 hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                <img src="{{ asset('imgs/value.png') }}" alt="Quantity" class="w-9 h-9 mb-6">
                <p class="text-3xl font-bold">{{$SoldItems }}</p>
                <p class="text-gray-600 font-medium">Sold Items</p>
            </div>


        </div>
    </div>

    <div class="flex flex-col mt-10 mr-32 md:ml-44 ">

        <div class="flex flex-row justify-between ml-10 w-full">
            <div class="">
                <div class="bg-slate-400 bg-opacity-15 shadow-md shadow-slate-400 w-96">

                    <canvas id="itemChart" style="width: 100%; height: 230px;"></canvas>
                </div>
            </div>

            <div class="">
                <div class="bg-slate-400 bg-opacity-15 shadow-md shadow-slate-400 w-96">
                    <!-- Smaller size for the canvas -->
                    <canvas id="serviceChart" style="width: 100%; height: 230px;"></canvas>
                </div>
            </div>
            <span id="status" class=" mt-60"></span>
        </div>

        {{-- <div class="text-md text-gray-600 font-medium ml-11 mt-12"> <!-- Reduced ml-40 to ml-8 --> --}}
            {{-- Status of Services --}}
        {{-- </div> --}}

        <div class="flex flex-row justify-start ml-10 mt-10 w-full">
            <div class="">
                <p class=" ml-20 mt-7 text-sm">Status of Service</p>
                <div class=" mr-10">
                    <!-- Doughnut chart canvas -->
                    <canvas id="doughnutChart" style="width: 70%; height: 200px;"></canvas>
                </div>
            </div>
            <div class="">
                <div class="bg-slate-400 bg-opacity-15 shadow-md shadow-slate-400">
                    <!-- Smaller size for the canvas -->
                    <canvas id="salesChart" style="width: 100%; height: 269px;"></canvas>
                </div>
            </div>
        </div>





    </div>

    <!-- Logs Section -->
    <div class="text-md text-gray-600 font-medium ml-32 mb-20" id="logs">
        <p class="text-md text-gray-600 font-medium mb-4 ml-20 mt-14">Recent Activities</p>
        <div class=" flex flex-col pl-16 pr-32">
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
<div id="logModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
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

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Item chart configuration
    const itemCtx = document.getElementById('itemChart');
    new Chart(itemCtx, {
        type: 'bar',
        data: {
            labels: @json($itemlabels),  // Pass the labels dynamically
            datasets: [{
                label: 'Highest Quantity',
                data: @json($itemdata),  // Pass the data dynamically
                borderWidth: 1,
                barThickness: 25, // Set a fixed bar width for all bars
                backgroundColor: 'orange', // Set all bars to orange color
            }]
        },
        options: {
            responsive: true,  // Ensure chart is responsive
            scales: {
                y: {
                    beginAtZero: true,
                    max: {{ $itemAdjustedMax }}
                },
                x: {
                    categoryPercentage: 0.5,  // Adjusts the space for categories
                    barPercentage: 0.5,       // Adjusts bar width within each category
                    ticks: {
                        font: {
                            size: 8,  // Smaller font size for the x-axis labels
                        },
                        rotation: 0,  // Set rotation to 0 for horizontal labels
                        autoSkip: true, // Skip labels if they overlap
                        maxRotation: 0, // Prevent the labels from rotating
                        minRotation: 0  // Prevent the labels from rotating
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 13,  // Smaller font size for the legend
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
            responsiveAnimationDuration: 1000,  // Adjust responsiveness delay
            maintainAspectRatio: false, // Prevents aspect ratio distortion when resizing
        }
    });

    // Service chart configuration
    const serviceCtx = document.getElementById('serviceChart');
new Chart(serviceCtx, {
    type: 'bar',
    data: {
        labels: @json($service),  // Pass the service names dynamically
        datasets: [{
            label: 'Highest Service Rate',
            data: @json($servicePrice),  // Pass the price data dynamically
            borderWidth: 1,
            barThickness: 25, // Set a fixed bar width for all bars
            backgroundColor: 'green', // Set all bars to green color
        }]
    },
    options: {
        responsive: true,  // Ensure chart is responsive
        scales: {
            y: {
                beginAtZero: true,
                max: {{ $ServiceAdjustedMax }}  // Use the dynamically passed max value
            },
            x: {
                categoryPercentage: 0.5,  // Adjusts the space for categories
                barPercentage: 0.5,       // Adjusts bar width within each category
                ticks: {
                    font: {
                        size: 8,  // Smaller font size for the x-axis labels
                    },
                    rotation: 0,  // Rotate the labels vertically
                    autoSkip: true, // Skip labels if they overlap
                    maxRotation: 0, // Prevent labels from rotating further
                    minRotation: 0  // Prevent labels from rotating in the other direction
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 13,  // Smaller font size for the legend
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
        responsiveAnimationDuration: 1000,  // Adjust responsiveness delay
        maintainAspectRatio: false, // Prevents aspect ratio distortion when resizing
    }
});

</script>


<script>
    const doughnutCtx = document.getElementById('doughnutChart');
new Chart(doughnutCtx, {
    type: 'doughnut',
    data: {
        labels: ['Complete', 'Incomplete'],  // Labels for the chart segments
        datasets: [{
            label: 'Status of Services',  // Dataset label
            data: [{{ $completeCount }}, {{ $incompleteCount }}],  // Dynamic data
            backgroundColor: ['#2ea802', '#FF5733'],  // Colors for each section
            borderWidth: 1,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,  // Ensure legend is visible
                position: 'left',  // Place the legend on the left

                labels: {
                    font: {
                        size: 13,  // Font size for the legend
                        family: "'Arial', sans-serif",
                        weight: 'normal',  // Default weight is normal
                    },
                    color: '#333',  // Color of the legend text
                    usePointStyle: false, // Use point style for the legend (circle)
                    boxWidth: 18, // Width of the color box
                    padding: 12,  // Add some padding between the box and label
                },
                    padding: {
                    top: 40, // Adjust the top padding to create space above the legend
                    left: 10,
                    right: 10,
                    bottom: 10,
                }
            },
            tooltip: {
                backgroundColor: '#333',  // Dark background for the tooltip
                bodyColor: '#fff',        // White text for better contrast
                borderColor: '#ffcc00',   // Optional: Add a border color
                borderWidth: 1,           // Optional: Define border width
                padding: {
                    top: 5,              // Adjust top padding
                    bottom: 10,           // Adjust bottom padding
                    left: 5,             // Wider left padding
                    right: 30             // Wider right padding
                },
                cornerRadius: 4,          // Rounds the corners of the tooltip
                titleFont: {
                    size: 11,             // Bold and readable title font size
                    weight: 'bold',
                    family: "'Arial', sans-serif", // Font family
                },
                bodyFont: {
                    size: 10,             // Slightly smaller body text size
                    family: "'Arial', sans-serif",
                },
                callbacks: {
                    label: function (context) {
                        const label = context.label;       // Segment label
                        const value = context.raw;         // Segment value
                        const total = context.dataset.data.reduce((sum, val) => sum + val, 0); // Calculate total
                        const percentage = ((value / total) * 100).toFixed(1); // Calculate percentage
                        return `${label}: ${value} (${percentage}%)`; // Custom tooltip text
                    }
                },
            },

        },
        maintainAspectRatio: false, // Allows better responsiveness
        onClick: function (e) {
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
    const salesData = @json($sales_data);  // Converts PHP array to JavaScript object
    const labels = @json($labels);         // Converts PHP array to JavaScript array

    // Prepare the dataset for the chart
    const chartData = {
        labels: labels,
        datasets: [{
            label: 'Sales',
            data: labels.map(label => salesData[label] || 0),  // Map the data to the labels
            borderWidth: 1,
            fill: false, // This removes the fill for the line chart
            borderColor: 'orange',  // Set the line color to orange
            tension: 0.1  // Makes the line less curved
        }]
    };

    // Chart configuration
    new Chart(itemCtx, {
        type: 'line',
        data: chartData,
        options: {
            responsive: true,
            animation: {
                duration: 1200,  // Time for the animation (1 second)
                easing: 'easeOut ', // Easing function for a bounce effect
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: Math.max(...Object.values(salesData)) + 50000  // Dynamic max value
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
                    borderWidth: 2,  // Adjust line width
                }
            },
            responsiveAnimationDuration: 1000,
            maintainAspectRatio: false,
        }
    });
});
</script>


