<?php

namespace App\Livewire\Admin;

use App\Models\Demandante;
use App\Models\Expediente;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Aceptada extends Component
{

    use WithPagination, WithoutUrlPagination;



    private Demandante $obj_demandante;
    public $pagina = 3;
    public $search = "";

    public $id_expediente;
    public $estado;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function editar_estado($id_expediente){
        $this->id_expediente = $id_expediente;
        $expediente = Expediente::find($id_expediente);
        $this->estado = $expediente->estadoe;
    }

    public function actualizar_estado(){
        try {
            DB::table('expedientes')
            ->where('id', $this->id_expediente)
            ->update(['estadoe' => $this->estado]);

        } catch (\Throwable $th) {
            throw $th;
        }
        
        
    }


    public function render()
    {
        $this->obj_demandante = new Demandante();
        $expedientes = $this->obj_demandante->buscar_denuncias_aceptadas($this->search, $this->pagina);       
        return view('livewire.admin.aceptada',  ['expedientes' => $expedientes]);
    }

    
}
