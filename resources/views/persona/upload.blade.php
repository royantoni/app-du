<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class=" px-4 mx-auto max-w-screen-xl  lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16 ">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Adjuntar documentos</h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Ingrese sus datos correctos para validar la acción</p>
            </div> 
            
        </div>
       
      </section>
      @livewire('persona.adjuntar', ['id_denuncia' => $id_denuncia])
      
    
</x-app-layout>