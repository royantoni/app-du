<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quejado extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellidos', 'telefono', 'cargo', 'oficina_administrativo'];

    //Relacion de muchos a muchos
    public function demandantes(){
        return $this->belongsToMany(Demandante::class);
    }
}
