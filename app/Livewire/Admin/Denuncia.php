<?php

namespace App\Livewire\Admin;

use App\Models\Demandante;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;



class Denuncia extends Component
{
    use WithPagination, WithoutUrlPagination;



    private Demandante $obj_demandante;
    public $pagina = 3;
    public $search = "";

   /*  public $denu; */

    public function mount(){
        
        
       
    }

    public function selecciona_anio($anio){
        if ($anio == "todos") {
            
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $this->obj_demandante = new Demandante();
        $denuncias = $this->obj_demandante->buscar_denuncias_recibidas($this->search, $this->pagina);   
        /* $this->denu = $denuncias; */
        /* dd($this->denu); */
        return view('livewire.admin.denuncia', ['denuncias' => $denuncias]);
    }
}

