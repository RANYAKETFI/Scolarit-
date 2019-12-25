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


Route::put('/prof/s/{id_seance}/{id_etudiant}/{abs}','SeanceController@postSeanceEtudiant')->middleware('cors');
Route::get('/prof/s/{id_seance}','SeanceController@getEtudiants')->middleware('cors');
Route::get('/prof','EnseignantController@getGroupes')->middleware('cors');
Route::post('/prof','EnseignantController@getGroupes')->middleware('cors');
Route::get('/prof/{id_groupe}','EnseignantController@getSeancesGroupe')->middleware('cors');
Route::post('/prof/{id_groupe}','EnseignantController@getSeancesGroupe')->middleware('cors');


Route::get('/compte','CompteController@getInfo')->middleware('cors');
Route::get('/etud','EtudiantController@absences_etudiant')->middleware('cors');
Route::post('/etud','EtudiantController@absences_etudiant')->middleware('cors');
Route::get('/etud','EtudiantController@absences_etudiant')->middleware('cors');
Route::post('/connexion','ConnexionController@connecter')->middleware('cors');




