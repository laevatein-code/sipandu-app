<x-head_2></x-head_2>
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64 bg-gray-200 h-screen">
    <div class="p-4 rounded-lg mt-14">
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="font-bold text-black dark:text-white text-2xl">Daftar Tasks</h2>
                <p class="font-medium">Sipandu / Semua Tugas</p>
            </div>
            <div class="rounded-sm border shadow-sm bg-white px-5 pb-4 pt-6 sm:px-7 xl:pb-1">
                <div class="max-w-full overflow-x-auto data-table data-table-container mb-5">
                    <table class="w-full table-auto" id="dataTables">
                        <thead>
                            <tr class="bg-gray-200 text-left">
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Nama Tugas</th>
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Nama Petugas</th>
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Status</th>
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Tenggat Waktu</th>
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">File Upload</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $item->nama }}</td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $item->petugas }}</td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $item->progress }}</td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11" id="countdown{{ $item->id }}"></td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    @if ($item->namaFile == null)
                                        Belum Upload
                                    @else
                                        <a href="/files/download/{{ $item->id }}">
                                            <button class="inline-flex rounded bg-blue-700 px-3 py-1 font-medium text-white hover:bg-opacity-90 sm:px-6 sm:py-2.5">Download</button>
                                        </a>  
                                    @endif
                                </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    @if (session()->has('success'))
                    <div class="w-full text-green-500 text-center p-4" role="alert">
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.tailwindcss.com/"></script>
<script src="https://cdn.datatables.net/2.1.0/js/dataTables.tailwindcss.js"></script>
<script>
    $('#dataTables').DataTable();

    @foreach ($items as $item)
        
    document.addEventListener('DOMContentLoaded', function () {
        const latestUploadDate = new Date('{{ $item->waktuSelesai }}');
        const targetDate = new Date(latestUploadDate.getFullYear(), latestUploadDate.getMonth(), latestUploadDate.getDate() + 1); // Hitung mundur ke hari berikutnya
        const countdownElement = document.getElementById('countdown{{ $item->id }}');

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            countdownElement.innerHTML = days + "Hari " + hours + "Jam " +
                minutes + "Menit " + seconds + "Detik ";

            if (distance < 0) {
                clearInterval(interval);
                countdownElement.innerHTML = "EXPIRED";
            }
        }

        const interval = setInterval(updateCountdown, 1000);
        updateCountdown();
    });

    @endforeach
</script>
<x-foot></x-foot>