<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expediente extends Model
{
    use HasFactory;

    //CONSULTAS

    public function vista_general_expediente($id_expediente)
    {
        $data = DB::table('demandantes as dem')
            ->join('denuncias as den', 'dem.id', '=', 'den.demandante_id')
            ->join('quejados as que', 'que.id', '=', 'den.quejado_id')
            ->join('expedientes as exp', 'exp.denuncia_id', '=', 'den.id')
            ->leftJoin('archivos as arc', 'arc.expediente_id', '=', 'exp.id')
            ->leftJoin('ecuela_profesionales as ecu', 'ecu.id', 'dem.ecuela_profesionale_id')
            ->leftJoin('facultades as fac', 'ecu.facultade_id', '=', 'fac.id')
            ->where('exp.id', $id_expediente)
            ->select(
                'dem.*',
                'dem.created_at as fdemandante',
                'den.*',
                'den.created_at as fdenuncia',
                'que.nombres as qnombres',
                'que.apellidos as qapellidos',
                'que.telefono as qtelefono',
                'que.cargo',
                'que.oficina_administrativo',
                'ecu.*',
                'fac.nombre as facultad',
                'arc.nombrea',
                'arc.tipoa',
                'arc.archivoa'
            )
            ->get();
        return $data;
    }

    public function obtener_adjuntos_del_demandante($id_expediente){
        $data = DB::table('denuncias as den')
        ->join('expedientes as exp', 'exp.denuncia_id', 'den.id')
        ->leftJoin('documentos as doc', 'doc.denuncia_id', 'den.id')
        ->where('exp.id', '=', $id_expediente)
        ->get();

        return $data;
    }


}
