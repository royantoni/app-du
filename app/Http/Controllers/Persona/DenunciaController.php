<?php

namespace App\Http\Controllers\Persona;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    public function index(){
        return view('persona.index');
    }
    public function lista(){
        return view('persona.lista');
    }
    public function adjuntar($id_denuncia){
        return view('persona.upload', ['id_denuncia' => $id_denuncia]);
    }
    public function generar_word($id_denuncia){
        return view('persona.word', ['id_denuncia' => $id_denuncia]);
    }
    public function actualizar_datos(){
        return view('persona.actualizar_datos');
    }

    public function subir_firma(){
        return view('persona.firma');
    }
}
