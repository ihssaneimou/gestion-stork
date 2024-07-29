<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">

            <!--
Include Tailwind JIT CDN compiler
More info: https://beyondco.de/blog/tailwind-jit-compiler-via-cdn
-->
            <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

            <!-- Specify a custom Tailwind configuration -->
            <script type="tailwind-config">
{
  theme: {
    extend: {
      colors: {
        gray: colors.blueGray,
        green: colors.teal,
        red: colors.rose,
      }
    }
  }
}
</script>

            




            <div class=" overflow-hidden gap-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 p-3  justify-items-center">
              
               
                <div class="relati w-full h-full mb-5 rounded-lg p-5 overflow-hidden justify-center">
                    <!-- Illustration -->
                    <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  mx-auto mt-24  ">
                        <img src="https://i.pinimg.com/564x/08/6a/6d/086a6dfc32a321bd62435343502fb758.jpg" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white">marchandises</h3>
                                <div>afficher tous le stock</div>
                            </div>
                            <div class="relative">
                                <a class="inline-flex w-11 h-11 justify-center items-center bg-blue-400 hover:bg-blue-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                    href="/marchandises"><span class="sr-only">Read more</span> <span
                                        class="font-bold -mt-px">-></span></a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="relati    rounded-lg  w-full h-full mb-5 p-5 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  mx-auto mt-24">
                        <img src="https://i.pinimg.com/564x/bf/31/55/bf31559202337607bb486a37403535bc.jpg" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" > ajouter </h3>
                                <div>afficher tous le stock</div>
                            </div>
                            <div class="relative">
                                <a class="inline-flex w-11 h-11 justify-center items-center bg-blue-400 hover:bg-blue-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                href="/entres/create"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                            </div>
                        </div>
                       
                    </article>
                   
                </div>

                <div class="relati    rounded-lg w-full mb-5 p-5 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  mx-auto mt-24">
                        <img src="https://i.pinimg.com/564x/e9/65/68/e965688b43370d56e8d513f8b7cadf1c.jpg" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" > Document</h3>
                                <div>afficher tous le stock</div>
                            </div>
                            <div class="relative">
                                <a class="inline-flex w-11 h-11 justify-center items-center bg-blue-400 hover:bg-blue-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                href="/documents"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                            </div>
                        </div>
                       
                    </article>
                </div>  


                <div class="relati    rounded-lg  w-full h-full mb-5 p-5 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  mx-auto mt-24">
                        <img src="https://i.pinimg.com/564x/49/db/a3/49dba3fcda0dc119c8f002d14809c922.jpg" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" >Rapport</h3>
                                <div>afficher tous le stock</div>
                            </div>
                            <div class="relative">
                                <a class="inline-flex w-11 h-11 justify-center items-center bg-blue-400 hover:bg-blue-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                href="/rapports"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                            </div>
                        </div>
                       
                    </article>
                </div>
                <div class="relati    rounded-lg  w-full h-full mb-5  p-5 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  mx-auto mt-24">
                        <img src="https://i.pinimg.com/564x/50/b0/78/50b0783ebdb7685f123d19a973a7810e.jpg " alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" > Scanner</h3>
                                <div>afficher tous le stock</div>
                            </div>
                            <div class="relative">
                                <a class="inline-flex w-11 h-11 justify-center items-center bg-blue-400 hover:bg-blue-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                href="/scanner"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                            </div>
                        </div>
                       
                    </article>
                </div>

                @if (auth()->user()->role == 'S')
                <div class="relati    rounded-lg  w-full h-full mb-5  p-5 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  mx-auto mt-24">
                        <img src="https://i.pinimg.com/564x/d1/d2/52/d1d25230234031a37b87d71c3ee58e9e.jpg" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" > historique</h3>
                                <div>afficher tous le stock</div>
                            </div>
                            <div class="relative">
                                <a class="inline-flex w-11 h-11 justify-center items-center bg-blue-400 hover:bg-blue-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                href="/historique"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                            </div>
                        </div>
                       
                    </article>
                </div>
                <div class="relati    rounded-lg  w-full h-full mb-5  p-5 overflow-hidden">
                                
                           
                                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  mx-auto mt-24">
                                    <img src="https://i.pinimg.com/564x/18/cb/5f/18cb5f8ee410ebc40d737dd672a7f375.jpg" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                                    <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                                        <div>
                                            <h3 class="mt-3 text-3xl font-bold text-white" >Ajouter admin</h3>
                                            <div>afficher tous le stock</div>
                                        </div>
                                        <div class="relative">
                                            <a class="inline-flex w-11 h-11 justify-center items-center bg-blue-400 hover:bg-blue-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                             href="/register"><span class="sr-only">Read more</span> <span
                                            class="font-bold -mt-px">-></span></a>
                                        </div>
                                    </div>
                                   
                                </article>
                                
                                  
                               
                            </div>

                            <div class="relati    rounded-lg  w-full h-full mb-5  p-5 overflow-hidden">
                                <!-- Illustration -->
                                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  mx-auto mt-24">
                                    <img src="https://i.pinimg.com/236x/60/de/60/60de607de0e36a6a461e107737090c04.jpg" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                                    <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                                        <div>
                                            <h3 class="mt-3 text-3xl font-bold text-white" > gerer admin</h3>
                                            <div>afficher tous le stock</div>
                                        </div>
                                        <div class="relative">
                                            <a class="inline-flex w-11 h-11 justify-center items-center bg-blue-400 hover:bg-blue-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                            href="/admin/list"><span class="sr-only">Read more</span> <span
                                            class="font-bold -mt-px">-></span></a>
                                        </div>
                                    </div>
                                   
                                </article>
                               
                                     
                               
                            </div>
                        @endif
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
