<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proyectos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-full min-h-screen">
                        <div class="my-3">
                            <h1 class="text-md">Todas las categorias</h1>
                            <x-link-button class="my-5" href="{{ route('proyectos.create') }}">
                                Crear Proyecto
                            </x-link-button>
                            @if (count($proyects) > 0)
                                <a href="{{ route('ProjectaddImage') }}" class="text-blue-800 font-bold mx-2.5 outline-1  border-b-2 border-grey-900">Añadir imagenes al proyecto</a>
                            @endif
                        </div>

                         @if (count($proyects) > 0)
                            {{-- Table --}}
                            <div class="overflow-x-auto relative bg-gray-200">
                                <table class="w-full text-sm text-left border dark:border-gray-200 ">
                                    <thead class="text-xs text-gray-700 uppercase ">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 ">
                                                Nombre
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-center">
                                                Imagen Principal
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-center">
                                                Status
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-center">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light text-center">
                                        @foreach ($proyects as $proyect)
                                            <tr class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                                <td class="py-5 px-6 text-left">
                                                    <div class="flex items-center">
                                                        <span class="font-medium">{{ $proyect->title }}</span>
                                                    </div>
                                                </td>
                                                <td class="py-5 px-6 text-center">
                                                    <div class="flex items-center justify-center">
                                                        <div class="mr-2">
                                                            <img class="w-40 "
                                                                src="{{ asset($proyect->image_primary) }}" />
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="py-5 px-6 text-center">
                                                    @if ($proyect->status === 1)
                                                        <span class="bg-green-200 text-green-600 py-2 px-9 rounded-full font-bold text-xs">Activado</span>
                                                        @else
                                                        <span class="bg-red-200 text-red-600 py-2 px-9 rounded-full font-bold text-xs">Desactivado</span>
                                                    @endif
                                                </td>
                                                <td class="py-5 px-6 text-center">
                                                    <div class="flex item-center justify-center">
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a href="">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <a href="{{ route('proyectos.edit', ['proyecto' => $proyect->id]) }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <form method="POST"  action="{{ route('proyectos.destroy', ['proyecto' => $proyect->id]) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="w-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <td class="py-3 px-6 text-center">
                                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Active</span>
                                        </td> --}}
                                    </tbody>
                                </table>
                            </div>
                             @else
                             <h1>No hay elementos</h1>
                         @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            swal({
                title: "Proyecto",
                text: "El proyecto se ha editado correctamente",
                icon: "success",
                button: "¡Aceptar!",
            });
        </script>
    @endif
</x-app-layout>
