<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-2 px-4 mx-auto max-w-2xl  ">

            @if ($accion == 'yaexiste')
                <form wire:submit="save">

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
                            <div class="w-full">
                                <label for="oficina_administrativo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Oficina
                                    administrativo</label>
                                <input type="text" wire:model="oficina_administrativo" id="oficina_administrativo"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Unidad de Investigación">
                            </div>
                            <div class="w-full">
                                <label for="telefono_q"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                                <input type="text" wire:model="telefono_q" id="telefono_q"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="945454545">
                            </div>
                            <div class="w-full">
                                <label for="cargo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo
                                </label>
                                <input type="text" wire:model="cargo" id="cargo"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Secretaria">
                            </div>
                            <div class="w-full">
                                <label for="facultade_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facultad</label>
                                <select id="facultade_id" wire:model.live="facultade_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                    <option value="0" selected="">Seleccione Facultad</option>
                                    @foreach ($facultades as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                                <div>
                                    @error('email')
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
                                <label for="derechos_estimen_afectados"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Derechos que
                                    estimen afectados</label>
                                <textarea id="derechos_estimen_afectados" wire:model="derechos_estimen_afectados" rows="3"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Afectados"></textarea>
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
                            Registrar mi denuncia
                        </button>
                        <a href="{{ route('dashboard') }}"
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
            @else
                <div class="py-8  mx-auto max-w-screen-xl text-center lg:py-16 ">

                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16  dark:text-gray-400">Antes de
                        realizar la accion registre y actualice sus datos personales</p>
                    <div class="flex flex-col mb-8 lg:mb-16  sm:flex-row sm:justify-center sm:space-y-0 ">
                        <a href="{{ route('persona.actualizar') }}"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                            Actualizar datos

                            <svg class="ml-2 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                            </svg>
                        </a>

                    </div>


                </div>
            @endif


    </section>

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Livewire.on('denuncia_creada', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Denuncia registrada",
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
