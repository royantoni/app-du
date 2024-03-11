<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo', 'archivo', 'denuncia_id'];


    //Consultas

    public function mostrar_documentos_por_denuncia($id_denuncia){
        $data = DB::table('documentos')
        ->where('denuncia_id', '=', $id_denuncia)
        ->orderBy('created_at', 'desc')
        ->get();

        return $data;
    }
    
}
