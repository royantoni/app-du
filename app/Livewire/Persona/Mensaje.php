<?php

namespace App\Livewire\Persona;

use App\Models\Demandante;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Mensaje extends Component
{
    public $obj_demandante;
    public $mensajes = [];

    public $administrador;

    public function mount(){
        $this->obj_demandante = new Demandante();
        $this->mensajes = $this->obj_demandante->vista_mensajes();

        //Datos del administrador
        $usuario = DB::table('users')->where('privilegio', '=', 2)->first();
        $this->administrador = $usuario->name.' '.$usuario->lastname;
        
    }
    public function render()
    {
        return view('livewire.persona.mensaje');
    }
}
