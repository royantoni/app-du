<?php

namespace App\Livewire\Admin\Expediente;

use App\Models\Archivo;
use App\Models\Demandante;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class Subirfile extends Component
{
    use WithFileUploads;

    public $obj_demandante;
    public $id_expediente;
    public $dni;



    public $nombre;
    public $archivo;
    public $archivos = [];

    public $archivos_tabla = [];
    public $obj_archivo;
    public $id_archivo;
    public $ruta_archivo;

    public $nombre_nuevo;

    public function mount()
    {

        //Se recupera el DNI del demandante para crear su carpeta expediente
        $this->obj_demandante = new Demandante();
        $demandante = $this->obj_demandante->obtener_dni_con_expediente($this->id_expediente);
        $this->dni = $demandante[0]->dni;

        //Recuperar los archivos del expediente y asignarlos a un array
        $this->obj_archivo = new Archivo();
        $this->archivos_tabla = $this->obj_archivo->mostrar_archivos_por_expediente($this->id_expediente);
    }

    public function save()
    {

        try {
            DB::beginTransaction();

            //Verifica si se subieron al menos un archivo
            if (count($this->archivos) == 0) {
                $this->dispatch('no_hay_archivos');
            } else {
                foreach ($this->archivos as $file) {
                    //Metodo que nos permite guardar dicho archivo en el disco
                    $this->guardar_en_disco($file);

                    //Almacenando datos del archivo en la base de datos
                    Archivo::create([
                        'nombrea' => $this->nombre,
                        'tipoa' => $file->getClientOriginalExtension(),
                        'archivoa' => $this->archivo,
                        'expediente_id' => $this->id_expediente
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




    public function guardar_en_disco($file)
    {
        $this->nombre = $file->getClientOriginalName(); //Asignando el nombre original del archivo
        $nombre_unico = Str::uuid() . '.' . $file->getClientOriginalExtension(); //Generando nombre único de nuestro archivo para guardar en disco public
        $this->archivo = $file->storeAs('expedientes/' . $this->dni, $nombre_unico, 'public'); //Asignnado la ruta del archivo único creado que se guardará en el disco public
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


            Archivo::destroy($this->id_archivo);
        } catch (\Throwable $th) {
            //throw $th;
        }

        return to_route('admin.expediente.subir', $this->id_expediente);
    }



    public function render()
    {
        return view('livewire.admin.expediente.subirfile');
    }
}
