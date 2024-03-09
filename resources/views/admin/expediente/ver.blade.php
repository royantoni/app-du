<x-app-layout>


    
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl  ">
            @livewire('admin.expediente.verfile', ['id_expediente' => $id_expediente])
        </div>
    </section>



</x-app-layout>