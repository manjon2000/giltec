<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categorias
        </h2>
    </x-slot>

    <div class="py-12 g">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 shadow-xl">
                    <div class="w-full">
                        <div class="my-3">
                            <x-link-button  href="{{ route('categories.index') }}">
                                <i style="margin-right: 10px;" class="fas fa-arrow-left"></i> Atras
                            </x-link-button>
                            <h1 class="font-bold text-xl my-5">Editar categoria</h1>
                        </div>

                        {{-- Formulario --}}

                        <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}" class="w-full md:w-1/2">
                            @method('PUT')
                            @csrf
                            <div class="mb-6">
                                <label for="text"
                                    class="block mb-2 text-sm font-medium text-gray-600 font-bold">Nombre</label>
                                   
                                <input style="outline: none !important; " type="text" id="text" name="name"
                                    value="{{ $category->name }}"
                                    class="bg-white border border-gray-500 text-gray-900 text-sm 
                                    rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full 
                                    p-2.5  dark:placeholder-gray-400  focus:outline-none"
                                    placeholder="viviendas" required="require">
                                    @error('name')
                                        <p class="mt-4 text-sm text-red-600 dark:text-red-500">
                                            <span class="font-medium">Oh, snapp!</span>
                                                 Error <span class="font-bold">min 2 caracteres.</span></p>
                                    @enderror
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 shadow-lg 
                                focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium 
                                rounded-md text-sm w-full sm:w-auto px-10 py-2.5 text-center 
                                dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Modificar categoria
                            </button>
                        </form>

                        {{-- Formulario --}}
                        {{--  --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
