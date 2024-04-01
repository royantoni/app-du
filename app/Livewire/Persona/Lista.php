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

    public function actualizar_estado ($id_denuncia){
        
        try {
            DB::table('denuncias')
            ->where('id','=', $id_denuncia)
            ->update(['estado' => 1]);
        } catch (\Throwable $th) {
            throw $th;
        }

        return to_route('persona.lista');

    }

    public function eliminar_denuncia($id_denuncia){
        DB::table('denuncias')->where('id', $id_denuncia)->delete();
        return to_route('persona.lista');
    }
}
