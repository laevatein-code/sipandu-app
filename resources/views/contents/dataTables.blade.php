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
                <div class="max-w-full overflow-x-auto data-table data-table-container">
                    <table class="w-full table-auto" id="dataTables">
                        <thead>
                            <tr class=" bg-gray-200 text-left">
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Nama</th>
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Email</th>
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Username</th>
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Status</th>
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Seksi</th>
                                <th class="min-w-[220px] px-4 py-4 font-medium text-black dark:text-white xl:pl-11">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11"></td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11"></td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11"></td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11"></td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11"></td>
                                <td class="border-b border-[#eee] px-4 py-5 pl-9 dark:border-strokedark xl:pl-11">
                                    <div class="flex items-center space-x-3.5">
                                        <a href="/contents/users/edit"><button type="button" class="hover:text-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                              </svg>                                              
                                        </button></a>
                                        <form action="/contents/users/" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('User akan dihapus?')" class="hover:text-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
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
<script src="https://cdn.tailwindcss.com/"></script>
<script>
    $('#dataTables').DataTable();
</script>
<x-foot></x-foot>