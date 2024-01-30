<?php

namespace App\Http\Controllers;

use App\Models\EcuelaProfesionale;
use App\Http\Requests\StoreEcuelaProfesionaleRequest;
use App\Http\Requests\UpdateEcuelaProfesionaleRequest;

class EcuelaProfesionaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecuela_profesionales = EcuelaProfesionale::all();
        return response()->json($ecuela_profesionales);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEcuelaProfesionaleRequest $request)
    {
        $ecuela_profesionale = new EcuelaProfesionale();
        $ecuela_profesionale->nombre = $request->nombre;
        $ecuela_profesionale->sede = $request->sede;
        $ecuela_profesionale->sigla = $request->sigla;
        $ecuela_profesionale->facultade_id = $request->facultade_id;
        $ecuela_profesionale->save();

        $data = [
            'msg' => 'Escuela profesional creada',
            'ecuela_profesionale' => $ecuela_profesionale
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(EcuelaProfesionale $ecuelaProfesionale)
    {
        return response()->json($ecuelaProfesionale);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EcuelaProfesionale $ecuelaProfesionale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEcuelaProfesionaleRequest $request, EcuelaProfesionale $ecuelaProfesionale)
    {
        $ecuelaProfesionale->nombre = $request->nombre;
        $ecuelaProfesionale->sede = $request->sede;
        $ecuelaProfesionale->sigla = $request->sigla;
        $ecuelaProfesionale->facultade_id = $request->facultade_id;
        $ecuelaProfesionale->save();

        $data = [
            'msg' => 'Escuela profesional actualizada',
            'ecuela_profesionale' => $ecuelaProfesionale
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EcuelaProfesionale $ecuelaProfesionale)
    {
        $ecuelaProfesionale->delete();
        $data = [
            'msg' => 'Escuela profesional eliminada',
            'ecuela_profesionale' => $ecuelaProfesionale
        ];
        
        return response()->json($data);
    }
}
