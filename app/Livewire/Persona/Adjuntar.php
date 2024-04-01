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
    public $obj_documento;


    public $nombre;
    public $archivo;
    public $archivos = [];

    public $archivos_tabla = [];
    public $obj_archivo;
    public $id_archivo;
    public $ruta_archivo;

    public $nombre_nuevo;

    public $ruta_ver = "";
    public $tipo_archivo = "";

    public function mount(){
        $demandante = Demandante::where('email', '=', auth()->user()->email)->get();
        $this->dni = $demandante[0]['dni'];      
        
        $this->obj_documento = new Documento();
        $this->archivos_tabla = $this->obj_documento->mostrar_documentos_por_denuncia($this->id_denuncia);
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

    public function confirmar_eliminar_archivo($id_archivo, $ruta_archivo)
    {
        $this->id_archivo = $id_archivo;
        $this->ruta_archivo = $ruta_archivo;
        // Mostrar el cuadro de diálogo de SweetAlert
        $this->dispatch('confirmar_eliminacion');
    }

    public function eliminar_registro()
    {

        try {
            if (Storage::disk('public')->exists($this->ruta_archivo)) {
                Storage::disk('public')->delete($this->ruta_archivo);

                
            }
       
            Documento::destroy($this->id_archivo);
            $this->ruta_ver = "";
        } catch (\Throwable $th) {
            //throw $th;
        }

        $this->actualizar_la_tabla();
    }

    public function editar_file($id){
        $this->id_archivo = $id;
        $archivo = Documento::find($id);
        $this->nombre_nuevo = $archivo->nombre;
    }

    public function actualizar_file(){
        try {
            DB::table('documentos')
            ->where('id', $this->id_archivo)
            ->update(['nombre' => $this->nombre_nuevo]);
            $this->actualizar_la_tabla();

        } catch (\Throwable $th) {
            //throw $th;
        }
        $this->ruta_ver = "";
        
    }

   

    public function ver_archivo($id, $archivo){
        $this->ruta_ver = $archivo;
        $extensiones_imagen = ['jpg', 'jpeg', 'png', 'gif', 'bmp']; // Lista de extensiones de imagen
        $extension = Str::lower(pathinfo($this->ruta_ver, PATHINFO_EXTENSION)); // Obtener la extensión del archivo y convertirla a minúsculas
        if (in_array($extension, $extensiones_imagen)) {
            $this->tipo_archivo = "imagen";
        }else{
            $this->tipo_archivo = "";
        }        
       
    }
    
    public function actualizar_la_tabla(){
        $this->obj_documento = new Documento();
        $this->archivos_tabla = $this->obj_documento->mostrar_documentos_por_denuncia($this->id_denuncia);
    }




    


    public function render()
    {
        return view('livewire.persona.adjuntar');
    }
}
