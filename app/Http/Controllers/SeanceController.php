<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EtudiantResource;

class SeanceController extends Controller
{
    public function getEtudiants(Request $request)
    {

      
        $id_seance = $request->id_seance;

        $test=\DB::table('seances')
        ->where('seances.id',$id_seance)
        ->select('seances.id_enseignant')
        ->get()
        ->first();

        


        $etuds=  \DB::table('etudiants')
        ->join('seances', 'seances.id_groupe', '=', 'etudiants.id_groupe')
        ->leftJoin('absences',function ($join) {
            $join->on('seances.id', '=', 'absences.id_seance')->on('etudiants.id', '=', 'absences.id_etudiant');//you add more joins here
        })
        ->select('etudiants.id as id','etudiants.nom','etudiants.prenom','etudiants.id_groupe','absences.id as absence')
        ->where('seances.id',$id_seance)
        ->orderBy('etudiants.nom')
        ->get();

        return EtudiantResource::collection($etuds);
        
    }
    public function postSeanceEtudiant(Request $request)
    {

        
        $id_seance = $request->id_seance;
        $id_etudiant = $request->id_etudiant;
        $abs = $request->abs;
        $absence=  \DB::table('absences')
        ->where('absences.id_seance',$id_seance)
        ->where('absences.id_etudiant',$id_etudiant)
        ->count();
        if($absence==0)
        {
            if($abs=='1')
            {
                \DB::table('absences')
            ->insert(['id_etudiant' => $id_etudiant, 'id_seance' => $id_seance]);
            }

        }
        else{
            if($abs=='0')
            {
                \DB::table('absences')
                ->where('absences.id_seance',$id_seance)
                ->where('absences.id_etudiant',$id_etudiant)
                ->delete();
            }
        }

        return $absence;
    }

}/*public function getEtudiants(Request $request)
    {
        $id_seance = $request->id_seance;

        $etuds=  \DB::table('etudiants')
        ->join('seances', 'seances.id_groupe', '=', 'etudiants.id_groupe')
        ->leftJoin('absences', 'seances.id', '=', 'absences.id_seance', 'etudiants.id', '=', 'absences.id_etudiant')
        ->select('etudiants.id as id','etudiants.nom','etudiants.prenom','etudiants.id_groupe','absences.id as absence')
        ->where('seances.id',$id_seance)
        ->get();

        return EtudiantResource::collection($etuds);
        
    }*/
