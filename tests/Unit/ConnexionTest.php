<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Etudiant;
use \App\Enseignant;
use \App\Groupe;
use DB;
class ConnexionTest extends TestCase
{
    public function test_modele_etudiant_creation()
    {
        $etudiant = factory(Etudiant::class)->create();
        $etudiants = Etudiant::all();
        $this->assertTrue(!empty($etudiant)); // Pour vérifier que l'étudiant a bien été généré par Factory (Faker), puis ajouté dans la base de données
        $this->assertTrue(!empty($etudiants)); // Pour vérifier que la base de données n'est pas vide après l'insertion
        Etudiant::where('id', $etudiant->id)->delete(); // Pour supprimer l'entrée ajoutée

    }


    public function test_modele_enseignant_creation()
    {
        $enseignant = factory(Enseignant::class)->create();
        $enseignants = Enseignant::all();
        $this->assertTrue(!empty($enseignant));
        $this->assertTrue(!empty($enseignants));
        Enseignant::where('id', $enseignant->id)->delete();

    }


    public function test_connexion()
    {
        /*** Connexion d'un étudiant ***/
        $etudiant = factory(Etudiant::class)->create();
        $reponse = $this->call('POST', '/api/connexion', array(
            'login' => $etudiant->login,
            'mdp' => $etudiant->mdp
        ));
        $this->assertEquals($etudiant->login, $reponse['login']);
        $this->assertEquals($etudiant->id, $reponse['id']);
        $this->assertEquals(2, $reponse['erreur']); // 2 pour l'étudiant
        $this->assertEquals($etudiant->nom, $reponse['nom']);
        $this->assertEquals($etudiant->prenom, $reponse['prenom']);
        $groupe= DB::table('groupes')->where('id', $etudiant->id_groupe)->select('groupe')->get()->first();
        $this->assertEquals($groupe->groupe, $reponse['groupe']['groupe']);
        Etudiant::where('id', $etudiant->id)->delete();



        /*** Connexion d'un enseignant ***/

        $enseignant= factory(Enseignant::class)->create();
        $reponse = $this->call('POST', '/api/connexion', array(
            'login' => $enseignant->login,
            'mdp' => $enseignant->mdp
        ));
        $this->assertEquals($enseignant->login, $reponse['login']);
        $this->assertEquals($enseignant->id, $reponse['id']);
        $this->assertEquals(1, $reponse['erreur']); // 1 pour l'enseignant
        $this->assertEquals($enseignant->nom, $reponse['nom']);
        $this->assertEquals($enseignant->prenom, $reponse['prenom']);
        $this->assertEquals($enseignant->groupe, $reponse['groupe']);
        Enseignant::where('id', $enseignant->id)->delete();
    }


}
