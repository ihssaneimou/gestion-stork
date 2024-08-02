<x-nav-bar>
    <style>
        .bg-150 {
            background-size: 150px;
        }

        .bg-1 {
            background-color: #FD6483ff;
        }

        .bg-2 {
            background-color: #FFC446ff;
        }

        .bg-3 {
            background-color: #FE6A24ff;
        }

        .bg-4 {
            background-color: #2CB5FDff;
        }

        .bg-0 {
            background-color: #79A0F2ff;
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

        .deleteGroupModal {
            width: 800px;
            height: 250px;
            justify-items: center;
            align-content: space-evenly;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            tabindex="-1";
        }

        @media(max-width: 640px) {
            .deleteGroupModal {
                width: 400px;
                height: auto;
            }
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    screens: {
                        '3xl': '2000px',
                    },
                },
            },
            plugins: [],
        }
    </script>
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
    <div class="fixed font-mon bg-white grid hidden rounded-md shadow-md z-50 deleteGroupModal" id="deleteGroupModal"
        aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
        <div class="grid justify-items-center w-full">
            <form method="post" action="/categories/delete" class="p-6 w-full">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Confirmation de la suppression') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Êtes-vous sûr de vouloir supprimer cette categorie?') }}
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
        <div class=" flex items-center">
            <p class="text-lg sm:text-2xl w-1/3 m-3 pl-6 font-bold capitalize">categories des marchandises</p>
            <form action="{{ route('marchandises.index_cat') }}" method="GET" class="relative w-full lg:w-1/3">

                @if (isset($search))
                    <input type="search" name="search" id="default-search" value={{ $search }}
                        class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  "
                        placeholder="Rechercher" />
                @else
                    <input type="search" name="search" id="default-search"
                        class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500  "
                        placeholder="Rechercher" />
                @endif
                <abbr title="filtre juste par bar de recherch">
                    <button type="submit" name="action" value="filter"
                        class="text-white absolute end-2.5 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 sm:px-4 py-2 ">
                        <svg class="w-4 h-4 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg></button>
                </abbr>
            </form>
            <div class="w-1/3 flex justify-center">
            <p class="text-lg sm:text-xl w-fit  m-3 ml-6 sm:mx-1 text-center bg-blue-500 hover:bg-blue-700 rounded p-2"><a href="{{ route('categories.create') }}"
                class="text-white hover:text-gray-50  rounded p-2">Ajouter categorie</a> </p>
                </div>
            </div>
            @if (count($categories) > 0)
        <div class="py-6">
            <div class="px-4 sm:px-6 lg:px-8">
                <div
                    class=" overflow-hidden gap-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  justify-items-center mx-auto p-3">

                    @foreach ($categories as $index => $categorie)
                        @php
                            $color = 'bg-' . $index % 5;
                        @endphp
                        <div
                            class="relative h-52 w-full backdrop-blur-lg   bg-150  bg-no-repeat m-3 flex flex-col  text-center justify-center ">
                            <div
                                class=" bg-white  shadow-xl border border-gray-300 h-full grid items-center rounded-md  ">
                                @if (auth()->user()->role == 'S')
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button"
                                            id="dropdownMenu{{ $categorie->id }}" data-groupId="{{ $categorie->id }}"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon icon-tabler icon-tabler-dots-vertical hover:bg-gray-300 h-8 w-8 p-1 rounded-full "
                                                fill="none" stroke="currentColor" stroke-linecap="round"
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
                                <p class="text-center    text-4xl font-bold text-gray-800">{{ $categorie->nom }}
                                </p>
                                <section class="text-gray-700 body-font w-full">
                                    <div class="container flex  w-full">
                                        <div class="grid grid-cols-2 justify-items-center  w-full m-2">
                                            <!-- Premier carreau -->
                                            <a href="/marchandises/categories/{{ $categorie->id }}"
                                                class=" p-2 h-full w-full">
                                                <div
                                                    class="border border-gray-600  rounded-lg transform transition duration-500 shadow-md  shadow-blue-300 hover:scale-110 h-full">

                                                    <p class="leading-relaxed text-lg text-black">quantité du Stock</S>
                                                    </p>
                                                    <h6 class="title-font font-medium text-2xl text-gray-900">
                                                        {{ $categorie->total_achetes }} </h6>
                                                </div>
                                            </a>
                                            <!-- Deuxième carreau -->
                                            <a href="/categories/{{ $categorie->id }}/documents/sorties"
                                                class="p-2 h-full w-full">
                                                <div
                                                    class="border border-gray-600 rounded-lg transform transition duration-500 shadow-md  shadow-blue-300 hover:scale-110 h-full">

                                                    <p class="leading-relaxed text-lg text-black">quantité de Sorties
                                                    </p>
                                                    <h6 class="title-font font-medium text-2xl text-gray-900">
                                                        {{ $categorie->total_vendus }}</h6>
                                                </div>
                                            </a>
                                            <!-- Ajouter d'autres carreaux si nécessaire -->
                                        </div>

                                    </div>
                                </section>
                            </div>
                        </div>
                    @endforeach
                    <div
                        class="relative h-52 w-full backdrop-blur-lg   bg-150  bg-no-repeat m-3 flex flex-col  text-center justify-center ">
                        <div class=" bg-white  shadow-xl border border-gray-300 h-full grid items-center rounded-md  ">
                            <p class="text-center  text-3xl font-bold text-gray-900  mt-3">Autre</p>
                            <section class="text-gray-700 body-font w-full">
                                <div class="container flex  w-full">
                                    <div class="grid grid-cols-2 justify-items-center  w-full m-2">
                                        <!-- Premier carreau -->
                                        <a href="/marchandises/Autre" class=" p-2  w-full">
                                            <div
                                            class="border border-gray-600 rounded-lg transform transition duration-500 shadow-md  shadow-blue-300 hover:scale-110 h-full">

                                                <p class="leading-normal text-lg"> quantité du Stock</p>
                                                <h6 class="title-font font-medium text-2xl text-gray-900">
                                                    {{ $entres }} </h6>
                                            </div>
                                        </a>
                                        <!-- Deuxième carreau -->
                                        <a href="/categories_Autre/documents/sorties" class="p-2  w-full">
                                            <div
                                            class="border border-gray-600 rounded-lg transform transition duration-500 shadow-md  shadow-blue-300 hover:scale-110 h-full">

                                                <p class="leading-normal text-lg">quantité de Sorties</p>
                                                <h6 class="title-font font-medium text-2xl text-gray-900">
                                                    {{ $sorties }}</h6>
                                            </div>
                                        </a>
                                    </div>
                            </section>


                        </div>
                    </div>
                </div>
            </div>
            @else
            <div>
                <p class="text-center text-2xl font-bold">Aucune categorie</p>
            </div>
            @endif
            <div class="col-span-full mt-6 p-4 pl-4">
                {{ $categories->links() }}
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
