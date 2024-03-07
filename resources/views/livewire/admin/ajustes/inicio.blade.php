<div>
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <div class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search" wire:model="buscador"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Buscar por gmail" required="">
                    </div>
                </div>
            </div>
            <div
                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <button type="button" wire:click="buscar_usuario()"
                    class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Buscar usuario
                </button>
            </div>
        </div>

        <main class="pt-8 lg:pt-16  bg-white dark:bg-gray-900 antialiased">
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="{{ asset('logo/icono_du.svg') }}"
                                alt="Jese Leos">
                            <div>
                                <p rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $nombres }} {{ $apellidos }}</p>
                                <p class="text-base text-gray-500 dark:text-gray-400">Usuario</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="2022-02-08" title="February 8th, 2022">
                                        Usuario desde
                                        {{ Carbon\Carbon::parse($fecha_creacion)->diffForHumans() }}
                                    </time></p>
                            </div>
                        </div>
                    </address>
                    <h1 class=" text-3xl font-extrabold leading-tight text-gray-900  lg:text-4xl dark:text-white">
                        Actualice datos</h1>
                </header>
            </div>
        </main>
        <hr>
        <form wire:submit="save" class="mb-4">
            <div class="dark:bg-gray-800 py-4 px-10">
                
                


                <div class="mt-4">
                    <div class="w-full">

                        <div class="flex md:flex-nowrap sm:flex-wrap gap-4">
                            <div class="md:w-1/2 w-full">
                                <label for="derechos_estimen_afectados"
                                    class="text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
                                <input id="derechos_estimen_afectados" wire:model="nombres" type="text"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Nombres">
                            </div>
                            <div class="md:w-1/2 w-full">
                                <label for="derechos_estimen_afectados"
                                    class="text-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                                <input id="derechos_estimen_afectados" wire:model="apellidos" type="text"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <button type="submit" 
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-blue-900 hover:bg-primary-800"
                                
                                @if(!$encontrado) disabled @endif>
                                Guardar cambios
                            </button>
                        </div>

                    </div>
                    <div class="mt-4">
                        <label for="telefono"
                            class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Privilegio</label>
                        <div class="flex justify-between">
                            <div class="w-1/2 flex gap-4">
                                <div class="">
                                    <input checked id="default-radio-1" type="radio" value="3" wire:model="privilegio"
                                        name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-radio-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Comun</label>
                                </div>
                                <div class="">
                                    <input id="default-radio-2" type="radio" value="2" wire:model="privilegio"
                                        name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-radio-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Usuario del sistema</label>
                                </div>
                            </div>  
                            
    
                        </div>
    
                    </div>



                </div>


            </div>



            

        </form>




    </div>



    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Livewire.on('usuario_actualizado', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Se guardó los cambios",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        
                    });
                });
               




            });
        </script>
    @endpush
</div>
