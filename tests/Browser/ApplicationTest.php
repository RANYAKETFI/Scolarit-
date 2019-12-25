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
          $browser->visit('http://localhost:3000/')
          ->type('email','hr_ketfi@esi.dz')
          ->type('password','ketfi')
          ->click('@Connexion-button')
          ->pause(3000)
          ->assertPathIs('/etud');
    });
    }
    public function testConnexionProf()
    {/*
      $this->browse(function (Browser $browser) {
          $browser->visit('http://localhost:3000/')
          ->type('email','m_koudil@esi.dz')
          ->type('password','koudil')
          ->click('@Connexion-button')
          ->pause(3000)
          ->assertPathIs('/prof')
          ->assertSee('Mes groupes');


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
        ->pause('1000')

        ->waitForText('1 CS 06')
        ->pause('1000')

        ->clicklink('1 CS 06')
        ->waitForText('THP : 2019-12-18 00:00:00')
        ->pause('1000')

        ->clicklink('THP : 2019-12-18 00:00:00')
        ->pause('1000')
        ->check('1')
        ->pause('1000')
        ->press('@Confirmer-button')
        ->assertSee('Mes seances');



});
}}
