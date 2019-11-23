<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class ConnexionController extends Controller
{
    public function formulaire()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $_SESSION['a']='test';
        return view('login');
        
      
    }

    public function traitement()
    {
        
        $erreur="aucune";
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        $_SESSION['login']=NULL;
        $_SESSION['type']=NULL;
        $_SESSION['id']=NULL;
        
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $enseignant = DB::table('enseignants')->where('login', request()->input('email'))->select('login', 'mdp','id')->get();
    
        if (!($enseignant->isEmpty()))
        {
            
            if (request()->input('password')==$enseignant->first()->mdp)
            {
                $_SESSION['login']=$enseignant->first()->login;
                $_SESSION['id']=$enseignant->first()->id;
                $_SESSION['type']=1; // 1 pour enseignant.
                $erreur="ok";

            }
            else
            {
                $erreur="Mot de passe de l'enseignant incorrect.";
            }
        
        }
        else
        {
            if ($erreur!="ok")
            {
                $etudiant = DB::table('etudiants')->where('login', request()->input('email'))->select('login', 'mdp')->get();
                
                if (!($etudiant->isEmpty()))
                {

                    if (request()->input('password')==$etudiant->first()->mdp)
                    {
                        $_SESSION['login']=$etudiant->first()->login;
                        $_SESSION['type']=2; // 2 pour étudiant.
                        $erreur="ok";

                    }
                    else
                    {
                        $erreur="Mot de passe de l'étudiant incorrect.";
                    }

                }
                else
                {
                    $erreur="Ni un enseignant ni cet étudiant possède cette adresse e-mail";
                }
            }
            
        

        }
       
       
        
        
        return view('login')->with('erreur', $erreur);
    }


    public function deconnexion()
    {
      
        if(!isset($_SESSION)) 
 { 
     session_start(); 
 }   
        
   
        $_SESSION['login']=NULL;
        $_SESSION['type']=NULL;
        return redirect('connexion');
 

    }
/*
    public function authentifier()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect()->intended('dashboard');
        }
    }


    
    */


    public function redirection()
    {
        return redirect('connexion');
    }
}
