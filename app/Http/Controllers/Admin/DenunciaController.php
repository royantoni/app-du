<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DenunciaController extends Controller
{
    public function index(){
        return view('admin.denuncia.index');
    }

    public function verificar_soliciud($id_denuncia){
        return view('admin.denuncia.verificar', compact('id_denuncia'));
    }

    public function vista_general($id_denuncia){
        return view('admin.denuncia.vista', compact('id_denuncia'));
    }
    public function aceptada(){
        return view('admin.denuncia.aceptada');
    }

    //Modulo expediente

    public function subir_files($id_expediente){
        return view('admin.expediente.subir', compact('id_expediente'));
    }

    public function ver_files($id_expediente){
        return view('admin.expediente.ver', compact('id_expediente'));
    }
}
