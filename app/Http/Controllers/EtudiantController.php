<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EtudiantController extends Controller
{
    public function absences_etudiant()
        {
            if(!isset($_SESSION)) 
            { 
               session_start(); 
            }
           if (empty($_SESSION['login']))
           {
               return redirect('connexion');
                
           } 

           if ($_SESSION['type']!=2)
           {
                return redirect('connexion');
                
           }

           $id_etud= DB::table('etudiants')->where('login', $_SESSION['login'])->select('id')->get()->first()->id;
        $abs=  \DB::table('absences')
        ->join('seances','absences.id_seance','=','seances.id')
                ->select('absences.id','seances.module','seances.date','absences.justifie')
                ->where('absences.id_etudiant',$id_etud)
                ->groupBy('absences.id')
                ->get();
              
            return view('InterfaceEtud', ['abs' => $abs]);
      
      
      
             }
}
