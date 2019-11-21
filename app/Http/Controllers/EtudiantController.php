<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtudiantController extends Controller
{ public function absences_etudiant($id_etud)
  {
  $abs=  \DB::table('absences')
  ->join('seances','absences.id_seance','=','seances.id')
          ->select('absences.id','seances.module','seances.date','absences.justifie')
          ->where('absences.id_etudiant',$id_etud)
          ->groupBy('absences.id')
          ->get();
        
      return view('InterfaceEtudiant', ['abs' => $abs]);



       }
}
