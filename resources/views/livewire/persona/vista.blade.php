<div>

    <main class="  bg-white dark:bg-gray-900 antialiased">
        <div class="text-center pb-16">
            <a href="{{ route('persona.lista') }}"
                class=" text-white inline-flex items-center mt-4 sm:mt-6 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Atras
            </a>
        </div>

        <div class="flex justify-between px-4  ">

            @if ($encontrado > 0)
                <article
                    class="mx-auto w-full  format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="flex flex-wrap items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('logo/icono_du.svg') }}"
                                    alt="Jese Leos">
                                <div>
                                    <p rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                        {{ $nombres_demandante }}</p>

                                    <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                            datetime="2022-02-08" title="February 8th, 2022">Usuario desde
                                            {{ Carbon\Carbon::parse($fecha_creacion_demandante)->diffForHumans() }}</time>
                                    </p>


                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        {{ $tipo_demandante }} ({{ $email }})</p>

                                </div>
                                <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                                    <div class="md:flex md:justify-between">

                                        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3 w-full">
                                            <div>

                                                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                                    <li class="mb-4">
                                                        <p class="dark:text-gray-200">DNI</p>
                                                        <p>{{ $dni }}</p>
                                                    </li>
                                                    <li>
                                                        <p class="dark:text-gray-200">Telefono</p>
                                                        <p>{{ $telefono_demandante }}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>

                                                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                                    <li class="mb-4">
                                                        <p class="dark:text-gray-200">Código</p>
                                                        <p>{{ $codigo }}</p>
                                                    </li>
                                                    <li>
                                                        <p class="dark:text-gray-200">Domicilio</p>
                                                        <p>{{ $domicilio }}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>

                                                <ul class="text-gray-500 dark:text-gray-400 font-medium">
                                                    <li class="mb-4">
                                                        <p class="dark:text-gray-200">Facultad</p>
                                                        <p>{{ $facultad }}</p>
                                                    </li>
                                                    <li>
                                                        <p class="dark:text-gray-200">Escuela Profesional</p>
                                                        <p>{{ $carrera }} - {{ $sede }} </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

                                </div>
                            </div>

                        </address>
                        <h1
                            class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            {{ $asunto }}</h1>
                    </header>
                    <p class="lead">{{ $descripcion }}.</p>



                    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
                        <p>Datos del quejado Sr(a)
                            <strong>{{ $quejado }}</strong>
                        </p>
                        <div class="md:flex md:justify-between">


                            <div class="grid grid-cols-2  sm:gap-6 sm:grid-cols-2 w-full">
                                <div>

                                    <div class="text-gray-500 dark:text-gray-400 font-medium">
                                        <div class="flex justify-start gap-4">
                                            <p class="dark:text-gray-200 ">Cargo:</p>
                                            <p class="mr-4">{{ $cargo }}</p>
                                        </div>
                                        <div class="flex justify-start gap-4">
                                            <p class="dark:text-gray-200 ">Oficina:</p>
                                            <p class="mr-4">{{ $oficina }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>

                                    <div class="text-gray-500 dark:text-gray-400 font-medium">
                                        <div class="flex justify-start gap-4">
                                            <p class="dark:text-gray-200 ">Telefono:</p>
                                            <p class="mr-4">{{ $telefono_quejado }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>



                    <figure class="">
                        <div class="w-full  flex justify-center">
                            <img class="flex justify-center w-1/2 " src="{{ asset('logo/baner_du.svg') }}"
                                alt="">
                        </div>

                        <figcaption class="">¡Tus derechos tienen un aliado!</figcaption>
                    </figure>
                    <h2>Adjunto de imagenes</h2>

                    <div class="flex flex-col md:grid md:grid-cols-3 gap-3">

                        @if (count($imagenes) > 0)
                            @foreach ($imagenes as $item)
                                <div class="relative rounded overflow-hidden">
                                    <img src="{{ asset('storage/' . $item[1]) }}" alt="Hanging Planters"
                                        class="w-full">
                                    <p
                                        class="cursor-pointer absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                                        @
                                    </p>
                                </div>
                            @endforeach
                        @else
                            <div class="text-sm dark:text-gray-300"> No hay prueba en imagenes </div>
                        @endif




                    </div>


                    <h2>Adjunto de audio</h2>
                    @if (count($audios) > 0)
                        <div class="grid grid-cols-1 gap-2 ">
                            @foreach ($audios as $item)
                                <audio class="" controls>
                                    <source src="{{ asset('storage/' . $item[1]) }}" type="audio/mp3">
                                    Your browser does not support the audio tag.
                                </audio>
                            @endforeach
                        </div>
                    @else
                        <div class="text-sm dark:text-gray-300"> No hay prueba en audios </div>
                    @endif

                    <h2>Adjunto de videos</h2>
                    @if (count($videos) > 0)


                        <div class="grid grid-cols-1 gap-2">
                            @foreach ($videos as $item)
                                <video class="" controls>
                                    <source src="{{ asset('storage/' . $item[1]) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endforeach


                        </div>
                    @else
                        <div class="text-sm dark:text-gray-300"> No hay prueba en videos</div>
                    @endif
                    <h2>Adjunto de documentos</h2>
                    @if (count($documentos) > 0)
                        <div class="grid grid-cols-2 gap-2">
                            @foreach ($documentos as $item)
                                <div
                                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#" class="flex  justify-center">

                                        <svg class="p-2 w-20 h-20 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4" />
                                        </svg>

                                    </a>
                                    <div class="px-5 pb-5">
                                        <h5
                                            class="text-base font-semibold tracking-tight text-gray-900 dark:text-white mb-2">
                                            {{ $item[0] }}</h5>

                                        <div class="flex items-center justify-between">
                                            <span
                                                class="text-3xl font-bold text-gray-900 dark:text-white">{{ $item[2] }}</span>
                                            <button
                                                wire:click="descargar_documento('{{ $item[2] }}', '{{ $item[1] }}', '{{ $item[0] }}')"
                                                type="button"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Descargar</button>
                                        </div>

                                    </div>
                                </div>
                            @endforeach


                        </div>
                    @else
                        <div class="text-sm dark:text-gray-300"> No hay prueba en documentos </div>
                    @endif






                </article>
            @else
                <div class="text-sm dark:text-gray-300 text-center w-full"> No hay prueba en documentos </div>
            @endif

        </div>
    </main>






</div>
