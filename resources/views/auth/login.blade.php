<x-guest-layout>
    <!-- Session Status -->
    
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class=" bg-white rounded-lg shadow-lg sm:shadow  md:mt-0  ">
      <div class="px-10 py-14 space-y-4 md:space-y-6">
        <div class="w-full flex justify-between">
          <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">Sign in</h1>
          <svg width="40px" height="40px" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet">

            <path d="M115.3 62.7h-.01c-.12-2.45-2.72-4.74-7.21-6.09c-9.61-2.89-20.27-4.58-32.43-4.68c-12.15.1-22.81 1.79-32.43 4.68c-4.49 1.35-7.07 3.64-7.2 6.09H36v50.08c0 2.79 3.02 5.8 10.26 7.85c7.48 2.12 17.6 3.49 29.38 3.49s21.9-1.37 29.38-3.49c7.59-2.15 10.39-5.32 10.27-8.25V62.7z" fill="#e2a610">
            
            </path>
            
            <path d="M83.55 108.24l-4.49-10.58a7.662 7.662 0 0 0 4.33-6.9c0-4.24-3.44-7.67-7.67-7.67s-7.67 3.44-7.67 7.67c0 2.85 1.56 5.33 3.87 6.66l-4.18 10.89c-.53 1.38.49 2.85 1.96 2.85h11.92c1.5 0 2.52-1.54 1.93-2.92z" fill="#4e342e">
            
            </path>
            
            <path d="M83.13 107.25H68.14l-.4 1.05c-.53 1.38.49 2.85 1.96 2.85h11.92c1.51 0 2.52-1.54 1.93-2.92l-.42-.98z" fill="#9e740b">
            
            </path>
            
            <path d="M72.6 95.4c.18-.52-.01-1.08-.45-1.4c-.6-.44-1.41-1.22-1.92-2.46c-1.86-4.48.35-6.47.35-6.47a7.622 7.622 0 0 0-2.54 5.69c0 2.85 1.56 5.33 3.87 6.66l.69-2.02z" fill="#9e740b">
            
            </path>
            
            <path d="M81.11 85.3s2.2 4.42-.32 7.25c-.86.96-1.59 1.47-2.13 1.72c-.53.25-.77.88-.52 1.41l.93 1.96a7.662 7.662 0 0 0 4.33-6.9c-.01-3.25-2.29-5.44-2.29-5.44z" fill="#9e740b">
            
            </path>
            
            <path d="M106.4 55.95c-9.12-2.64-19.22-4.19-30.74-4.28c-11.52.09-21.63 1.64-30.74 4.28c-9.13 2.65-10.04 9.26 2.89 12.8c7.09 1.94 16.69 3.19 27.85 3.19s20.76-1.25 27.85-3.19c12.93-3.54 12.02-10.16 2.89-12.8z" fill="#fdd835">
            
            </path>
            
            <g>
            
            <path d="M75.65 10.89c-15.52 0-28.15 13.13-28.15 29.26v22.06s1.3 1.72 5.14 1.72s5.95-1.72 5.95-1.72V40.16C58.59 30.14 66.24 22 75.65 22c1.38 0 2.71.19 3.99.52V11.19c-1.3-.19-2.63-.3-3.99-.3z" fill="#84b0c1" stroke="#84b0c1" stroke-width="1.958" stroke-miterlimit="10">
            
            </path>
            
            <path d="M61.49 16.3c-4.75 3.03-6.64 6.97-7.43 9.05c-.92 2.44.49 3 1.55 2.29c1.44-.95 2.22-3.02 7.36-6.08c5.48-3.27 13.02-2.72 13.35-6.25c.36-3.99-6.67-4.23-14.83.99z" fill="#b9e4ea">
            
            </path>
            
            </g>
            
            <g>
            
            <path d="M8.16 121.64c.19-1.14.99-2.07 1.58-3.21c.66-1.3 1.28-2.62 1.67-4.03c.61-2.2.69-4.52 1.23-6.74c.72-2.96 3.22-6.17 6.8-7.87c5.58-2.64 8.17-5.61 9.81-7.08l9.11 8.68c-1.8 2.25-3.93 4.95-5.03 7.06c-.55 1.06-1.73 4.46-3.9 6.56c-1.82 1.76-4.12 3-6.59 3.54c-.97.21-1.96.32-2.93.54c-2.4.55-4.6 1.79-6.55 3.3c-.79.61-1.71 1.52-2.75 1.61c-.4.03-.83 0-1.14-.28c-.29-.25-.28-.72-.28-.72s-.48.27-.89-.15c-.31-.32-.21-.8-.14-1.21z" fill="#84b0c1">
            
            </path>
            
            <path d="M103.31 11.7c-.97-.81-2.67-2.28-2.67-2.28c-.96-.8-2.2-1.18-3.48-1.07s-2.28.6-3.21 1.64L83.09 21.18c-4.93 5.08-16.89 17.44-17.67 18.5c-.79 1.05-.23 1.61-.13 1.72c1.26 1.32 3.48 1.45 5.06.53c1.58-.92 2.54-2.69 2.79-4.5c.16-1.18.22-1.76 1.07-2.56c.3-.29 20.88-20.79 20.88-20.79c.49-.47 1.58-1.3 3.13.02c.23.19 4.81 4.18 4.81 4.18l3.15-3.77l-.02-.21c-.03-.25-.03-.25-2.85-2.6z" fill="#ffc107">
            
            </path>
            
            <path d="M100.62 14.28c-.6-.88-2.04-2.11-3.02-2.51c-1.12-.46-1.93.04-2.62.68c-1.22 1.13-9.28 9.96-11.04 12.27c-.2.26-.4.56-.4.88c4.62-4.62 9.32-9.19 10.82-10.56c1.15-1.05 2.06-1.84 3.2-1.08c.11.07.75.59 1.94 1.53l1.12-1.21z" fill="#d89a00">
            
            </path>
            
            <path d="M24.45 94.55c2.34-3.19 11.7-14.13 37.92-42.2l-.02-.02l.19-2.19c22.62-25 42.34-39.52 43.94-40.75c1.61-1.22 5.19.42 7.84 2.84c2.65 2.42 4.35 6 3.25 7.68c-1.1 1.68-14.72 22.24-38.39 46.25l-2.1.02c-26.69 27.71-37.15 37.29-40.21 39.8c-.56.45-1.36.43-1.88-.07l-10.38-9.48c-.51-.5-.58-1.3-.16-1.88z" fill="#424242">
            
            </path>
            
            <path d="M113.25 26.89c-.49.06-.67-.36-.94-.74c-3.19-4.33-7.06-8.29-11.7-11.07c-.21-.12-.42-.23-.44-.75c-.01-.53 1.49-1.91 2.65-2.52c.62-.33 1.84-.03 2.59.56c3.54 2.51 6.36 5.68 9.09 9.04c.69.86 1.55 1.59 1.13 2.76c-.43 1.09-1.19 2.37-2.38 2.72z" fill="#ffc107">
            
            </path>
            
            <path d="M103.21 12.96c-.5.02-1.23.39-1.25.89c-.01.51.29.77.97 1.03c1.5.57 2.16 1.26 3.56 2.73c.43.45 1.67.32 1.46-.89c-.18-1.08-.63-1.58-1.26-2.25c-1.14-1.22-2.43-1.55-3.48-1.51z" fill="#ffee58">
            
            </path>
            
            <path d="M81.94 39.69c-3.9 3.72-8.75 7.77-9.53 7c-.76-.75 3.11-5.38 4.99-7.47c1.48-1.65 6.83-8.28 8.88-6.49c1.8 1.58-2.17 4.89-4.34 6.96z" fill="#757575">
            
            </path>
            
            <path d="M45.47 73.93c-1.84 2.27-6.08 7.39-5.54 7.91c.54.52 2.78-1.07 3.54-1.68c6.1-4.83 11.65-10.36 16.51-16.43c1.09-1.36 2.19-2.91 2.07-4.65c-.03-.46-.25-1.01-.71-1.06c-2.13-.28-6.45 5.36-7.69 6.65c-2.86 2.96-5.59 6.05-8.18 9.26z" fill="#757575">
            
            </path>
            
            <path d="M82.39 62.9c-4.09-6.71-10.34-12.83-16.63-16.26c0 0-.51.11-.84.52c-.33.41-.46.88-.46.88c6.29 3.31 12.6 9.46 16.6 16.24c0 0 .37-.12.83-.57c.46-.45.5-.81.5-.81z" fill="#ffc107">
            
            </path>
            
            <path d="M79.34 66.15c-4.09-6.61-10.45-12.61-16.65-16.02c0 0-.34.42-.45 1.2c-.1.79.1 1.29.1 1.29c5.49 3.22 10.67 8.01 14.42 13.86c0 0 .76.31 1.4.19c.65-.12 1.18-.52 1.18-.52z" fill="#212121">
            
            </path>
            
            <path d="M10.37 122.41c-.92.76-1.1.93-1.3.8s.08-.54 1.37-2.21s9.52-10.05 9.52-10.05l.85.71s-9.01 9.55-10.44 10.75z" fill="#000000">
            
            </path>
            
            <circle cx="20.98" cy="110.5" r="1.65" fill="#000000">
            
            </circle>
            
            <path d="M38.04 104.99c-1.38-1.86-3.47-4.43-6.1-6.96c-2.37-2.28-4.71-3.77-6.54-4.7c-.39.49-.71.9-.94 1.23c-.42.58-.35 1.38.17 1.87L35 105.91c.52.49 1.32.52 1.88.07c.31-.26.69-.58 1.16-.99z" fill="#ffc107">
            
            </path>
            
            <path d="M30.08 97.06c1.03.92 2.77 3.16 2.1 4.29c-.41.7-1.24.33-1.9-.41c-.46-.51-1.31-1.34-1.81-1.81c-1.19-1.14-3.67-2.32-2.82-3.19c.99-1.01 3.6.37 4.43 1.12z" fill="#ffee58">
            
            </path>
            
            <path d="M14.48 107.11c.6-1.61 1.58-3.11 2.96-4.13c.68-.5 1.5-.89 2.34-.82c.84.07 1.73.75 1.68 1.59c-.1 1.62-1.93 2.84-2.5 3.5c-2.5 2.88-3.2 6.39-5.18 7.27c-.59.26-.95-.41-.64-1.12c.75-1.7.74-4.68 1.34-6.29z" fill="#a8e3f0">
            
            </path>
            
            </g>
            
            <g>
            
            <path d="M78.04 11.01v11.18c8.28 1.24 14.67 8.81 14.67 17.97v22.06s1.04 1.72 5.88 1.72c4.85 0 5.22-1.72 5.22-1.72V40.16c0-15.3-11.36-27.89-25.77-29.15z" fill="#84b0c1" stroke="#84b0c1" stroke-width="1.958" stroke-miterlimit="10">
            
            </path>
            
            </g>
            
            </svg>
        </div>

    <form method="POST" class="space-y-4 md:space-y-6" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}
        <div class="mb-6">
          <label for="email"  class="block font-medium text-sm text-gray-700 mt-3">
              Mot de passe
          </label>
          <div class="relative cursor-pointer">
              <input type="email"  class=" border-gray-300 rounded-md shadow-sm p-2 w-full" name="email"  id="email" value="{{old('email')}}"  class="text-md block px-3 py-2 rounded-lg w-full 
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
            focus:placeholder-gray-500
            focus:bg-white 
            focus:border-indigo-500 focus:ring-indigo-500
            focus:outline-none">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 " >

                <svg fill="#000000" class="h-6 text-gray-700" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                viewBox="0 0 330.001 330.001" xml:space="preserve">
             <g id="XMLID_348_">
               <path id="XMLID_350_" d="M173.871,177.097c-2.641,1.936-5.756,2.903-8.87,2.903c-3.116,0-6.23-0.967-8.871-2.903L30,84.602
                 L0.001,62.603L0,275.001c0.001,8.284,6.716,15,15,15L315.001,290c8.285,0,15-6.716,15-14.999V62.602l-30.001,22L173.871,177.097z"
                 />
               <polygon id="XMLID_351_" points="165.001,146.4 310.087,40.001 19.911,40 	"/>
             </g>
             </svg>

              </div>
          </div>
          @error('email' )
          <p class="text-red-500 text-xs w-80 mt-1">{{$message}} </p>
          @enderror
      </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block font-medium text-sm text-gray-700 mt-3">
                Mot de passe
            </label>
            <div class="relative cursor-pointer">
                <input type="password" class=" border-gray-300 rounded-md shadow-sm p-2 w-full" name="password" id="password"  class="text-md block px-3 py-2 rounded-lg w-full 
              bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
              focus:placeholder-gray-500
              focus:bg-white 
              focus:border-indigo-500 focus:ring-indigo-500
              focus:outline-none">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 " onclick="myFunction()">

                  <svg id="show" class="h-6 text-gray-700 bg-white" fill="none" xmlns="http://www.w3.org/2000/svg"
                    viewbox="0 0 576 512">
                    <path fill="currentColor"
                      d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                    </path>
                  </svg>

                  <svg id="notshow" class="hidden h-6 text-gray-700 bg-white" fill="none" xmlns="http://www.w3.org/2000/svg"
                    viewbox="0 0 640 512">
                    <path fill="currentColor"
                      d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                    </path>
                  </svg>

                </div>
            </div>
            @error('password')
            <p class="text-red-500 text-xs w-80 mt-1">{{$message}} </p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
       
    </form>
    </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password"); 
            var show = document.getElementById("show"); 
            var notshow = document.getElementById("notshow"); 
            if (x.type === "password") {
                x.type = "text";
                show.classList.toggle('hidden');
                notshow.classList.toggle('hidden');
            } else {
                x.type = "password";
                show.classList.toggle('hidden');
                notshow.classList.toggle('hidden');
            }
        }
    </script>
</x-guest-layout>
