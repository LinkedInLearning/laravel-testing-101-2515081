<?php

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\actingAs;
use \Illuminate\Support\Facades\Storage;

it('client photo is stored when creating a client', function () {

    Storage::fake();

    $file = UploadedFile::fake()->image('client.jpg');

    $user = User::factory()->create();

    $respose = actingAs($user)->post('/admin/clients', [
        'name' => 'Manuel Fernandes',
        'email' => 'manuel@manuelfernandes.com',
        'photo' => $file
    ]);

    $this->assertDatabaseHas('clients',[
        'name' => 'Manuel Fernandes',
        'email' => 'manuel@manuelfernandes.com'
    ]);

    $client = Client::where('email', 'manuel@manuelfernandes.com')->first();

    $this->assertNotNull($client->photo);

    Storage::assertExists('clients/' . $client->photo);

    Storage::fake();
});
