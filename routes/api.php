<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ens/s/{id_seance}','SeanceController@getEtudiants');
Route::put('/ens/s/{id_seance}/{id_etudiant}/{abs}','SeanceController@postSeanceEtudiant');
Route::get('/ens/{id_enseignant}','EnseignantController@getGroupes');
Route::get('/ens/{id_enseignant}/{id_groupe}','EnseignantController@getSeancesGroupe');

