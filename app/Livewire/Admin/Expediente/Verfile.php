<?php

namespace App\Livewire\Admin\Expediente;

use App\Models\Expediente;
use Livewire\Component;

class Verfile extends Component
{

    public $id_expediente;

    public $obj_expediente;
    public $datos;

    //DATOS EN LA VISTA
    public $dni, $codigo, $nombres_demandante, $domicilio, $telefono_demandante, $email, $tipo_demandante;
    public $asunto, $descripcion, $word, $fecha_denuncia;
    public $quejado, $telefono_quejado, $cargo, $oficina;
    public $carrera, $sigla, $sede, $facultad;
    public $numero_expediente, $estado_exp, $comentario;

    public $imagenes = [];
    public $documentos = [];

  

    public function mount()
    {

        $this->obj_expediente = new Expediente();
        $data = $this->obj_expediente->obtener_adjuntos_del_demandante($this->id_expediente);
       /*  dd($data); */

        $this->datos = $this->obj_expediente->vista_general_expediente($this->id_expediente);
        dd($this->datos);

        $this->dni = $this->datos[0]->dni;
        $this->codigo = $this->datos[0]->codigo;
        $this->nombres_demandante = $this->datos[0]->nombres . ' ' . $this->datos[0]->apellidos;
        $this->domicilio = $this->datos[0]->domicilio;
        $this->telefono_demandante = $this->datos[0]->telefono;
        $this->email = $this->datos[0]->email;
        $this->tipo_demandante = $this->datos[0]->tipo;
        

        $this->asunto = $this->datos[0]->asunto;
        $this->descripcion = $this->datos[0]->descripcion_echos;
        $this->word = $this->datos[0]->word;
        $this->fecha_denuncia = $this->datos[0]->fdenuncia;

        $this->quejado = $this->datos[0]->qnombres . ' ' . $this->datos[0]->qapellidos;
        $this->telefono_quejado = $this->datos[0]->qtelefono;
        $this->cargo = $this->datos[0]->cargo;
        $this->oficina = $this->datos[0]->oficina_administrativo;

        $this->carrera = $this->datos[0]->nombre;
        $this->sigla = $this->datos[0]->sigla;
        $this->sede = $this->datos[0]->sede;
        $this->facultad = $this->datos[0]->facultad;

        foreach ($this->datos as $valor) {
            if ($valor->tipoa == "png" || $valor->tipoa == "jpg" || $valor->tipoa == "jpeg") {
                $this->imagenes[] = [$valor->nombrea, $valor->archivoa];
            }
            if ($valor->tipoa == "docx" || $valor->tipoa == "pdf" || $valor->tipoa == "txt") {
                $this->documentos[] = [$valor->nombrea, $valor->archivoa, $valor->tipoa];
            }
            
        }

        $expediente = Expediente::find($this->id_expediente);
        $this->numero_expediente = $expediente->numeroexp;

        /* dd($this->imagenes[0][0]); */
    }
    public function descargar_documento($tipo, $archivo, $nombre)
    {
        if ($tipo == "pdf") {
            try {


                return response()->download(public_path('storage/' . $archivo), $nombre);
            } catch (\Throwable $th) {
                dd($th->getMessage());
                throw $th;
            }
        }
        if ($tipo == "docx") {
            try {
                $headers = [
                    "Content-Type: application/octet-stream"
                ];

                return response()->download(public_path('storage/' . $archivo), $nombre, $headers);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }


    public function render()
    {
        return view('livewire.admin.expediente.verfile');
    }
}
