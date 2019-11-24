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


Route::put('/prof/s/{id_seance}/{id_etudiant}/{abs}','SeanceController@postSeanceEtudiant');
Route::get('/prof/s/{id_seance}','SeanceController@getEtudiants');
Route::get('/prof','EnseignantController@getGroupes');
Route::get('/prof/{id_groupe}','EnseignantController@getSeancesGroupe');

Route::get('/compte','CompteController@getInfo');
Route::get('/etud','EtudiantController@absences_etudiant');
Route::post('/connexion','ConnexionController@connecter');




