<x-app-layout>


    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center ">

            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Vista General</h1>
            

        </div>
    </section>
    <section class="bg-white dark:bg-gray-900">
        <div class=" px-4 mx-auto max-w-screen-xl  ">

            @livewire('admin.vista', ['id_denuncia' => $id_denuncia])

        </div>
    </section>



</x-app-layout>
