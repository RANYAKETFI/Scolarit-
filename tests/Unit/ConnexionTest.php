<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Etudiant;
use \App\Enseignant;
use \App\Groupe;

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

    public function test_connexion_etudiant()
    {
        $etudiant = factory(Etudiant::class)->create();
        $etudiants = Etudiant::all();
        $_SESSION['login'] = null;
        $_SESSION['type']= null;
        $reponse = $this->call('POST', '/api/connexion', array(
            'login' => $etudiant->login,
            'mdp' => $etudiant->mdp
        ));
        $this->assertTrue((!empty($_SESSION['login']))); // Est censé être définie si la connexion est établie (La session est défini dans la méthode du contrôleur appelé par post
        $this->assertTrue((!empty($_SESSION['type']))); // Est censé être définie
        $this->assertEquals(2, $_SESSION['type']); // Est censé être à vrai pour l'étudiant
        // $this->assertEquals("ok", $re
        $reponse->assertSee("ok"); // "ok doit être renvoyée)
        Etudiant::where('id', $etudiant->id)->delete(); // On supprime l'entrée ajoutée aléatoirement par Factory (Faker)
        $_SESSION['login'] = null; // On réinitialise la session à la fin du test.
        $_SESSION['type'] = null;

    }


    public function test_connexion_enseignant()
    {
        $enseignant = factory(Enseignant::class)->create();
        $enseignants = Enseignant::all();
        $_SESSION['login'] = null;
        $_SESSION['type']=null;

        $reponse = $this->call('POST', '/api/connexion', array(
            'login' => $enseignant->login,
            'mdp' => $enseignant->mdp
        ));
        $this->assertTrue((!empty($_SESSION['login']))); // Est censé être définie si la connexion est établie (La session est défini dans la méthode du contrôleur appelé par post
        $this->assertTrue((!empty($_SESSION['type']))); // Est censé être définie
        $this->assertEquals(1, $_SESSION['type']); // Est censé être à vrai pour l'enseignant
        // $this->assertEquals("ok", $re
        $reponse->assertSee("ok"); // "ok doit être renvoyée)
        Enseignant::where('login', $enseignant->login)->delete(); // On supprime l'entrée ajoutée aléatoirement par Factory (Faker)
        $_SESSION['login'] = null; // On réinitialise la session à la fin du test.
        $_SESSION['type'] = null;

    }


}


