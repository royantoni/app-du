<?php

namespace App\Livewire\Persona;

use App\Models\Demandante;
use App\Models\EcuelaProfesionale;
use App\Models\Facultade;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Actualizardatos extends Component
{

    public $accion = "nuevo";
    private $demandante;

    public $demandantemodel;



    //Validación para demandantes 
    
    public $dni;

    #[Validate('max:8')]
    public $codigo;

    #[Validate('required')]
    public $nombres;

    #[Validate('required')]
    public $apellidos;

    #[Validate('required')]
    public $domicilio;

    #[Validate('required|max:9')]
    public $telefono;

   
    public $email;
    public $tipo = null;


    public $ecuela_profesionale_id = null;

    public $facultades, $facultade_id = null, $escuelas;



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
            ]
        ];
    }





    public function mount()
    {
        $this->determinar_accion();
        $this->facultades = Facultade::all();
        $this->escuelas = collect();
        $this->email = auth()->user()->email;
    }

    public function determinar_accion()
    {

        $this->demandante = Demandante::where('email', auth()->user()->email)->get();


        if (count($this->demandante) > 0) {
            $this->accion = 'yaexiste';
            $this->demandantemodel = Demandante::find($this->demandante[0]['id']);
            $this->asignar_datos();
        } else {
            $this->accion = "nuevo";
        }
    }

    public function asignar_datos()
    {
        $this->dni = $this->demandante[0]['dni'];
        $this->codigo =  $this->demandante[0]['codigo'];
        $this->nombres =  $this->demandante[0]['nombres'];
        $this->apellidos =  $this->demandante[0]['apellidos'];
        $this->domicilio =  $this->demandante[0]['domicilio'];
        $this->telefono =  $this->demandante[0]['telefono'];
        $this->tipo =  $this->demandante[0]['tipo'];
        $this->ecuela_profesionale_id = $this->demandante[0]['ecuela_profesionale_id'];
    }


    public function updatedFacultadeId($value)
    {
        $this->escuelas = EcuelaProfesionale::where('facultade_id', $value)->get();
        $this->ecuela_profesionale_id =  null;
    }

    public function save()
    {
        


        $this->validate();

        try {

            DB::beginTransaction();



            if ($this->accion == "yaexiste") {


                $this->demandantemodel->dni = $this->dni;
                $this->demandantemodel->codigo = $this->codigo;
                $this->demandantemodel->nombres = $this->nombres;
                $this->demandantemodel->apellidos = $this->apellidos;
                $this->demandantemodel->domicilio = $this->domicilio;
                $this->demandantemodel->telefono = $this->telefono;
                $this->demandantemodel->email = $this->email;
                $this->demandantemodel->tipo = $this->tipo;
                $this->demandantemodel->ecuela_profesionale_id = $this->ecuela_profesionale_id;
                $this->demandantemodel->save();                
                $this->dispatch('demandante_actualizada');              
            } else {
                Demandante::create(
                    $this->only('dni', 'codigo', 'nombres', 'apellidos', 'domicilio', 'telefono', 'email', 'ecuela_profesionale_id', 'tipo')
                );                
                $this->dispatch('demandante_creada');
               
            }







            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    public function render()
    {
        return view('livewire.persona.actualizardatos');
    }
}
