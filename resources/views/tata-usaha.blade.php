<x-head></x-head>
<x-navbar></x-navbar>
<div x-data="{isTask: false}">

<div x-show="isTask" :class="{'hidden': !isTask, 'block': isTask }" class=" backdrop-blur content-center flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah Task Baru
                </h3>
                <button @click="isTask = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="/tata-usaha" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Tugas" required>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Tambah Task
                </button>
            </form>
        </div>
    </div>
</div>
<div class="flex">
    <aside class="sticky h-screen top-0 pt-4 max-sm:hidden bg-gray-900 w-[300px]">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
              <h1 class="font-bold text-gray-200 text-[15px] ml-3">My Workspace</h1>
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        
        <div class="h-full pb-4 overflow-y-auto bg-gray-900">
            <a href="/ipds" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <span class="text-[15px] ml-4 text-gray-200 font-bold">IPDS</span>
            </a>
            <a href="/sosial" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
               
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Sosial</span>
            </a>
            <a href="/distribusi" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
               
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Distribusi</span>
            </a>
            <a href="/produksi" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
              
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Produksi</span>
            </a>
            <a href="/neraca" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
               
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Neraca</span>
            </a>
            <a href="/tata-usaha" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
               
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Tata Usaha</span>
            </a>
         </div>
    </aside>
    <main class="p-4 sm:ml-58 w-full">
        <div class="p-4 border-2 bg-gray-100 rounded-lg">
            {{-- Kepala Judul --}}
            <div class="pb-4">
                <span class="text-4xl">Tata Usaha</span>
            </div>
            {{-- Menu kontrol new task --}}
            <div class="flex space-x-2">
                <button @click="isTask = !isTask" type="button" class="py-2 items-center inline-flex hover:bg-blue-300 bg-blue-500 rounded-md text-center text-slate-100">
                    <span class="ms-3">New task</span>
                    
                    <svg class="w-3.5 h-3.5 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                     </svg>
                </button>
                @if (session()->has('sukses'))
                    <div class="py-2 px-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <span class="font-medium">{{ session('sukses') }}</span>
                    </div>
                @endif
                
            </div>
            <hr class="h-px my-3 dark:bg-black bg-black border-0">
            <div id="tableContainer">
                <div id="formTask">
                @foreach ($workspace as $w)
                <div class="container mx-auto space-y-8 py-4">
                    <div id="tugas" class="flex justify-between pb-0 text-left rtl:text-right text-gray-900">
                        @if ($w['id'] != null)
                        <p id="toDo-{{ $w['id'] }}">{{ $w['nama'] }}</p>
                        <div class="flex" x-data="{isEdit{{ $w->id }}: false}">
                            <button @click="isEdit{{ $w->id }} = !isEdit{{ $w->id }}" class="bg-blue-500 text-white px-2 rounded hover:bg-blue-700">Edit</button>
                            <div x-show="isEdit{{ $w->id }}" :class="{'hidden': !isEdit{{ $w->id }}, 'block': isEdit{{ $w->id }} }" class=" backdrop-blur content-center flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Edit Task
                                            </h3>
                                            <button @click="isEdit{{ $w->id }} = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="/tata-usaha/{{ $w->id }}" method="POST" class="p-4 md:p-5">
                                            @csrf
                                            @method('put')
                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                    <input value="{{ $w->nama }}" type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                                </div>
                                            </div>
                                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Simpan
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                            <form action="{{ route('tata-usaha.destroy', $w->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 text-white px-2 rounded hover:bg-red-700" onclick="return confirm('Apakah dihapus?')">Delete</button>
                            </form> 
                        </div>   
                        @else
                            <p>Belum ada tugas</p>
                        @endif
                        
                    </div>
                    <div class="overflow-x-auto mb-4">
                        <table id="dynamicTable" class="min-w-full bg-white border border-gray-300 rounded-md shadow">
                            <thead class="bg-gray-200">
                                <tr id="tableHeader-{{ $w['id'] }}">
                                    <th class="p-2 border border-gray-300 cursor-pointer text-left">Nama Tugas</th>
                                    <th class="p-2 border border-gray-300 cursor-pointer text-left">Anggota</th>
                                    <th class="p-2 border border-gray-300 cursor-pointer text-left">Status</th>
                                    <th class="p-2 border border-gray-300 cursor-pointer text-left">Tenggat Waktu</th>
                                    <th class="p-2 border border-gray-300 cursor-pointer text-left">Files</th>
                                    <th class="p-2 border border-gray-300 cursor-pointer text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody-{{ $w['id'] }}">
                                @foreach ($items as $item) 
                                    @if ($item->workspace_id === $w['id'] && (auth()->user()->status == 'User' || auth()->user()->seksi_id == 6 || $item->is_upload == 'Sudah Upload' || $item->is_upload == 'Disetujui'))
                                    <div>
                                        <tr>
                                            <td class="p-2 border border-gray-300 editable-cell">{{ $item->nama }}</td>
                                            <td class="p-2 border border-gray-300 editable-cell">{{ $item->Anggota }}</td>
                                            <td class="p-2 border border-gray-300 editable-cell">
                                                <select class="bg-white border border-gray-300 rounded px-2 py-1" disabled>
                                                    @if ($item->status == "Not Started")
                                                        <option value="Not Started" selected="selected">Not Started</option>
                                                        <option value="In Progress">In Progress</option>
                                                        <option value="Completed">Completed</option>
                                                    @elseif ($item->status == "In Progress")
                                                        <option value="Not Started">Not Started</option>
                                                        <option value="In Progress" selected="selected">In Progress</option>
                                                        <option value="Completed">Completed</option>
                                                    @elseif ($item->status == "Completed")
                                                        <option value="Not Started">Not Started</option>
                                                        <option value="In Progress">In Progress</option>
                                                        <option value="Completed" selected="selected">Completed</option>
                                                    @endif
                                                </select>
                                            </td>
                                            <td class="p-2 border border-gray-300 editable-cell">
                                                @if ($item->dateStart != null)
                                                <input id="dueDate-{{ $item->id }}" type="text" name="dueDate" class="bg-white border border-gray-300 rounded px-2 py-1" disabled>
                                                @endif
                                            </td>
                                            <td class="p-2 border border-gray-300 editable-cell">
                                                @if ($item->fileNames != null)
                                                    <a href="/files/download/{{ $item->id }}">Download</a>    
                                                @else
                                                    <p>Belum ada data di upload</p>
                                                @endif
                                            </td>
                                            <td class="p-2 border border-gray-300 text-center justify-center">
                                                <div class="flex justify-center">
                                                    @if (auth()->user()->status == 'User' || auth()->user()->seksi_id == 6)
                                                    <div x-data="{isEdit{{ $item->id }}: false}">
                                                        <button @click="isEdit{{ $item->id }} = !isEdit{{ $item->id }}" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-700">Edit</button>
                                                        <div x-show="isEdit{{ $item->id }}" :class="{'hidden': !isEdit{{ $item->id }}, 'block': isEdit{{ $item->id }} }" class="text-left backdrop-blur content-center flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                                <!-- Modal content -->
                                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <!-- Modal header -->
                                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                            Edit Kegiatan
                                                                        </h3>
                                                                        <button @click="isEdit{{ $item->id }} = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <form action="/tata-usaha/{{ $item->id }}/editItem" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                                                            <div class="col-span-2">
                                                                                <label for="namaTugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Tugas</label>
                                                                                <input type="text" name="namaTugas" id="namaTugas" value="{{ $item->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Tugas" required>
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="anggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anggota</label>
                                                                                <input type="text" name="anggota" id="anggota" value="{{ $item->Anggota }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Anggota" required>
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                                                <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                                                    <option value="Not Started">Not Started</option>
                                                                                    <option value="In Progress">In Progress</option>
                                                                                    <option value="Completed">Completed</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload</label>
                                                                                <input type="file" name="file" id="file" value="{{ $item->files }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="dateRange" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tenggat Waktu</label>
                                                                                <input type="text" name="dateRange" id="dateRange" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit" value="tambahTask" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                                                            Edit Task
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="{{ route('tata-usaha.deleteItems', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button value="deleteItems{{ $item->id }}" type="submit" onclick="return confirm('Apa akan dihapus?')" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-700">Delete</button>
                                                    </form>
                                                    @endif
                                                    <form action="/tata-usaha/{{ $item->id }}/upload" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        @if (auth()->user()->status == 'User' || auth()->user()->seksi_id == 6)
                                                            @if ($item->is_upload == 'Disetujui')
                                                            <button class="bg-green-500 text-white text-nowrap px-4 py-1 rounded hover:bg-green-700 size-fit" disabled>
                                                                {{ $item->is_upload }}  
                                                            </button>
                                                            @elseif ($item->is_upload == 'Belum Upload' || $item->is_upload == null)
                                                            <input type="text" value="Sudah Upload" name="upload" class="hidden">
                                                            <button class="bg-green-500 text-white text-nowrap px-4 py-1 rounded hover:bg-green-700 size-fit">
                                                                Belum Upload  
                                                            </button>
                                                            @elseif ($item->is_upload == 'Sudah Upload')
                                                            <input type="text" value="Belum Upload" name="upload" class="hidden">
                                                            <button class="bg-green-500 text-white text-nowrap px-4 py-1 rounded hover:bg-green-700 size-fit">
                                                                {{ $item->is_upload }}  
                                                            </button>
                                                            @else
                                                            <input type="text" value="Sudah Upload" name="upload" class="hidden">
                                                            <button class="bg-green-500 text-white text-nowrap px-4 py-1 rounded hover:bg-green-700 size-fit">
                                                                Ditolak  
                                                            </button>
                                                            @endif
                                                        @endif
                                                        @if (auth()->user()->status == 'Admin')
                                                            @if ($item->is_upload == 'Disetujui')
                                                            <input type="text" value="Ditolak" name="upload" class="hidden">
                                                            <button class="bg-green-500 text-white text-nowrap px-4 py-1 rounded hover:bg-green-700 size-fit">
                                                                {{ $item->is_upload }}  
                                                            </button>
                                                            @elseif ($item->is_upload == 'Sudah Upload')
                                                            <input type="text" value="Disetujui" name="upload" class="hidden">
                                                            <button class="bg-green-500 text-white text-nowrap px-4 py-1 rounded hover:bg-green-700 size-fit">
                                                                {{ $item->is_upload }}  
                                                            </button>
                                                            @endif
                                                        @endif
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div x-data="{isRow{{ $w->id }}: false}">
                        <div class="flex space-x-4">
                            <button @click="isRow{{ $w->id }} = !isRow{{ $w->id }}" id="addRow-{{ $w['id'] }}" type="button" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Row</button>
                        </div>
                        <div x-show="isRow{{ $w->id }}" :class="{'hidden': !isRow{{ $w->id }}, 'block': isRow{{ $w->id }} }" class=" backdrop-blur content-center flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Tambah Kegiatan Baru
                                        </h3>
                                        <button @click="isRow{{ $w->id }} = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="/tata-usaha/{{ $w->id }}/create" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                        @csrf
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="namaTugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Tugas</label>
                                                <input type="text" name="namaTugas" id="namaTugas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nama Tugas" required>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="anggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anggota</label>
                                                <input type="text" name="anggota" id="anggota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Anggota" required>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                                    <option value="Not Started">Not Started</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload</label>
                                                <input type="file" name="file" id="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="dateRange" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tenggat Waktu</label>
                                                <input type="text" name="dateRange" id="dateRange" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            </div>
                                        </div>
                                        <button type="submit" value="tambahTask" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                            Tambah Task
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                @endforeach
                </div>
            </div>
        </div>
    </main></div>
    <script src="{{ 'js/style2.js' }}"></script>
    <script>
        @foreach ($workspace as $w)
            document.getElementById('addRow-{{ $w['id'] }}').addEventListener('click', function() {
                $('input[name="dateRange"]').daterangepicker();
            });

            @foreach ($items as $item)
                @if ($item->workspace_id === $w['id'])
                    $('#dueDate-{{ $item->id }}').daterangepicker({startDate: '{{ $item->dateStart }}', endDate: '{{ $item->dateEnd }}'}); 
                @endif
            @endforeach

            
        @endforeach

        document.addEventListener("DOMContentLoaded", function() {
                var input = document.querySelectorAll('input[name=anggota]');
                var i = 0;
                var members = [
                    @foreach ($anggota as $a)
                        {"value": i++, "name": "{{ $a->nama }}"},
                    @endforeach
                ];
                
                function getMembers() {
                    return members.map(member => ({
                        value: member.name,
                        name: member.value
                    }));
                }

                input.forEach(inp=>{
                    var tagify = new Tagify(inp, {
                        whitelist: getMembers(),
                        enforceWhitelist: true,
                        maxTags: 10,
                        dropdown: {
                            maxItems: 20,           // maximum items to show in the dropdown
                            classname: "members-list",
                            enabled: 0,              // always show dropdown
                            closeOnSelect: false    // keep the dropdown open after selecting a suggestion
                        }
                    });

                    // listen to "input" event to filter whitelist
                    tagify.on('input', onInput);

                    function onInput(e) {
                    var value = e.detail.value.toLowerCase();
                    var filteredMembers = members.filter(member => member.name.toLowerCase().includes(value));
                    tagify.settings.whitelist = filteredMembers;
                    tagify.dropdown.show.call(tagify, value); // render the suggestions dropdown
                }
                });
                

                
            });
        // function attachNameClickHandler(toDo) {
        //     const task = toDo.querySelectorAll('.editableTask');
        //     task.forEach(tugas => {
        //         tugas.addEventListener('click', function() {
        //         if (tugas.querySelector('input') || tugas.querySelector('select') || tugas.querySelector('button')) return;

        //         const currentText = tugas.textContent;
        //         const input = document.createElement('input');
        //         input.type = 'text';
        //         input.name = 'nama';
        //         input.value = currentText;
        //         input.className = 'border rounded p-1';
        //         tugas.textContent = '';
        //         tugas.appendChild(input);
        //         input.focus();

        //         const finishEditing = () => {
        //             const newText = input.value.trim() || currentText;
        //             tugas.textContent = newText;
        //         };

        //         input.addEventListener('blur', finishEditing);
        //         input.addEventListener('keypress', function(e) {
        //             if (e.key === 'Enter') {
        //                 finishEditing();
        //             }
        //         });
        //     });
        //     });
            
        // }
        // document.querySelectorAll('#tugas').forEach(tugas2 =>{
        //     attachNameClickHandler(tugas2); 
        // });
    </script>
    
</div>
<x-foot></x-foot>