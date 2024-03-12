<?php

namespace App\Livewire\Persona;

use App\Models\Facultade;
use App\Models\Quejado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Actualizardenuncia extends Component
{
    public $id_denuncia;
    public $obj_quejado;

    
    #[Validate('required', as: 'nombre')]
    public $nombres_q;

    #[Validate('required', as: 'apellido')]
    public $apellidos_q; 

    public $telefono_q;
    public $cargo; 
    public $oficina_administrativo;
    public $facultade_id;

    #[Validate('required')]
    public $asunto;

    #[Validate('required', as: 'descripcion de echos')]
    public $descripcion_echos;

    public $derechos_estimen_afectados, $quejado_id;

    public $facultades;

    

    public function mount(){
        $this->obj_quejado = new Quejado();
        $data = $this->obj_quejado->obtener_denuncia_x_editar($this->id_denuncia);
        
        $this->nombres_q = $data[0]->nombres;
        $this->apellidos_q = $data[0]->apellidos;
        $this->telefono_q = $data[0]->telefono;
        $this->cargo = $data[0]->cargo;
        $this->oficina_administrativo = $data[0]->oficina_administrativo;
        $this->facultade_id = $data[0]->facultade_id;
        $this->asunto = $data[0]->asunto;
        $this->descripcion_echos = $data[0]->descripcion_echos;
        $this->derechos_estimen_afectados = $data[0]->derechos_estimen_afectados;
        $this->quejado_id = $data[0]->quejado_id;
        
        $this->facultades = Facultade::all();
    }

   

   
    
    public function save(){
        
        $this->validate();
        
        try {
            
            DB::beginTransaction();

            DB::table('quejados')
            ->where('id', $this->quejado_id)
            ->update([
                'nombres' => $this->nombres_q,
                'apellidos' => $this->apellidos_q,
                'telefono' => $this->telefono_q,
                'cargo' => $this->cargo,
                'oficina_administrativo' => $this->oficina_administrativo,
                'facultade_id' => $this->facultade_id
            ]);

            DB::table('denuncias')
            ->where('id', $this->id_denuncia)
            ->update([
                'asunto' => $this->asunto,
                'descripcion_echos' => $this->descripcion_echos,
                'derechos_estimen_afectados' => $this->derechos_estimen_afectados
            ]);
            $this->dispatch('denuncia_actualizada'); 

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
       

        $this->dispatch('denuncia_actualizada');
        
    }


    public function render()
    {
        return view('livewire.persona.actualizardenuncia');
    }
}
