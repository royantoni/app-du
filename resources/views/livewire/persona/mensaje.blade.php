<div>

    <main class=" pb-16  lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">

                <section class="not-format">

                    @forelse ($mensajes as $item)
                        <article
                            class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2 ">
                                <div class="flex items-center">
                                    <p
                                        class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">
                                        <img class="mr-2 w-6 h-6 rounded-full" src="{{ asset('logo/icono_du.svg') }}"
                                            alt="Bonnie Green">{{ $administrador }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                            datetime="2022-03-12" title="March 12th, 2022">Enviado hace
                                            {{ Carbon\Carbon::parse($item->updated_at)->diffForHumans() }}</time></p>
                                </div>
                                <button id="dropdownComment3Button{{ $item->id }}" data-dropdown-toggle="dropdownComment{{ $item->id }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownComment{{ $item->id }}"
                                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <a href="{{ route('denuncia.vista_general', $item->id ) }}"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ver</a>
                                        </li>
                                    </ul>
                                </div>
                            </footer>
                            <p>{{ $item->observacion }}</p>
                            <div class="flex items-center mt-4 space-x-4">
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
                        </article>
                        @empty
                        <article
                            class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            
                            <p class="text-center">¡No hay mensajes por ahora!</p>
                            
                        </article>
                        @endforelse


                    </section>
                </article>
            </div>
        </main>






    </div>
