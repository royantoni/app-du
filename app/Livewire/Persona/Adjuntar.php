<?php

namespace App\Livewire\Persona;

use App\Models\Demandante;
use App\Models\Documento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Adjuntar extends Component
{
    use WithFileUploads;

    public $id_denuncia;
    public $dni;


    public $nombre;
    public $archivo;
    public $archivos = [];

    public function mount(){
        $demandante = Demandante::where('email', '=', auth()->user()->email)->get();
        $this->dni = $demandante[0]['dni'];       
    }

    public function save(){

        try {
            DB::beginTransaction();
            foreach ($this->archivos as $file) {
                $this->guardar_en_disco($file);
                Documento::create([
                    'nombre' => $this->nombre,
                    'tipo' => $file->extension(),
                    'archivo' => $this->archivo,
                    'denuncia_id' => $this->id_denuncia
                ]); 
               
            }
            DB::commit();
            $this->dispatch('archivo_creado'); 
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
       
       
        
        
    }

    


    public function guardar_en_disco($file){

        $this->nombre = $file->getClientOriginalName();
        $this->archivo = $file->store('adjuntos/'.$this->dni, 'public');        
    }




    


    public function render()
    {
        return view('livewire.persona.adjuntar');
    }
}
