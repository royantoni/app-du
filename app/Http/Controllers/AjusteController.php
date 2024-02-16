<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AjusteController extends Controller
{
    public function edit(User $user)
    {
        
        return view('ajustes.edit_admin', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        
        $user->update([
            $user->name = $request->name,
            $user->lastname = $request->lastname
        ]);

        return redirect()->route('admin.ajuste.datos.update', $user)->with('success', 'Administrador actualizado');

       
    }
}
