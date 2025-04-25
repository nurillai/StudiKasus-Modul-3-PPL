<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class editNoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group EditNote
     */
    public function testEditNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Log in')
                    ->assertPathIs('/login')
                    ->type('email', 'user@gmail.com')
                    ->type('password', 'password')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->clickLink('Notes')
                    ->click("a[href='/edit-note-page/2']")
                    ->assertPathIs('/edit-note-page/2')
                    ->type('title', 'Modul 3 PPL')
                    ->type('description', 'Praktikum Proyek Perangkat Lunak Automated Testing')
                    ->press('UPDATE')
                    ->assertPathIs('/notes');
        });
    }
}