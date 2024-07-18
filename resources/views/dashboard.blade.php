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

            




            <div class=" overflow-hidden gap-3 grid grid-cols-1 sm:grid-cols-3 p-3 justify-items-center">
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

                <div class="relati   bg-purple-100 shadow-lg rounded-lg  h-[300px] w-[500px] mb-5 p-5 overflow-hidden">
                    <!-- Illustration -->
                    <svg id="Layer_1" width="100px" height="100px" style="enable-background:new 0 0 512 512;"
                        version="1.1" viewBox="0 0 512 512" xml:space="preserve"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <style type="text/css">
                            .st0 {
                                fill: #EA5E5E;
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
                            <div class="relati  shadow-lg bg-purple-100 rounded-lg w-full mb-5  p-5 overflow-hidden">
                                <svg fill="#000000" height="100px" width="100px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
<path d="M213.3,384c0-87,65.2-158.7,149.3-169.2c0-0.9,0-1.5,0-1.5c5.5-8,21.3-21.3,21.3-42.7s-21.3-42.7-21.3-53.3
	C362.7,32,319.2,0,256,0c-60.5,0-106.7,32-106.7,117.3c0,10.7-21.3,32-21.3,53.3s15.2,35.4,21.3,42.7c0,0,0,21.3,10.7,53.3
	c0,10.7,21.3,21.3,32,32c0,10.7,0,21.3-10.7,42.7L64,362.7C21.3,373.3,0,448,0,512h271.4C235.9,480.7,213.3,435,213.3,384z M384,256
	c-70.7,0-128,57.3-128,128s57.3,128,128,128s128-57.3,128-128S454.7,256,384,256z M469.3,405.3h-64v64h-42.7v-64h-64v-42.7h64v-64
	h42.7v64h64V405.3z"/>
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
                                <svg fill="#000000" height="100px" width="100px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 474.565 474.565" xml:space="preserve">
<g>
	<path d="M255.204,102.3c-0.606-11.321-12.176-9.395-23.465-9.395C240.078,95.126,247.967,98.216,255.204,102.3z"/>
	<path d="M134.524,73.928c-43.825,0-63.997,55.471-28.963,83.37c11.943-31.89,35.718-54.788,66.886-63.826
		C163.921,81.685,150.146,73.928,134.524,73.928z"/>
	<path d="M43.987,148.617c1.786,5.731,4.1,11.229,6.849,16.438L36.44,179.459c-3.866,3.866-3.866,10.141,0,14.015l25.375,25.383
		c1.848,1.848,4.38,2.888,7.019,2.888c2.61,0,5.125-1.04,7.005-2.888l14.38-14.404c2.158,1.142,4.55,1.842,6.785,2.827
		c0-0.164-0.016-0.334-0.016-0.498c0-11.771,1.352-22.875,3.759-33.302c-17.362-11.174-28.947-30.57-28.947-52.715
		c0-34.592,28.139-62.739,62.723-62.739c23.418,0,43.637,13.037,54.43,32.084c11.523-1.429,22.347-1.429,35.376,1.033
		c-1.676-5.07-3.648-10.032-6.118-14.683l14.396-14.411c1.878-1.856,2.918-4.38,2.918-7.004c0-2.625-1.04-5.148-2.918-7.004
		l-25.361-25.367c-1.94-1.941-4.472-2.904-7.003-2.904c-2.532,0-5.063,0.963-6.989,2.904l-14.442,14.411
		c-5.217-2.764-10.699-5.078-16.444-6.825V9.9c0-5.466-4.411-9.9-9.893-9.9h-35.888c-5.451,0-9.909,4.434-9.909,9.9v20.359
		c-5.73,1.747-11.213,4.061-16.446,6.825L75.839,22.689c-1.942-1.941-4.473-2.904-7.005-2.904c-2.531,0-5.077,0.963-7.003,2.896
		L36.44,48.048c-1.848,1.864-2.888,4.379-2.888,7.012c0,2.632,1.04,5.148,2.888,7.004l14.396,14.403
		c-2.75,5.218-5.063,10.708-6.817,16.438H23.675c-5.482,0-9.909,4.441-9.909,9.915v35.889c0,5.458,4.427,9.908,9.909,9.908H43.987z"
		/>
	<path d="M354.871,340.654c15.872-8.705,26.773-25.367,26.773-44.703c0-28.217-22.967-51.168-51.184-51.168
		c-9.923,0-19.118,2.966-26.975,7.873c-4.705,18.728-12.113,36.642-21.803,52.202C309.152,310.022,334.357,322.531,354.871,340.654z
		"/>
	<path d="M460.782,276.588c0-5.909-4.799-10.693-10.685-10.693H428.14c-1.896-6.189-4.411-12.121-7.393-17.75l15.544-15.544
		c2.02-2.004,3.137-4.721,3.137-7.555c0-2.835-1.118-5.553-3.137-7.563l-27.363-27.371c-2.08-2.09-4.829-3.138-7.561-3.138
		c-2.734,0-5.467,1.048-7.547,3.138l-15.576,15.552c-5.623-2.982-11.539-5.481-17.751-7.369v-21.958
		c0-5.901-4.768-10.685-10.669-10.685H311.11c-2.594,0-4.877,1.04-6.739,2.578c3.26,11.895,5.046,24.793,5.046,38.552
		c0,8.735-0.682,17.604-1.956,26.423c7.205-2.656,14.876-4.324,22.999-4.324c36.99,0,67.086,30.089,67.086,67.07
		c0,23.637-12.345,44.353-30.872,56.303c13.48,14.784,24.195,32.324,31.168,51.976c1.148,0.396,2.344,0.684,3.54,0.684
		c2.733,0,5.467-1.04,7.563-3.13l27.379-27.371c2.004-2.004,3.106-4.721,3.106-7.555s-1.102-5.551-3.106-7.563l-15.576-15.552
		c2.982-5.621,5.497-11.555,7.393-17.75h21.957c2.826,0,5.575-1.118,7.563-3.138c2.004-1.996,3.138-4.72,3.138-7.555
		L460.782,276.588z"/>
	<path d="M376.038,413.906c-16.602-48.848-60.471-82.445-111.113-87.018c-16.958,17.958-37.954,29.351-61.731,29.351
		c-23.759,0-44.771-11.392-61.713-29.351c-50.672,4.573-94.543,38.17-111.145,87.026l-9.177,27.013
		c-2.625,7.773-1.368,16.338,3.416,23.007c4.783,6.671,12.486,10.631,20.685,10.631h315.853c8.215,0,15.918-3.96,20.702-10.631
		c4.767-6.669,6.041-15.234,3.4-23.007L376.038,413.906z"/>
	<path d="M120.842,206.782c0,60.589,36.883,125.603,82.352,125.603c45.487,0,82.368-65.014,82.368-125.603
		C285.563,81.188,120.842,80.939,120.842,206.782z"/>
</g>
</svg><!-- Card content -->
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
