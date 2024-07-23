<x-head_2></x-head_2>
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64 bg-gray-200 h-screen">
    <div class="p-4 rounded-lg mt-14">
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="font-bold text-black dark:text-white text-2xl">Management Workspace</h2>
                <p class="font-medium">Management / Tambah</p>
            </div>
            <div class="rounded-sm border shadow-sm bg-white px-5 pb-2.5 pt-6 sm:px-7 xl:pb-1">
                <div class="flex flex-col">
                    <div class="border-b border-stroke px-6 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-xl text-black dark:text-white">Tambah Workspace</h3>
                    </div>
                    <form action="/contents/management" method="POST">
                        @csrf
                        <div class="p-6">
                            <div class="mb-4">
                                <label for="nama" class="mb-3 block text-sm font-medium text-black dark:text-white">Nama Workspace</label>
                                <input type="text" name="nama" placeholder="Masukan Nama Workspace" class="w-full rounded border-[1.5px] bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:text-white dark:focus:border-blue-700">
                            </div>
                            <div class="mb-4">
                                <label for="keterangan" class="mb-3 block text-sm font-medium text-black dark:text-white">Keterangan</label>
                                <textarea type="text" name="keterangan" placeholder="Keterangan Workspace" class="w-full rounded border-[1.5px] bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:text-white dark:focus:border-blue-700"></textarea>
                            </div>
                            <button class="mt-10 flex w-full justify-center rounded bg-blue-700 p-3 font-medium text-white hover:bg-opacity-90">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<x-foot></x-foot>