<x-navigationBar></x-navigationBar>

<div class="md:ml-16 pt-4 pb-4 border-b border-gray-300">
    <div class="flex w-full items-center justify-between h-7">
        <div class="ml-2 md:ml-20 md:mr-28 text-xl sm:text-2xl text-gray-500">
            Reports
        </div>
    </div>
</div>

<div class="flex flex-col h-screen">
    <div class=" ml-24 flex-1">
        <p class="text-xl text-gray-500 ml-5 mt-5">Items</p>

        <div class="bg-slate-100 shadow-md shadow-slate-400 w-96 ml-10 mt-5">
            <!-- Smaller size for the canvas -->
            <canvas id="itemChart" style="width: 100%; height: 200px;"></canvas>
        </div>
    </div>

    <div class="ml-24 flex-1">
        <p class="text-xl text-gray-500 ml-5 mt-5 ">Services</p>

        <div class="flex flex-row">
            <div class="bg-slate-100 shadow-md shadow-slate-400 w-96 ml-10 mt-5">
                <!-- Smaller size for the canvas -->
                <canvas id="serviceChart" style="width: 100%; height: 200px;"></canvas>
            </div>

            <div class=" w-32 ml-10 mt-5">
                <!-- Doughnut chart canvas -->
                <canvas id="doughnutChart" style="width: 50%; height: 100px;"></canvas>
            </div>
        </div>
    </div>
</div>

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
                label: 'Quantity',
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
                            size: 10,  // Smaller font size for the legend
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
                label: 'Highest Prices',
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
                            size: 10,  // Smaller font size for the legend
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
            backgroundColor: ['#FF5733', '#2ea802'],  // Colors for each section
            borderWidth: 1,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false,  // Hides the legend
            },
            tooltip: {
                backgroundColor: '#333',  // Dark background for the tooltip
                bodyColor: '#fff',        // White text for better contrast
                borderColor: '#ffcc00',   // Optional: Add a border color
                borderWidth: 1,           // Optional: Define border width
                padding: {
                    top: 10,              // Adjust top padding
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
            title: {
                display: true,
                text: 'Status of Services',
                font: {
                    size: 14,
                    weight: 'bold',
                },
                padding: {
                    top: 10,
                    bottom: 10,
                },
            },
        },
        maintainAspectRatio: false, // Allows better responsiveness
    }
});



</script>
