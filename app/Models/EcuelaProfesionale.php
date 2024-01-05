<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
