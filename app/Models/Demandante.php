<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Demandante extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'codigo', 'nombres', 'apellidos', 'domicilio', 'telefono', 'email', 'ecuela_profesionale_id'];

    public function ecuela_profesionale(){
        return $this->belongsTo(EcuelaProfesionale::class);
    }

    //Relacion de muchos a muchos
    public function quejados(){
        return $this->belongsToMany(Quejado::class, 'denuncias')->withPivot('asunto', 'descripcion_echos', 'derechos_estimen_afectados', 'pdf', 'word')->withTimestamps();
    }

    //CONSULTAS
    public function denuncias_demandante($email){
        $denuncias = DB::table('demandantes')
        ->join('denuncias', 'demandantes.id', '=', 'denuncias.demandante_id')
        ->join('quejados', 'quejados.id', '=', 'denuncias.quejado_id')
        ->where('demandantes.email', '=', $email)
        ->select('denuncias.*', 'demandantes.nombres', 'demandantes.apellidos')
        ->get();
        return $denuncias;
    }
    
}
