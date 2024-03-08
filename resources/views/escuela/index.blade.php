<x-app-layout>


    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center ">

            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Lista de escuelas </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Aqui puede
                administrar las escuelas profesionales</p>

        </div>
    </section>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg ">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('admin.ecuela_profesionales.create') }}"
                            class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Argegar escuela
                        </a>

                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">#</th>
                                <th scope="col" class="px-4 py-3">Nombre</th>
                                <th scope="col" class="px-4 py-3">Sigla</th>
                                <th scope="col" class="px-4 py-3">Sede</th>
                                <th scope="col" class="px-4 py-3">Facultad</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $list)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $list->nombre }}</th>
                                    <td class="px-4 py-3">{{ $list->sigla }}</td>
                                    <td class="px-4 py-3">{{ $list->sede }}</td>
                                    <td class="px-4 py-3">{{ $list->facultad }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <button id="{{ $list->id }}" data-dropdown-toggle="{{ $list->id }}-id"
                                            class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="{{ $list->id }}-id"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="{{ $list->id }}">
                                                <li>
                                                    <a href="{{ route('admin.ecuela_profesionales.show', $list->id) }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('admin.ecuela_profesionales.edit', $list->id) }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editar</a>
                                                </li>
                                            </ul>
                                            <form action="{{ route('admin.ecuela_profesionales.destroy', $list->id) }}"
                                                method="POST" id="formulario_eliminar_{{ $list->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="py-1">
                                                    <button type="button" onclick="confirmar_eliminacion('{{ $list->id }}')"
                                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Eliminar</button>
                                                </div>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="">
                                    <th scope="row"
                                        class="text-center px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white w-full">
                                        No hay registros</th>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

    @push('js')
        <script>
            function confirmar_eliminacion(id) {
                Swal.fire({
                    title: "¿Estás seguro de eliminar?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminarlo"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario confirma, enviar el formulario para eliminar el registro
                        let formId = 'formulario_eliminar_' + id;
                        let form = document.getElementById(formId);
                        form.submit();
                    }
                });
            }
        </script>

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
