<x-nav-bar>
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media(max-width: 640px) {
            .desc {
                display: none;
            }
        }
    </style>
    <style>
        .qr-code {
            transition: transform 0.3s ease-in-out;
        }

        .enlarged {
            transform: scale(2);
            z-index: 1000;
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
            }}
    </style>
    <div class="fixed font-mon bg-white grid hidden rounded-md shadow-md z-50  deleteGroupModal" id="deleteGroupModal"
        aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
        <div class="grid justify-items-center w-full">
            <form method="post" action="/marchandises/delete" class="p-6 w-full">
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
                        {{ __('Delete Marchandise') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </div>
    <div class="fixed font-mono bg-slate-200 grid hidden rounded-md shadow-md z-50" id="ajoutEtnte"
        style="width: 400px; justify-items: center; align-content: space-evenly; height: 300px; left: 50%; top: 50%; transform: translate(-50%, -50%);"
        tabindex="-1" aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
        <div class="grid justify-items-center">
            <svg fill="#000" height="60px" width="60px" version="1.1" id="Capa_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 27.963 27.963" xml:space="preserve">
                <!-- SVG content omitted for brevity -->
            </svg>
            <h5 class="font-semibold text-lg" id="deleteGroupModalLabel">Quantité Entrés</h5>
            <form action="{{ route('entres.store') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Hidden fields for ID and ID_CAT -->
                <input type="hidden" id="id_en" name="id_mar" value="">

                <div>
                    <label for="quantite" class="block text-sm font-medium text-gray-700">Quantité :</label>
                    <input type="number" id="quantitee" name="quantite" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('quantite')
                        <script>
                            alert('{{ $message }}'); // Show alert if there's an error
                        </script>
                    @enderror
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Ajouter</button>
                <button type="button" class="btn btn-secondary" onclick="hide2()"
                    data-bs-dismiss="modal">Annuler</button>
            </form>
        </div>
    </div>
    <div class="fixed font-mono bg-slate-200 grid hidden rounded-md shadow-md z-50" id="ajoutSortier"
        style="width: 400px; justify-items: center; align-content: space-evenly; height: 300px; left: 50%; top: 50%; transform: translate(-50%, -50%);"
        tabindex="-1" aria-labelledby="deleteGroupModalLabel" aria-hidden="true">
        <div class="grid justify-items-center">
            <svg fill="#000" height="60px" width="60px" version="1.1" id="Capa_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 27.963 27.963" xml:space="preserve">
                <!-- SVG content omitted for brevity -->
            </svg>
            <h5 class="font-semibold text-lg" id="deleteGroupModalLabel">Quantité Sortie</h5>
            <form action="{{ route('sorties.store') }}" method="POST" class="space-y-6">
                @csrf
                <!-- Hidden fields for ID and ID_CAT -->
                <input type="hidden" id="id_sor" name="id_mar" value="">

                <div>
                    <label for="quantite" class="block text-sm font-medium text-gray-700">Quantité :</label>
                    <input type="number" id="quantite" name="quantite" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('quantite')
                        <script>
                            alert('{{ $message }}'); // Show alert if there's an error
                        </script>
                    @enderror
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Ajouter</button>
                <button type="button" class="btn btn-secondary" onclick="hide3()"
                    data-bs-dismiss="modal">Annuler</button>
            </form>
        </div>
    </div>
    <div id="cont" class="">
        <div class=" flex">
            <p class="sm:text-2xl w-1/3 m-3 sm:pl-6 underline underline-offset-4">marchandises</p>
            <form action="{{ route('marchandises.search', $categories) }}" method="GET"
                class="relative w-full lg:w-1/3">

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
                        class="text-white absolute end-2.5 bottom-12 sm:bottom-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 sm:px-4 py-2 ">
                        <svg class="w-4 h-4 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg></button>
                </abbr>
            </form>
            <p class="sm:text-xl w-fit bg-blue-500 hover:bg-blue-700 rounded p-2 mx-2 my-3 sm:pl-6 text-center"><a
                    href="/marchandises/create/{{ $categories->id }}"
                    class="text-white hover:text-gray-50 ">Ajouter Marchendise</a></p>
        </div>
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
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Attention!</strong>
                    <span class="block sm:inline">{{ session('warning') }}</span>
                </div>
            @endif

            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
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
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-1 rounded relative"
                    role="alert">
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
        @if (count($marchandises) > 0)
            <div class="overflow-x-auto relative shadow-md w-full sm:rounded-lg mb-10">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="py-3 px-1 text-center">image</th>
                            <th scope="col" class="py-3 px-1 text-center">nom</th>
                            @if (auth()->user()->role == 'S')
                                <th scope="col" class="py-3 px-1 text-center hidden sm:block">code</th>
                            @endif
                            <th scope="col" class="py-3 px-1 text-center">categorie</th>
                            <th scope="col" class="py-3 px-1 text-center">quantite</th>
                            <th scope="col" class="py-3 px-1 text-center hidden sm:block">description</th>
                            <th scope="col" class="py-3 sm:px-1 text-center">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marchandises as $marchandise)
                            <tr class="bg-white border-b hover:bg-gray-200 hover:text-black ">
                                <td class="py-3 sm:px-1 text-center flex justify-center">
                                    @if (isset($marchandise->image) && $marchandise->image !== null)
                                        <img class="image w-10 h-10 rounded-full bg-cover"
                                            src="{{ asset('/storage/' . $marchandise->image) }}" alt="" />
                                    @else
                                        <img class="image w-10 h-10 rounded-full bg-cover"
                                            src="{{ asset('/logo.jpg') }}" alt="" />
                                    @endif

                                </td>
                                <td class="py-4 sm:px-1 text-center  ">{{ $marchandise->nom }}</td>
                                @if (auth()->user()->role == 'S')
                                    <td class=" justify-center py-5 px-1 hidden sm:flex "> <abbr
                                            id="qr-{{ $marchandise->id }}" onclick="qr({{ $marchandise->id }})"
                                            class="block cursor-pointer qr-code">
                                            {!! QrCode::size(40)->generate($marchandise->id) !!}
                                        </abbr></td>
                                @endif
                                <td class="py-4 sm:px-1 text-center ">
                                    @if ($marchandise->categories)
                                        {{ $marchandise->categories->nom }}
                                    @else
                                        Autre
                                    @endif
                                </td>
                                <td class="py-4 px-1 text-center ">{{ $marchandise->quantite }}</td>
                                <td class="py-4 px-1 text-center desc">
                                    <p class="overflow-hidden max-h-10 max-w-[500px] line-clamp-2">
                                        {{ $marchandise->description }}</p>
                                </td>

                                <td class="py-4 sm:px-6 justify-around flex text-center space-x-1 sm:space-x-2">
                                    <a href="/scanner" title="scanner"
                                        aria-label="Ajout"
                                        class="flex items-center text-green-500 bg-green-200 hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-50 px-2 sm:px-3 py-2 rounded shadow-md transition duration-200">
                                        <svg  class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" d="M10 22C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 18.7712 2 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                            <path opacity="0.5" d="M22 15C22 18.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                            <path opacity="0.5" d="M14 2C17.7712 2 19.6569 2 20.8284 3.17157C22 4.34315 22 5.22876 22 9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                        <path opacity="0.5" d="M10 2C6.22876 2 4.34315 2 3.17157 3.17157C2 4.34315 2 5.22876 2 9" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                            <path d="M2 12H22" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                            </svg>
                                        </a>

                                   
                                    @if (auth()->user()->role == 'S')
                                        <button onclick="warnning({{ $marchandise->id }})" title="Supprimer"
                                            aria-label="Supprimer"
                                            class="flex items-center  text-red-500 bg-red-200 hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50 px-2 sm:px-3 py-2 rounded shadow-md transition duration-200">
                                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M18 6V16.2C18 17.8802 18 18.7202 17.673 19.362C17.3854 19.9265 16.9265 20.3854 16.362 20.673C15.7202 21 14.8802 21 13.2 21H10.8C9.11984 21 8.27976 21 7.63803 20.673C7.07354 20.3854 6.6146 19.9265 6.32698 19.362C6 18.7202 6 17.8802 6 16.2V6M14 10V17M10 10V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                        </button>
                                    @endif
                                    <a href="/marchandises/{{ $marchandise->id }}/edit" title="Modifier"
                                        aria-label="Modifier"
                                        class="flex items-center  text-blue-500 bg-blue-200 hover:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 px-2 sm:px-3 py-2 rounded shadow-md transition duration-200">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 22C1 21.4477 1.44772 21 2 21H22C22.5523 21 23 21.4477 23 22C23 22.5523 22.5523 23 22 23H2C1.44772 23 1 22.5523 1 22Z" fill="currentColor"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3056 1.87868C17.1341 0.707107 15.2346 0.707107 14.063 1.87868L3.38904 12.5526C2.9856 12.9561 2.70557 13.4662 2.5818 14.0232L2.04903 16.4206C1.73147 17.8496 3.00627 19.1244 4.43526 18.8069L6.83272 18.2741C7.38969 18.1503 7.89981 17.8703 8.30325 17.4669L18.9772 6.79289C20.1488 5.62132 20.1488 3.72183 18.9772 2.55025L18.3056 1.87868ZM15.4772 3.29289C15.8677 2.90237 16.5009 2.90237 16.8914 3.29289L17.563 3.96447C17.9535 4.35499 17.9535 4.98816 17.563 5.37868L15.6414 7.30026L13.5556 5.21448L15.4772 3.29289ZM12.1414 6.62869L4.80325 13.9669C4.66877 14.1013 4.57543 14.2714 4.53417 14.457L4.0014 16.8545L6.39886 16.3217C6.58452 16.2805 6.75456 16.1871 6.88904 16.0526L14.2272 8.71448L12.1414 6.62869Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                </td>





                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        @else
            <h2 class="text-gray-300 text-xl sm:text-8xl select-none text-center mt-32">aucune marchendise</h2>
        @endif
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
        <script>
            function warnning2(id, id_mar) {
                document.getElementById('ajoutEtnte').classList.remove('hidden');
                document.getElementById('cont').classList.add('blur-sm');
                document.getElementById('cont').classList.add('pointer-events-none');

                // Update hidden inputs
                document.getElementById('id_en').value = id;
            }

            function hide2() {
                document.getElementById('ajoutEtnte').classList.add('hidden');
                document.getElementById('cont').classList.remove('blur-sm');
                document.getElementById('cont').classList.remove('pointer-events-none');
            }
        </script>
        <script>
            function warnning3(id, id_mar) {
                document.getElementById('ajoutSortier').classList.remove('hidden');
                document.getElementById('cont').classList.add('blur-sm');
                document.getElementById('cont').classList.add('pointer-events-none');

                // Update hidden inputs
                document.getElementById('id_sor').value = id;
            }

            function hide3() {
                document.getElementById('ajoutSortier').classList.add('hidden');
                document.getElementById('cont').classList.remove('blur-sm');
                document.getElementById('cont').classList.remove('pointer-events-none');
            }
        </script>
        <script>
            function qr(id) {
                document.getElementById(`qr-${id}`).classList.toggle('enlarged');
            }
        </script>
        <div class="col-span-full mt-6 p-4 pl-4">
            {{ $marchandises->links() }}
        </div>
    </div>
</x-nav-bar>
