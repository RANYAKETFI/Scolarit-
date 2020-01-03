<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CompteController extends Controller
{
    public function afficher()  
    {
        return view('compte');
    }


    public function modifier()
    {
        $erreur="ok";
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $nv_email=request()->input('email');
        $nv_mdp= request()->input('mdp');
        $nv_nom= request()->input('nom');
        $nv_prenom=request()->input('prenom');
        if (($_SESSION['type'])==1) $table='enseignants' ; else $table='etudiants';
        $ancien_email=$_SESSION['login'];
        $ancien_nom= DB::table($table)->where('login', $_SESSION['login'])->select('nom')->get()->first()->nom;
        $ancien_prenom= DB::table($table)->where('login', $_SESSION['login'])->select('prenom')->get()->first()->prenom;

        if ((!empty($nv_email))&&($nv_email!=$ancien_email))
        {
            $tester_existence1=DB::table('enseignants')->where('login', $nv_email)->select('login')->get()->first();
            $tester_existence2=DB::table('etudiants')->where('login', $nv_email)->select('login')->get()->first();
            if (!empty($tester_existence1)||(!empty($tester_existence2)))
            {
                $erreur="Adresse e-mail existante.";
            }
            else
            {
                DB::table($table)->where('login', $ancien_email)->update(['login' => $nv_email]);
                $_SESSION['login']=$nv_email;
            }
            

        }
        if ($erreur!="ok")
        {
            return view('compte')->with('erreur', $erreur);
        }
       
        if (!empty($nv_mdp))
        {
            DB::table($table)->where('login', $_SESSION['login'])->update(['mdp' => $nv_mdp]);
        }

        if ((!empty ($nv_nom))&&($nv_nom!=$ancien_nom))
        {
            DB::table($table)->where('login', $_SESSION['login'])->update(['nom' => $nv_nom]);
        }

        if ((!empty ($nv_prenom))&&($nv_prenom!=$ancien_prenom))
        {
            DB::table($table)->where('login', $_SESSION['login'])->update(['prenom' => $nv_prenom]);
        }
        if ($erreur=="ok")
        {
            $erreur="Modifications effectuées avec succès";
        }
             return view('compte')->with('erreur', $erreur);
       
      
        
    }

    public function getInfo()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }   
        if (!isset($_SESSION['login'])) // Login de l'utilisateur connecté (son adresse e-mail). Puur récupérer son id il faudra une requête.
        {
        
        header('Location: /connexion');
        exit;
        }
        if (!isset ($erreur))
        {
            $erreur=NULL;
        }
        if ($_SESSION['type']==2)
        {
            $nom= DB::table('etudiants')->where('login', $_SESSION['login'])->select('nom')->get()->first()->nom;
            $prenom= DB::table('etudiants')->where('login', $_SESSION['login'])->select('prenom')->get()->first()->prenom;
        }
        else
        {
            $nom= DB::table('enseignants')->where('login', $_SESSION['login'])->select('nom')->get()->first()->nom;
            $prenom= DB::table('enseignants')->where('login', $_SESSION['login'])->select('prenom')->get()->first()->prenom;
        }

        return [
            "nom" => $nom,
            "prenom" => $prenom,
            "login" => $_SESSION['login'],
        ];


    }
}
