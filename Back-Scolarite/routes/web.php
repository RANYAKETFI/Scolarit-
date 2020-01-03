<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/connexion', 'ConnexionController@formulaire');
Route::post('/connexion', 'ConnexionController@traitement');
Route::get('/deconnexion', 'ConnexionController@deconnexion');
Route::get('/', 'ConnexionController@redirection');


Route::view('/prof/s/{seance?}', 'InterfaceProf');
Route::view('/prof', 'InterfaceProf');
Route::view('/prof/{path?}', 'InterfaceProf');


Route::view('/etud','InterfaceEtud');


Route::get('/compte', 'CompteController@afficher');
Route::post('/compte', 'CompteController@modifier');
