<x-head></x-head>
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Registrasi
                </h1>
                <form action="/register" method="POST" class="space-y-4 md:space-y-6" action="#">
                    @csrf
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="wondama123" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <label for="pengguna_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP 9 Digit</label>
                        <input type="text" name="pengguna_id" id="pengguna_id" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="3400xxx" required="">
                    </div>
                    <div class="flex items-center ps-4 border border-gray-200">
                        <input type="radio" name="status" id="Admin" value="Admin" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="Admin" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Admin</label>
                    </div>
                    <div class="flex items-center ps-4 border border-gray-200">
                        <input type="radio" name="status" id="User" value="User" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="User" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> User</label>
                    </div>                  
                    <div>
                        <label for="seksi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seksi</label>
                        <select name="seksi" id="seksi" class="">
                            <option value="1">IPDS</option>
                            <option value="2">Distribusi</option> 
                            <option value="3">Produksi</option> 
                            <option value="4">Sosial</option> 
                            <option value="5">Neraca</option> 
                            <option value="6">Tata Usaha</option>   
                        </select>    
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign up</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Sudah punya akun? <a href="/" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
<x-foot></x-foot>