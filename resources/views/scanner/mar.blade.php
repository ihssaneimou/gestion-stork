<x-nav-bar>
    <style>
        .tabAnim {
            z-index: 1;
        }

        #private:checked~div {
            --tw-translate-x: 0%;
        }

        #public:checked~div {
            --tw-translate-x: 100%;
        }

        .profile-pic {
            border-radius: 50%;
            height: 150px;
            width: 150px;
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
            vertical-align: middle;
            text-align: center;
            color: transparent;
            transition: all .3s ease;
            text-decoration: none;
            cursor: pointer;
            border: solid 1px black;
        }

        .profile-pic:hover {
            background-color: rgba(0, 0, 0, .5);
            z-index: 10000;
            color: #fff;
            transition: all .3s ease;
            text-decoration: none;
        }

        .profile-pic span {
            display: inline-block;
            /* color: black; */
            padding-top: 4.5em;
            padding-bottom: 4.5em;
        }

        form input[type="file"] {
            display: none;
            cursor: pointer;
        }
    </style>
    <div class="bg-gray-100">
        <div class="container  w-full">
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
                        <input type="hidden" id="id_en" name="id_mar" value="{{ $marchandise->id }}">

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
                        <input type="hidden" id="id_sor" name="id_mar" {{ $marchandise->id }}>

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


            <div class="container  w-full">
                <!-- Error Message -->
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
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
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
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
        </div>

        <main>
            <div class="mx-4">
                @if (isset($marchandise->image) && $marchandise->image !== null)
                    <img class="image w-10 h-10 rounded-full bg-cover"
                        src="{{ asset('/storage/' . $marchandise->image) }}" alt="" />
                @else
                    <img class="image w-10 h-10 rounded-full bg-cover" src="{{ asset('/logo.jpg') }}"
                        alt="" />
                @endif
                <p>ID: {{ $marchandise->id }}</p>
                <p>Nom: {{ $marchandise->nom }}</p>
                <p>Description: {{ $marchandise->description }}</p>
                <p>Quantité: {{ $marchandise->quantite }}</p>

                <button onclick="warnning2({{ $marchandise->id }})" title="Ajout" aria-label="Ajout"
                    class="flex items-center text-green-500 bg-green-200 hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-50 px-3 py-2 rounded shadow-md transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>

                <button onclick="warnning3({{ $marchandise->id }})" title="Sortie" aria-label="Sortie"
                    class="flex items-center text-yellow-500 bg-yellow-200 hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-opacity-50 px-3 py-2 rounded shadow-md transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                </button>
            </div>
        </main>
    </div>


    <script>
        function warnning2(id, id_mar) {
            document.getElementById('ajoutEtnte').classList.remove('hidden');
            document.getElementById('cont').classList.add('blur-sm');
            document.getElementById('cont').classList.add('pointer-events-none');
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
            document.getElementById('id_sor').value = id;
        }

        function hide3() {
            document.getElementById('ajoutSortier').classList.add('hidden');
            document.getElementById('cont').classList.remove('blur-sm');
            document.getElementById('cont').classList.remove('pointer-events-none');
        }
    </script>

</x-nav-bar>
