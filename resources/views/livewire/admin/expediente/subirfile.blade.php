<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="pt-6 px-4 mx-auto max-w-screen-xl text-center ">

            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Expediente Nº {{ $numero_expediente }} </h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Adjunte
                todos los archivos relacionados a este expediente</p>

        </div>
    </section>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-2 px-4 mx-auto max-w-2xl  ">

            <form wire:submit="save">
                <div class="dark:bg-gray-800 py-4 px-10">
                    <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">



                        <div class="w-full">

                            <div wire:ignore x-data x-init="FilePond.setOptions({
                            
                                server: {
                                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                        @this.upload('archivos', file, load, error, progress)
                                    },
                                    revert: (filename, load) => {
                                        @this.removeUpload('archivos', filename, load)
                                    },
                                },
                            });
                            FilePond.create($refs.input);">




                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Adjuntos</label>
                                <input x-ref="input"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="file_input" type="file" multiple wire:model.live="archivos">
                            </div>
                            <div>
                                @error('archivos')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>


                    </div>
                </div>

                <div class="flex justify-between">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-blue-900 hover:bg-primary-800">
                        Guardar
                    </button>
                    <a href="{{ route('admin.denuncia.aceptada') }}"
                        class=" text-white inline-flex items-center mt-4 sm:mt-6 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
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

            <div class="overflow-x-auto mt-4">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">#</th>
                            <th scope="col" class="px-4 py-3">Nombre</th>
                            <th scope="col" class="px-4 py-3">Tipo</th>
                            <th scope="col" class="px-4 py-3">Tiempo</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($archivos_tabla as $item)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->nombrea }}</th>
                                <td class="px-4 py-3">{{ $item->tipoa }}</td>
                                <td class="px-4 py-3">
                                    {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} a las
                                    {{ Carbon\Carbon::parse($item->created_at)->format('H:i') }}</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <div class="py-1">
                                        <button type="button"
                                            wire:click="ver_archivo('{{ $item->id }}', '{{ $item->archivoa }}')"
                                            class="">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-yellow-300" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M5 7.8C6.7 6.3 9.2 5 12 5s5.3 1.3 7 2.8a12.7 12.7 0 0 1 2.7 3.2c.2.2.3.6.3 1s-.1.8-.3 1a2 2 0 0 1-.6 1 12.7 12.7 0 0 1-9.1 5c-2.8 0-5.3-1.3-7-2.8A12.7 12.7 0 0 1 2.3 13c-.2-.2-.3-.6-.3-1s.1-.8.3-1c.1-.4.3-.7.6-1 .5-.7 1.2-1.5 2.1-2.2Zm7 7.2a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="py-1 ml-2">


                                        <button wire:click="editar_file('{{ $item->id }}')"
                                            data-modal-target="crud-modal" data-modal-toggle="crud-modal" class=""
                                            type="button">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-green-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M11.3 6.2H5a2 2 0 0 0-2 2V19a2 2 0 0 0 2 2h11c1.1 0 2-1 2-2.1V11l-4 4.2c-.3.3-.7.6-1.2.7l-2.7.6c-1.7.3-3.3-1.3-3-3.1l.6-2.9c.1-.5.4-1 .7-1.3l3-3.1Z"
                                                    clip-rule="evenodd" />
                                                <path fill-rule="evenodd"
                                                    d="M19.8 4.3a2.1 2.1 0 0 0-1-1.1 2 2 0 0 0-2.2.4l-.6.6 2.9 3 .5-.6a2.1 2.1 0 0 0 .6-1.5c0-.2 0-.5-.2-.8Zm-2.4 4.4-2.8-3-4.8 5-.1.3-.7 3c0 .3.3.7.6.6l2.7-.6.3-.1 4.7-5Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>


                                    </div>
                                    <div class="py-1 ml-2">
                                        <button type="button"
                                            wire:click="confirmar_eliminar_archivo('{{ $item->id }}', '{{ $item->archivoa }}')"
                                            class="">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-red-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </button>
                                    </div>


                                </td>
                                <td>

                                </td>
                            </tr>
                        @empty
                            <tr class="border-b dark:border-gray-700 ">
                                <td class="px-4 py-3 text-center" colspan="5">No hay registros</td>
                            </tr>
                        @endforelse



                    </tbody>
                </table>



                <div class="grid gap-4 mt-4">
                    <div>
                        @if ($ruta_ver != '')
                            @if ($tipo_archivo == 'imagen')
                                <img class="h-auto max-w-full rounded-lg"
                                    src="{{ asset('storage/' . $ruta_ver) }}"
                                    alt="">
                            @else
                                <iframe class="w-full min-h-screen flex justify-center text-center" width="100%"
                                    src="{{ asset('storage/' . $ruta_ver) }}" frameborder="0"></iframe>
                            @endif
                        @endif
                    </div>
                </div>










            </div>
        </div>
    </section>

    <div>
        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" wire:ignore
            class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Editar nombre del archivo
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5 text-start" wire:submit="actualizar_file()">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                <input type="text" wire:model="nombre_nuevo"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="My nombre" required="">
                            </div>
                        </div>
                        <button type="submit" data-modal-toggle="crud-modal"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>









    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Livewire.on('no_hay_archivos', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "warning",
                        title: "Subir archivos por favor!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                });

                Livewire.on('archivo_creado', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Archivos guardados",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href =
                            "{{ route('admin.expediente.subir', ['id_expediente' => $id_expediente]) }}";
                    });
                });

                Livewire.on('confirmar_eliminacion', function() {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminarlo'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            @this.call('eliminar_registro')
                        }
                    });
                });




            });
        </script>
    @endpush
</div>
