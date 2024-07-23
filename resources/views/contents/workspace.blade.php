<x-head_2></x-head_2>
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64 bg-gray-200 h-screen">
    <div class="p-4 rounded-lg mt-14">
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black dark:text-white text-2xl">Task List</h2>
                <p class="font-medium">Sipandu / Workspace</p>
            </div>
            <div class="flex flex-col gap-y-4 rounded-sm border bg-white p-3 shadow-sm sm:flex-row sm:items-center sm:justify-between">
                <h3 class="text-xl">Tasks Total</h3>
                <h4 class="text-xl">{{ $tasks->count() }} tugas</h4>
            </div>
            <div class="mt-6 flex flex-col gap-6">
                <div class="flex flex-col gap-5">
                    <h4 class="text-xl font-bold text-black dark:text-white">Task Saya</h4>
                    <div class="relative flex flex-col justify-between rounded-sm border bg-white p-7 shadow-sm">
                        <div class="w-full mb-6">
                            @if (session()->has('success'))
                                <div class="w-full text-green-500 text-center p-4" role="alert">
                                    <div class="flex w-full border-l-6 border-[#34D399] bg-[#34D399] bg-opacity-[15%] px-7 py-8 shadow-md dark:bg-[#1B1B24] dark:bg-opacity-30 md:p-9">
                                        <div class="mr-5 flex h-9 w-full max-w-[36px] items-center justify-center rounded-lg bg-[#34D399]">
                                          <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.2984 0.826822L15.2868 0.811827L15.2741 0.797751C14.9173 0.401867 14.3238 0.400754 13.9657 0.794406L5.91888 9.45376L2.05667 5.2868C1.69856 4.89287 1.10487 4.89389 0.747996 5.28987C0.417335 5.65675 0.417335 6.22337 0.747996 6.59026L0.747959 6.59029L0.752701 6.59541L4.86742 11.0348C5.14445 11.3405 5.52858 11.5 5.89581 11.5C6.29242 11.5 6.65178 11.3355 6.92401 11.035L15.2162 2.11161C15.5833 1.74452 15.576 1.18615 15.2984 0.826822Z" fill="white" stroke="white"></path>
                                          </svg>
                                        </div>
                                        <div class="w-full">
                                          <h5 class="mb-3 text-lg font-bold text-black dark:text-[#34D399]">
                                            {{ session('success') }}
                                          </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        <h5 class="mb-4 text-lg font-medium text-black dark:text-white">To do's</h5>
                        <div class="max-w-full overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr class=" bg-gray-200 text-left">
                                        <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Nama Tugas</th>
                                        <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Keterangan</th>
                                        <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Deadline</th>
                                        <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Progress</th>
                                        <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Upload File</th>
                                        <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    @if ($task->progress == 'Belum Mulai')
                                        
                                    <tr>
                                        <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $task->nama }}</td>
                                        <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $task->keterangan }}</td>
                                        <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $task->waktuMulai }} sampai {{ $task->waktuSelesai }}</td>
                                        <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                            <form id="form-{{ $task->id }}" action="{{ route('workspace.submit', $task->id) }}" class="dropdownForm" method="POST">
                                                @csrf
                                                @method('put')
                                                <select name="dropdown" class="dropdown p-2 border border-gray-300 rounded" data-form-id="{{ $task->id }}">
                                                    <option value="Belum Mulai" selected>Belum Mulai</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                                <button type="submit" class="hidden"></button>
                                            </form>
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                            @if ($task->namaFile == null)
                                                    Belum Upload
                                                @else
                                                    <a href="/files/download/{{ $task->id }}">
                                                        <button class="inline-flex rounded bg-blue-700 px-3 py-1 font-medium text-white hover:bg-opacity-90 sm:px-6 sm:py-2.5">Sudah Upload</button>
                                                    </a>  
                                                @endif
                                        </td>
                                        <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                            <div class="flex items-center space-x-3.5">
                                                <a href="/contents/workspaces/upload/{{ $task->id }}"><button type="button" class="hover:text-blue-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                                      </svg>                                              
                                                </button></a>
                                            </div>
                                        </td>
                                    </tr>
                                         
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="w-full my-6">
                            <h5 class="mb-4 text-lg font-medium text-black dark:text-white">In Progress</h5>
                            <div class="max-w-full overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class=" bg-gray-200 text-left">
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Nama Tugas</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Keterangan</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Deadline</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Progress</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Upload File</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                        @if ($task->progress == 'In Progress')
                                            
                                        <tr>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $task->nama }}</td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $task->keterangan }}</td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $task->waktuMulai }} sampai {{ $task->waktuSelesai }}</td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                                <form id="form-{{ $task->id }}" action="{{ route('workspace.submit', $task->id) }}" class="dropdownForm" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <select name="dropdown" class="dropdown p-2 border border-gray-300 rounded" data-form-id="{{ $task->id }}">
                                                        <option value="Belum Mulai">Belum Mulai</option>
                                                        <option value="In Progress" selected>In Progress</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                    <button type="submit" class="hidden"></button>
                                                </form>
                                            </td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                                @if ($task->namaFile == null)
                                                        Belum Upload
                                                    @else
                                                        <a href="/files/download/{{ $task->id }}">
                                                            <button class="inline-flex rounded bg-blue-700 px-3 py-1 font-medium text-white hover:bg-opacity-90 sm:px-6 sm:py-2.5">Sudah Upload</button>
                                                        </a>  
                                                    @endif
                                            </td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                                <div class="flex items-center space-x-3.5">
                                                    <a href="/contents/workspaces/upload/{{ $task->id }}"><button type="button" class="hover:text-blue-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                                          </svg>                                              
                                                    </button></a>
                                                </div>
                                            </td>
                                        </tr>
                                             
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="w-full my-6">
                            <h5 class="mb-4 text-lg font-medium text-black dark:text-white">Completed</h5>
                            <div class="max-w-full overflow-x-auto">
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class=" bg-gray-200 text-left">
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Nama Tugas</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Keterangan</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Deadline</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Progress</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Upload File</th>
                                            <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                        @if ($task->progress == 'Completed')
                                            
                                        <tr>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $task->nama }}</td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $task->keterangan }}</td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">{{ $task->waktuMulai }} sampai {{ $task->waktuSelesai }}</td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                                <form id="form-{{ $task->id }}" action="{{ route('workspace.submit', $task->id) }}" class="dropdownForm" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <select name="dropdown" class="dropdown p-2 border border-gray-300 rounded" data-form-id="{{ $task->id }}">
                                                        <option value="Belum Mulai">Belum Mulai</option>
                                                        <option value="In Progress">In Progress</option>
                                                        <option value="Completed" selected>Completed</option>
                                                    </select>
                                                    <button type="submit" class="hidden"></button>
                                                </form>
                                            </td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                                @if ($task->namaFile == null)
                                                        Belum Upload
                                                    @else
                                                        <a href="/files/download/{{ $task->id }}">
                                                            <button class="inline-flex rounded bg-blue-700 px-3 py-1 font-medium text-white hover:bg-opacity-90 sm:px-6 sm:py-2.5">Sudah Upload</button>
                                                        </a>  
                                                    @endif
                                            </td>
                                            <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                                <div class="flex items-center space-x-3.5">
                                                    <a href="/contents/workspaces/upload/{{ $task->id }}"><button type="button" class="hover:text-blue-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                                          </svg>                                              
                                                    </button></a>
                                                </div>
                                            </td>
                                        </tr>
                                             
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        console.log('Document is ready'); 
        $('.dropdown').change(function() {
            var formId = $(this).data('form-id'); // Ambil ID form dari atribut data
            var $form = $('#form-' + formId); // Temukan form dengan ID yang sesuai
            
            $form.find('button[type="submit"]').click(); // Klik tombol submit di dalam form
        });
    });
</script>
<x-foot></x-foot>