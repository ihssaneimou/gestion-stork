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
                 <x-text-input  name="current_password" type="password" class="mt-1 block w-3/4"
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
        <p class="text-2xl w-2/3 m-3 pl-6 underline underline-offset-4">categories</p>
        <p class="text-xl w-1/3  m-3 pl-6"><a href="{{ route('categories.create') }}" class="text-blue-600 hover:text-blue-900">Ajouter categorie</a> </p>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          

            <div class=" overflow-hidden gap-3 grid grid-cols-2 sm:grid-cols-3 justify-items-center">
            @foreach($categories as $index => $categorie)
            @php
                $source = 'group_icons/' . $index % 12 . '.png';
                $color = 'bg-' . $index % 6;
            @endphp
            <div class="relative h-52 w-full backdrop-blur-lg  bg-150  bg-no-repeat m-3 flex flex-col    text-center justify-center " style="background-image: url({{$source}})">
            <div class="{{$color}} h-full grid items-center rounded hover:rounded-md  hover:border-2 hover:border-gray-100" >
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenu{{ $categorie->id }}" data-groupId="{{ $categorie->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                       <?xml version="1.0" ?>
                       <svg class="icon icon-tabler icon-tabler-dots-vertical" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0 0h24v24H0z" fill="none" stroke="none"/>
                          <circle cx="12" cy="12" r="1"/>
                          <circle cx="12" cy="19" r="1"/>
                          <circle cx="12" cy="5" r="1"/>
                       </svg>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu{{ $categorie->id }}">
                       <li><a class="dropdown-item" href="/categories/{{ $categorie->id }}/edit">Modify</a></li>
                       <li id="deletbutton" onclick="warnning({{ $categorie->id }})"><a class="dropdown-item" href="#" data-group-id="{{ $categorie->id }}" data-bs-toggle="modal" data-bs-target="#deleteGroupModal">Delete</a></li>
                    </ul>
       </div>
       <p class="text-center font-semibold text-black text-3xl ">{{ $categorie->nom }}</p> <br>
       <div class="w-full flex items-center justify-center font-medium">
               entré:{{ $categorie->total_achetes }} <br>
               sortié:{{ $categorie->total_vendus }} 
           </div>
                <div class="relative mr-2 text-right">
                    <a class="inline-flex w-11 h-11 justify-center items-center bg-green-400 hover:bg-green-300 text-pink-50 hover:text-white rounded-full transition duration-150"
                        href="/marchandises/categories/{{ $categorie->id }}"><span class="sr-only">Read more</span> <span
                            class="font-bold -mt-px">-></span></a>
                </div>
               </div>
            </div>
               @endforeach
            </div>
        </div>
    </div>
    </div>
    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(button => {
   button.addEventListener('click', function () {
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

document.addEventListener('click', function (event) {
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