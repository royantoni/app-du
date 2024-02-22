<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-2 px-4 mx-auto max-w-2xl  ">

            <form wire:submit="save">
                <div class="dark:bg-gray-800 py-4 px-10">
                    <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white text-center">Adjuntar firma</h2>


                    <div class="grid gap-4 mb-2">
                        <div class="flex justify-center">
                            @if ($firma)
                                <img class="h-80 w-auto rounded-lg " src="{{ $firma->temporaryUrl() }}">
                            @else
                                @if ($firma_anterior)
                                <img class="h-80 w-auto rounded-lg " src="{{ asset('storage/'.$firma_anterior) }}">
                                @else
                                    <div class="h-80 w-auto rounded-lg">
                                        <svg class="w-20 h-20 flex text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 3c.3 0 .6.1.8.4l4 5a1 1 0 1 1-1.6 1.2L13 7v7a1 1 0 1 1-2 0V6.9L8.8 9.6a1 1 0 1 1-1.6-1.2l4-5c.2-.3.5-.4.8-.4ZM9 14v-1H5a2 2 0 0 0-2 2v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </div>
                                @endif

                            @endif

                        </div>

                    </div>


                    <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
                        <div class="w-full">

                            <div wire:ignore x-data x-init="FilePond.setOptions({
                            
                                server: {
                                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                        @this.upload('firma', file, load, error, progress)
                                    },
                                    revert: (filename, load) => {
                                        @this.removeUpload('firma', filename, load)
                                    },
                                },
                            });
                            FilePond.create($refs.input);">




                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Cargar imagen</label>
                                <input x-ref="input"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="file_input" type="file" wire:model.live="firma">
                            </div>




                            <div>
                                @error('firma')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>


                    </div>
                </div>


                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-blue-900 hover:bg-primary-800">
                    Guardar firma
                </button>
            </form>
        </div>
    </section>



    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Livewire.on('firma_creada', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Firma guardada",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href =
                            "{{ route('persona.firma.index') }}";
                    });
                });




            });
        </script>
    @endpush
</div>
