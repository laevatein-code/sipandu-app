<x-head_2></x-head_2>
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64 bg-gray-200 h-screen">
    <div class="p-4 rounded-lg mt-14">
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="font-bold text-black dark:text-white text-2xl">Edit User</h2>
                <p class="font-medium">Sipandu / User</p>
            </div>
            <div class="rounded-sm border shadow-sm bg-white px-5 pb-2.5 pt-6 sm:px-7 xl:pb-1">
                <div class="flex flex-col">
                    <div class="border-b border-stroke px-6 py-4 dark:border-strokedark">
                        <h3 class="font-medium text-xl text-black dark:text-white">Informasi User</h3>
                    </div>
                    <form action="/contents/users/{{ $user->id }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="p-6">
                            <div class="mb-4">
                                <label for="nama" class="mb-3 block text-sm font-medium text-black dark:text-white">Nama Lengkap</label>
                                <input type="text" name="nama" value="{{ $user->info->nama }}" placeholder="Enter Name" class="w-full rounded border-[1.5px] bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:text-white dark:focus:border-blue-700">
                            </div>
                            <div class="mb-4">
                                <label for="username" class="mb-3 block text-sm font-medium text-black dark:text-white">Username</label>
                                <input type="text" name="username" value="{{ $user->name }}" placeholder="Enter Username" class="w-full rounded border-[1.5px] bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:text-white dark:focus:border-blue-700">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="mb-3 block text-sm font-medium text-black dark:text-white">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" placeholder="Enter Email" class="w-full rounded border-[1.5px] bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-blue-700 active:border-blue-700 disabled:cursor-default disabled:bg-white dark:text-white dark:focus:border-blue-700">
                            </div>
                            <div class="mb-4">
                                <label class="mb-3 block text-sm font-medium text-black dark:text-white">Status</label>
                                <div class="relative z-20 bg-transparent">
                                    @if ($user->status == 'Admin')
                                    <select name="status" class="relative z-20 w-full appearance-none rounded border bg-transparent px-5 py-3 outline-none transition focus:border-blue-700 active:border-blue-700 dark:focus:border-blue-700 text-black dark:text-white">
                                        <option class="text-body" value="Admin" selected>Admin</option>
                                        <option class="text-body" value="User">User</option>
                                    </select>
                                    
                                    <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                        </svg>                                      
                                    </span>
                                    @else
                                    <select name="status" class="relative z-20 w-full appearance-none rounded border bg-transparent px-5 py-3 outline-none transition focus:border-blue-700 active:border-blue-700 dark:focus:border-blue-700 text-black dark:text-white">
                                        <option class="text-body" value="Admin">Admin</option>
                                        <option class="text-body" value="User" selected>User</option>
                                    </select>
                                    
                                    <span class="absolute right-4 top-1/2 z-30 -translate-y-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd" />
                                        </svg>                                      
                                    </span>
                                    @endif
                                    
                                </div>
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