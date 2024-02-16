<?php

use App\Http\Controllers\Admin\DenunciaController as AdminDenunciaController;
use App\Http\Controllers\AjusteController;
use App\Http\Controllers\EcuelaProfesionaleController;
use App\Http\Controllers\FacultadeController;
use App\Http\Controllers\Persona\DenunciaController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Denuncia;
use App\Models\Demandante;
use App\Models\EcuelaProfesionale;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    if (auth()->user()->privilegio == 2) {
        $cant_usuarios = count(User::where('privilegio', '=', '3')->get());
        $cant_denuncias = count(DB::table('denuncias')->get());
        
        return view('dashboard', compact('cant_usuarios', 'cant_denuncias'));
    }
    if (auth()->user()->privilegio == 3) {
        return view('userpanel');
    }  
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/* Rutas de administrador */

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){

});

/* Rutas del usuario */
Route::middleware('auth')->group(function () {
    Route::get('/persona', [DenunciaController::class, 'index'])->name('persona.index');
    Route::get('/persona/lista', [DenunciaController::class, 'lista'])->name('persona.lista');
    Route::get('/persona/adjuntar/{id_denuncia}', [DenunciaController::class, 'adjuntar'])->name('persona.adjuntar');
    Route::get('/persona/word/{id_denuncia}', [DenunciaController::class, 'generar_word'])->name('persona.word');
    Route::get('/persona/actualizar', [DenunciaController::class, 'actualizar_datos'])->name('persona.actualizar');
});

/* Rutas para el administrador */
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::resource('facultades', FacultadeController::class);
    Route::resource('ecuela_profesionales', EcuelaProfesionaleController::class);
    Route::get('denuncia', [AdminDenunciaController::class, 'index'])->name('denuncia.index');
    Route::get('ajustes/datos_admin/{user}', [AjusteController::class, 'edit'])->name('ajustes.datos_admin');
    Route::put('ajustes/datos_admin/{user}', [AjusteController::class, 'update'])->name('ajuste.datos.update');
});

