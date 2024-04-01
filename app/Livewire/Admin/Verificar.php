<?php

namespace App\Livewire\Admin;

use App\Models\Expediente;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
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
       


        $numero_correlativo = "";

        try {



            if ($this->estado == 2) {
                DB::table('denuncias')
                    ->where('id', $this->id_denuncia)
                    ->update(['estado' => $this->estado, 'observacion' => $this->observacion]);
            }

            if ($this->estado == 3) {
                DB::table('denuncias')
                    ->where('id', $this->id_denuncia)
                    ->update(['estado' => $this->estado, 'observacion' => $this->observacion]);


                $ultimoId = DB::table('expedientes')->latest()->value('id');

                if ($ultimoId == null) {
                    $numero_correlativo = "001";
                }
                if ($ultimoId < 10 && $ultimoId > 0) {
                    $numero_correlativo = "00" . $ultimoId;
                }
                if ($ultimoId >= 100) {
                    $numero_correlativo =  $ultimoId;
                }


                $expediente = new Expediente();

                $expediente->denuncia_id = $this->id_denuncia;
                $expediente->numeroexp = $numero_correlativo . "-" . Carbon::now()->year . "-DU-UNAMBA";

                // Guardar el nuevo registro en la base de datos
                $expediente->save();
            }




            $this->dispatch('respuesta_echa');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
