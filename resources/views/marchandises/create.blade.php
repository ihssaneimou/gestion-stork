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
    
    <div>
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

        </div>
        <main>
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 shadow-lg-md p-10 rounded max-w-2xl mx-auto mt-4">
                    <header class="text-center">
                        <h2 class="text-blueGray-700 text-3xl font-bold m-3">
                            Ajouter une Marchandise
                        </h2>
                    </header>
                    
                    <form action="{{ route('marchandises.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="">
                            <center>mb-6
                                <label for="fileToUpload">
                                        <div class="profile-pic" id="photo" style="background-image: url('/logo.jpg')">
                                            <!-- <span class="glyphicon glyphicon-camera"></span> -->
                                            <span>Changer Image</span>
                                        </div>
                                </label>
                            </center>
                        </div>
                        <input type="File" name="image" accept="image/png, image/gif, image/jpeg,image/jpg"  id="fileToUpload"> --}}

                        <div class="flex items-center space-x-6 mb-6 mt-6">
                            <div class="shrink-0">
                              <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src='/logo.jpg' />
                            </div>
                            <label class="fileToUpload">
                              <span class="block w-full 
                              rounded-full border-0
                              text-sm font-semibold
                              bg-violet-50 text-violet-700
                              p-4
                              hover::bg-violet-" >choisissez une photo</span>
                              <input type="file" onchange="loadFile(event)" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-violet-50 file:text-violet-700
                                hover:file:bg-violet-100"
                                 name="image" accept="image/png, image/gif, image/jpeg,image/jpg"  id="fileToUpload"
                              />
                            </label>
                          </div>

                        <div class="mb-6 ">
                            <label for="title" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Nom du marchandise</label>
                            <input type="text"  class="border border-gray-300 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                            name="nom" value="{{old('nom')}}" placeholder="nom"  />
                            @error('nom')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="title" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Code barre</label>
                            <input type="number" class="border border-gray-300 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                           
  name="barecode" value="{{old('barecode')}}" placeholder="Code barre" />
                            @error('barecode')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="title" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Description</label>
                            <textarea name="description" class="border border-gray-300 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                           
  placeholder="description">{{old('description')}}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="categorie" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Catégorie</label>
                            <select name="categorie" class="border border-gray-300 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                           
  id="selectOption">
                                @foreach ($categorie as $item)
                                  @if(isset($category))
                                  @if ($category->id==$item->id || old('categorie')==$item->id)
                                  <option value="{{$item->id}}" selected>{{$item->nom}}</option>
                                  @else
                                  <option value="{{$item->id}}">{{$item->nom}}</option>
                                  @endif
                                  @else
                                  <option value="{{$item->id}}">{{$item->nom}}</option>
                                  @endif
                                @endforeach
                                @if (old('categorie')===0)
                                <option value="0" selected>Autre</option>
                                @else
                                <option value="0">Autre</option>
                                @endif
                                @if (stristr(old('categorie'),"add"))
                                <option value="add" selected>ajouter categorie</option>
                                @else
                                <option value="add">ajouter categorie</option>
                                @endif
                                
                            </select>
                            @if (stristr(old('categorie'),"add"))
                            <div id="inputForm" class="">
                                <label for="newCategorie" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Nouvelle catégorie</label>
                                <input type="text" id="newCategorie" name="new_categorie" value="{{old('new_categorie')}}" class="border border-gray-300 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                           
  placeholder="Nouvelle catégorie">
                            </div>
                            @else
                            <div id="inputForm" class="hidden">
                                <label for="newCategorie" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Nouvelle catégorie</label>
                                <input type="text" id="newCategorie" name="new_categorie" class="border border-gray-300 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                           
  placeholder="Nouvelle catégorie">
                            </div>
                            @endif
                            @error('categorie')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="title" class="block uppercase text-blueGray-600 text-xs font-bold   mb-2">Quantité</label>
                            @if (old('quantite'))
                            <input type="number" class="border border-gray-300 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                           
   value="{{old('quantite')}}"  name="quantite" placeholder="title" id="quantite" onchange="toggleEntranceFields()" />
                            @else
                            <input type="number" class="border border-gray-300 px-3 py-3 placeholder-blueGray-400 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" 
                           
   value=0 name="quantite" placeholder="title" id="quantite" onchange="toggleEntranceFields()" />
                            @endif
                            @error('quantite')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                       
                        <div class="mb-6">
                            <button class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-gray-600 text-lg">
                                Soumettre
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script>
        const img = document.querySelector('#photo');
        const file = document.querySelector('#fileToUpload');
        file.addEventListener('change', function () {
            const choosedFile = this.files[0];
    
            if (choosedFile) {
    
                const reader = new FileReader();
    
                reader.addEventListener('load', function () {
                    img.setAttribute('src', reader.result);
                    img.setAttribute('style', "background-image: url('" + reader.result + "')");
                });
    
                reader.readAsDataURL(choosedFile);
    
            }
        });


        document.getElementById('selectOption').addEventListener('change', function () {
            const inputForm = document.getElementById('inputForm');
            if (this.value === 'add') {
                inputForm.classList.remove('hidden');
            } else {
                inputForm.classList.add('hidden');
            }
        });
  
        
    </script>
    <script>
        var loadFile = function(event) {
            
            var input = event.target;
            var file = input.files[0];
            var type = file.type;

           var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
</script>
</x-nav-bar>
    