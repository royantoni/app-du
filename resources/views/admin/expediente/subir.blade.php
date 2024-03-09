<x-app-layout>


    
    <section class="bg-white dark:bg-gray-900">
        <div class="py-2 px-4 mx-auto max-w-screen-xl text-center ">
            @livewire('admin.expediente.subirfile', ['id_expediente' => $id_expediente])
        </div>
    </section>



</x-app-layout>
