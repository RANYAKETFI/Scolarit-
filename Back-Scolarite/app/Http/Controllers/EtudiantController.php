<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Resources\AbsenceResource;


class EtudiantController extends Controller
{
    public function absences_etudiant(Request $request)
        {
           

        $abs=  \DB::table('absences')
        ->join('seances','absences.id_seance','=','seances.id')
                ->select('absences.id','seances.module','seances.date','absences.justifie')
                ->where('absences.id_etudiant',$request->id)
                ->groupBy('absences.id')
                ->get();
              
            return AbsenceResource::collection($abs);
      
      
      
             }
}
