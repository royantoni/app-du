<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EcuelaProfesionale extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'sede', 'sigla', 'facultade_id'];

    // Relacion de muchos a uno (una o varias escuelas profesionales solamente pertenecen a una facultad)
    public function facultade(){
        return $this->belongsTo(Facultade::class);
    }
    
    public function demandantes(){
        return $this->hasMany(Demandante::class);
    }

     //Consultas utilizadas
     public function mostrar_todo(){
        $data = DB::table('facultades as f')
        ->join('ecuela_profesionales as ep', 'f.id', 'ep.facultade_id')
        ->select('ep.*', 'f.nombre as facultad')
        ->get();
        return $data;
    }
}
