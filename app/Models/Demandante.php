<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}
