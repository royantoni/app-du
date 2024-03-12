<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Quejado extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellidos', 'telefono', 'cargo', 'oficina_administrativo', 'facultade_id'];

    //Relacion de muchos a muchos
    public function demandantes(){
        return $this->belongsToMany(Demandante::class);
    }

    public function obtener_denuncia_x_editar($id_denuncia){
        $data = DB::table('denuncias as den')
        ->join('quejados as que', 'den.quejado_id', '=', 'que.id')
        ->where('den.id', '=', $id_denuncia)
        ->get();

        return $data;
    }
}
