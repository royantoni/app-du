<?php

namespace App\Http\Controllers;

use App\Models\Facultade;
use App\Http\Requests\StoreFacultadeRequest;
use App\Http\Requests\UpdateFacultadeRequest;

class FacultadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obj_facultad = new Facultade();
        $data = $obj_facultad->mostrar_todo();
        return view('facultad.index', compact('data'));
        /* $facultades = Facultade::all();
        return response()->json($facultades); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facultad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultadeRequest $request)
    {
        
        Facultade::create($request->only('nombre'));       
        return redirect()->route('admin.facultades.create')->with('success', 'Facultad registrada');
        


        /* $facultade = new Facultade();
        $facultade->nombre = $request->nombre;
        $facultade->save();

        $data = [
            'msg' => 'Facultad creada',
            'facultad' => $facultade
        ];

        return response()->json($data); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Facultade $facultade)
    {
        return view('facultad.show', compact('facultade'));
        /* return response()->json($facultade); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facultade $facultade)
    {
        return view('facultad.edit', compact('facultade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultadeRequest $request, Facultade $facultade)
    {

        $facultade->update([
            $facultade->nombre = $request->nombre
        ]);

        return redirect()->route('admin.facultades.edit', $facultade)->with('success', 'Facultad actualizada');

        /* $facultade->nombre = $request->nombre;
        $facultade->save();
        $data = [
            'msg' => 'Facultad Actualizada',
            'facultad' => $facultade
        ];

        return response()->json($data); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facultade $facultade)
    {
        $facultade->delete();
        return redirect()->route('admin.facultades.index')->with('success', 'Facultad eliminada');

        /* $data = [
            'msg' => 'Facultad eliminada',
            'facultad' => $facultade
        ];

        return response()->json($data); */
    }
}
