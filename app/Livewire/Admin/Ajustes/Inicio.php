<?php

namespace App\Livewire\Admin\Ajustes;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Inicio extends Component
{
    public $buscador;
    public $obj_user;
    public $usuario = [];
    public $encontrado = 0;

    public $email;
    public $nombres;
    public $apellidos;
    public $privilegio = 3;
    public $fecha_creacion;

    public function buscar_usuario(){
        $this->obj_user = new User();
        $this->usuario = $this->obj_user->buscar_user($this->buscador);
        $this->encontrado = count($this->usuario);

        if ($this->encontrado > 0) {
            $this->email = $this->usuario[0]->email;
            $this->nombres = $this->usuario[0]->name;
            $this->apellidos = $this->usuario[0]->lastname;
            $this->privilegio = $this->usuario[0]->privilegio;
            $this->fecha_creacion = $this->usuario[0]->created_at;
        }

        

    }

    public function save(){

        try {
            DB::table('users')
                ->where('email', $this->email)
                ->update([
                    'name' => $this->nombres, 
                    'lastname' => $this->apellidos,
                    'privilegio' => $this->privilegio
                ]);

            $this->dispatch('usuario_actualizado');
        } catch (\Throwable $th) {
            throw $th;
        }
        
        $this->resetear();
    }

    public function resetear(){
        $this->reset('buscador');
        $this->reset('usuario');
        $this->reset('encontrado');
        $this->reset('nombres'); 
        $this->reset('apellidos'); 
        $this->reset('privilegio'); 
        $this->reset('fecha_creacion');  
    }

    


    public function render()
    {
        return view('livewire.admin.ajustes.inicio');
    }
}
