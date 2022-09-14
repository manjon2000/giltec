<x-app-layout>
    <style>
        html{
            scroll-behavior: smooth;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ayuda
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-10">
                        <a class="mb-3 inline-block px-6 py-2.5 bg-blue-900 rounded shadow-sm text-white" href="#obra">¿Como subir una obra?</a>
                        <a class="mb-3 inline-block px-6 py-2.5 bg-blue-500 rounded shadow-sm text-white" href="#proyecto">¿Como subir un proyecto?</a>
                        <a class="mb-3 inline-block px-6 py-2.5 bg-blue-400 rounded shadow-sm text-white" href="#categoria">¿Como añadir una categoria nueva?</a>
                    </div>

                    <div class="w-full min-h-screen">
                        <div class="my-3">
                            <h1 class="text-xl font-bold">¿Como subir una obra?</h1>
                        </div>
                        <div class="w-full h-50 bg-gray-200 mb-7">
                            <video id="obra" class="w-full h-50" controls>
                                <source src="https://flowbite.com/docs/videos/flowbite.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                              </video>
                        </div>

                        <br>
                        <br>
                        <br>

                        <div class="my-5">
                            <h1 class="text-xl font-bold">¿Como subir un proyecto?</h1>
                        </div>
                        <div class="w-full h-50 bg-gray-200">
                            <video id="proyecto" class="w-full h-50"  controls>
                                <source src="https://flowbite.com/docs/videos/flowbite.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                              </video>
                        </div>

                        <br>
                        <br>
                        <br>

                        <div class="my-5">
                            <h1 class="text-xl font-bold">¿Como añadir una categoria nueva?</h1>
                        </div>
                        <div class="w-full h-50 bg-gray-200">
                            <video id="categoria" class="w-full h-50"  controls>
                                <source src="https://flowbite.com/docs/videos/flowbite.mp4" type="video/mp4">
                                Your browser does not support the video tag.
                              </video>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
