<?php

namespace App\Livewire\Persona;

use App\Models\Demandante;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Lista extends Component
{
    public $denuncias;
    private Demandante $demandante;
    public function mount(){
        $this->demandante = new Demandante();
        $this->denuncias = $this->demandante->denuncias_demandante(auth()->user()->email);
    }


    public function render()
    {
        return view('livewire.persona.lista');
    }
}
