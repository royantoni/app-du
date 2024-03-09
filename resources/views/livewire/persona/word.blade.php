<div>


    <section class="bg-white dark:bg-gray-900">
        <div class="py-2 px-4 mx-auto max-w-2xl  ">

            <section class="bg-white dark:bg-gray-900">
                <div class=" px-4 mx-auto max-w-screen-xl text-center  lg:px-12">

                    @if ($cantidad_adjuntos <= 0)
                        <div class="  mx-auto max-w-screen-xl text-center  ">
                            <div class="flex flex-col mb-8 lg:mb-16  sm:flex-row sm:justify-center sm:space-y-0 ">
                                <a href="{{ route('persona.adjuntar', $id_denuncia) }}"
                                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                    Adjuntar archivos

                                    <svg class="ml-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                    </svg>
                                </a>

                            </div>

                        </div>
                    @endif
                   {{--  <section class="bg-white dark:bg-gray-900">
                        <div class=" px-4 mx-auto max-w-screen-xl  lg:px-6 ">
                            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16 ">
                                <h2
                                    class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                                    Generar solicitud</h2>
                                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Crear la
                                    solictud en documentos Word y PDF</p>
                            </div>

                        </div>

                    </section> --}}

                    <button wire:click="llenar_plantilla"
                        class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                        role="alert">
                        <span class="text-xs bg-primary-600 rounded-full text-white px-4 py-1.5 mr-3"></span> <span
                            class="text-sm font-medium">Crear solicitud</span>
                        <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    @if ($visible)
                        
                        <div
                            class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">

                            <button wire:click="dword"
                                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 4.8a1 1 0 1 0-2 .4l1 5a1 1 0 0 0 1.9.3l1.1-1.9 1.1 2a1 1 0 0 0 1.9-.4l1-5a1 1 0 0 0-2-.4l-.5 2.5-.6-1.1a1 1 0 0 0-1.8 0l-.6 1-.5-2.4Z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="text-sm ml-2">Descargar</span>
                            </button>
                            <button wire:click="dpdf"
                                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">

                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M9 2.2V7H4.2l.4-.5 3.9-4 .5-.3Zm2-.2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7c0 1.1.9 2 2 2 0 1.1.9 2 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5c0 .6.4 1 1 1h1.4a2.6 2.6 0 0 0 2.6-2.6v-1.8a2.6 2.6 0 0 0-2.6-2.6H11Zm1 5v-3h.4a.6.6 0 0 1 .6.6v1.8a.6.6 0 0 1-.6.6H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z"
                                        clip-rule="evenodd" />
                                </svg>


                                <span class="text-sm ml-2">Descargar</span>
                            </button>
                        </div>
                    @endif
                    <div>
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





                </div>
            </section>


        </div>
    </section>
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Livewire.on('solicitud-creada', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Se creó la solicitud",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href =
                            "{{ route('persona.word', ['id_denuncia' => $id_denuncia]) }}";
                    });
                });

                Livewire.on('adjunte-archivo', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "warning",
                        title: "Adjuntar documentos por favor!",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href =
                            "{{ route('persona.word', ['id_denuncia' => $id_denuncia]) }}";
                    });
                });
                Livewire.on('adjunte-firma', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "warning",
                        title: "Adjuntar firma por favor!",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href =
                            "{{ route('persona.word', ['id_denuncia' => $id_denuncia]) }}";
                    });
                });


            });
        </script>
    @endpush

</div>
