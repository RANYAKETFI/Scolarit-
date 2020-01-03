<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use app\Etudiant;
class ApplicationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testConnexionEtudiant()
    {

    $this->browse(function (Browser $browser) {
          $browser->visit('/connexion')
          ->type('email','hr_ketfi@esi.dz')
          ->type('password','ketfi')
          ->click('@Connexion-button')
          ->assertSee('absences')
          ->visit('/deconnexion')
          ->assertSee('Gestion');
    });
    }
    public function testConnexionProf()
    {
  /*   $this->browse(function (Browser $browser) {
          $browser->visit('http://localhost:3000/')
          ->type('email','m_koudil@esi.dz')
          ->type('password','koudil')
          ->click('@Connexion-button')
          ->assertPathIs('/prof');


    });*/
  }
  public function testVisualiserabsence()
  {
    $this->browse(function (Browser $browser) {
        $browser->visit('http://localhost:3000/')
        ->type('email','m_koudil@esi.dz')
        ->pause('1000')
        ->type('password','koudil')
        ->pause('1000')
        ->press('@Connexion-button')
        ->waitForText('1 CS 06')
        ->assertSee('1 CS 06')
       ->clicklink('1 CS 06')
        ->waitForText('THP : 2019-12-18 00:00:00')
        ->pause('1000')
        ->clicklink('THP : 2019-12-18 00:00:00')
        ->pause('1000')
        ->check('1')
        ->pause('1000')
        ->press('@Confirmer-button')
        ->waitForText('Séances')
        ->assertSee('Séances');



});
}}
