<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $link = '/e-desa/public';
            $browser->visit('')
                    // ->value('input[name=username]', 'haidi')
                    ->type('username', 'pegawai')
                    ->type('password', 'samarinda')
                    ->click('#login')
                    // check what link goals.
                    ->assertPathIs($link.'/dashboard')
                    // check id true of false
                    ->attribute('a#dusun', 'href')
                    ->element('#dusun').click()
                    ->click('#dusun');
        });
    }
}
