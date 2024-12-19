<?php


use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CountH1Test extends DuskTestCase
{
    /**
     * A test to count the number of <h1> elements on a webpage.
     */

    public function testCountH1Elements()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://laravel.com/')
            ->pause(2000)
            ->script('console.log("Page loaded")');

            $h1Count = $browser->driver->executeScript('return document.querySelectorAll("h1").length;');

            \Log::info("Number of <h1> elements: $h1Count");

            $this->assertGreaterThan(0, $h1Count, 'No <h1> elements found on the page.');
        });
    }
}

