






@extends('layouts.app')
@section('content')

<?php // echo "Interface etudiant. Connecté : ";
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 }   
 if (isset($_SESSION['login']))
 {
    if ($_SESSION['type']!=2)
    {
      header('Location: /prof');
      exit;
    }
 }
 else
 {
   header('Location: /connexion');
   exit;
 }
 ?>
<div id="app"></div>

@endsection

