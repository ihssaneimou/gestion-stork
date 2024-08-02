<x-nav-bar>
    <style>
        .bg-150 {
            background-size: 150px;
        }

        .bg-1 {
            color: hsla(200, 95%, 58%, 0.65);
        }

        .bg-2 {
            color: rgba(246, 139, 9, 0.65);
        }

        .bg-3 {
            color: rgba(8, 218, 78, 0.65);
        }

        .bg-4 {
            color: rgba(233, 34, 44, 0.65);
        }

        .bg-5 {
            color: rgba(181, 14, 223, 0.65);
        }

        .bg-0 {
            color: rgba(245, 31, 156, 0.65);
        }
    </style>
    <style>
        .bg-blur {
            position: relative;
            overflow: hidden;
        }

        .bg-blur::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/jztxi.jpeg');
            background-size: cover;
            background-position: center;
            filter: blur(3px);
            z-index: 0;
        }
    </style>

    <div class=" flex items-center">
        <p class="text-xs sm:text-2xl w-1/3 m-3 pl-6 font-bold capitalize">Mouvements du stock</p>
        <form action="{{ route('categories.index') }}" method="GET" class="relative w-full lg:w-1/3">

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
                    class="text-white absolute end-2.5 bottom-2  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 sm:px-4 py-2 ">
                    <svg class="w-4 h-4 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg></button>
            </abbr>
        </form>
        <div class="w-1/3 flex justify-center">
            <p class="text-xs sm:text-xl w-fit  m-3 ml-6 sm:mx-1 text-center bg-blue-500 hover:bg-blue-700 rounded p-2"><a
                    href="{{ route('categories.create') }}" class="text-white hover:text-gray-50  rounded p-2">Ajouter
                    categorie</a> </p>

        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto  ">
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
            @if (count($categories) > 0)
            <div class="px-4 sm:px-6 lg:px-10">
                <div
                    class=" gap-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3  justify-items-center mx-auto p-2">

                    @foreach ($categories as $index => $categorie)
                        @php
                            $source = 'group_icons/' . $index % 12 . '.png';
                            $color = 'bg-' . $index % 6;
                        @endphp
                        <a href="{{ route('categories.entre_sortie', $categorie) }}"
                            class="h-52 w-full  shadow-lg rounded hover:bg-gray-200  hover:border-2 hover:border-gray-200  min-w-20  flex items-center flex-col   text-center justify-center bg-blue-100 ">
                            <p class="text-gray-700 text-center  text-4xl font-bold z-10">{{ $categorie->nom }}</p><br>
                            {{-- <div class="justify-between gap-1 flex min-w-1/3">
                            <p>entré:{{ $categorie->total_achetes }}</p>
                            <p>sortié:{{ $categorie->total_vendus }} </p>
                        </div> --}}
                        </a>
                    @endforeach
                    <a href="{{ route('categories.entre_sortie', $categorie) }}"
                        class="h-52 w-full  shadow-lg rounded hover:bg-gray-200  hover:border-2 hover:border-gray-200  min-w-20  flex items-center flex-col   text-center justify-center bg-blue-100">
                        <p class="text-gray-700 text-center  text-4xl font-bold z-10">Autre</p><br>
                        {{-- <div class="justify-between gap-1 flex min-w-1/3">
                        <p>entré:{{ $entres }}</p>
                        <p>sortié:{{ $sorties }} </p>
                    </div> --}}
                    </a>
                </div>
                </div>
        </div>
    </div>
    {{-- <div class="center-modal bg-white p-4 rounded-lg shadow-lg">
        
        @if (session('success'))
        <div class="p-3 mb-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif
        <table class="w-full text-sm text-left text-gray-500 mb-14">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">Nom du categorie</th>
                    <th scope="col" class="py-3 px-6">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $categorie)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="py-4 px-6">{{ $categorie->nom }}</td>
                    <td class="py-4 px-6">
                        <form action="{{ route('categories.delete', $categorie) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                        </form>
                        <a href="{{ route('categories.edit', $categorie) }}" class="text-blue-600 hover:text-blue-900 ml-4">Modifier</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('categories.create') }}" class="px-4 py-2  bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 ml-96">ajouter</a>
    </div> --}}
@else
    <div>
        <p class="text-center text-2xl font-bold">Aucune categorie</p>
    </div>
    @endif
    <div class="col-span-full mt-6 p-4 pl-4">
        {{ $categories->links() }}
    </div>
</x-nav-bar>
