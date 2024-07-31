<x-nav-bar>
    <style>
        .bg-150 {
            background-size: 150px;
        }

        .bg-1 {
            background-color: hsla(200, 95%, 58%, 0.65);
        }

        .bg-2 {
            background-color: rgba(246, 139, 9, 0.65);
        }

        .bg-3 {
            background-color: rgba(8, 218, 78, 0.65);
        }

        .bg-4 {
            background-color: rgba(233, 34, 44, 0.65);
        }

        .bg-5 {
            background-color: rgba(181, 14, 223, 0.65);
        }

        .bg-0 {
            background-color: rgba(245, 31, 156, 0.65);
        }
    </style>
    <style>
        .dropdown-toggle {
            padding: 5px 10px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            position: absolute;
            right: 0;
            top: 5px;
        }

        /* Style the dropdown menu */
        .dropdown-menu {
            position: absolute;
            top: 20px;
            right: 30px;
            z-index: 100;
            display: none;
            background-color: #fff;
            min-width: 100px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Style the dropdown menu items */
        .dropdown-menu li {
            padding: 5px 10px;
            cursor: pointer;
        }

        /* Style the dropdown menu items on hover */
        .dropdown-menu li:hover {
            background-color: #f1f1f1;
            border-radius: 5px;
        }

        .show {
            display: block
        }
    </style>
    <div class="container  w-full">
        <!-- Error Message -->
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Erreur!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Warning Message -->
        @if (session('warning'))
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Attention!</strong>
                <span class="block sm:inline">{{ session('warning') }}</span>
            </div>
        @endif

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Succès!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- General Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Il y avait quelques problèmes avec vos données
                    saisies.</span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($errors->userDeletion->get('current_password'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-1 rounded relative" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Il y avait quelques problèmes avec vos données
                    saisies.</span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
    <div class="fixed font-mon bg-white grid hidden rounded-md shadow-md z-50" id="deleteGroupModal"
        style="width: 800px; justify-items: center; align-content: space-evenly ;height: 250px; left: 50%; top:50%; transform: translate(-50%, -50%); tabindex="-1"
        aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
        <div class="grid justify-items-center w-full">
            <form method="post" action="/categories/delete" class="p-6 w-full">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Confirmation de la suppression') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Êtes-vous sûr de vouloir supprimer cette marchendise?') }}
                </p>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
                    <x-text-input name="current_password" type="password" class="mt-1 block w-3/4"
                        placeholder="{{ __('Password') }}" />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" id="err" />
                </div>
                <input type="hidden" name="id" id="deleteGroupId" value="">
                <div class="mt-6 flex justify-end">
                    <x-secondary-button onclick="hide()">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </div>
    
    <div id="cont">
        <div class=" flex">
            <p class="text-2xl w-2/3 m-3 pl-6 font-bold capitalize">categories des marchandises</p>
            <p class="text-xl w-1/3  m-3 pl-6 text-center"><a href="{{ route('categories.create') }}"
                    class="text-blue-600 hover:text-blue-900">Ajouter categorie</a> </p>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden gap-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 justify-items-center">

                    @foreach ($categories as $index => $categorie)
                        @php
                            $source = 'group_icons/' . $index % 12 . '.png';
                            $color = 'bg-' . $index % 6;
                        @endphp
                        <div class="relative h-52 w-full backdrop-blur-lg  bg-150  bg-no-repeat m-3 flex flex-col  text-center justify-center "
                            >
                            <div
                                class="bg-white shadow-lg h-full grid items-center rounded-xl  hover:border-2 hover:border-gray-100">
                                @if (auth()->user()->role == 'S')
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button"
                                            id="dropdownMenu{{ $categorie->id }}" data-groupId="{{ $categorie->id }}"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon icon-tabler icon-tabler-dots-vertical hover:bg-gray-300 h-8 w-8 p-1 rounded-full " fill="none"
                                                 stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                width="24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none" stroke="none" />
                                                <circle cx="12" cy="12" r="1" />
                                                <circle cx="12" cy="19" r="1" />
                                                <circle cx="12" cy="5" r="1" />
                                            </svg>
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $categorie->id }}">
                                            <li><a class="dropdown-item"
                                                    href="/categories/{{ $categorie->id }}/edit">Modify</a></li>
                                            <li id="deletbutton" onclick="warnning({{ $categorie->id }})"><a
                                                    class="dropdown-item" href="#"
                                                    data-group-id="{{ $categorie->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#deleteGroupModal">Delete</a></li>
                                        </ul>
                                    </div>
                                @endif
                                <p class="text-center mt-4   text-3xl font-bold text-gray-900">{{ $categorie->nom }}</p>
                                <br>
                                <section class="text-gray-700 body-font">
                                    <div class="container mx-auto px-4 ">
                                      <div class="grid grid-cols-2  -m-4">
                                        <!-- Premier carreau -->
                                        <div class=" p-2  w-full">
                                          <div class="border-2 border-gray-600  rounded-lg transform transition duration-500 hover:scale-110">
                                            <svg viewBox="0 0 24 24" class="text-indigo-500 w-8 h-8 inline-block" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                              <title/>
                                              <g fill="none" fill-rule="evenodd" id="页面-1" stroke="none" stroke-width="1">
                                                <g id="导航图标" transform="translate(-325.000000, -80.000000)">
                                                  <g id="编组" transform="translate(325.000000, 80.000000)">
                                                    <polygon fill="#FFFFFF" fill-opacity="0.01" fill-rule="nonzero" id="路径" points="24 0 0 0 0 24 24 24"/>
                                                    <polygon id="路径" points="22 7 12 2 2 7 2 17 12 22 22 17" stroke="#6366f1" stroke-linejoin="round" stroke-width="1.5"/>
                                                    <line id="路径" stroke="#6366f1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="2" x2="12" y1="7" y2="12"/>
                                                    <line id="路径" stroke="#6366f1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="12" x2="12" y1="22" y2="12"/>
                                                    <line id="路径" stroke="#6366f1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="22" x2="12" y1="7" y2="12"/>
                                                    <line id="路径" stroke="#6366f1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="17" x2="7" y1="4.5" y2="9.5"/>
                                                  </g>
                                                </g>
                                              </g>
                                            </svg>
                                            <h6 class="title-font font-medium text-2xl text-gray-900">{{ $categorie->total_achetes }} </h6>
                                            <p class="leading-relaxed text-sm">quantité du Stock</S></p>
                                          </div>
                                        </div>
                                        <!-- Deuxième carreau -->
                                        <div class="p-2 mr-10 w-full">
                                          <div class="border-2 border-gray-600 rounded-lg transform transition duration-500 hover:scale-110">
                                            <svg  viewBox="0 0 48 48" class="text-indigo-500 w-8 h-8 inline-block" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7071 4.69719C19.0976 4.30667 19.7308 4.30667 20.1213 4.69719L28.6066 13.1825C28.9971 13.573 28.9971 14.2062 28.6066 14.5967C28.216 14.9872 27.5829 14.9872 27.1924 14.5967L18.7071 6.1114C18.3166 5.72088 18.3166 5.08771 18.7071 4.69719Z" fill="#6366f1"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M28.7071 4.7068C29.0976 5.09733 29.0976 5.73049 28.7071 6.12102L20.2218 14.6063C19.8313 14.9968 19.1981 14.9968 18.8076 14.6063C18.4171 14.2158 18.4171 13.5826 18.8076 13.1921L27.2929 4.7068C27.6834 4.31628 28.3166 4.31628 28.7071 4.7068Z" fill="#6366f1"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M24.3162 15.0513C24.111 14.9829 23.8891 14.9829 23.6838 15.0513L8.86851 19.9889C8.64603 20.063 8.463 20.2102 8.34247 20.3985L4.39805 25.4613C4.1985 25.7175 4.13573 26.0545 4.2297 26.3653C4.32367 26.6761 4.56269 26.922 4.87072 27.0246L8.19325 28.1319L8.19595 36.7634C8.19636 38.0544 9.02257 39.2003 10.2473 39.6085L23.6291 44.0691C23.7475 44.1164 23.8738 44.1406 24.0009 44.1405C24.1293 44.141 24.2569 44.1168 24.3765 44.069L37.7577 39.6086C38.9827 39.2003 39.8089 38.054 39.809 36.7628L39.8096 28.1328L43.1346 27.0246C43.4427 26.922 43.6817 26.6761 43.7757 26.3653C43.8696 26.0545 43.8069 25.7175 43.6073 25.4613L39.6117 20.3327C39.4927 20.176 39.3274 20.0542 39.1315 19.9889L24.3162 15.0513ZM9.54341 22.1112L22.346 26.378L19.6478 29.8413L6.8452 25.5745L9.54341 22.1112ZM24.0025 24.8203L35.6526 20.9376L24 17.0541L12.35 20.9367L24.0025 24.8203ZM10.196 36.7628L10.1935 28.7986L19.686 31.9622C20.088 32.0962 20.5307 31.9623 20.7911 31.6281L23.0003 28.7924L23.0001 41.7513L10.8797 37.7112C10.4715 37.5751 10.1961 37.1931 10.196 36.7628ZM37.8095 28.7993L28.3193 31.9622C27.9174 32.0962 27.4747 31.9623 27.2143 31.6281L25.0013 28.7876L25.0049 41.7514L37.1252 37.7113C37.5336 37.5752 37.809 37.1931 37.809 36.7627L37.8095 28.7993ZM28.3576 29.8413L25.6583 26.3767L38.4609 22.1099L41.1602 25.5745L28.3576 29.8413Z" fill="#6366f1"/>
                                            </svg>
                                            <h6 class="title-font font-medium text-2xl text-gray-900">{{ $categorie->total_vendus }}</h6>
                                            <p class="leading-relaxed text-sm">quantité de Sorties</p>
                                          </div>
                                        </div>
                                        <!-- Ajouter d'autres carreaux si nécessaire -->
                                      </div>
                                    </div>
                                  </section>
                                <div class="relative mr-2 text-right">
                                    <a class="inline-flex w-11 h-11 justify-center items-center  hover:bg-indigo-500 text-pink-50 hover:text-white rounded-full transition duration-150"
                                        href="/marchandises/categories/{{ $categorie->id }}"><abbr
                                            title="Voir les marchandises de cette catégorie"><svg fill="#000000"
                                                height="20px" width="20px" version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330"
                                                xml:space="preserve">
                                                <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                       c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                       C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                       C255,161.018,253.42,157.202,250.606,154.389z" />
                                            </svg></abbr></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="relative h-52 w-full backdrop-blur-lg  bg-150  bg-no-repeat m-3 flex flex-col    text-center justify-center "
                    >
                     <div
                         class="bg-white p-4  shadow-lg  h-full grid items-center rounded-xl   hover:border-2 hover:border-gray-100">
                     <p class="text-center  text-3xl font-bold text-gray-900  mt-3">Autre</p>
                                 <br>
                                 <section class="text-gray-700 body-font">
                                    <div class="container mx-auto px-4 ">
                                      <div class="grid grid-cols-2  -m-4">
                                        <!-- Premier carreau -->
                                        <div class=" p-2  w-full">
                                            <div class="border-2 border-gray-600  rounded-lg transform transition duration-500 hover:scale-110">
                                              <svg  viewBox="0 0 24 24" class="text-indigo-500 w-8 h-8 inline-block" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title/>
                                                <g fill="none" fill-rule="evenodd" id="页面-1" stroke="none" stroke-width="1">
                                                  <g id="导航图标" transform="translate(-325.000000, -80.000000)">
                                                    <g id="编组" transform="translate(325.000000, 80.000000)">
                                                      <polygon fill="#FFFFFF" fill-opacity="0.01" fill-rule="nonzero" id="路径" points="24 0 0 0 0 24 24 24"/>
                                                      <polygon id="路径" points="22 7 12 2 2 7 2 17 12 22 22 17" stroke="#6366f1" stroke-linejoin="round" stroke-width="1.5"/>
                                                      <line id="路径" stroke="#6366f1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="2" x2="12" y1="7" y2="12"/>
                                                      <line id="路径" stroke="#6366f1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="12" x2="12" y1="22" y2="12"/>
                                                      <line id="路径" stroke="#6366f1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="22" x2="12" y1="7" y2="12"/>
                                                      <line id="路径" stroke="#6366f1" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="17" x2="7" y1="4.5" y2="9.5"/>
                                                    </g>
                                                  </g>
                                                </g>
                                              </svg>
                                              <h6 class="title-font font-medium text-2xl text-gray-900">{{ $categorie->total_achetes }} </h6>
                                              <p class="leading-relaxed text-sm"> quantité du Stock</S></p>
                                            </div>
                                          </div>
                                          <!-- Deuxième carreau -->
                                          <div class="p-2 mr-10 w-full">
                                            <div class="border-2 border-gray-600 rounded-lg transform transition duration-500 hover:scale-110">
                                              <svg  viewBox="0 0 48 48" class="text-indigo-500 w-8 h-8 inline-block" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7071 4.69719C19.0976 4.30667 19.7308 4.30667 20.1213 4.69719L28.6066 13.1825C28.9971 13.573 28.9971 14.2062 28.6066 14.5967C28.216 14.9872 27.5829 14.9872 27.1924 14.5967L18.7071 6.1114C18.3166 5.72088 18.3166 5.08771 18.7071 4.69719Z" fill="#6366f1"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.7071 4.7068C29.0976 5.09733 29.0976 5.73049 28.7071 6.12102L20.2218 14.6063C19.8313 14.9968 19.1981 14.9968 18.8076 14.6063C18.4171 14.2158 18.4171 13.5826 18.8076 13.1921L27.2929 4.7068C27.6834 4.31628 28.3166 4.31628 28.7071 4.7068Z" fill="#6366f1"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M24.3162 15.0513C24.111 14.9829 23.8891 14.9829 23.6838 15.0513L8.86851 19.9889C8.64603 20.063 8.463 20.2102 8.34247 20.3985L4.39805 25.4613C4.1985 25.7175 4.13573 26.0545 4.2297 26.3653C4.32367 26.6761 4.56269 26.922 4.87072 27.0246L8.19325 28.1319L8.19595 36.7634C8.19636 38.0544 9.02257 39.2003 10.2473 39.6085L23.6291 44.0691C23.7475 44.1164 23.8738 44.1406 24.0009 44.1405C24.1293 44.141 24.2569 44.1168 24.3765 44.069L37.7577 39.6086C38.9827 39.2003 39.8089 38.054 39.809 36.7628L39.8096 28.1328L43.1346 27.0246C43.4427 26.922 43.6817 26.6761 43.7757 26.3653C43.8696 26.0545 43.8069 25.7175 43.6073 25.4613L39.6117 20.3327C39.4927 20.176 39.3274 20.0542 39.1315 19.9889L24.3162 15.0513ZM9.54341 22.1112L22.346 26.378L19.6478 29.8413L6.8452 25.5745L9.54341 22.1112ZM24.0025 24.8203L35.6526 20.9376L24 17.0541L12.35 20.9367L24.0025 24.8203ZM10.196 36.7628L10.1935 28.7986L19.686 31.9622C20.088 32.0962 20.5307 31.9623 20.7911 31.6281L23.0003 28.7924L23.0001 41.7513L10.8797 37.7112C10.4715 37.5751 10.1961 37.1931 10.196 36.7628ZM37.8095 28.7993L28.3193 31.9622C27.9174 32.0962 27.4747 31.9623 27.2143 31.6281L25.0013 28.7876L25.0049 41.7514L37.1252 37.7113C37.5336 37.5752 37.809 37.1931 37.809 36.7627L37.8095 28.7993ZM28.3576 29.8413L25.6583 26.3767L38.4609 22.1099L41.1602 25.5745L28.3576 29.8413Z" fill="#6366f1"/>
                                              </svg>
                                              <h6 class="title-font font-medium text-2xl text-gray-900">{{ $categorie->total_vendus }}</h6>
                                              <p class="leading-relaxed text-sm">quantité de Sorties</p>
                                            </div>
                                          </div>
                                    </div>
                                  </section>
                                  <div class="relative mr-2 text-right">
                                    <a class="inline-flex w-11 h-11 justify-center items-center  hover:bg-indigo-500 text-pink-50 hover:text-white rounded-full transition duration-150"
                                        href="/marchandises/Autre"><abbr
                                            title="Voir les marchandises de cette catégorie"><svg fill="#000000"
                                                height="20px" width="20px" version="1.1" id="Layer_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330"
                                                xml:space="preserve">
                                                <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                       c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                       C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                       C255,161.018,253.42,157.202,250.606,154.389z" />
                                            </svg></abbr></a>
                                </div>
                                         
                                 
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(button => {
            button.addEventListener('click', function() {
                // Get the group ID from the clicked button's data attribute
                const groupId = this.dataset.groupid;
                //   console.log(groupId)

                // Get the dropdown menu element associated with the clicked button
                const dropdownMenu = this.nextElementSibling;

                const dropdownMenus = document.querySelectorAll('.dropdown-menu');

                dropdownMenus.forEach(menu => {
                    if (menu != dropdownMenu) {
                        menu.classList.remove('show');
                    }
                });

                // Toggle the visibility of the dropdown menu
                dropdownMenu.classList.toggle('show');

                // Prevent event bubbling to prevent unintended clicks on document
                event.stopPropagation();

                // Get the hidden input field for group ID in the delete modal
                const deleteGroupIdInput = document.getElementById('deleteGroupId');

                // Set the hidden input field's value to the retrieved group ID
                deleteGroupIdInput.value = groupId;
            });
        });

        function showSign() {
            // window.alert('show');
            document.getElementById('deleteGroupModal').classList.remove('hidden');

            const dropdownMenus = document.querySelectorAll('.dropdown-menu');
            dropdownMenus.forEach(menu => {
                menu.classList.remove('show');
            });


            // document.getElementById('deleteGroupModal').classList.add('show');
        }

        function hide() {
            document.getElementById('deleteGroupModal').classList.add('hidden');
        }

        document.addEventListener('click', function(event) {
            const dropdownMenus = document.querySelectorAll('.dropdown-menu');
            dropdownMenus.forEach(menu => {
                if (!menu.contains(event.target)) {
                    menu.classList.remove('show');
                }
            });
        });
    </script>
    <script>
        function warnning(id) {
            document.getElementById('deleteGroupModal').classList.remove('hidden');
            const deleteGroupIdInput = document.getElementById('deleteGroupId');
            // Set the hidden input field's value to the retrieved group ID
            deleteGroupIdInput.value = id;
            document.getElementById('cont').classList.add('blur-sm');
            document.getElementById('cont').classList.add('pointer-events-none');
        }
    </script>
    <script>
        function hide() {
            document.getElementById('deleteGroupModal').classList.add('hidden');
            document.getElementById('cont').classList.remove('blur-sm');
            document.getElementById('cont').classList.remove('pointer-events-none');
        }
    </script>
</x-nav-bar>
