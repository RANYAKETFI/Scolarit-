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

//Route::get('search', ['as' => 'search', 'uses' => 'SearchController@search']);

*//*
Route::get('/ens/{id_enseignant}',function(){
    return view('app');
});

/*
Route::get('ens/{id_enseignant}',function ($id_enseignant) {
    $ens= new EnseignantController($id_enseignant);
    return $ens->getGroupes();
});*/
/*
Route::get('/etud/{id_etud}','EtudiantController@absences_etudiant');
*/
Route::view('/prof/s/{seance?}', 'InterfaceProf');
//Route::view('/ens/{path?}', 'InterfaceProf');
//Route::view('/ens/{path?}/{gr?}', 'InterfaceProf');
Route::view('/prof', 'InterfaceProf');
Route::view('/prof/{path?}', 'InterfaceProf');




//Route::get('/etud/{id_etud}','EtudiantController@absences_etudiant');

//Route::get('/etud','EtudiantController@absences_etudiant');
Route::view('/etud','InterfaceEtud');

Route::get('/compte', 'CompteController@afficher');
Route::post('/compte', 'CompteController@modifier');
