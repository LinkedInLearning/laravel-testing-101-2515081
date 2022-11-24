<?php

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\actingAs;
use \Illuminate\Support\Facades\Storage;
use function Pest\testDirectory;

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

it('gets photo from unsplash when none is provided', function () {
    Http::fake([
        'https://api.unsplash.com/photos/random' => HTTP::response([
            'urls' => [
                'thumb' => testDirectory('photos/client.jpg')
            ]
        ])
    ]);

    Storage::fake();

    $user = User::factory()->create();

    $respose = actingAs($user)->post('/admin/clients', [
        'name' => 'Manuel Fernandes',
        'email' => 'manuel@manuelfernandes.com'
    ]);

    $this->assertDatabaseHas('clients',[
        'name' => 'Manuel Fernandes',
        'email' => 'manuel@manuelfernandes.com'
    ]);

    $client = Client::where('email', 'manuel@manuelfernandes.com')->first();

    $this->assertNotNull($client->photo);

    Storage::assertExists('clients/' . $client->photo);

    $this->assertFileEquals(testDirectory('photos/client.jpg'), Storage::path('clients/' . $client->photo));

    Storage::fake();

});
