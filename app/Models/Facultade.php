<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Facultade extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    //Relación de uno a muchos (una facultad puede tener muchas escuelas profesionales)
    public function ecuela_profesionales(){
        return $this->hasMany(EcuelaProfesionale::class);
    }

    //Consultas utilizadas
    public function mostrar_todo(){
        $data = DB::table('facultades')->get();
        return $data;
    }
    

}
