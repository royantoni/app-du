<?php

namespace App\Livewire\Admin\Presencial;

use App\Models\Demandante;
use App\Models\Expediente;
use App\Models\Quejado;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

class Createexpediente extends Component
{

    public $demandantemodel;

    //Validación para demandantes 

    public $dni;
    public $codigo;
    public $email;



    #[Validate('required')]
    public $nombres;

    #[Validate('required')]
    public $apellidos;


    #[Validate('required|max:9')]
    public $telefono;



    //Validacion par quejados

    #[Validate('required', as: 'nombre')]
    public $nombres_q;

    #[Validate('required', as: 'apellido')]
    public $apellidos_q;



    #[Validate('required')]
    public $asunto;

    #[Validate('required', as: 'descripcion de echos')]
    public $descripcion_echos;

    public $derechos_estimen_afectados, $pdf_path, $word_path, $demandante_id, $quejado_id;
    public $nombre, $tipo, $archivo, $denuncia_id;
    public $facultades;





    public function rules()
    {
        return [
            'dni' => [
                'required',
                'min:8',
                'max:8',
                Rule::unique('demandantes')->ignore($this->demandantemodel),
            ],
            'email' => [
                'required',
                Rule::unique('demandantes')->ignore($this->demandantemodel),
            ],
            'codigo' => [
                'max:8',
                Rule::unique('demandantes')->ignore($this->demandantemodel),
            ]
        ];
    }






    public function save()
    {

        $this->validate();

        try {

            DB::beginTransaction();

            $demandante = Demandante::create(
                [
                    'dni' => $this->dni,
                    'codigo' => $this->codigo,
                    'nombres' => $this->nombres,
                    'apellidos' => $this->apellidos,
                    'telefono' => $this->telefono,
                    'email' => $this->email,
                ]
            );

            $this->demandantemodel = Demandante::find($demandante->id);


            $quejado  = Quejado::create([
                'nombres' => $this->nombres_q,
                'apellidos' => $this->apellidos_q,
            ]);

            //Insertando datos a la tabla intermedia
            $this->demandantemodel->quejados()->attach($quejado->id, [
                'asunto' => $this->asunto,
                'descripcion_echos' => $this->descripcion_echos,
                'estado' => 3
            ]);

            
            $id_denuncia = DB::table('denuncias')->latest()->value('id');

            

            //Creando expediente

            $numero_correlativo = "";
            

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

            $expediente->denuncia_id = $id_denuncia;
            $expediente->numeroexp = $numero_correlativo . "-" . Carbon::now()->year . "-DU-UNAMBA";

            // Guardar el nuevo registro en la base de datos
            $expediente->save();

            $this->dispatch('expediente_creado');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function render()
    {
        return view('livewire.admin.presencial.createexpediente');
    }
}
