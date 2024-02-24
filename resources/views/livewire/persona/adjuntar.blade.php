<div>

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
                                    for="file_input">Cargar archivos</label>
                                <input x-ref="input"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="file_input" type="file" multiple wire:model.live="archivos">
                            </div>




                            <div>
                                @error('dni')
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
                        Guardar documentos
                    </button>
                    <a href="{{ route('persona.lista') }}"
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
        </div>
    </section>



    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Livewire.on('no_hay_archivos', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "warning",
                        title: "No hay archivos",
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
                            "{{ route('persona.adjuntar', ['id_denuncia' => $id_denuncia]) }}";
                    });
                });




            });
        </script>
    @endpush
</div>
