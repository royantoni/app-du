<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Archivo extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombrea', 'tipoa', 'archivoa', 'expediente_id'];


    //Consultas
    public function mostrar_archivos_por_expediente($id_expediente){
        $data = DB::table('archivos')
        ->where('expediente_id', '=', $id_expediente)
        ->orderBy('created_at', 'desc')
        ->get();

        return $data;
    }
}
