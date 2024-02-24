<?php

namespace App\Livewire\Persona;

use App\Models\Demandante;
use App\Models\Documento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

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
            

            if (count($this->archivos) == 0) {
                $this->dispatch('no_hay_archivos');
            }else{
                foreach ($this->archivos as $file) {
                
                    $this->guardar_en_disco($file);
                    Documento::create([
                        'nombre' => $this->nombre,
                        'tipo' => $file->extension(),
                        'archivo' => $this->archivo,
                        'denuncia_id' => $this->id_denuncia
                    ]); 
                   
                }               
                $this->dispatch('archivo_creado');
            }
           
            DB::commit();
             
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
       
       
        
        
    }

    


    public function guardar_en_disco($file){

        $this->nombre = $file->getClientOriginalName();
        $nombre_unico = Str::uuid() . '.' . $file->getClientOriginalExtension();
        // Guarda el archivo con el nombre único en el disco puplic
        $this->archivo = $file->storeAs('adjuntos/'.$this->dni, $nombre_unico, 'public');        

    }




    


    public function render()
    {
        return view('livewire.persona.adjuntar');
    }
}
