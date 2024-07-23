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
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 rounded-s-lg">
                                                Nama tugas
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Keterangan
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Deadline
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Upload File
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                         
                                        @if ($task->progress == 'Belum Mulai')
                                            
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td class="px-6 py-4">
                                                {{ $task->nama }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $task->keterangan }}
                                            </td>
                                            <td class="px-6 py-4">
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
                                            <td class="px-6 py-4">
                                                {{ $task->waktuMulai }} sampai {{ $task->waktuSelesai }}    
                                            </td>
                                            <td class="px-6 py-4">
                                                @if ($task->namaFile == null)
                                                    <form action="">
                                                        <input type="file" placeholder="Upload File">
                                                    </form>
                                                @else
                                                    <a href="/files/download/{{ $task->id }}">
                                                        <button class="inline-flex rounded bg-blue-700 px-3 py-1 font-medium text-white hover:bg-opacity-90 sm:px-6 sm:py-2.5">Sudah Upload</button>
                                                    </a>  
                                                @endif
                                            </td>
                                        </tr>

                                        @endif

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="w-full mb-6">
                            <h5 class="mb-4 text-lg font-medium text-black dark:text-white">In Progress</h5>
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 rounded-s-lg">
                                                Nama tugas
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Keterangan
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Deadline
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Upload File
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                         
                                        @if ($task->progress == 'In Progress')
                                            
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td class="px-6 py-4">
                                                {{ $task->nama }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $task->keterangan }}
                                            </td>
                                            <td class="px-6 py-4">
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
                                            <td class="px-6 py-4">
                                                {{ $task->waktuMulai }} sampai {{ $task->waktuSelesai }}    
                                            </td>
                                            <td class="px-6 py-4">
                                                @if ($task->namaFile == null)
                                                    <form action="">
                                                        <input type="file" placeholder="Upload File">
                                                    </form>
                                                @else
                                                    <a href="/files/download/{{ $task->id }}">
                                                        <button class="inline-flex rounded bg-blue-700 px-3 py-1 font-medium text-white hover:bg-opacity-90 sm:px-6 sm:py-2.5">Sudah Upload</button>
                                                    </a>  
                                                @endif
                                            </td>
                                        </tr>

                                        @endif

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="w-full mb-6">
                            <h5 class="mb-4 text-lg font-medium text-black dark:text-white">Completed</h5>
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 rounded-s-lg">
                                                Nama tugas
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Keterangan
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Deadline
                                            </th>
                                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                                Upload File
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                         
                                        @if ($task->progress == 'Completed')
                                            
                                        <tr class="bg-white dark:bg-gray-800">
                                            <td class="px-6 py-4">
                                                {{ $task->nama }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $task->keterangan }}
                                            </td>
                                            <td class="px-6 py-4">
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
                                            <td class="px-6 py-4">
                                                {{ $task->waktuMulai }} sampai {{ $task->waktuSelesai }}    
                                            </td>
                                            <td class="px-6 py-4">
                                                @if ($task->namaFile == null)
                                                    ]
                                                @else
                                                <div class="flex">
                                                    <a href="/files/download/{{ $task->id }}">
                                                        <button class="inline-flex rounded bg-blue-700 px-3 py-1 font-medium text-white hover:bg-opacity-90 sm:px-6 sm:py-2.5">Sudah Upload</button>
                                                    </a>
                                                    <form action="/contents/users/{{ $user->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" onclick="return confirm('User akan dihapus?')" class="hover:text-blue-700">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                                <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                                @endif
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

        $('.uploadFile').change(function() {
            var taskId = $(this).data('task-id');
            $('#btnUpload' + taskId).click();
            console.log('Document is ready'); 
        });
    });
</script>
<x-foot></x-foot>