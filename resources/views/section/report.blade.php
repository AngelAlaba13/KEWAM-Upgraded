<x-navigationBar></x-navigationBar>

<div class="flex flex-col h-screen">
    <div class="bg-slate-200 flex-1 ml-16 ">
        <p class="text-xl text-gray-500 ml-5 mt-5">Items</p>

        <div>
            <canvas id="myChart"></canvas>
          </div>

          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

          <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                  label: '# of Votes',
                  data: [12, 19, 3, 5, 2, 3],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>

    </div>

    <div class="bg-zinc-200 flex-1 ml-16 text-xl text-gray-500">
        <p class="text-xl text-gray-500 ml-5 mt-5">Services</p>
    </div>
</div>


