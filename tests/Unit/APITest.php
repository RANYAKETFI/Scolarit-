<?php

namespace Tests\Unit;

use App\Etudiant;
use App\Absence;
use App\Seance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class APITest extends TestCase
{
    public function test_api_absences()
    {
        $etudiant = factory(Etudiant::class)->create();
        $_SESSION['login']=$etudiant->login; // Pour pouvoir accéder à la route api/absences (l'utilisateur devra être connecté, on simule sa connexion après l'avoir créé)
        $_SESSION['type']=2;
        $seance1= factory(Seance::class)->create();
        $seance2= factory(Seance::class)->create();
        $absence= new Absence;
        $absence->id_etudiant=$etudiant->id;
        $seance_absentee=Seance::inRandomOrder()->get()->first();
        $absence->id_seance=$seance_absentee->id;
        $absence->save();
        // le test de l'api pour afficher les absences de l'utilisateur créé et connecté.
        $reponse = $this->call('GET', '/api/etud');
   //    dd($reponse); // dump and die - pour afficher dans la console puis quitter
        $reponse->assertSee($seance_absentee->module);

        // Suppression de la BDD de tout ce qui a été ajouté précédemment et qui n'a servi qu'au test.
        Absence::where('id', $absence->id)->delete();
        Seance::where('id', $seance1->id)->delete();
        Seance::where('id', $seance2->id)->delete();
        Etudiant::where('login', $etudiant->login)->delete();










    }

}
