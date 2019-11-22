








@extends('layouts.app')
@section('content') 

<?php  // Tests de connexion et type de compte, et redirection dans le cas contraire
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 }   
 if (isset($_SESSION['login'])) // Login de l'utilisateur connecté (son adresse e-mail). Puur récupérer son id il faudra une requête.
 {
    if ($_SESSION['type']!=1) // 1 si l'utilisateur connecté est l'enseignant, 2 pour l'étudiant
    {
      header('Location: /etud');
      exit;
    }
 }
 else
 {
   header('Location: /connexion');
   exit;
 }
 ?>



<div class="container" >
        <h1><center> Gestion des absences</center></h1>
        <br>

      </div>

@endsection

