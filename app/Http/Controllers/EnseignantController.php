<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    //

    public function getGroupes()
    {
        $groupes=  \DB::table('seances')
        ->join('groupes', 'seances.id_groupe', '=', 'groupes.id')
        ->select('groupes.id','groupes.groupe')->get();
        return view('groupes', ['groupes' => $groupes]);
    }

    public function getSeancesGroupe($group)
    {
        $seances=  \DB::table('seances')
        ->where('groupes.groupe',$group)->get();
        return view('groupes', ['groupes' => $seances]);
    }
}
