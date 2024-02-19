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
}
