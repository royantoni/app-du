<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Verificar extends Component
{
    public $id_denuncia;
    public $estado = 3;
    public $observacion = "Solicitud aceptada";

    public function render()
    {
        return view('livewire.admin.verificar');
    }

    public function save()
    {
        try {
            DB::table('denuncias')
                ->where('id', $this->id_denuncia)
                ->update(['estado' => $this->estado, 'observacion' => $this->observacion]);

            $this->dispatch('respuesta_echa');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
