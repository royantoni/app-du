<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Demandante extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'codigo', 'nombres', 'apellidos', 'domicilio', 'telefono', 'email', 'ecuela_profesionale_id'];

    public function ecuela_profesionale()
    {
        return $this->belongsTo(EcuelaProfesionale::class);
    }

    //Relacion de muchos a muchos
    public function quejados()
    {
        return $this->belongsToMany(Quejado::class, 'denuncias')->withPivot('asunto', 'descripcion_echos', 'derechos_estimen_afectados', 'pdf', 'word')->withTimestamps();
    }

    //CONSULTAS
    public function denuncias_demandante($email)
    {
        $denuncias = DB::table('demandantes')
            ->join('denuncias', 'demandantes.id', '=', 'denuncias.demandante_id')
            ->join('quejados', 'quejados.id', '=', 'denuncias.quejado_id')
            ->where('demandantes.email', '=', $email)
            ->select('denuncias.*', 'demandantes.nombres', 'demandantes.apellidos')
            ->get();
        return $denuncias;
    }



    public function buscar_denuncias_recibidas($search, $pagina)
    {
        $denuncias = DB::table('demandantes as dem')
            ->join('denuncias as den', 'dem.id', '=', 'den.demandante_id')
            ->join('quejados as q', 'q.id', '=', 'den.quejado_id')
            ->where(
                function ($query) use ($search) {
                    $query->where('den.estado', '=', 1)
                        ->orWhere('den.estado', '=', 2);
                }
            )
            ->where(function ($query) use ($search) {
                $query->where('dem.nombres', 'like', '%' . $search . '%')
                    ->orWhere('dem.apellidos', 'like', '%' . $search . '%');
            })
            ->select('den.*', 'dem.nombres', 'dem.apellidos')
            ->orderBy('den.created_at', 'desc')
            ->paginate($pagina);
        return $denuncias;
    }

    public function buscar_denuncias_aceptadas($search, $pagina)
    {
        $denuncias = DB::table('demandantes as dem')
            ->join('denuncias as den', 'dem.id', '=', 'den.demandante_id')
            ->join('expedientes as e', 'e.denuncia_id', '=', 'den.id')
            ->where(function ($query) use ($search) {
                $query->where('dem.nombres', 'like', '%' . $search . '%')
                    ->orWhere('dem.apellidos', 'like', '%' . $search . '%');
            })
            ->where('den.estado', '=', 3)
            ->select('den.*', 'dem.nombres', 'dem.apellidos', 'e.*', 'e.id as idexpediente')
            ->orderBy('den.created_at', 'desc')
            ->paginate($pagina);
        return $denuncias;
    }

    public function vista_general($id_denuncia)
    {
        $data = DB::table('demandantes as dem')
            ->join('denuncias as den', 'dem.id', '=', 'den.demandante_id')
            ->join('quejados as que', 'que.id', '=', 'den.quejado_id')
            ->join('documentos as doc', 'doc.denuncia_id', '=', 'den.id')
            ->leftJoin('ecuela_profesionales as ecu', 'ecu.id', 'dem.ecuela_profesionale_id')
            ->leftJoin('facultades as fac', 'ecu.facultade_id', '=', 'fac.id')
            ->where('den.id', $id_denuncia)
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
                'doc.nombre as dnombre',
                'doc.tipo as tipodoc',
                'doc.archivo'
            )
            ->get();
        return $data;
    }

    public function vista_mensajes(){
        $data = DB::table('demandantes as dem')
        ->join('denuncias as den', 'dem.id', '=', 'den.demandante_id')
        ->where('dem.email', '=', auth()->user()->email)
        ->where(function ($query) {
            $query->where('den.estado', 2)
            ->orWhere('den.estado', 3);
        })
        ->select('den.*')
        ->orderBy('den.created_at', 'desc')
        ->get();
        return $data;
    }

    public function obtener_dni_con_expediente($id_expediente){
        $data = DB::table('demandantes as dem')
        ->join('denuncias as den', 'dem.id', '=', 'den.demandante_id')
        ->join('expedientes as exp', 'den.id', '=', 'exp.denuncia_id')
        ->where('exp.id', '=', $id_expediente)
        ->select('dem.dni')
        ->get();
        
        return $data;
    }

    public function buscar_denuncias_aceptadas_de_user($search, $pagina)
    {
        $denuncias = DB::table('demandantes as dem')
            ->join('denuncias as den', 'dem.id', '=', 'den.demandante_id')
            ->join('expedientes as e', 'e.denuncia_id', '=', 'den.id')
            ->where(function ($query) use ($search) {
                $query->where('dem.nombres', 'like', '%' . $search . '%')
                    ->orWhere('dem.apellidos', 'like', '%' . $search . '%');
            })
            ->where('den.estado', '=', 3)
            ->where('dem.email', '=', auth()->user()->email)
            ->select('den.*', 'dem.nombres', 'dem.apellidos', 'e.*', 'e.id as idexpediente')
            ->orderBy('den.created_at', 'desc')
            ->paginate($pagina);
        return $denuncias;
    }



}
