<x-head_bk></x-head_bk>
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64 bg-gray-200 h-full">
    <div class="p-4 rounded-lg mt-14">
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black dark:text-white text-2xl">Gantt Chart</h2>
                <p class="font-medium">Sipandu / Beban Kerja</p>
            </div>
            <div class="mt-6 flex flex-col gap-6">
                <div class="flex flex-col gap-5">
                    <div class="relative flex flex-col justify-between rounded-sm border bg-white p-7 shadow-sm">
                        <div class="chartCard">
                            <div class="chartBox relative">
                              <canvas id="myChart" class="relative"></canvas>
                              <input type="month" onchange="chartFilter(this)" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-foot></x-foot>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<script>
// setup 
const data = {
      //labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [
            @foreach ($items as $item)
            @if ($item->petugas == 'Adisti Dama Allo Mongan')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Adisti Dama Allo Mongan', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            @if ($item->petugas == 'Beta Gunarti Brilliana')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Beta Gunarti Brilliana', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Bice Diana Thesia')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Bice Diana Thesia', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Ferry Dominggus Waroropui')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Ferry Dominggus Waroropui', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Galih Hasan Ibrahim')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Galih Hasan Ibrahim', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Habib Ramadhanni')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Habib Ramadhanni', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Januar Wahyu Ramadhani Winartono')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Januar Wahyu Ramadhani Winartono', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Krisna Dwi Agung Wijaya')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Krisna Dwi Agung Wijaya', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Laspita Sinaga')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Laspita Sinaga', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Nia Ratri Arumsari')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Nia Ratri Arumsari', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Pandu Elkana Setyawan')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Pandu Elkana Setyawan', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif

            @if ($item->petugas == 'Rafly Amanatulla')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Rafly Amanatulla', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},  
            @endif
            
            @if ($item->petugas == 'Saskia Khairunnisa')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Saskia Khairunnisa', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Siti Rahmi Nur Afifah')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Siti Rahmi Nur Afifah', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},  
            @endif
            
            @if ($item->petugas == 'Sri Marsela')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Sri Marsela', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            
            @if ($item->petugas == 'Yulianus Krimadi')
            {x: ['{{ date("Y-m-d", strtotime($item->waktuMulai)) }}', '{{ date("Y-m-d", strtotime($item->waktuSelesai)) }}'], y: 'Yulianus Krimadi', status: "{{ $item->progress }}", nama: "{{ $item->nama }}"},
            @endif
            @endforeach
            {x: ['', ''], y: 'Adisti Dama Allo Mongan', status: ''},
            {x: ['', ''], y: 'Beta Gunarti Brilliana', status: ''},
            {x: ['', ''], y: 'Bice Diana Thesia', status: ''},
            {x: ['', ''], y: 'Ferry Dominggus Waroropui', status: ''},
            {x: ['', ''], y: 'Galih Hasan Ibrahim', status: ''},
            {x: ['', ''], y: 'Habib Ramadhanni', status: ''},
            {x: ['', ''], y: 'Januar Wahyu Ramadhani Winartono', status: ''},
            {x: ['', ''], y: 'Krisna Dwi Agung Wijaya', status: ''},
            {x: ['', ''], y: 'Laspita Sinaga', status: ''},
            {x: ['', ''], y: 'Nia Ratri Arumsari', status: ''},
            {x: ['', ''], y: 'Pandu Elkana Setyawan', status: ''},
            {x: ['', ''], y: 'Rafly Amanatulla', status: ''},
            {x: ['', ''], y: 'Saskia Khairunnisa', status: ''},
            {x: ['', ''], y: 'Siti Rahmi Nur Afifah', status: ''},
            {x: ['', ''], y: 'Sri Marsela', status: ''},
            {x: ['', ''], y: 'Yulianus Krimadi', status: ''},
        ],
        backgroundColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1,
        borderSkipped: false,
        borderRadius: 10,
        barPercentage: 0.5,
      }]
    };

    // todayline
    const todayLine = {
        id: 'todayLine',
        afterDatasetsDraw(chart, args, pluginOptions) {
            const { ctx, data, chartArea: {top, bottom, left, right}, scales: {x,y} } = chart;

            ctx.save();

            if(x.getPixelForValue(new Date()) >= left && x.getPixelForValue(new Date()) <= right)
            {
              ctx.beginPath();
              ctx.lineWidth = 3;
              ctx.strokeStyle = 'rgba(255,26,104,1)';
              ctx.setLineDash([6,6]);
              ctx.moveTo(x.getPixelForValue(new Date()),top);
              ctx.lineTo(x.getPixelForValue(new Date()),bottom);
              ctx.stroke();
            }
        }
    }

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        responsive: true,
        indexAxis: 'y',
        scales: {
          x: {
            position: 'top',
            type: 'time',
            time: {
                unit: 'day',
                displayFormats: {
                  day: 'd',
                }
            },
            min: `${new Date().toJSON().slice(0,8)}01`,
            max: `${new Date(new Date().getFullYear(), new Date().getMonth()+1, 0).toJSON().slice(0,10)}`
          }
        },
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            callbacks: {
              label: (ctx) => {
                return ''
              },
              beforeTitle: (ctx) => {
                return ctx[0].raw.y
              },
              afterTitle: (ctx) => {
                return `Status: ${ctx[0].raw.status}`
              },
              title: (ctx) => {
                const startDate = new Date(ctx[0].raw.x[0])
                const endDate = new Date(ctx[0].raw.x[1])
                const formattedStartDate = startDate.toLocaleString([],{
                  year: 'numeric',
                  month: 'short',
                  day: 'numeric',
                });
                const formattedendDate = endDate.toLocaleString([],{
                  year: 'numeric',
                  month: 'short',
                  day: 'numeric',
                });
                return `Deadline: ${formattedStartDate} - ${formattedendDate}`;
              },
              footer: (ctx) => {
                return `Tugas: ${ctx[0].raw.nama}`
              }
            }
          }
        }
      },
      plugins: [todayLine]
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    function chartFilter(date) {
      const year = date.value.substring(0,4);
      const month = date.value.substring(5,7);

      const lastDay = (y, m)=>{
        return new Date(y,m,0).getDate();
      }

      const startDate = (`${year}-${month}-01`);
      const endDate = (`${year}-${month}-${lastDay(year,month)}`);

      myChart.config.options.scales.x.min = startDate;
      myChart.config.options.scales.x.max = endDate;
      myChart.update();

    }

    // Instantly assign Chart.js version
    const chartVersion = document.getElementById('chartVersion');
</script>