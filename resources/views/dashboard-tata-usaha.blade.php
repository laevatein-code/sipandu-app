<x-head></x-head>
<div class="flex">
    <aside class="sticky h-screen top-0 pt-4 max-sm:hidden bg-gray-900 w-[300px]">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
              <h1 class="font-bold text-gray-200 text-[15px] ml-3">My Workspace</h1>
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>
        
        <div class="h-full pb-4 overflow-y-auto bg-gray-900">
            <a href="/" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
               
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
        <div class="">
            <div>
                <div></div>
            </div>
        </div>
        <div class="p-4 border-2 bg-gray-100 rounded-lg">
            {{-- Kepala Judul --}}
            <div class="pb-4">
                <span class="text-4xl">IPDS</span>
            </div>
            {{-- Menu kontrol new task --}}
            <div>
                <button id="addTable" type="button" class="items-center inline-flex hover:bg-blue-300 bg-blue-500 rounded-md text-center text-slate-100">
                    <span class="ms-3">New task</span>
                    <svg class="w-3.5 h-3.5 mx-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                     </svg>
                </button>
            </div>
            <hr class="h-px my-3 dark:bg-black bg-black border-0">
            {{-- Menu Task --}}
            <div class="overflow-x-auto py-4">
                <div class="mb-6">
                    <div class="grid grid-cols-6">
                        <div class="col-span-1">
                            <h4 class="font-semibold" id="editableH4">To Do</h4>
                            <input type="text" id="textInput">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto space-y-8" id="tablesContainer">
                <div class="overflow-x-auto mb-4">
                    <table id="dynamicTable" class="min-w-full bg-white border border-gray-300 rounded-md shadow">
                        <thead class="bg-gray-200">
                            <tr id="tableHeader">
                                <th class="p-2 border border-gray-300 cursor-pointer text-left">Task Name</th>
                                <th class="p-2 border border-gray-300 cursor-pointer text-left">Owner</th>
                                <th class="p-2 border border-gray-300 cursor-pointer text-left">Status</th>
                                <th class="p-2 border border-gray-300 cursor-pointer text-left">Due Date</th>
                                <th class="p-2 border border-gray-300 cursor-pointer text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($items as $item)  
                            <tr>
                                <td class="p-2 border border-gray-300 editable-cell">{{ $item['nama'] }}</td>
                                <td class="p-2 border border-gray-300 editable-cell">{{ $item['jumlahAnggota'] }}</td>
                                <td class="p-2 border border-gray-300 editable-cell">
                                    <select class="bg-white border border-gray-300 rounded px-2 py-1">
                                        @if ($item['status'] == "Not Started")
                                            <option value="Not Started" selected="selected">Not Started</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Completed">Completed</option>
                                        @elseif ($item['status'] == "In Progress")
                                            <option value="Not Started">Not Started</option>
                                            <option value="In Progress" selected="selected">In Progress</option>
                                            <option value="Completed">Completed</option>
                                        @elseif ($item['status'] == "Completed")
                                            <option value="Not Started">Not Started</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Completed" selected="selected">Completed</option>
                                        @endif
                                    </select>
                                </td>
                                <td class="p-2 border border-gray-300 editable-cell">
                                    <input type="date" class="bg-white border border-gray-300 rounded px-2 py-1" value="{{ $item['dateEnd'] }}">
                                </td>
                                <td class="p-2 border border-gray-300 text-center">
                                    <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 delete-row">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        
                <div class="flex space-x-4">
                    <button id="addRow" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Row</button>
        
                    <div class="relative">
                        <button id="addColumnDropdown" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Add Column</button>
                        <div id="columnTypeDropdown" class="hidden absolute left-0 mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg">
                            <button data-type="Text" class="w-full text-left px-4 py-2 hover:bg-gray-200">Text</button>
                            <button data-type="Date" class="w-full text-left px-4 py-2 hover:bg-gray-200">Date</button>
                            <button data-type="Dropdown" class="w-full text-left px-4 py-2 hover:bg-gray-200">Dropdown</button>
                            <button data-type="Owner" class="w-full text-left px-4 py-2 hover:bg-gray-200">Owner</button>
                            <button data-type="Files" class="w-full text-left px-4 py-2 hover:bg-gray-200">Files</button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>
    
    <script src="{{ 'js/style2.js' }}"></script>
</div>
<x-foot></x-foot>