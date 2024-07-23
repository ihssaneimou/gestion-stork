<x-nav-bar>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        caveat: ['Caveat', 'cursive'],
                    },
                },
            },
        };
    </script>


    <main class="relative min-h-screen flex flex-col justify-center bg-slate-50 overflow-hidden">
        <div class="w-full max-w-6xl mx-auto px-4 md:px-6 py-24">
            <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-16">

              

                <div class="w-full max-w-3xl mx-auto">

                
                        <!-- Item #1 -->
                        <div class="relative">
                            <div class="md:flex items-center md:space-x-4 mb-3">
                                <div class="flex items-center space-x-4 md:space-x-2 md:space-x-reverse">
                                    <!-- Icon -->
                                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white shadow md:order-1">
                                        <svg class="fill-emerald-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                            <path d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" />
                                        </svg>
                                    </div>
                                    <!-- Date -->
                                    <time class="font-caveat font-medium text-xl text-indigo-500 md:w-28">Apr 7, 2024</time>
                                </div>
                                <!-- Title -->
                                <div class="text-slate-500 ml-14"><span class="text-slate-900 font-bold">Mark Mikrol</span> opened the request</div>
                            </div>
                            <!-- Card -->
                            <div class="bg-white p-4 rounded border border-slate-200 text-slate-500 shadow ml-14 md:ml-44">Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humour and the like.</div>
                        </div>
                    </div>
                    <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:ml-[8.75rem] md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                        <div class="relative">
                            <div class="md:flex items-center md:space-x-4 mb-3">
                                <div class="flex items-center space-x-4 md:space-x-2 md:space-x-reverse">
                                    <!-- Icon -->
                                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white shadow md:order-1">
                                        <svg class="fill-emerald-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16">
                                            <path d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" />
                                        </svg>
                                    </div>
                                    <!-- Date -->
                                    <time class="font-caveat font-medium text-xl text-indigo-500 md:w-28">Apr 7, 2024</time>
                                </div>
                                <!-- Title -->
                                <div class="text-slate-500 ml-14"><span class="text-slate-900 font-bold">Mark Mikrol</span> opened the request</div>
                            </div>
                            <!-- Card -->
                            <div class="bg-white p-4 rounded border border-slate-200 text-slate-500 shadow ml-14 md:ml-44">Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humour and the like.</div>
                        </div>
                    </div>
                    
                    <!-- End: Vertical Timeline #3 -->

                </div>

            </div>
        </div>
    </main>
</x-nav-bar>