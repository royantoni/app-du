<?php

namespace App\Livewire\Persona;

use App\Models\Demandante;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Firma extends Component
{
    use WithFileUploads;
    public $firma;
    public $id_demandante;
    public $dni;

    public $firma_anterior = null;

    public function mount(){
        $demandante = Demandante::where('email', '=', auth()->user()->email)->get();
        $this->id_demandante = $demandante[0]['id'];
        $this->dni = $demandante[0]['dni'];
        $this->firma_anterior = $demandante[0]['firma'];
       /*  dd($this->firma_anterior); */
              
    }

    public function save(){
        
        try {
            /* Creando un nombre a nuestro archivo */
            $nombre_archivo = $this->dni.'.'.$this->firma->extension();

            /* Verificar si existe algun archivo con el mismo nombre */ 
            $ruta = "";           
            if (Storage::disk('public')->exists('firmas/'.$nombre_archivo)) {
                Storage::disk('public')->delete('firmas/'.$nombre_archivo);
                $ruta = $this->firma->storeAs('firmas', $nombre_archivo, 'public');
            }else{
                $ruta = $this->firma->storeAs('firmas', $nombre_archivo, 'public');
            }

            $demandante = Demandante::find($this->id_demandante);
            $demandante->firma = $ruta;
            $demandante->save();
            $this->dispatch('firma_creada'); 
            
            
           
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
    
    public function render()
    {
        return view('livewire.persona.firma');
    }
}
