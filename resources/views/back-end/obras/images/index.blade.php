<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Imagenes Obras
        </h2>
    </x-slot>

    <div class="py-12 g">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 shadow-xl">
                    <div class="w-full">
                        <div class="my-3">
                            <x-link-button class="my-5" href="{{ route('constructions.index') }}">
                                <i style="margin-right: 10px;" class="fas fa-arrow-left"></i> Atras
                            </x-link-button>
                        </div>

                        {{-- Formulario --}}

                        <form method="POST"
                              action="{{ route('constructionsaddImageStore') }}"
                              class="w-full md:w-1/2"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="mb-6">
                             @if(count($projects) > 0)
                                <label for="underline_select" class="sr-only">Underline select</label>
                                <select id="underline_select" name="name" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    @foreach ($projects as $project )
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                              @endif
                            </div>

                            <div class="flex justify-center items-center w-full mb-6">
                                <label for="dropzone-file"
                                    class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-white hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-200">
                                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click para añadir</span> o arrastrar y soltar</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF.</p>
                                    </div>
                                    <input id="dropzone-file" type="file" name="imagesProyect[]" class="hidden" multiple>
                                    @error('imagesProyect')
                                        <p class="mt-4 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">Oh, snapp!</span>
                                                 Error <span class="font-bold">El formato de la imagen tiene que ser JPG O PNG.</span></p>
                                    @enderror
                                </label>

                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 shadow-lg
                                focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                                rounded-md text-sm w-full sm:w-auto px-10 py-2.5 text-center
                                dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear
                                proyecto
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
