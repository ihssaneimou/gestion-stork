<x-nav-bar>
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

    <div id="list" class="mt-2">
        <div class="relative overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right  text-gray-400">
                <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 sm:px-6 hover:text-white hidden sm:block text-center">id</th>
                        <th scope="col" class="py-3 px-2 sm:px-6 hover:text-white text-center ">Name</th>
                        <th scope="col" class="py-3 px-2 sm:px-6 hover:text-white text-center ">Email</th>
                        <th scope="col" class="py-3 px-2 sm:px-6 hover:text-white text-center ">Actions</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr
                            class="odd:bg-white  even:bg-gray-200 odd:hover:bg-gray-50  even:hover:bg-gray-300 border-b hover:text-gray-700">
                            <td class="py-4 px-2 sm:px-6 hidden sm:block text-center ">#{{ $admin->id }}</td>
                            <td class="py-4 px-2 sm:px-6 text-center ">{{ $admin->name }}</td>
                            <td class="py-4 px-2 sm:px-6 text-center ">{{ $admin->email }}</td>
                            <td class="py-4 ">
                                <div class="flex justify-around">
                                    <abbr title="modifier">
                                        <a href="/admin/update/{{ $admin->id }}">
                                            <svg fill="#2E90F3" class="w-5 h-5 sm:w-8 sm:h-8" viewBox="0 -64 640 640" xmlns="http://www.w3.org/2000/svg"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"/></svg>
                                        </a>
                                    </abbr>
                                <abbr title="activite">
                                    <a href="{{ route('adm', $admin->id) }}">
                                        <svg class="w-5 h-5 sm:w-8 sm:h-8" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="48" height="48" fill="white" fill-opacity="0.01"/>
                                            <rect x="18" y="20" width="20" height="8" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linejoin="round"/>
                                            <rect x="18" y="6" width="14" height="8" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linejoin="round"/>
                                            <rect x="18" y="34" width="26" height="8" fill="#2F88FF" stroke="#000000" stroke-width="4" stroke-linejoin="round"/>
                                            <path d="M17 10H5" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M17 24H5" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M17 38H5" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5 44V4" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                    </a>
                                </abbr>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-nav-bar>
