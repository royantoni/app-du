<div>

    <section class="bg-white dark:bg-gray-900">
        <div class="py-2 px-4 mx-auto max-w-2xl  ">

            <form wire:submit="save">
                <div class="dark:bg-gray-800 py-4 px-10">
                    <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Documentos para la solicitud</h2>
                    <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">

                        {{--  <div>
                                @foreach ($archivos as $file)
                                <img src="{{ $file->temporaryUrl() }} " alt="aa">
                                @endforeach
                            </div> --}}


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


                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-blue-900 hover:bg-primary-800">
                    Guardar documentos
                </button>
            </form>
        </div>
    </section>



    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

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
