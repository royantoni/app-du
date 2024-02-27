<?php

namespace App\Livewire\Admin;

use App\Models\Demandante;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Aceptada extends Component
{

    use WithPagination, WithoutUrlPagination;



    private Demandante $obj_demandante;
    public $pagina = 3;
    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->obj_demandante = new Demandante();
        $denuncias = $this->obj_demandante->buscar_denuncias_aceptadas($this->search, $this->pagina); 
        return view('livewire.admin.aceptada',  ['denuncias' => $denuncias]);
    }
}
