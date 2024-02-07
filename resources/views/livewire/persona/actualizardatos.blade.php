<div>
    <section class="bg-white dark:bg-gray-900">
        <div class="px-4 mx-auto max-w-2xl  ">
            <form wire:submit="save">
                <div class="dark:bg-gray-800 py-4 px-10">
                    @if ($accion == 'yaexiste')
                        <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Actualizar datos personales</h2>
                    @else
                        <h2 class="mb-8 text-xl font-bold text-gray-900 dark:text-white">Registre sus datos</h2>
                    @endif

                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="dni"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI</label>
                            <input type="number" wire:model="dni" id="dni"
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
                            <input type="number" wire:model="codigo" id="codigo"
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
                            <label for="domicilio"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domicilio</label>
                            <input type="text" wire:model="domicilio" id="domicilio"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Av. Julio cesar" required="">
                            <div>
                                @error('domicilio')
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
                        <div>
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
                        <div>
                            <label for="ecuela_profesionale_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Escuela
                                profesional</label>
                            <select id="ecuela_profesionale_id" wire:model.live="ecuela_profesionale_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                <option value="0" selected="">Seleccione Escuela</option>

                                @foreach ($escuelas as $escuela)
                                    <option value="{{ $escuela->id }}">{{ $escuela->nombre }} -
                                        {{ $escuela->sede }}</option>
                                @endforeach

                            </select>
                            <div>
                                @error('ecuela_profesionale_id')
                                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>



                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-blue-900 hover:bg-primary-800">
                    @if ($accion == 'yaexiste')
                        Actualizar
                    @else
                        Guardar
                    @endif
                </button>
            </form>
        </div>
    </section>

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                Livewire.on('demandante_creada', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Datos registrados correctamente",
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.href = "{{ route('persona.actualizar') }}";
                    });
                });
                Livewire.on('demandante_actualizada', () => {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Datos actualizados correctamente",
                        showConfirmButton: false,
                        timer: 1500,
                    }).then((result) => {
                        window.location.href = "{{ route('persona.actualizar') }}";
                    });
                    
                });




            });
        </script>
    @endpush
</div>
