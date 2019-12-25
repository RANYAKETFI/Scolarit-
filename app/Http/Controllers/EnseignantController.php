<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\GroupeResource;
use App\Http\Resources\SeanceResource;

use Javascript;
use Auth;


class EnseignantController extends Controller
{
    //
    /*private $id;

    public function __construct($id)
    {
        $this->id=$id;   
    }*/

    public function getGroupes(Request $request)
    {

        
        $groupes=  \DB::table('seances')
        ->join('groupes', 'seances.id_groupe', '=', 'groupes.id')
        ->select('groupes.id','groupes.groupe')
        ->where('seances.id_enseignant',$request->id)
        ->groupBy('groupes.id')
        ->get();

        return GroupeResource::collection($groupes);
        
    }

    public function getSeancesGroupe(Request $request)
    {     

        $id_enseignant= $request->id;
        $id_groupe=$request->id_groupe;
        $seances=  \DB::table('seances')
        ->where('seances.id_groupe',$id_groupe)
        ->where('seances.id_enseignant',$id_enseignant)->get();
        return SeanceResource::collection($seances);

    }
}
