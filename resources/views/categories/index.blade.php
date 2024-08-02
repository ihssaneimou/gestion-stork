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

    <div class=" flex">
        <p class="text-2xl w-2/3 m-3 pl-6 font-bold capitalize">les documments</p>
        <p class="text-xl w-fit  m-3 ml-6 sm:mx-1 text-center bg-blue-500 hover:bg-blue-700 rounded p-2"><a href="{{ route('categories.create') }}"
            class="text-white hover:text-gray-50  rounded p-2">Ajouter categorie</a> </p>
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


<div class=" gap-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 3xl:grid-cols-4 justify-items-center ml-1">
                @foreach ($categories as $index=>$categorie)
                @php
                $source = 'group_icons/' . $index % 12 . '.png';
                $color = 'bg-' . $index % 6;
                @endphp
                    <a href="{{ route('categories.entre_sortie', $categorie) }}"
                        class="h-52 w-full bg-white shadow-lg rounded hover:bg-gray-200  hover:border-2 hover:border-gray-200  min-w-20  flex items-center flex-col   text-center justify-center bg-blur " >
                        <p class="text-gray-700 text-center  text-4xl font-bold z-10">{{ $categorie->nom }}</p><br>
                        {{-- <div class="justify-between gap-1 flex min-w-1/3">
                            <p>entré:{{ $categorie->total_achetes }}</p>
                            <p>sortié:{{ $categorie->total_vendus }} </p>
                        </div> --}}
                    </a>
                @endforeach
                <a href="{{ route('categories.entre_sortie', $categorie) }}"
                        class="h-52 w-full bg-white shadow-lg rounded hover:bg-gray-200  hover:border-2 hover:border-gray-200  min-w-20  flex items-center flex-col   text-center justify-center bg-blur " >
                        <p class="text-gray-700 text-center  text-4xl font-bold z-10">Autre</p><br>
                    {{-- <div class="justify-between gap-1 flex min-w-1/3">
                        <p>entré:{{ $entres }}</p>
                        <p>sortié:{{ $sorties }} </p>
                    </div> --}}
                </a>
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
</x-nav-bar>
