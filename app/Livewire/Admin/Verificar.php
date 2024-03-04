<?php

namespace App\Livewire\Admin;

use App\Models\Expediente;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Verificar extends Component
{
    public $id_denuncia;
    public $estado = 3;
    public $observacion = "Solicitud aceptada";

    public function mount()
    {
        $denuncia = DB::table('denuncias')
            ->where('id', $this->id_denuncia)->first();

        $this->observacion = $denuncia->observacion;
        $this->estado = $denuncia->estado;
    }

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

            
                $expediente = new Expediente();              
                
                $expediente->denuncia_id = $this->id_denuncia;
        
                // Guardar el nuevo registro en la base de datos
                $expediente->save();

            $this->dispatch('respuesta_echa');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
