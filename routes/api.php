<?php

use App\Http\Controllers\DemandanteController;
use App\Http\Controllers\EcuelaProfesionaleController;
use App\Http\Controllers\FacultadeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/facultades', [FacultadeController::class, 'index']);
Route::post('/facultades', [FacultadeController::class, 'store']);
Route::get('/facultades/{facultade}', [FacultadeController::class, 'show']);
Route::put('/facultades/{facultade}', [FacultadeController::class, 'update']);
Route::delete('/facultades/{facultade}', [FacultadeController::class, 'destroy']);

Route::get('/escuela_profesionales', [EcuelaProfesionaleController::class, 'index']);
Route::post('/escuela_profesionales', [EcuelaProfesionaleController::class, 'store']);
Route::get('/escuela_profesionales/{ecuelaProfesionale}', [EcuelaProfesionaleController::class, 'show']);
Route::put('/escuela_profesionales/{ecuelaProfesionale}', [EcuelaProfesionaleController::class, 'update']);
Route::delete('/escuela_profesionales/{ecuelaProfesionale}', [EcuelaProfesionaleController::class, 'destroy']);


Route::get('/demandantes', [DemandanteController::class, 'index']);