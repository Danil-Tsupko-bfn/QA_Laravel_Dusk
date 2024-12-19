<?php
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Log;

class ExampleTest extends DuskTestCase
{
    /**
     * Test logging in and submitting a question to ChatGPT.
     *
     * @return void
     */
    public function testSubmitQuestionAndLogResponse()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('https://chat.openai.com')

                ->type('input[name="username"]', 'gert.iopru@gmail.com')
                ->type('input[name="password"]', 'NWR$n*85k,cMZH=')
                ->press('Log In')
                ->waitForText('ChatGPT')


                ->type('textarea[name="input"]', 'What is Laravel Dusk?')
                ->press('Send')
                ->waitForText('Laravel Dusk', 10);

            $response = $browser->text('.response-selector');

            Log::info('ChatGPT response:', ['response' => $response]);

            $this->assertStringContainsString('Laravel Dusk', $response);
        });
    }
}
