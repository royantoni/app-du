<div>

    <div class="flex justify-center flex-wrap gap-4">
        @foreach ($denuncias as $item)
            <div
                class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 flex flex-wrap flex-col justify-between">
                <div class="w-full">
                    <div class="flex justify-between">
                        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                            {{ $item->asunto }}
                        </h5>
                        @switch($item->estado)
                            @case(0)
                                <p><span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Nuevo</span>
                                </p>
                            @break

                            @case(1)
                                <p><span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Pendiente</span>
                                </p>
                            @break

                            @case(2)
                                <p><span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Observado</span>
                                </p>
                            @break

                            @case(3)
                                <p><span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Recibido</span>
                                </p>
                            @break

                            @default
                        @endswitch

                    </div>

                    <div class=" py-4 max-h-40 overflow-y-auto ">
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            {{ $item->descripcion_echos }}
                        </p>
                    </div>
                    <p
                        class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400 mt-5">

                        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4a1 1 0 1 0-2 0v4c0 .3.1.5.3.7l3 3a1 1 0 0 0 1.4-1.4L13 11.6V8Z"
                                clip-rule="evenodd" />
                        </svg>

                        Creado {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                    </p>
                </div>


                <div class="w-full">
                    <ul class="my-4 space-y-3">

                        @if ($item->estado == 0 || $item->estado == 2)
                            <li>
                                <a href="{{ route('persona.adjuntar', ['id_denuncia' => $item->id]) }}"
                                    class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">

                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 3c.3 0 .6.1.8.4l4 5a1 1 0 1 1-1.6 1.2L13 7v7a1 1 0 1 1-2 0V6.9L8.8 9.6a1 1 0 1 1-1.6-1.2l4-5c.2-.3.5-.4.8-.4ZM9 14v-1H5a2 2 0 0 0-2 2v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2 1 1 0 1 0 0-2Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                    <span class="flex-1 ms-3 whitespace-nowrap">Adjuntar archivos</span>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('persona.word', ['id_denuncia' => $item->id]) }}"
                                class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">


                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.3 6.2H5a2 2 0 0 0-2 2V19a2 2 0 0 0 2 2h11c1.1 0 2-1 2-2.1V11l-4 4.2c-.3.3-.7.6-1.2.7l-2.7.6c-1.7.3-3.3-1.3-3-3.1l.6-2.9c.1-.5.4-1 .7-1.3l3-3.1Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M19.8 4.3a2.1 2.1 0 0 0-1-1.1 2 2 0 0 0-2.2.4l-.6.6 2.9 3 .5-.6a2.1 2.1 0 0 0 .6-1.5c0-.2 0-.5-.2-.8Zm-2.4 4.4-2.8-3-4.8 5-.1.3-.7 3c0 .3.3.7.6.6l2.7-.6.3-.1 4.7-5Z"
                                        clip-rule="evenodd" />
                                </svg>


                                <span class="flex-1 ms-3 whitespace-nowrap">Generar solicitud</span>
                            </a>
                        </li>
                        @if ($item->estado == 0 || $item->estado == 2)
                            <li>
                                <button wire:click="actualizar_estado({{ $item->id }})"
                                    class="flex w-full items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">


                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M14.5 6.7a1 1 0 0 1 0-1.4 1 1 0 0 1 1.3 0l5.5 4.9a2 2 0 0 1 0 3l-5.5 5.1a1 1 0 0 1-1.5 0 1 1 0 0 1 .1-1.5l5.6-5v-.1l-5.5-5ZM8 16v-.4A4.1 4.1 0 0 0 5.3 18a1.7 1.7 0 0 1-2 1A1.7 1.7 0 0 1 2 17.2v-1.3c0-3.8 2.5-7 6-7.6v-.7a2 2 0 0 1 2-2.1 2 2 0 0 1 1.1.4l5.1 4.3a2.1 2.1 0 0 1 0 3.1l-5 4.3H11A2 2 0 0 1 8 16Z"
                                            clip-rule="evenodd" />
                                    </svg>



                                    <span class="ms-3 ">Enviar solicitud</span>
                                </button>
                            </li>
                        @endif



                    </ul>
                </div>

                <div class="w-full">
                    <ul class="flex">

                        <a href="{{ route('denuncia.vista_general', $item->id) }}"
                            class="flex  focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M5 7.8C6.7 6.3 9.2 5 12 5s5.3 1.3 7 2.8a12.7 12.7 0 0 1 2.7 3.2c.2.2.3.6.3 1s-.1.8-.3 1a2 2 0 0 1-.6 1 12.7 12.7 0 0 1-9.1 5c-2.8 0-5.3-1.3-7-2.8A12.7 12.7 0 0 1 2.3 13c-.2-.2-.3-.6-.3-1s.1-.8.3-1c.1-.4.3-.7.6-1 .5-.7 1.2-1.5 2.1-2.2Zm7 7.2a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        @if ($item->estado == 0 || $item->estado == 2)
                            <a href="{{ route('persona.actualizardenuncia', $item->id) }}"
                                class=" flex focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M11.3 6.2H5a2 2 0 0 0-2 2V19a2 2 0 0 0 2 2h11c1.1 0 2-1 2-2.1V11l-4 4.2c-.3.3-.7.6-1.2.7l-2.7.6c-1.7.3-3.3-1.3-3-3.1l.6-2.9c.1-.5.4-1 .7-1.3l3-3.1Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd"
                                        d="M19.8 4.3a2.1 2.1 0 0 0-1-1.1 2 2 0 0 0-2.2.4l-.6.6 2.9 3 .5-.6a2.1 2.1 0 0 0 .6-1.5c0-.2 0-.5-.2-.8Zm-2.4 4.4-2.8-3-4.8 5-.1.3-.7 3c0 .3.3.7.6.6l2.7-.6.3-.1 4.7-5Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </a>
                        @endif

                        @if ($item->estado == 0)
                            <button type="button" wire:click="eliminar_denuncia('{{$item->id}}')"
                                class=" flex focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </button>
                        @endif


                    </ul>
                </div>


            </div>
        @endforeach



    </div>


</div>
