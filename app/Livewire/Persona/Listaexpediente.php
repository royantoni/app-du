<?php

namespace App\Livewire\Persona;

use App\Models\Demandante;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Listaexpediente extends Component
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
        $expedientes = $this->obj_demandante->buscar_denuncias_aceptadas_de_user($this->search, $this->pagina);

        return view('livewire.persona.listaexpediente', ['expedientes' => $expedientes]);
    }
}
