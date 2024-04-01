<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-2 px-4 mx-auto max-w-2xl  ">
            <section class="bg-white dark:bg-gray-900">
                <div class=" px-4 mx-auto max-w-screen-xl  lg:px-6 ">
                    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16 ">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Crear
                            Expediente
                        </h2>
                        <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Ingrese datos
                            correctos para
                            validar la acción</p>
                    </div>

                </div>
            </section>
            <form wire:submit="save">

                <div class="dark:bg-gray-800 py-4 px-10 mt-6">
                    <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Ingrese datos (Demandante)</h2>
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        <div class="w-full">
                            <label for="dni"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI</label>
                            <input type="text" wire:model="dni" id="dni"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="12345678" required="">
                            <div>
                                @error('dni')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="codigo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                            <input type="text" wire:model="codigo" id="codigo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="171142">
                            <div>
                                @error('codigo')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="nombres"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
                            <input type="text" wire:model="nombres" id="nombres"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Jobs Reik" required="">
                            <div>
                                @error('nombres')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="apellidos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                            <input type="text" wire:model="apellidos" id="apellidos"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Ferrari Takol" required="">
                            <div>
                                @error('apellidos')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" wire:model="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="nombre@dominio.com" >
                            <div>
                                @error('email')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="telefono"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                            <input type="text" wire:model="telefono" id="telefono"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="980898989" required="">
                            <div>
                                @error('telefono')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>



                    </div>
                </div>

                <div class="dark:bg-gray-800 py-4 px-10 mt-6">
                    <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Ingrese datos (quejado)</h2>
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        <div class="w-full">
                            <label for="nombres_q"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
                            <input type="text" wire:model="nombres_q" id="nombres_q"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Jobs steb" required="">
                            <div>
                                @error('nombres_q')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="apellidos_q"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                            <input type="text" wire:model="apellidos_q" id="apellidos_q"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Rantal covel" required="">
                            <div>
                                @error('apellidos_q')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        



                    </div>
                </div>
                <div class="dark:bg-gray-800 py-4 px-10 mt-6">
                    <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Ingrese datos (Denuncia)</h2>
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="asunto"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asunto
                            </label>
                            <input type="text" wire:model="asunto" id="asunto"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Denuncia por acoso" required="">
                            <div>
                                @error('asunto')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="descripcion_echos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción de
                                echos</label>
                            <textarea id="descripcion_echos" rows="8" wire:model="descripcion_echos"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Your description here"></textarea>
                            <div>
                                @error('descripcion_echos')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                        <span class="font-medium">{{ $message }}</span>
                                    </p>
                                @enderror
                            </div>
                        </div>



                    </div>
                </div>

                <div class="flex justify-between">
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-blue-900 hover:bg-primary-800">
                        Registrar expediente
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


    </section>

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Livewire.on('expediente_creado', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Expediente registrada",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href = "{{ route('persona.index') }}";
                    });
                });




            });
        </script>
    @endpush
</div>
