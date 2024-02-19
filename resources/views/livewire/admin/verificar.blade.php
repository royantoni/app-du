<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="px-4 mx-auto max-w-2xl  ">
            <form wire:submit="save">
                <div class="dark:bg-gray-800 py-4 px-10">
                    <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Respuesta</h2>
                    <div class="mt-4">
                        <label for="telefono"
                            class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Respuesta</label>
                        <div class="flex justify-between">

                            <div class="">
                                <input checked id="default-radio-1" type="radio" value="3" wire:model="estado"
                                    name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Aceptar</label>
                            </div>
                            <div class="">
                                <input id="default-radio-2" type="radio" value="2" wire:model="estado"
                                    name="default-radio"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Observar</label>
                            </div>

                        </div>

                    </div>
                    

                    <div class="mt-4">
                        <div class="w-full">

                            <div class="sm:col-span-2">
                                <label for="derechos_estimen_afectados"
                                    class="text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observación</label>
                                <textarea id="derechos_estimen_afectados" wire:model="observacion" rows="3"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Afectados"></textarea>
                            </div>
                        </div>



                    </div>


                </div>



                <div class="flex justify-between">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-blue-900 hover:bg-primary-800">
                        Enviar
                    </button>
                    <a href="{{ route('admin.denuncia.index') }}"
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

                Livewire.on('respuesta_echa', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "La respuesta se ha enviado",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href = "{{ route('admin.denuncia.index') }}";
                    });
                });
               




            });
        </script>
    @endpush
</div>
