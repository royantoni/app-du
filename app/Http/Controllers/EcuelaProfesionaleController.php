<?php

namespace App\Http\Controllers;

use App\Models\EcuelaProfesionale;
use App\Http\Requests\StoreEcuelaProfesionaleRequest;
use App\Http\Requests\UpdateEcuelaProfesionaleRequest;
use App\Models\Facultade;

class EcuelaProfesionaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $obj_ecuela = new EcuelaProfesionale();
        $data = $obj_ecuela->mostrar_todo();
        return view('escuela.index', compact('data'));
        /* $ecuela_profesionales = EcuelaProfesionale::all();
        return response()->json($ecuela_profesionales); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datos = Facultade::all();
        return view('escuela.create', compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEcuelaProfesionaleRequest $request)
    {

        EcuelaProfesionale::create([
            'nombre' => $request->nombre,
            'sigla' => $request->sigla,
            'sede' => $request->sede,
            'facultade_id' => $request->facultade_id
        ]);
        return redirect()->route('admin.ecuela_profesionales.create')->with('success', 'Escuela registrada');
        /* $ecuela_profesionale = new EcuelaProfesionale();
        $ecuela_profesionale->nombre = $request->nombre;
        $ecuela_profesionale->sede = $request->sede;
        $ecuela_profesionale->sigla = $request->sigla;
        $ecuela_profesionale->facultade_id = $request->facultade_id;
        $ecuela_profesionale->save();

        $data = [
            'msg' => 'Escuela profesional creada',
            'ecuela_profesionale' => $ecuela_profesionale
        ];

        return response()->json($data); */
    }

    /**
     * Display the specified resource.
     */
    public function show(EcuelaProfesionale $ecuelaProfesionale)
    {
        return view('escuela.show', compact('ecuelaProfesionale'));
        /* return response()->json($ecuelaProfesionale); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EcuelaProfesionale $ecuelaProfesionale)
    {
        $datos = Facultade::all();
        return view('escuela.edit', compact('ecuelaProfesionale', 'datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEcuelaProfesionaleRequest $request, EcuelaProfesionale $ecuelaProfesionale)
    {
       
        $ecuelaProfesionale->update([
            $ecuelaProfesionale->nombre = $request->nombre,
            $ecuelaProfesionale->sigla = $request->sigla,
            $ecuelaProfesionale->sede = $request->sede,
            $ecuelaProfesionale->facultade_id = $request->facultade_id
        ]);

       
        return redirect()->route('admin.ecuela_profesionales.edit', $ecuelaProfesionale)->with('success', 'Facultad actualizada');


        /* $ecuelaProfesionale->nombre = $request->nombre;
        $ecuelaProfesionale->sede = $request->sede;
        $ecuelaProfesionale->sigla = $request->sigla;
        $ecuelaProfesionale->facultade_id = $request->facultade_id;
        $ecuelaProfesionale->save();

        $data = [
            'msg' => 'Escuela profesional actualizada',
            'ecuela_profesionale' => $ecuelaProfesionale
        ];

        return response()->json($data); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EcuelaProfesionale $ecuelaProfesionale)
    {
        $ecuelaProfesionale->delete();
        return redirect()->route('admin.ecuela_profesionales.index')->with('success', 'Escuela eliminada');

        /* $ecuelaProfesionale->delete();
        $data = [
            'msg' => 'Escuela profesional eliminada',
            'ecuela_profesionale' => $ecuelaProfesionale
        ];

        return response()->json($data); */
    }
}
