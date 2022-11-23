<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ClientCreateTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testClientImageLoads(){

        $user = User::factory()->create();

        $this->browse(function($browser) use ($user) {
            $browser->loginAs($user)
                ->visit('/admin/clients/create')
                ->type('name', 'Tiago Filipe')
                ->type('email', 'tiago@filipe.pt')
                ->attach('photo', __DIR__ . '/photos/client.jpg')
                ->click('@submit');

            $clientId = $browser->inputValue('id');

            $browser->assertPathIs("/admin/clients/{$clientId}/edit")
                ->assertPresent('.h-20.w-20.object-cover.rounded-full.mr-4');

            $imageUrl = $browser->attribute('img', 'src');

            $browser->visit($imageUrl)
                ->assertDontSee(404);

            $browser->screenshot('print');
        });
    }
}
