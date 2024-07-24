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

            




            <div class=" overflow-hidden gap-4 grid grid-cols-1 sm:grid-cols-3 p-3 justify-items-center">
              
               
                <div class="relati  bg-purple-100 shadow-lg rounded-lg  w-full mb-5  p-5 overflow-hidden">
                    <!-- Illustration -->
                   <svg height="100px" viewBox="0 -26 512 512" width="100px" xmlns="http://www.w3.org/2000/svg"><path d="m61.628906 171.558594c0 17.703125 9.351563 33.214844 23.386719 41.882812 14.03125-8.667968 23.386719-24.179687 23.386719-41.882812v-24.601563l29.519531-96.953125h-27.09375l-49.199219 96.953125zm0 0" fill="#ff5a5a" fill-rule="evenodd"/><path d="m160.027344 171.558594c0 17.703125 9.355468 33.214844 23.386718 41.878906 14.03125-8.664062 23.386719-24.179688 23.386719-41.878906v-24.601563l9.839844-96.953125h-27.09375l-29.519531 96.953125zm0 0" fill="#ff9d21" fill-rule="evenodd"/><path d="m258.429688 171.558594c0 17.703125 9.351562 33.214844 23.382812 41.878906 14.03125-8.664062 23.386719-24.175781 23.386719-41.878906v-24.601563l-9.839844-96.953125h-27.089844l-9.839843 96.953125zm0 0" fill="#ff5a5a" fill-rule="evenodd"/><path d="m295.359375 50.003906 9.839844 96.953125v24.601563c0 27.171875 22.027343 49.195312 49.199219 49.195312 27.175781 0 49.199218-22.023437 49.199218-49.195312v-24.601563l-29.515625-96.953125zm0 0" fill="#ff9d21" fill-rule="evenodd"/><path d="m374.082031 50.003906 29.519531 96.953125v24.601563c0 27.171875 22.023438 49.195312 49.199219 49.195312s49.199219-22.023437 49.199219-49.195312v-24.601563l-49.203125-96.953125zm0 0" fill="#ff5a5a" fill-rule="evenodd"/><g fill="#ffdaae"><path d="m159.195312 10v40.003906h293.601563v-40.003906zm0 0" fill-rule="evenodd"/><path d="m305.996094 180.351562c-.515625-2.855468-.796875-5.792968-.796875-8.792968 0 26.902344-21.601563 48.75-48.398438 49.175781.265625.003906.527344.019531.796875.019531 24.167969 0 44.253906-17.429687 48.398438-40.402344zm0 0"/><path d="m404.398438 180.339844c-.515626-2.851563-.800782-5.78125-.800782-8.785156 0 26.90625-21.597656 48.75-48.398437 49.179687.265625.003906.53125.019531.796875.019531 24.171875 0 44.257812-17.433594 48.402344-40.414062zm0 0"/><path d="m256 220.753906c.269531 0 .53125-.015625.800781-.019531-26.804687-.425781-48.402343-22.273437-48.402343-49.175781 0 3-.285157 5.9375-.800782 8.792968 4.148438 22.972657 24.230469 40.402344 48.402344 40.402344zm0 0"/><path d="m354.398438 220.753906c.269531 0 .53125-.015625.800781-.019531-26.804688-.425781-48.402344-22.273437-48.402344-49.175781 0 3-.285156 5.9375-.800781 8.792968 4.148437 22.972657 24.234375 40.402344 48.402344 40.402344zm0 0"/><path d="m332.800781 410h80v40.003906h-80zm0 0"/><path d="m404.398438 180.339844c-4.144532 22.980468-24.230469 40.414062-48.402344 40.414062-.265625 0-.53125-.015625-.796875-.019531-.269531.003906-.53125.019531-.800781.019531-24.167969 0-44.253907-17.429687-48.402344-40.402344-4.144532 22.972657-24.230469 40.402344-48.398438 40.402344-.269531 0-.53125-.015625-.796875-.019531-.269531.003906-.53125.019531-.800781.019531-24.171875 0-44.253906-17.429687-48.402344-40.40625-4.144531 22.976563-24.230468 40.40625-48.402344 40.40625v49.25h253.605469v180h40v-229.25c-24.175781 0-44.257812-17.433594-48.402343-40.414062zm0 0"/><path d="m199.195312 410h-40v40.003906h173.605469v-40.003906zm0 0"/></g><path d="m332.800781 270.003906h-154.238281v139.996094h154.238281zm0 0" fill="#96c8eb" fill-rule="evenodd"/><path d="m332.800781 270.003906v180h80v-180zm0 0" fill="#bf9a94" fill-rule="evenodd"/><path d="m510.917969 142.429688-48.121094-94.824219v-37.605469c0-5.523438-4.472656-10-10-10h-393.597656c-5.523438 0-10 4.476562-10 10v37.609375l-48.117188 94.820313c-.710937 1.402343-1.082031 2.953124-1.082031 4.527343v24.601563c0 29.230468 21.304688 53.566406 49.199219 58.335937v210.105469h-10.234375c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10h20.15625c.023437 0 .050781.003906.078125.003906h413.835937c5.519532 0 10-4.476562 10-10 0-5.523437-4.480468-10-10-10h-10.234375v-210.109375c27.894531-4.769531 49.199219-29.105469 49.199219-58.335937v-24.601563c0-1.574219-.371094-3.125-1.082031-4.527343zm-441.71875-122.429688h373.597656v20.003906h-373.597656zm324.402343 151.558594c0 21.613281-17.585937 39.195312-39.203124 39.195312-21.613282 0-39.199219-17.582031-39.199219-39.195312v-24.601563c0-.339843-.015625-.675781-.050781-1.011719l-8.722657-85.941406h60.246094l26.929687 88.441406zm-98.402343 0c0 21.613281-17.585938 39.195312-39.199219 39.195312s-39.199219-17.582031-39.199219-39.195312v-24.097656l8.878907-87.457032h60.644531l8.875 87.457032zm-98.398438-24.601563v24.601563c0 21.613281-17.585937 39.195312-39.199219 39.195312-21.617187 0-39.199218-17.582031-39.199218-39.195312v-23.113282l26.925781-88.441406h60.246094l-8.722657 85.941406c-.035156.335938-.050781.671876-.050781 1.011719zm-176.800781 24.601563v-22.210938l45.339844-89.34375h59.082031l-25.585937 84.039063c-.289063.945312-.4375 1.925781-.4375 2.914062v24.601563c0 21.613281-17.585938 39.195312-39.199219 39.195312s-39.199219-17.582031-39.199219-39.195312zm49.199219 58.335937c16.292969-2.785156 30.339843-12.238281 39.203125-25.457031 10.628906 15.855469 28.714844 26.316406 49.199218 26.316406 20.480469 0 38.5625-10.460937 49.195313-26.316406 10.636719 15.855469 28.71875 26.316406 49.203125 26.316406 20.480469 0 38.566406-10.460937 49.195312-26.316406 10.636719 15.859375 28.71875 26.316406 49.203126 26.316406 20.484374 0 38.566406-10.460937 49.199218-26.316406 8.863282 13.21875 22.90625 22.671875 39.199219 25.457031v210.109375h-20v-170c0-5.523437-4.476563-10-10-10h-313.597656c-5.523438 0-10 4.476563-10 10v139.996094c0 5.523438 4.476562 10 10 10h223.601562v20.003906h-253.601562zm40 147.640625 97.53125-97.53125h34.839843l-19.015624 19.011719c-3.902344 3.902344-3.902344 10.234375 0 14.140625 1.953124 1.953125 4.511718 2.929688 7.070312 2.929688 2.5625 0 5.117188-.976563 7.070312-2.925782l33.160157-33.15625h52.941406v119.996094h-213.597656zm0-28.285156v-69.246094h69.246093zm233.601562 90.753906v-70.003906h10c5.523438 0 10-4.476562 10-10 0-5.519531-4.476562-10-10-10h-10v-69.996094h60v160zm149.199219-268.445312c0 21.613281-17.585938 39.195312-39.199219 39.195312s-39.199219-17.582031-39.199219-39.195312v-24.601563c0-.988281-.148437-1.96875-.433593-2.914062l-25.589844-84.039063h59.082031l45.339844 89.34375zm0 0" fill="#000001"/><path d="m202.261719 319.3125-.167969.164062c-3.917969 3.894532-3.933594 10.226563-.042969 14.144532 1.957031 1.964844 4.523438 2.949218 7.09375 2.949218 2.550781 0 5.097657-.96875 7.050781-2.910156l.167969-.164062c3.914063-3.894532 3.933594-10.226563.039063-14.144532-3.894532-3.914062-10.226563-3.933593-14.140625-.039062zm0 0" fill="#000001"/><path d="m10.234375 440h-.234375c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10h.234375c5.523437 0 10-4.476562 10-10s-4.476563-10-10-10zm0 0" fill="#000001"/><path d="m502 440.003906h-.234375c-5.523437 0-10 4.476563-10 10 0 5.523438 4.476563 10 10 10h.234375c5.523438 0 10-4.476562 10-10 0-5.523437-4.476562-10-10-10zm0 0" fill="#000001"/></svg>
                    <!-- Card content -->
                    <div class="relative  pb-14">

                        <h3 class="text-2xl font-extrabold text-black leading-snug mb-2">marchandises</h3>

                    </div>
                    <!-- Card footer -->
                    <div class="relative text-right">
                        <a class="inline-flex w-11 h-11 justify-center items-center bg-green-400 hover:bg-green-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                            href="/marchandises"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                    </div>
                </div>
                <div class="relati   bg-purple-100 shadow-lg rounded-lg  w-full mb-5 p-5 overflow-hidden">
                    <!-- Illustration -->
                    <svg height="100px" width="100px" data-name="Your Icons" id="Your_Icons" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#939598;}.cls-2{fill:#00a651;}.cls-3{fill:#fff;}</style></defs><title/><path class="cls-1" d="M41.62,22.21,39.28,18l0,0,1.57-3.2a3,3,0,0,0-1.38-4L29.7,6.27A2.86,2.86,0,0,0,26,7.4L23.83,11,21.64,7.4A2.91,2.91,0,0,0,19.17,6a2.87,2.87,0,0,0-1.2.27L8.24,10.82a3,3,0,0,0-1.39,4L8.43,18l0,0L6.51,21.39a4,4,0,0,0,1.55,5.45l.33.18v4.83a6,6,0,0,1,3-3.23A5.91,5.91,0,0,1,14,28a6,6,0,0,1,4.81,2.43,6.12,6.12,0,0,1,.43.69c0,.07.09.14.13.22a6.69,6.69,0,0,1,.39,1A5.7,5.7,0,0,1,20,34a6,6,0,0,1-3.49,5.45l4.23,1.89a7.59,7.59,0,0,0,6.19,0l10-4.49a4,4,0,0,0,2.32-3.62V26.94l1.12-.61A3,3,0,0,0,41.62,22.21Zm-17.8,3.71h0Zm1-.52V13.48l12.06,5.76Zm1-13.81,1.91-3.15A.88.88,0,0,1,28.49,8a.86.86,0,0,1,.36.08l9.74,4.55a.94.94,0,0,1,.48.54A1.06,1.06,0,0,1,39,14l-1.63,3.3L25.83,11.74ZM8.6,13.17a.94.94,0,0,1,.48-.54l9.74-4.55A.85.85,0,0,1,19.17,8a.88.88,0,0,1,.76.44l1.9,3.15v.15L10.28,17.26,8.65,14A1,1,0,0,1,8.6,13.17Zm14.23.31V25.41L10.77,19.24ZM14,26a7.94,7.94,0,0,0-2.53.41L9,25.08a1.9,1.9,0,0,1-.94-1.17,2,2,0,0,1,.18-1.55l.94-1.68,12.63,6.46v.29l-.91,1.88a2.39,2.39,0,0,1-.21.34A8,8,0,0,0,14,26Zm6.28,13A8,8,0,0,0,22,34a7.62,7.62,0,0,0-.32-2.21,1.21,1.21,0,0,0-.05-.18,4.12,4.12,0,0,0,1.15-1.42l0-.12V39.9a5.32,5.32,0,0,1-1.27-.39Zm17-5.72A1.94,1.94,0,0,1,36.14,35l-10,4.49a5.26,5.26,0,0,1-1.28.39V30.07a4,4,0,0,0,3.31,2.31h.29a3.71,3.71,0,0,0,1.85-.49l7-3.83ZM40,24a1,1,0,0,1-.47.57h-.05L29.27,30.14a1.75,1.75,0,0,1-.86.22,1.84,1.84,0,0,1-1.66-1.06l-.92-1.87v-.29l12.64-6.46,1.4,2.51A1.06,1.06,0,0,1,40,24Z"/><path class="cls-2" d="M14,26a8,8,0,1,0,8,8A8,8,0,0,0,14,26Z"/><path class="cls-3" d="M16.5,33H15V31.5a1,1,0,0,0-2,0V33H11.5a1,1,0,0,0,0,2H13v1.5a1,1,0,0,0,2,0V35h1.5a1,1,0,0,0,0-2Z"/></svg>
                    <!-- Card content -->
                    <div class="relative  pb-14">

                        <h3 class="text-2xl font-extrabold text-black leading-snug mb-2">entre</h3>

                    </div>
                    <!-- Card footer -->
                    <div class="relative text-right">
                        <a class="inline-flex w-11 h-11 justify-center items-center bg-green-400 hover:bg-green-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                            href="/entres/create"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                    </div>
                </div>

                <div class="relati   bg-purple-100 shadow-lg rounded-lg w-full mb-5 p-5 overflow-hidden">
                    <!-- Illustration -->
                    <svg id="Layer_1" width="100px" height="100px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                        .st0{fill:#EEEDF2;}
                        .st1{fill:none;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st2{fill:#EFC12F;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st3{fill:none;stroke:#1E247E;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
                        .st4{fill:#FFFFFF;stroke:#1E247E;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
                        .st5{fill:#FCF5F2;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st6{fill:#FCF5F2;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st7{fill:#1E247E;}
                        .st8{fill:none;stroke:#1E247E;stroke-width:4;stroke-linecap:round;stroke-miterlimit:10;}
                        .st9{fill:#EAB8B1;}
                        .st10{fill:#DC9695;stroke:#1E247E;stroke-width:4;stroke-linecap:round;stroke-miterlimit:10;}
                        .st11{fill:#EECED1;stroke:#1E247E;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
                        .st12{fill:#CB7272;stroke:#1E247E;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
                        .st13{fill:#D3D5E7;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st14{fill:#D3D5E7;}
                        .st15{fill:#FFFFFF;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st16{fill:#FFFFFF;stroke:#1E247E;stroke-width:4;stroke-linecap:round;stroke-miterlimit:10;}
                        .st17{fill:#ECECEE;}
                        .st18{fill:#DA867D;stroke:#1E247E;stroke-width:4;stroke-linecap:round;stroke-miterlimit:10;}
                        .st19{fill:#FCF5F2;stroke:#1E247E;stroke-width:4;stroke-linecap:round;stroke-miterlimit:10;}
                        .st20{fill:#69AEF8;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st21{opacity:0.4;fill:#FFFFFF;}
                        .st22{opacity:0.7;fill:#FFFFFF;}
                        .st23{fill:#69ADF7;stroke:#1E247E;stroke-width:2.5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st24{fill:none;stroke:#FFFFFF;stroke-width:7;stroke-linecap:round;stroke-miterlimit:10;}
                        .st25{fill:#FFFFFF;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st26{fill:#DBE7FE;}
                        .st27{fill:#D3D5E7;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st28{fill:#DD9796;stroke:#1E247E;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
                        .st29{fill:#EECED1;stroke:#1E247E;stroke-width:2.5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st30{fill:#CB7272;stroke:#1E247E;stroke-width:2.5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st31{fill:#DBE7FE;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st32{fill:#69AEF8;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st33{fill:#DAE6FD;stroke:#1E247E;stroke-width:6;stroke-miterlimit:10;}
                        .st34{fill:#FFFFFF;stroke:#1E247E;stroke-width:6;stroke-miterlimit:10;}
                        .st35{opacity:0.69;fill:#FFFFFF;}
                        .st36{opacity:0.95;fill:#FFFFFF;}
                        .st37{fill:#DA867D;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st38{fill:#F0C330;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st39{fill:#1E247E;stroke:#1E247E;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
                        .st40{fill:#FFFFFF;}
                        .st41{fill:#DBE7FE;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st42{fill:#F1F6FF;}
                        .st43{fill:#F0C330;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st44{fill:none;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st45{fill:#79CAA1;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st46{fill:#E09287;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st47{fill:#DA867D;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st48{fill:#69AEF8;stroke:#1E247E;stroke-width:5;stroke-miterlimit:10;}
                        .st49{fill:#D2D4E6;stroke:#1E247E;stroke-width:5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st50{fill:#79CAA1;stroke:#1E247E;stroke-width:5;stroke-miterlimit:10;}
                        .st51{fill:#F0C330;stroke:#1E247E;stroke-width:6;stroke-miterlimit:10;}
                        .st52{fill:#EEEDF2;stroke:#FFFFFF;stroke-miterlimit:10;}
                        .st53{opacity:0.3;fill:#A2655F;}
                        .st54{fill:#79CAA1;stroke:#1E247E;stroke-width:4;stroke-linecap:round;stroke-miterlimit:10;}
                        .st55{fill:#F0C330;stroke:#1E247E;stroke-width:4.5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st56{fill:#D2D4E6;}
                        .st57{fill:#FFFFFF;stroke:#1E247E;stroke-width:5.7826;stroke-linejoin:round;stroke-miterlimit:10;}
                        .st58{fill:#DA867D;stroke:#1E247E;stroke-width:5.7826;stroke-linejoin:round;stroke-miterlimit:10;}
                        .st59{fill:none;stroke:#1E247E;stroke-width:2.8913;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                        .st60{fill:none;stroke:#1E247E;stroke-width:2.4094;stroke-linecap:round;stroke-miterlimit:10;}
                        .st61{fill:#EBEBED;}
                        .st62{fill:#FBF2ED;stroke:#1E247E;stroke-width:4.5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st63{fill:#D3D5E7;stroke:#1E247E;stroke-width:4.5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st64{fill:none;stroke:#1E247E;stroke-width:2.5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st65{fill:#DA867D;stroke:#1E247E;stroke-width:4.5;stroke-linecap:round;stroke-miterlimit:10;}
                        .st66{fill:none;stroke:#FFFFFF;stroke-width:4;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                        .st67{fill:none;stroke:#FFFFFF;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
                        .st68{fill:#79CAA1;stroke:#1E247E;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st69{opacity:0.3;fill:#FFFFFF;}
                        .st70{fill:none;stroke:#FFFFFF;stroke-width:6;stroke-linecap:round;stroke-miterlimit:10;}
                        .st71{fill:#DBE7FE;stroke:#1E247E;stroke-width:6;stroke-miterlimit:10;}
                        .st72{fill:#DA867D;stroke:#1E247E;stroke-width:5;stroke-miterlimit:10;}
                        .st73{fill:#F5F5F7;stroke:#1E247E;stroke-width:5;stroke-miterlimit:10;}
                        .st74{fill:#D5D6DE;stroke:#1E247E;stroke-width:5;stroke-miterlimit:10;}
                        .st75{fill:#D3D5E7;stroke:#1E247E;stroke-width:3;stroke-linecap:round;stroke-miterlimit:10;}
                        .st76{fill:#79CAA1;}
                        .st77{fill:none;stroke:#1E247E;stroke-width:2.7;stroke-linecap:round;stroke-miterlimit:10;}
                        .st78{fill:#69AEF8;}
                    </style><g><g id="Documents_x2C__pencil_x2C__ruler"><circle class="st0" cx="250.6" cy="257.9" id="Background_3_" r="215.6"/><g id="Sparkles_1_"><line class="st24" id="Left_17_" x1="266.1" x2="264.3" y1="69.9" y2="60.8"/><line class="st24" id="Middle_9_" x1="280.1" x2="276.2" y1="63.7" y2="72.7"/><line class="st24" id="Right_18_" x1="292.7" x2="285.6" y1="72.1" y2="77.2"/></g><g id="Bottom_document"><g id="Document_1_"><path class="st14" d="M331.2,359l-196.3,53.2c-5.7,1.5-11.5-1.8-13.1-7.5L54,154.1c-1.5-5.7,1.8-11.5,7.5-13.1       l196.3-53.2c5.7-1.5,11.5,1.8,13.1,7.5L338.7,346C340.2,351.6,336.9,357.5,331.2,359z" id="Shadow_16_"/><path class="st41" d="M325.5,370.4l-196.3,53.2c-5.7,1.5-11.5-1.8-13.1-7.5L48.2,165.5       c-1.5-5.7,1.8-11.5,7.5-13.1l196.3-53.2c5.7-1.5,11.5,1.8,13.1,7.5L333,357.4C334.5,363,331.2,368.9,325.5,370.4z" id="Shape_16_"/><path class="st3" d="M129.9,412.5c-3.2,0.9-6.5-1-7.3-4.2" id="Line_10_"/><g id="Lines_3_"><line class="st23" id="Bottom_8_" x1="65.5" x2="73.5" y1="175.2" y2="181.4"/><line class="st23" id="Middle_8_" x1="65.5" x2="81.6" y1="167.5" y2="179.8"/><line class="st23" id="Top_8_" x1="77.2" x2="81.6" y1="168.6" y2="171.9"/></g></g><g id="Content_1_"><path class="st42" d="M230.9,289.3c0.9,3.5-1.1,7-4.6,7.9l-93,25.2c-3.4,0.9-7-1.1-7.9-4.5l-2.5-9.4       c-1.1-4.2,1.3-8.5,5.6-9.7l91.7-24.8c3.5-0.9,7.1,1.1,8,4.6L230.9,289.3z" id="_x34_th_line_3_"/><path class="st42" d="M219,249c0.9,3.5-1.1,7-4.6,7.9l-93,25.2c-3.4,0.9-7-1.1-7.9-4.5l-2.5-9.4       c-1.1-4.2,1.3-8.5,5.6-9.7l91.7-24.8c3.5-0.9,7.1,1.1,8,4.6L219,249z" id="_x33_rd_line_3_"/><path class="st42" d="M207.6,209.3c0.9,3.5-1.1,7-4.6,7.9l-93,25.2c-3.4,0.9-7-1.1-7.9-4.5l-2.5-9.4       c-1.1-4.2,1.3-8.5,5.6-9.7l91.7-24.8c3.5-0.9,7.1,1.1,8,4.6L207.6,209.3z" id="_x32_nd_line_3_"/><path class="st42" d="M196.6,169c0.9,3.5-1.1,7-4.6,7.9l-93,25.2c-3.4,0.9-7-1.1-7.9-4.5l-2.5-9.4       c-1.1-4.2,1.3-8.5,5.6-9.7l91.7-24.8c3.5-0.9,7.1,1.1,8,4.6L196.6,169z" id="_x31_st_line_3_"/></g></g><g id="Top_document"><g id="Document"><path class="st14" d="M336.5,441.3l-177.1-100c-5.1-2.9-6.9-9.4-4-14.5l127.7-226c2.9-5.1,9.4-6.9,14.5-4       l177.1,100c5.1,2.9,6.9,9.4,4,14.5L351,437.2C348.1,442.4,341.6,444.2,336.5,441.3z" id="Shadow_15_"/><path class="st20" d="M322.5,444.9l-177.1-100c-5.1-2.9-6.9-9.4-4-14.5l127.7-226c2.9-5.1,9.4-6.9,14.5-4       l177.1,100c5.1,2.9,6.9,9.4,4,14.5L337,440.9C334.1,446,327.6,447.8,322.5,444.9z" id="Shape_15_"/><path class="st3" d="M274.7,111.6c1.5-2.7,4.9-3.6,7.6-2.1" id="Line_9_"/><g id="Lines_2_"><line class="st23" id="Bottom_7_" x1="343.3" x2="351.4" y1="208.8" y2="215"/><line class="st23" id="Middle_7_" x1="343.3" x2="359.4" y1="201.1" y2="213.5"/><line class="st23" id="Top_7_" x1="355" x2="359.4" y1="202.2" y2="205.6"/></g></g><g id="Pencil"><g id="Ereser"><path class="st15" d="M153.8,210.4l13.4,10.7l-28.3,35.3l-13.4-10.7c-9.7-7.8-11.3-22-3.5-31.8        c3.9-4.9,9.4-7.7,15.2-8.3C142.9,204.9,148.9,206.5,153.8,210.4z" id="Shape_14_"/><path class="st3" d="M126.9,225.4c-0.5-2.3,0-4.8,1.6-6.8c1.4-1.7,3.4-2.8,5.4-3" id="Line_8_"/></g><g id="Body_6_"><path class="st43" d="M167.4,221.3l149.7,120c0.1,0.1,0.2,0.3,0.1,0.5l-27.9,34.8c-0.1,0.1-0.3,0.2-0.5,0        l-149.7-120c-0.1-0.1-0.2-0.3-0.1-0.5l27.9-34.8C167.1,221.2,167.3,221.2,167.4,221.3z" id="Shape_13_"/><g id="Lines_1_"><line class="st44" id="Left_16_" x1="156.3" x2="298.6" y1="250" y2="364.1"/><line class="st44" id="Right_17_" x1="165.9" x2="308" y1="238.2" y2="352.1"/></g></g><rect class="st45" height="14" id="Ferrule" transform="matrix(0.6254 -0.7803 0.7803 0.6254 -129.4137 210.8338)" width="45.2" x="132.3" y="233.2"/><g id="Wood"><path class="st15" d="M317.5,341.8l11.3,23.3l-14.1,17.6l-25.2-5.9c-0.2,0-0.2-0.2-0.1-0.3l27.8-34.7        C317.3,341.6,317.5,341.7,317.5,341.8z" id="Shape_12_"/></g><g id="Lead_1_"><path class="st46" d="M328.8,365.1l10,20.8c0.6,1.2-0.5,2.4-1.7,2.2l-22.5-5.3L328.8,365.1z" id="Shape_11_"/></g></g><g id="Ruler"><g id="Ruler_1_"><path class="st47" d="M386.4,287.8l-30,38.8c-0.4,0.6-1.2,0.7-1.8,0.2L170,184.2c-0.6-0.4-0.7-1.2-0.2-1.8        l30-38.8c0.4-0.6,1.2-0.7,1.8-0.2L386.2,286C386.7,286.4,386.8,287.2,386.4,287.8z" id="Shape_10_"/><g id="Measurement_units"><line class="st44" id="Line__x23_14" x1="184.6" x2="196.6" y1="195.5" y2="179.9"/><line class="st44" id="Line__x23_13" x1="196.3" x2="202.3" y1="204.5" y2="196.8"/><line class="st44" id="Line__x23_12" x1="208.4" x2="220.4" y1="213.8" y2="198.3"/><line class="st44" id="Line__x23_11" x1="220.4" x2="226.5" y1="223.2" y2="215.4"/><line class="st44" id="Line__x23_10" x1="232.5" x2="244.5" y1="232.4" y2="216.9"/><line class="st44" id="Line__x23_9" x1="244.6" x2="250.6" y1="241.8" y2="234"/><line class="st44" id="Line__x23_8" x1="256.3" x2="268.3" y1="250.8" y2="235.2"/><line class="st44" id="Line__x23_7" x1="268.3" x2="274.3" y1="260.1" y2="252.3"/><line class="st44" id="Line__x23_6" x1="280.1" x2="292.1" y1="269.2" y2="253.7"/><line class="st44" id="Line__x23_5" x1="292.2" x2="298.2" y1="278.6" y2="270.8"/><line class="st44" id="Line__x23_4" x1="304" x2="316" y1="287.7" y2="272.1"/><line class="st44" id="Line__x23_3" x1="316.1" x2="322.1" y1="297" y2="289.2"/><line class="st44" id="Line__x23_2" x1="328" x2="340" y1="306.2" y2="290.6"/><line class="st44" id="Line__x23_1" x1="340" x2="346.1" y1="315.5" y2="307.7"/></g></g></g></g></g></g></svg>
                    <!-- Card content -->
                    <div class="relative  pb-14">

                        <h3 class="text-2xl font-extrabold text-black leading-snug mb-2">Document</h3>

                    </div>
                    <!-- Card footer -->
                    <div class="relative text-right">
                        <a class="inline-flex w-11 h-11 justify-center items-center bg-green-400 hover:bg-green-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                            href="/documents"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                    </div>
                </div>

                <div class="relati   bg-purple-100 shadow-lg rounded-lg  w-full mb-5 p-5 overflow-hidden">
                    <!-- Illustration -->
                    <svg id="Layer_1" width="100px" height="100px" style="enable-background:new 0 0 512 512;"
                        version="1.1" viewBox="0 0 512 512" xml:space="preserve"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <style type="text/css">
                            .st0 {
                                fill: #;
                            }

                            .st1 {
                                fill: #FFCE6C;
                            }

                            .st2 {
                                fill: #499CE8;
                            }

                            .st3 {
                                fill: #77D372;
                            }

                            .st4 {
                                fill: #F2F2F2;
                            }

                            .st5 {
                                fill: #FF994E;
                            }
                        </style>
                        <g>
                            <g>
                                <path class="st0"
                                    d="M250.5,324.4h-41.3c-4.7,0-8.5,3.8-8.5,8.5v75.9h49.8V324.4z" />
                                <path class="st1"
                                    d="M300.4,271.1H259c-4.7,0-8.5,3.8-8.5,8.5v129.2h49.8V271.1z" />
                                <path class="st2"
                                    d="M350.2,219.7h-41.3c-4.7,0-8.5,3.8-8.5,8.5v180.6h49.8V219.7z" />
                                <path class="st3"
                                    d="M391.5,163.9h-32.8c-4.7,0-8.5,3.8-8.5,8.5v236.4H400V172.4C400,167.7,396.2,163.9,391.5,163.9z" />
                                <path class="st4"
                                    d="M193,414.3h242c3.1,0,5.6-2.5,5.6-5.6v-7.2c0-3.1-2.5-5.6-5.6-5.6H193c-3.1,0-5.6,2.5-5.6,5.6v7.2    C187.4,411.8,189.9,414.3,193,414.3z" />
                            </g>
                            <path class="st4"
                                d="M71.7,206.9h9.4c-0.2,2.3-0.3,4.6-0.3,7c0,20,7.5,38.3,19.7,52.3c14.5,16.4,35.7,26.8,59.3,26.8   s44.8-10.3,59.3-26.8c12.3-13.9,19.7-32.2,19.7-52.3c0-2.4-0.1-4.7-0.3-7h9.4c0.2,2.3,0.3,4.7,0.3,7c0,22.6-8.5,43.3-22.5,58.9   c-16.2,18.1-39.7,29.5-65.9,29.5s-49.7-11.4-65.9-29.5c-14-15.6-22.5-36.3-22.5-58.9C71.4,211.5,71.5,209.2,71.7,206.9z" />
                            <path class="st1"
                                d="M100.5,266.2c14.5,16.4,35.7,26.8,59.3,26.8s44.8-10.3,59.3-26.8l-59.3-59.3L100.5,266.2z" />
                            <path class="st0"
                                d="M80.7,213.9c0,20,7.5,38.3,19.7,52.3l59.3-59.3H81C80.8,209.2,80.7,211.5,80.7,213.9z" />
                            <path class="st3"
                                d="M159.8,134.9v72l59.3,59.3c12.3-13.9,19.7-32.2,19.7-52.3c0-2.4-0.1-4.7-0.3-7c-1.8-20.8-11.7-39.2-26.5-52.3   C198.1,142.3,179.8,134.9,159.8,134.9z" />
                            <path class="st2"
                                d="M71.7,206.9h88.1v-81.3c-22.6,0-43.3,8.5-58.9,22.5C84.4,162.7,73.5,183.5,71.7,206.9z" />
                            <path class="st5"
                                d="M365,101.8c-0.1-2.6-2.5-4.4-4.9-4.1l-27.5,4.1c-3.7,0.5-5.1,5.4-2.1,7.7l9.3,7.7l-23.8,28.2l-16.5-23.5   c-1.1-1.6-3-2.6-4.9-2.7c-1.9-0.1-4,0.7-5.2,2.2l-34.1,40c-2.3,2.7-1.9,6.7,0.7,9.1c1.2,1.1,2.7,1.5,4.1,1.5c1.8,0,3.7-0.8,4.9-2.3   l28.6-33.7l16.5,23.5c1.1,1.6,3,2.6,4.9,2.7s4-0.8,5.2-2.3l29.3-34.8l9.6,7.8c2.9,2.3,7.3,0.1,7.1-3.6L365,101.8z" />
                        </g>
                    </svg>
                   <!-- Card content -->
                    <div class="relative  pb-14">

                        <h3 class="text-2xl font-extrabold text-black leading-snug mb-2">Rapport</h3>

                    </div>
                    <!-- Card footer -->
                    <div class="relative text-right">
                        <a class="inline-flex w-11 h-11 justify-center items-center bg-green-400 hover:bg-green-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                            href="/rapports"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                    </div>
                </div>
                <div class="relati   bg-purple-100 shadow-lg rounded-lg  w-full mb-5  p-5 overflow-hidden">
                    <!-- Illustration -->
                    <svg viewBox="0 0 64 64" width="100px" height="100px"  xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#d2ddff;}.cls-2{fill:#bd53b5;}.cls-2,.cls-3{stroke:#4c241d;}.cls-2,.cls-3,.cls-4{stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}.cls-3,.cls-4{fill:none;}.cls-4{stroke:#e66353;}</style></defs><g id="qr"><circle class="cls-1" cx="24.5" cy="29.5" r="21.5"/><rect class="cls-2" height="6" width="6" x="15" y="15"/><rect class="cls-3" height="12" width="12" x="12" y="12"/><rect class="cls-2" height="6" width="6" x="15" y="45"/><rect class="cls-3" height="12" width="12" x="12" y="42"/><rect class="cls-2" height="6" width="6" x="45" y="15"/><rect class="cls-3" height="12" width="12" x="42" y="12"/><rect class="cls-3" height="48" width="48" x="9" y="9"/><polyline class="cls-3" points="51 61 61 61 61 51"/><polyline class="cls-3" points="15 5 5 5 5 15"/><polyline class="cls-3" points="15 61 5 61 5 51"/><polyline class="cls-3" points="51 5 61 5 61 15"/><line class="cls-3" x1="28" x2="39" y1="14" y2="14"/><polyline class="cls-3" points="30 19 30 26 37.639 26"/><line class="cls-3" x1="36" x2="36" y1="19" y2="21"/><polyline class="cls-3" points="22 27 13 27 13 29.5"/><line class="cls-3" x1="13" x2="13" y1="38" y2="36"/><line class="cls-3" x1="27" x2="27" y1="27" y2="30"/><line class="cls-3" x1="20" x2="24" y1="38" y2="38"/><line class="cls-3" x1="51" x2="43" y1="53" y2="53"/><line class="cls-3" x1="51" x2="51" y1="49" y2="46"/><line class="cls-3" x1="51" x2="51" y1="42" y2="39"/><polyline class="cls-3" points="54 28 50 28 50 35"/><line class="cls-3" x1="54" x2="54" y1="36" y2="39"/><polyline class="cls-3" points="45 45 39 45 39 39.273"/><line class="cls-3" x1="33" x2="33" y1="52" y2="42"/><polyline class="cls-3" points="33 35 33 38 28.407 38 28.407 46"/><line class="cls-3" x1="45" x2="45" y1="29" y2="41"/><line class="cls-3" x1="41" x2="41" y1="30" y2="27"/><line class="cls-4" x1="5" x2="61" y1="33" y2="33"/></g></svg>
                    <!-- Card content -->
                    <div class="relative  pb-14">

                        <h3 class="text-2xl font-extrabold text-black leading-snug mb-2">Scanner</h3>

                    </div>
                    <!-- Card footer -->
                    <div class="relative text-right">
                        <a class="inline-flex w-11 h-11 justify-center items-center bg-green-400 hover:bg-green-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                            href="/scanner"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                    </div>
                </div>

                @if (auth()->user()->role == 'S')
                <div class="relati   bg-purple-100 shadow-lg rounded-lg  w-full mb-5  p-5 overflow-hidden">
                    <!-- Illustration -->
                    <svg width="100px" height="100px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M896 618.666667H443.733333c-10.666667 0-21.333333-4.266667-29.866666-12.8l-78.933334-78.933334c-8.533333-8.533333-8.533333-21.333333 0-29.866666l78.933334-78.933334c8.533333-8.533333 19.2-12.8 29.866666-12.8H896c12.8 0 21.333333 8.533333 21.333333 21.333334v170.666666c0 12.8-8.533333 21.333333-21.333333 21.333334z" fill="#3F51B5" /><path d="M192 128h42.666667v768H192z" fill="#CFD8DC" /><path d="M213.333333 213.333333m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#90A4AE" /><path d="M213.333333 512m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#90A4AE" /><path d="M213.333333 810.666667m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#90A4AE" /><path d="M725.333333 917.333333H443.733333c-10.666667 0-21.333333-4.266667-29.866666-12.8l-78.933334-78.933333c-8.533333-8.533333-8.533333-21.333333 0-29.866667l78.933334-78.933333c8.533333-8.533333 19.2-12.8 29.866666-12.8H725.333333c12.8 0 21.333333 8.533333 21.333334 21.333333v170.666667c0 12.8-8.533333 21.333333-21.333334 21.333333z" fill="#448AFF" /><path d="M746.666667 320H443.733333c-10.666667 0-21.333333-4.266667-29.866666-12.8l-78.933334-78.933333c-8.533333-8.533333-8.533333-21.333333 0-29.866667l78.933334-78.933333c8.533333-8.533333 19.2-12.8 29.866666-12.8H746.666667c12.8 0 21.333333 8.533333 21.333333 21.333333v170.666667c0 12.8-8.533333 21.333333-21.333333 21.333333z" fill="#00BCD4" /></svg><!-- Card content -->
                    <div class="relative  pb-14">

                        <h3 class="text-2xl font-extrabold text-black leading-snug mb-2">historique</h3>

                    </div>
                    <!-- Card footer -->
                    <div class="relative text-right">
                        <a class="inline-flex w-11 h-11 justify-center items-center bg-green-400 hover:bg-green-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                            href="/historique"><span class="sr-only">Read more</span> <span
                                class="font-bold -mt-px">-></span></a>
                    </div>
                </div>
                            <div class="relati  shadow-lg bg-purple-100 rounded-lg w-full mb-5  p-5 overflow-hidden">
                                <svg height="100px" width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 473.935 473.935" xml:space="preserve">
<circle style="fill:#337180;" cx="236.967" cy="236.967" r="236.967"/>
<path style="fill:#448A96;" d="M236.952,473.935c78.533,0,148.115-38.222,191.232-97.058c-8.011-11.48-39.525-45.025-145.593-70.548
	c0-24.082-2.398-38.507-2.398-38.507s31.289-43.337,33.691-103.513c0-9.568,4.7-77.436-77.017-80.508c0-0.03,0-0.079,0-0.101
	c-0.202,0-0.382,0.045-0.602,0.045c-0.21,0-0.385-0.045-0.595-0.045c0,0.022,0,0.075,0,0.101
	c-81.702,3.068-77.017,70.941-77.017,80.505c2.398,60.175,33.691,103.513,33.691,103.513s-2.417,14.425-2.417,38.507
	C86.664,331.174,54.08,363.623,45.044,375.908C88.104,435.286,157.997,473.935,236.952,473.935z"/>
<circle style="fill:#00A31F;" cx="332.233" cy="363.515" r="57.062"/>
<g>
	<path style="fill:#FFFFFF;" d="M370.572,363.361c0,4.962-4.022,8.988-8.999,8.988h-58.559c-4.965,0-8.995-4.026-8.995-8.988l0,0
		c0-4.969,4.03-8.995,8.995-8.995h58.559C366.549,354.362,370.572,358.392,370.572,363.361L370.572,363.361z"/>
	<path style="fill:#FFFFFF;" d="M332.293,401.632c-4.965,0-8.992-4.026-8.992-8.995v-58.559c0-4.969,4.026-8.995,8.992-8.995l0,0
		c4.969,0,8.999,4.026,8.999,8.995v58.559C341.292,397.606,337.262,401.632,332.293,401.632L332.293,401.632z"/>
</g>
</svg>
                           

                                <!-- Card content -->
                                <div class="relative  pb-14">

                                    <h3 class="text-2xl font-extrabold text-black leading-snug mb-2">Ajouter admin
                                    </h3>

                                </div>
                                <!-- Card footer -->
                                <div class="relative text-right">
                                    <a class="inline-flex w-11 h-11 justify-center items-center bg-green-400 hover:bg-green-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                        href="/register"><span class="sr-only">Read more</span> <span
                                            class="font-bold -mt-px">-></span></a>
                                </div>
                            </div>

                            <div class="relati   bg-purple-100 shadow-lg rounded-lg  w-full mb-5  p-5 overflow-hidden">
                                <!-- Illustration -->
                                <svg height="100px" width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                viewBox="0 0 390.917 390.917" xml:space="preserve">
                           <path style="fill:#0000;" d="M346.828,181.883c-5.43,0-9.762-3.814-10.861-9.244c-3.814-21.657-12.477-42.796-25.471-60.703
                               c-3.232-4.331-2.715-10.279,1.099-14.093l16.291-15.192l-19.006-18.877l-15.709,15.709c-3.814,3.814-9.762,4.331-14.093,1.099
                               c-17.907-13.576-39.046-22.238-60.703-25.471c-5.43-1.099-9.244-5.43-9.244-10.861V22.012h-27.087v21.657
                               c0,5.43-3.814,9.762-9.244,10.861C151.143,58.343,130.004,67.006,112.097,80c-4.331,3.232-10.279,2.715-14.093-1.099L82.295,63.192
                               L63.354,82.133l15.709,15.709c3.814,3.814,4.331,9.762,1.099,14.093c-13.576,17.907-22.238,39.046-25.471,60.703
                               c-1.099,5.43-5.43,9.244-10.861,9.244H21.657v27.152h21.657c5.43,0,9.762,3.814,10.861,9.244
                               c3.814,21.657,12.477,42.796,25.471,60.703c3.232,4.331,2.715,10.279-1.099,14.093l-15.709,15.709l18.941,18.941l15.709-15.709
                               c3.814-3.814,9.762-4.331,14.093-1.099c17.907,13.576,39.046,22.238,60.703,25.471c5.43,1.099,9.244,5.43,9.244,10.861v22.238
                               h27.152v-22.238c0-5.43,3.814-9.762,9.244-10.861c21.657-3.814,42.796-12.477,60.703-25.471c4.331-3.232,10.279-2.715,14.093,1.099
                               l15.192,15.709l18.941-18.941l-15.709-15.709c-3.814-3.814-4.331-9.762-1.099-14.093c13.576-17.907,22.238-39.046,25.471-60.703
                               c1.099-5.43,5.43-9.244,10.861-9.244h22.756v-27.152H346.828z M195.103,312.016c-63.935,0-116.558-52.558-116.558-116.558
                               S131.168,78.966,195.103,78.966s116.558,52.558,116.558,116.493S259.038,312.016,195.103,312.016z"/>
                           <path style="fill:#194F82;" d="M379.345,160.226h-24.372c-4.331-18.941-11.895-36.848-22.238-53.139l17.325-17.325
                               c4.331-4.331,4.331-10.861,0-15.192l-34.069-34.133c-4.331-4.331-11.378-4.331-15.192,0l-17.325,16.808
                               c-16.291-10.279-34.715-17.907-53.139-22.238v-23.79c0-5.947-4.848-10.861-10.861-10.861h-48.808
                               c-5.947,0-10.861,4.848-10.861,10.861v24.372c-18.941,4.331-36.848,11.895-53.139,22.238L89.341,40.501
                               c-5.43-4.848-10.861-3.814-15.192,0L40.081,74.57c-3.814,4.331-4.331,10.279,0,15.192l17.325,17.325
                               c-10.279,16.291-17.907,34.715-22.238,53.139H10.861C4.913,160.226,0,165.075,0,171.087v48.808c0,5.947,4.848,10.861,10.861,10.861
                               h24.372c4.331,18.941,11.895,36.848,22.238,53.139L40.145,301.22c-4.331,4.848-4.331,10.279,0,15.192l34.133,34.133
                               c4.331,4.331,11.378,4.331,15.192,0l17.325-17.325c16.291,10.279,34.715,17.907,53.139,22.238v24.242
                               c0,5.948,4.848,10.861,10.861,10.861h48.808c5.947,0,10.861-4.849,10.861-10.861v-24.372c18.941-4.331,36.848-11.895,53.139-22.238
                               l17.325,17.325c4.331,4.331,10.861,4.331,15.192,0l34.133-34.133c4.331-5.43,4.331-10.279,0-15.192l-16.808-17.325
                               c10.279-16.291,17.907-34.715,22.238-53.139h24.372c5.947,0,10.861-4.848,10.861-10.861v-48.808
                               C390.206,165.139,385.358,160.226,379.345,160.226z M368.549,209.034h-22.238c-5.43,0-9.762,3.814-10.861,9.244
                               c-3.232,21.657-11.895,42.796-25.471,60.703c-3.232,4.331-2.715,10.279,1.099,14.093l15.709,15.709l-18.941,18.941l-15.192-15.709
                               c-3.814-3.814-9.762-4.331-14.093-1.099c-17.907,12.994-39.046,21.657-60.703,25.471c-5.43,1.099-9.244,5.43-9.244,10.861v22.238
                               h-27.087v-22.238c0-5.43-3.814-9.762-9.244-10.861c-21.657-3.232-42.796-11.895-60.703-25.471
                               c-4.331-3.232-10.279-2.715-14.093,1.099l-15.709,15.709l-18.941-18.941l15.709-15.709c3.814-3.814,4.331-9.762,1.099-14.093
                               c-12.994-17.907-21.657-39.046-25.471-60.703c-1.099-5.43-5.43-9.244-10.861-9.244H21.657v-27.152h22.238
                               c5.43,0,9.762-3.814,10.861-9.244c3.232-21.657,11.895-42.796,25.471-60.703c3.232-4.331,2.715-10.279-1.099-14.093L63.418,82.133
                               L82.36,63.192l15.709,15.709c3.814,3.814,9.762,4.331,14.093,1.099c17.907-12.994,39.046-21.657,60.703-25.471
                               c5.43-1.099,9.244-5.43,9.244-10.861V22.012h27.087v22.238c0,5.43,3.814,9.762,9.244,10.861
                               c21.657,3.232,42.796,11.895,60.703,25.471c4.331,3.232,10.279,2.715,14.093-1.099l15.709-15.709l18.941,18.941l-16.291,15.192
                               c-3.814,3.814-4.331,9.762-1.099,14.093c12.994,17.907,21.657,39.046,25.471,60.703c1.099,5.43,5.43,9.244,10.861,9.244h22.238
                               v27.087H368.549z"/>
                           <path style="fill:#56ACE0;" d="M127.871,262.109c17.325,17.325,41.18,28.186,67.232,28.186s49.842-10.861,67.232-28.186
                               c-17.907-17.907-41.762-28.186-67.232-28.186S145.778,244.267,127.871,262.109z"/>
                           <path style="fill:#FFFFFF;" d="M195.103,100.622c-52.04,0-94.836,42.796-94.836,94.836c0,17.907,5.43,35.232,14.093,49.325
                               c21.657-20.622,50.424-32.517,80.743-32.517s59.087,11.895,80.743,32.517c8.663-14.093,14.093-30.901,14.093-49.325
                               C289.939,143.418,247.143,100.622,195.103,100.622z M195.103,196.558c-21.657,0-39.564-17.907-39.564-39.564
                               s17.907-39.564,39.564-39.564s39.564,17.907,39.564,39.564S216.76,196.558,195.103,196.558z"/>
                           <path style="fill:#56ACE0;" d="M195.103,139.087c-9.762,0-17.907,8.145-17.907,17.907c0,9.762,8.145,17.907,17.907,17.907
                               c9.762,0,17.907-8.145,17.907-17.907C213.01,147.232,204.865,139.087,195.103,139.087z"/>
                           <g>
                               <path style="fill:#194F82;" d="M195.103,78.966c-63.935,0-116.493,52.558-116.493,116.493s52.558,116.493,116.493,116.493
                                   s116.493-52.558,116.493-116.493S259.038,78.966,195.103,78.966z M195.103,290.295c-25.988,0-49.842-10.861-67.232-28.186
                                   c17.907-17.907,41.762-28.186,67.232-28.186s49.325,10.279,67.232,28.186C244.945,279.434,221.091,290.295,195.103,290.295z
                                    M195.103,212.267c-30.319,0-59.087,11.895-80.743,32.517c-8.663-14.093-14.093-31.418-14.093-49.325
                                   c0-52.04,42.796-94.836,94.836-94.836s94.836,42.796,94.836,94.836c0,18.424-5.43,35.232-14.093,49.325
                                   C254.19,224.162,225.422,212.267,195.103,212.267z"/>
                               <path style="fill:#194F82;" d="M195.103,117.43c-21.657,0-39.564,17.907-39.564,39.564s17.907,39.564,39.564,39.564
                                   s39.564-17.907,39.564-39.564S216.76,117.43,195.103,117.43z M195.103,174.836c-9.762,0-17.907-8.145-17.907-17.907
                                   c0-9.762,8.145-17.907,17.907-17.907c9.762,0,17.907,8.145,17.907,17.907C213.01,167.273,204.865,174.836,195.103,174.836z"/>
                           </g>
                           </svg>
                                <div class="relative  pb-14">

                                    <h3 class="text-2xl font-extrabold text-black leading-snug mb-2">gerer admin
                                    </h3>

                                </div>
                                <!-- Card footer -->
                                <div class="relative text-right">
                                    <a class="inline-flex w-11 h-11 justify-center items-center bg-green-400 hover:bg-green-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                                        href="/admin/list"><span class="sr-only">Read more</span> <span
                                            class="font-bold -mt-px">-></span></a>
                                </div>
                            </div>
                        @endif
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
