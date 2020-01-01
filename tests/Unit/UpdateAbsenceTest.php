<?php

namespace Tests\Unit;

use App\Absence;
use App\Enseignant;
use App\Etudiant;
use App\Groupe;
use App\Seance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use DB;

class UpdateAbsenceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_decocher_abs()
    {

        // On créé tout d'abord un étudiant, une séance, un enseignant et un groupe
        // (Uniquement pour s'assurer que la base de données n'est pas vide)



        $etudiant = factory(Etudiant::class)->create();
        $seance1= factory(Seance::class)->create();
        $groupe= factory(Groupe::class)->create();
        $enseignant1= factory(Enseignant::class)->create();
        $seance1->id_groupe=$groupe->id;
        $seance1->id_enseignant=$enseignant1->id;
        $absence1= new Absence;
        $absence1->id_etudiant=$etudiant->id;
        $absence1->id_seance=$seance1->id;
        $absence1->justifie=0;

        $absence1->save(); // Sauvegarde des objets crées dans la bdd
        $seance1->save();

        // On essaye d'afficher les séances qu'étudie l'étudiant qu'on a créé (là où il été absent)
        // Résultat attendu : Que seulement les deux séances s'affichent (Car on vient juste de créer l'étudiant)

        $abs= DB::table('absences')->where('id', $absence1->id)->select('id')->get()->first();
        $this->assertEquals($absence1->id, $abs->id); // Pour vérifier que l'absence a bien été sauvegardée dans la BDD
        $lien="/api/prof/s/".$seance1->id."/".$etudiant->id."/";
        $reponse = $this->call('PUT', $lien."0"); // Appel à l'API pour mettre à jour l'absence (la supprimer)

        $abs= DB::table('absences')->where('id', $absence1->id)->select('id')->get();
        $this->assertCount(0, $abs); // Donc l'absence n'existe plus, si c'est le cas dont l'absence a été supprimée


        // Suppression de la BDD de tout ce qui a été ajouté précédemment et qui n'a servi qu'au test.
        Absence::where('id', $absence1->id)->delete();
        Seance::where('id', $seance1->id)->delete();
        Etudiant::where('id', $etudiant->id)->delete();
        Enseignant::where('id', $enseignant1->id)->delete();
        Groupe::where('id', $groupe->id)->delete();


    }


    public function test_cocher_abs()
    {

        $etudiant = factory(Etudiant::class)->create();
        $seance1= factory(Seance::class)->create();
        $groupe= factory(Groupe::class)->create();
        $enseignant1= factory(Enseignant::class)->create();
        $seance1->id_groupe=$groupe->id;
        $seance1->id_enseignant=$enseignant1->id;
        $seance1->save();

        $lien="/api/prof/s/".$seance1->id."/".$etudiant->id."/";
        $reponse = $this->call('PUT', $lien."1"); // Appel à l'API pour ajouter l'absence
        $abs= DB::table('absences')->where('id_etudiant', $etudiant->id)->where('id_seance', $seance1->id)->select('id')->get();
        $this->assertCount(1, $abs); // Donc l'absence a été créée




        Absence::where('id', $abs->first()->id)->delete();
        Seance::where('id', $seance1->id)->delete();
        Etudiant::where('id', $etudiant->id)->delete();
        Enseignant::where('id', $enseignant1->id)->delete();
        Groupe::where('id', $groupe->id)->delete();

    }
}
