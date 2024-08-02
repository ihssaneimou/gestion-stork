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

            




            <div class=" overflow-hidden gap-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-3  justify-items-center">
              
               
                <a href="/marchandises" class="relati w-full h-full  rounded-lg p-2 overflow-hidden justify-center">
                    <!-- Illustration -->
                    <article class="relative h-full w-full isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40  ">
                        <img loading="lazy" src="{{asset('/mar.jpg')}}" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white"> les marchandises</h3>
                                
                            </div>
                        </div>
                    </article>
                </a>
                <a href="/entres/create" class="relati    rounded-lg  w-full h-full  p-2 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative h-full w-full isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40">
                        <img loading="lazy" src="{{asset('/ajou.jpg')}}" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" > ajouter une marchandise</h3>
                                
                            </div>
                        </div>
                       
                    </article>
                   
                </a>

                <a href="/documents" class="relati    rounded-lg w-full  p-2 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative h-full w-full isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40">
                        <img loading="lazy" src="{{asset('/doc.jpg')}}" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" > Document de stock</h3>
                                
                            </div>
                        </div>
                       
                    </article>
                </a>  


                <a  href="/rapports" class="relati    rounded-lg  w-full h-full  p-2 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative h-full w-full isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40">
                        <img loading="lazy" src="{{asset('/rapp.jpg')}}" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" >Produits de stock</h3>
                                
                            </div>
                           
                        </div>
                       
                    </article>
                </a>
                <a  href="/scanner" class="relati    rounded-lg  w-full h-full   p-2 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative h-full w-full isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40">
                        <img loading="lazy" src="{{asset('/scanner.jpg')}}" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" > Scanner un produit</h3>
                                
                            </div>
                            
                        </div>
                       
                    </article>
                </a>

                @if (auth()->user()->role == 'S')
                <a href="/historique" class="relati    rounded-lg  w-full h-full   p-2 overflow-hidden">
                    <!-- Illustration -->
                    <article class="relative h-full w-full isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40">
                        <img loading="lazy" src="{{asset('/image.png')}}" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                        <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                            <div>
                                <h3 class="mt-3 text-3xl font-bold text-white" >historique des activités</h3>
                                
                            </div>
                        </div>
                       
                    </article>
                </a>
                <a href="/register" class="relati    rounded-lg  w-full h-full   p-2 overflow-hidden">
                                
                           
                                <article class="relative h-full w-full isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40">
                                    <img loading="lazy" src="{{asset('/addadmin.jpg')}}" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                                    <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                                        <div>
                                            <h3 class="mt-3 text-3xl font-bold text-white" >Ajouter admin</h3>
                                            
                                        </div>
                                        
                                    </div>
                                   
                                </article>
                                
                                  
                               
                            </a>

                            <a  href="/admin/list" class="relati    rounded-lg  w-full h-full   p-2 overflow-hidden">
                                <!-- Illustration -->
                                <article class="relative h-full w-full isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40">
                                    <img loading="lazy" src="{{asset('/listadmin.jpg')}}" alt="University of Southern California" class="absolute inset-0 h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                                    <div class="relative z-10 flex justify-between items-center text-sm leading-6 text-gray-300">
                                        <div>
                                            <h3 class="mt-3 text-3xl font-bold text-white" > gérer les admin</h3>
                                            
                                        </div>
                                    </div>
                                   
                                </article>
                               
                                     
                               
                            </a>
                        @endif
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
