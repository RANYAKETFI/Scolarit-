<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $id_enseignant = $request->id_enseignant;

        $groupes=  \DB::table('seances')
        ->join('groupes', 'seances.id_groupe', '=', 'groupes.id')
        ->select('groupes.id','groupes.groupe')
        ->where('seances.id_enseignant',$id_enseignant)
        ->groupBy('groupes.id')
        ->get();
        /*JavaScript::put([
            'groupes' => $groupes,
        ]);*/
        return view('ens_groupes', ['groupes' => $groupes]);
    }

    public function getSeancesGroupe($group)
    {
        $seances=  \DB::table('seances')
        ->where('groupes.groupe',$group)->get();
        return view('groupes', ['groupes' => $seances]);
    }
}
