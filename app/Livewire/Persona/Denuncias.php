<?php

namespace App\Livewire\Persona;

use App\Models\Demandante;
use App\Models\Facultade;
use App\Models\Quejado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Denuncias extends Component
{
    public $accion = "nuevo";
    public $demandantemodel;

    
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

    public $derechos_estimen_afectados, $pdf_path, $word_path, $demandante_id, $quejado_id;
    public $nombre, $tipo, $archivo, $denuncia_id;
    public $facultades;

    

    public function mount(){
        $this->determinar_accion();
        $this->facultades = Facultade::all();
    }

    public function determinar_accion()
    {

        $demandante = Demandante::where('email', auth()->user()->email)->get();


        if (count($demandante) > 0) {
            $this->accion = 'yaexiste';
            $this->demandantemodel = Demandante::find($demandante[0]['id']);
        } else {
            $this->accion = "nuevo";
        }
    }
   

   
    
    public function save(){
        
        $this->validate();
        
        try {
            
            DB::beginTransaction();

            
            $quejado  =Quejado::create([
                'nombres' => $this->nombres_q,
                'apellidos' => $this->apellidos_q,
                'telefono' => $this->telefono_q,
                'cargo' => $this->cargo,
                'oficina_administrativo' => $this->oficina_administrativo,
                'facultade_id' => $this->facultade_id
            ]);

            //Insertando datos a la tabla intermedia
            $this->demandantemodel->quejados()->attach($quejado->id, [
                'asunto' => $this->asunto,
                'descripcion_echos' => $this->descripcion_echos,
                'derechos_estimen_afectados' => $this->derechos_estimen_afectados
            ]);
            $this->dispatch('denuncia_creada'); 

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
       

        
        
    }

    public function render()
    {
        
        return view('livewire.persona.denuncias');
    }
}
