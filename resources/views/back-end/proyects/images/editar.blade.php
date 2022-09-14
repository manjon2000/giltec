<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Proyectos
        </h2>
    </x-slot>

    <div class="py-12 g">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 shadow-xl">
                    <div class="w-full">
                        <div class="mb-4">
                            <x-link-button class="my-3" href="{{ route('proyectos.index') }}">
                                <i style="margin-right: 10px;" class="fas fa-arrow-left"></i> Atras
                            </x-link-button>
                            <x-link-button class="my-3 bg-red-700" id="btn" style="cursor: pointer;">
                                <i style="margin-right: 10px;" class="fas fa-trash"></i> Borrar
                            </x-link-button>
                        </div>

                        {{-- Formulario --}}

                        <div class="w-full md:my-5 md:flex md:flex-wrap md:justify-between md:gap-2 lg:gap-0">
                        @if (!is_null($images))

                            @foreach ($images as $image => $key)
                            <div id="{{ $key->id }}"
                                class="w-full my-2 sm:w-full md:w-2/5 lg:w-5/12
                                       xl:1/3 2xl:w-80 bg-white rounded-lg
                                       shadow-xl dark:bg-gray-800"
                                       >
                                <a href="#">
                                    <img
                                    style="object-fit: cover;"
                                    class="w-full h-52 rounded-t-lg"
                                    src="{{ asset($key->image_url) }}"/>
                                </a>
                                <div class="p-5 mb-3">
                                    <a>
                                        <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Imagen:</h5>
                                        <p class=" mb-2 text-white">{{ $key->image_url }}</p>
                                    </a>
                                    <div class="flex items-center mb-4">
                                        <input  type="checkbox" value="{{ $key->id }}"
                                         class="w-6 h-6 text-blue-600 bg-gray-100 rounded
                                                border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600
                                                dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700
                                                dark:border-gray-600">
                                        <label  class="ml-2 text-sm font-bold text-white">Eliminar</label>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @csrf
    <script>

        let button = document.getElementById('btn');
        button.addEventListener('click', function(e){
            let checkeds = [];
            let chequed = document.querySelectorAll('input[type=checkbox]');
            chequed.forEach((element, index) => {
                if(element.checked === true){
                    checkeds.push(parseInt(element.value));
                }
            });
            console.log(checkeds)
            removeContentHTML(checkeds);
            fetch('{{ route('ProjectImageDelete') }}',
                {method: 'POST',
                    headers:{
                        '_token': document.querySelector('input[name=_token]').value,
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(checkeds)
                }).then(() => {

                });
                // manejar el error

        });

        function removeContentHTML(items)
        {
            for (let index = 0; index < items.length; index++) {
                const element = document.getElementById(items[index]);
                element.remove();
            }
        }
    </script>
</x-app-layout>
