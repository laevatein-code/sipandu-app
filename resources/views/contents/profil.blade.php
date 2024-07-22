<x-head_2></x-head_2>
<x-navbar></x-navbar>
<div class="p-4 sm:ml-64 bg-gray-200 h-screen">
    <div class="p-4 rounded-lg mt-14">
        <section class="relative block h-[30vh] bg-gray-700 rounded-xl">
        </section>
        <section class="relative py-16">
            <div class="relative mb-6 -mt-36 flex w-full px-4 min-w-0 flex-col break-words">
                <div class="container mx-auto">
                    <div class="flex flex-col lg:flex-row justify-between">
                        <div class="relative flex gap-6 items-start">
                            <div class="mt-2 w-40">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-55">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                  </svg>                                                                    
                            </div>
                            <div class="flex flex-col mt-20">
                                <h4 class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900">{{ auth()->user()->info->nama }}</h4>
                                <p class="block antialiased font-sans text-base leading-relaxed text-gray-700 !mt-0 font-normal">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <div class="mt-10 mb-10 flex lg:flex-col justify-between items-center lg:justify-end lg:mb-0 lg:px-4 flex-wrap lg:-mt-5">
                            <div class="flex justify-start py-4 pt-8 lg:pt-4">
                                <div class="mr-4 p-3 text-center">
                                    <p class="block antialiased font-sans text-xl leading-relaxed text-blue-gray-900 font-bold uppercase">{{ auth()->user()->user_nip }}</p>
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-500">NIP</p>
                                </div>
                                <div class="mr-4 p-3 text-center">
                                    <p class="block antialiased font-sans text-xl leading-relaxed text-blue-gray-900 font-bold uppercase">{{ auth()->user()->status }}</p>
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-500">Status</p>
                                </div>
                                <div class="mr-4 p-3 text-center">
                                    <p class="block antialiased font-sans text-xl leading-relaxed text-blue-gray-900 font-bold uppercase">{{ auth()->user()->info->seksi }}</p>
                                    <p class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-500">Seksi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<x-foot></x-foot>