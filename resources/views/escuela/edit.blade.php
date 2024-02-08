<x-app-layout>


    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center ">

            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Editar Escuela</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Aqui puede
                editar la escuelas profesionales</p>

        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl ">

            <form method="POST" action="{{ route('admin.ecuela_profesionales.update', $ecuelaProfesionale) }}">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 sm:grid-cols-1 ">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2 ">
                        <div>
                            <label for="nombre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                value="{{ old('nombre', $ecuelaProfesionale->nombre) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ingeniería Informática y Sistemas">
                            <div>
                                @error('nombre')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="sigla"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sigla</label>
                            <input type="text" name="sigla" id="sigla" value="{{ old('sigla', $ecuelaProfesionale->sigla) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="EAPIIS">
                            <div>
                                @error('sigla')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>


                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2 ">
                        <div>
                            <label for="sede"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sede</label>
                            <input type="text" name="sede" id="sede" value="{{ old('sede', $ecuelaProfesionale->sede) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Abancay">
                            <div>
                                @error('sede')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="facultad"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facultad</label>
                            <select id="facultad" name="facultade_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="" value="">--Seleccione--</option>

                                @foreach ($datos as $item)
                                    <option value="{{ $item->id }}"
                                        @if (old('facultade_id', $ecuelaProfesionale->facultade_id) == $item->id) selected @endif>{{ $item->nombre }}</option>                                    
                                @endforeach
                            </select>
                            <div>
                                @error('facultade_id')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>



                    </div>


                </div>
                <div class="flex justify-between">
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Actualizar escuela
                    </button>
                    <a href="{{ route('admin.ecuela_profesionales.index') }}"
                        class="text-white inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Atras
                    </a>
                </div>

            </form>

        </div>
    </section>

    @push('js')
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {


                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "{{ session('success') }} ",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {

                    });




                });
            </script>
        @endif
    @endpush







</x-app-layout>
