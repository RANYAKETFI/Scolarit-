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
                $erreur="1";

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
                        $_SESSION['id']=$etudiant->first()->id;

                        $erreur="2";

                    }
                    else
                    {
                        $erreur="Mot de passe de l'étudiant incorrect.";
                    }

                }
                else
                {
                    $erreur="Pas d'enseignant ni d'étudiant ne possèdent cette adresse e-mail";
                }
            }


        }



        return $erreur;

        //return view('login')->with('erreur', $erreur);
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
public function connecter(Request $request)
    {





        $groupe=null;
        $erreur="aucune";
        $login=null;
        $id=null;
        $type=null;
        $nom=null;
        $prenom=null;

        if (empty($request->login))
        {
           $erreur= "Adresse e-mail requise.";
            return [
                "erreur"=>$erreur,
                "login"=>$login,
                "id"=>$id,
                "type"=>$type,
                "nom"=>$nom,
                "prenom"=>$prenom,
                "groupe"=>$groupe,
            ];
        }
        if (empty($request->mdp))
        {
            $erreur= "Mot de passe requis.";
            return [
                "erreur"=>$erreur,
                "login"=>$login,
                "id"=>$id,
                "type"=>$type,
                "nom"=>$nom,
                "prenom"=>$prenom,
                "groupe"=>$groupe,
            ];
        }
        /*
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        */
        $enseignant = DB::table('enseignants')->where('login', $request->login)->select('login', 'mdp','id',"nom","prenom")->get();

        if (!($enseignant->isEmpty()))
        {

            if ($request->mdp==$enseignant->first()->mdp)
            {
                $login=$enseignant->first()->login;
                $id=$enseignant->first()->id;
                $type=1; // 1 pour enseignant.
                $erreur="1";
                $nom=$enseignant->first()->nom;
                $prenom=$enseignant->first()->prenom;

            }
            else
            {
                $erreur="Mot de passe de l'enseignant incorrect.";
                return [
                    "erreur"=>$erreur,
                    "login"=>$login,
                    "id"=>$id,
                    "type"=>$type,
                    "nom"=>$nom,
                    "prenom"=>$prenom,
                    "groupe"=>$groupe,
                ];
            }

        }
        else
        {
            if ($erreur!="1")
            {
                $etudiant = DB::table('etudiants')->where('login', $request->login)->select('login', 'mdp','id', 'nom','prenom','id_groupe')->get();
                if (!($etudiant->isEmpty()))
                {

                    if ($request->mdp==$etudiant->first()->mdp)
                    {
                        $login=$etudiant->first()->login;
                        $id=$etudiant->first()->id;
                        $type=2; // 2 pour étudiant.
                        $nom=$etudiant->first()->nom;
                        $prenom=$etudiant->first()->prenom;
                        $id_groupe=$etudiant->first()->id_groupe;
                        $erreur="2";
                        $groupe= DB::table('groupes')->where('id', $id_groupe)->select('groupe')->get()->first();


                    }
                    else
                    {
                        $erreur="Mot de passe de l'étudiant incorrect.";
                        return [
                            "erreur"=>$erreur,
                            "login"=>$login,
                            "id"=>$id,
                            "type"=>$type,
                            "nom"=>$nom,
                            "prenom"=>$prenom,
                            "groupe"=>$groupe,
                        ];
                    }

                }
                else
                {
                    $erreur="Pas d'enseignant ni d'étudiant ne possèdent cette adresse e-mail";
                    return [
                        "erreur"=>$erreur,
                        "login"=>$login,
                        "id"=>$id,
                        "type"=>$type,
                        "nom"=>$nom,
                        "prenom"=>$prenom,
                        "groupe"=>$groupe,
                    ];
                }
            }


        }




        return [
            "erreur"=>$erreur,
            "login"=>$login,
            "id"=>$id,
            "type"=>$type,
            "nom"=>$nom,
            "prenom"=>$prenom,
            "groupe"=>$groupe,
        ];




    }







    public function redirection()
    {
        return redirect('connexion');
    }
}
