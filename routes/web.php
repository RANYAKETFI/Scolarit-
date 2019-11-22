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

Route::get('/prof',function(){
   return view('InterfaceProf');
  
});


/*
Route::get('/etud',function(){
    return view('InterfaceEtud');
});
*/


//Route::get('/etud/{id_etud}','EtudiantController@absences_etudiant');

Route::get('/etud','EtudiantController@absences_etudiant');

Route::get('/compte', 'CompteController@afficher');
Route::post('/compte', 'CompteController@modifier');
