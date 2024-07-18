<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-U-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="{{ 'css/style.css' }}">
        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <title>WELCOME PAGE</title>
    </head>
    <body>
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        @auth
                            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                                WELCOME {{ auth()->user()->username }}
                            </h1>
                            <div class="space-y-4 md:space-y-6">
                                @if (auth()->user()->seksi_id === 1)
                                <a href="/ipds"><button class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Dashboard</button></a>  
                                @elseif (auth()->user()->seksi_id === 2)
                                <a href="/distribusi"><button class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Dashboard</button></a>
                                @elseif (auth()->user()->seksi_id === 3)
                                <a href="/produksi"><button class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Dashboard</button></a>
                                @elseif (auth()->user()->seksi_id === 4)
                                <a href="/sosial"><button class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Dashboard</button></a>
                                @elseif (auth()->user()->seksi_id === 5)
                                <a href="/neraca"><button class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Dashboard</button></a>
                                @elseif (auth()->user()->seksi_id === 6)
                                <a href="/tata-usaha"><button class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Dashboard</button></a>
                                @endif
                            </div>
                        @endauth
                        @guest
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            WELCOME PAGE
                        </h1>
                        <div class="space-y-4 md:space-y-6" action="#">
                            <button class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"><a href="/">Sign in</a></button>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Don’t have an account yet? <a href="/register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                            </p>
                        </div>    
                        @endguest
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>