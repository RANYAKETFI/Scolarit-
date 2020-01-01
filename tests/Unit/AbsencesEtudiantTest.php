<?php

namespace Tests\Unit;

use App\Etudiant;
use App\Enseignant;
use App\Absence;
use App\Seance;
use App\Groupe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class AbsencesEtudiantTest extends TestCase
{
    public function test_absences_etudiant()
    {

        // On crée un étudiant, deux séances, deux enseignants (un pour chaque séance) et un groupe
        // (pour que les tests fonctionnent même dans le cas où le base de données ne contienne aucune donnée au départ)
        $etudiant = factory(Etudiant::class)->create();
        $seance1= factory(Seance::class)->create();
        $seance2= factory(Seance::class)->create();
        $groupe= factory(Groupe::class)->create();
        $enseignant1= factory(Enseignant::class)->create();
        $enseignant2= factory(Enseignant::class)->create();
        $seance1->id_groupe=$groupe->id;
        $seance2->id_groupe=$groupe->id;
        $seance1->id_enseignant=$enseignant1->id;
        $seance2->id_enseignant=$enseignant2->id;
        $absence1= new Absence;
        $absence2= new Absence;
        $absence1->id_etudiant=$etudiant->id;
        $absence2->id_etudiant=$etudiant->id;
        $absence1->id_seance=$seance1->id;
        $absence2->id_seance=$seance2->id;
        $absence1->justifie=0;
        $absence2->justifie=0;

        $absence1->save(); // Sauvegarde des objets crées dans la bdd
        $absence2->save();
        $seance1->save();
        $seance2->save();

        // On essaye d'afficher les séances qu'étudie l'étudiant qu'on a créé (là où il été absent)
        // Résultat attendu : Que seulement les deux séances s'affichent (Car on vient juste de créer l'étudiant)

        $reponse = $this->call('POST', '/api/etud', array('id' => $etudiant->id));
        $this->assertCount(2, $reponse->getData()->data); // Pour assurer qu'il n'y a que ces deux absences qui ont été renvoyées dans la réponses
        $this->assertEquals($absence1->id, $reponse->getData()->data[0]->id);
         $this->assertEquals($absence2->id, $reponse->getData()->data[1]->id);


        // Suppression de la BDD de tout ce qui a été ajouté précédemment et qui n'a servi qu'au test.
        Absence::where('id', $absence1->id)->delete();
        Absence::where('id', $absence2->id)->delete();
        Seance::where('id', $seance1->id)->delete();
        Seance::where('id', $seance2->id)->delete();
        Etudiant::where('id', $etudiant->id)->delete();
        Enseignant::where('id', $enseignant1->id)->delete();
        Enseignant::where('id', $enseignant2->id)->delete();
        Groupe::where('id', $groupe->id)->delete();


    }
}
