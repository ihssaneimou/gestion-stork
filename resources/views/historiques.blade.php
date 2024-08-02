<x-nav-bar>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        caveat: ['Caveat', 'cursive'],
                    },
                },
            },
        };


        !--Include jQuery-- >
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <main class="relative min-h-screen flex flex-col justify-center bg-slate-50 overflow-hidden">
        @if (isset($activites))
            <select name="type" id="type" class='max-h-12 w-52   m-16'>
                <option value='tous'>tous</option>
                <option value="ajout">ajout</option>
                <option value="modif">modification</option>
                <option value="suppression">suppression</option>
            </select>
            <div class="w-full max-w-6xl mx-auto px-4 md:px-6 ">

                <div class="flex flex-col justify-center divide-y divide-slate-200 [&>*]:py-16">



                    <script>
                        $(document).ready(function() {
                            $('#type').change(function() {
                                var type = $(this).val();
                                var source = '{{ $source }}';
                                var user = source === 'index_adm' ? '{{ $activites[0]->user->id }}' : '';
                                var url = source === 'index_adm' ? "{{ route('adm_t', ['user' => ':user']) }}".replace(
                                    ':user', user) : "{{ route('type') }}";
                                $.ajax({
                                    url: url,
                                    type: 'GET',
                                    data: {
                                        type: type
                                    },
                                    success: function(response) {
                                        var activitiesContainer = $('.activities-container');

                                        activitiesContainer.empty();
                                        response.activites.forEach(function(activity) {

                                            var user = source === 'index_adm' ?
                                                '{{ $activites[0]->user->name }}' : response.users.find(
                                                    user => user.id === activity.id_adm);

                                            var activityHTML = source === 'index_adm' ?
                                                `<div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:ml-[8.75rem] md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                                                <div class="relative">
                                                    <div class="md:flex items-center md:space-x-4 mb-3">
                                                        <div class="flex items-center space-x-4 md:space-x-2 md:space-x-reverse">
                                                            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white shadow md:order-1">
                                                                ${getIcon(activity.type)}
                                                            </div>
                                                            <div class="font-caveat font-medium text-xl text-indigo-500 md:w-28">${activity.created_at}</div>
                                                        </div>
                                                        <div class="text-slate-500 ml-14"><span class="text-slate-900 font-bold">${user}</span></div>
                                                    </div>
                                                    <div class="bg-white p-4 rounded border border-slate-200 text-slate-500 shadow ml-14 md:ml-44">${activity.nom_activite}</div>
                                                </div>
                                            </div>` :
                                                `<div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:ml-[8.75rem] md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                                                <div class="relative">
                                                    <div class="md:flex items-center md:space-x-4 mb-3">
                                                        <div class="flex items-center space-x-4 md:space-x-2 md:space-x-reverse">
                                                            <div class="flex items-center justify-center w-10 h-10 rounded-full bg-white shadow md:order-1">
                                                                ${getIcon(activity.type)}
                                                            </div>
                                                            <div class="font-caveat font-medium text-xl text-indigo-500 md:w-28">${activity.created_at}</div>
                                                        </div>
                                                        <div class="text-slate-500 ml-14"><span class="text-slate-900 font-bold"> ${user.name}</span></div>
                                                    </div>
                                                    <div class="bg-white p-4 rounded border border-slate-200 text-slate-500 shadow ml-14 md:ml-44">${activity.nom_activite}</div>
                                                </div>
                                            </div>`;
                                            activitiesContainer.append(activityHTML);
                                        });
                                    },
                                    error: function(xhr) {
                                        console.error(xhr.responseText);
                                    }
                                });
                            });
                        });

                        function getIcon(type) {
                            if (type === 'ajout') {
                                return `<svg class="fill-emerald-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16"><path d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" /></svg>`;
                            } else if (type === 'modif') {
                                return `<svg class="fill-yellow-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16"><path d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" /></svg>`;
                            } else if (type === 'suppression') {
                                return `<svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16"><path d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" /></svg>`;
                            }
                        }
                    </script>



                    <div class="w-full max-w-3xl mx-auto activities-container">
                        <div
                            class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:ml-[8.75rem] md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                            @foreach ($activites as $act)
                                <div class="relative">
                                    <div class="md:flex items-center md:space-x-4 mb-3">
                                        <div class="flex items-center space-x-4 md:space-x-2 md:space-x-reverse">
                                            <div
                                                class="flex items-center justify-center w-10 h-10 rounded-full bg-white shadow md:order-1">
                                                @if ($act->type === 'ajout')
                                                    <svg class="fill-emerald-500" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16">
                                                        <path
                                                            d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" />
                                                    </svg>
                                                @elseif($act->type === 'modif')
                                                    <svg class="fill-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16">
                                                        <path
                                                            d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" />
                                                    </svg>
                                                @elseif($act->type === 'suppression')
                                                    <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16">
                                                        <path
                                                            d="M8 0a8 8 0 1 0 8 8 8.009 8.009 0 0 0-8-8Zm0 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z" />
                                                    </svg>
                                                @endif
                                            </div>
                                            <time
                                                class="font-caveat font-medium text-xl text-indigo-500 md:w-28">{{ $act->created_at }}</time>
                                        </div>
                                        <div class="text-slate-500 ml-14"><span
                                                class="text-slate-900 font-bold">{{ $act->user->name }}</span></div>
                                    </div>
                                    <div
                                        class="bg-white p-4 rounded border border-slate-200 text-slate-500 shadow ml-14 md:ml-44">
                                        {{ $act->nom_activite }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        @else
            <h1 class="text-center text-6xl font-bold">Aucun activites</h1>
        @endif
    </main>
</x-nav-bar>
