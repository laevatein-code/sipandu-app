<x-head_2></x-head_2>
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64 bg-gray-200 h-full">
   <div class="p-4 rounded-lg mt-14">
      <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
         <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-bold text-black dark:text-white text-2xl">Dashboard</h2>
            <p class="font-medium">Sipandu / Dashboard</p>
         </div>
         <div class="mt-7 grid grid-cols-12 gap-4 md:gap-6 2xl:gap-7">
            <div class="col-span-12 rounded-sm border bg-white px-5 pb-5 pt-7 shadow-sm sm:px-7 xl:col-span-5">
               <div class="mb-3 justify-between gap-4 sm:flex">
                  <h4 class="text-xl font-bold text-black dark:text-white">Monitoring Seluruh Task</h4>
               </div>
               <hr>
               <div class="p-4 md:p-6 xl:p-7">
                  <canvas id="chartPie"></canvas>
               </div>
            </div>
            <div class="col-span-12 rounded-sm border bg-white px-7 py-6 shadow-sm xl:col-span-7">
               <div class="mb-3 justify-between gap-4 sm:flex">
                  <h4 class="text-xl font-bold text-black dark:text-white">Monitoring Task Berdasarkan Seksi</h4>
               </div>
               <hr>
               <div class="p-4 md:p-6 xl:p-7">
                  <canvas id="chartBar"></canvas>
               </div>
            </div>
            <div class="col-span-12">
               <div class="rounded-sm border bg-white shadow-sm dark:bg-gray-800">
                  <div class="p-4 md:p-6 xl:p-7">
                     <div class="flex items-start justify-between">
                        <h2 class="text-xl font-medium">Peta Teluk Wondama</h2>
                     </div>
                  </div>
                  <hr>
                  <div class="p-4 md:p-6 xl:p-7">
                     <div id="map"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   var map = L.map('map').setView([-2.7258, 134.5263], 13);

   // Tambahkan lapisan peta OpenStreetMap
   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
   attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
   }).addTo(map);

   // Barchart
   const data = {
      labels: ['A', 'B', 'C', 'D', 'E', 'F', 'G'],
      datasets: [{
        label: 'Sample Data',
        data: [30, 80, 45, 60, 20, 90, 55],
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    };

    // Config
    const config = {
      type: 'bar',
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            display: true,
            labels: {
              color: 'rgb(0, 0, 0)'
            }
          }
        }
      }
    };

    // Render chart
    const myChart = new Chart(
      document.getElementById('chartBar'),
      config
    );

    // Pie Chart
    const data2 = {
      labels: ['A', 'B', 'C', 'D', 'E', 'F', 'G'],
      datasets: [{
        label: 'Sample Data',
        data: [30, 80, 45, 60, 20, 90, 55],
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(255, 206, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)',
          'rgba(153, 102, 255, 0.6)',
          'rgba(255, 159, 64, 0.6)',
          'rgba(199, 199, 199, 0.6)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(199, 199, 199, 1)'
        ],
        borderWidth: 1
      }]
    };

    // Config
    const config2 = {
      type: 'pie',
      data: data2,
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return `${tooltipItem.label}: ${tooltipItem.raw}`;
              }
            }
          }
        }
      }
    };

    // Render chart
    const myPieChart = new Chart(
      document.getElementById('chartPie'),
      config2
    );
</script>  
<x-foot></x-foot>