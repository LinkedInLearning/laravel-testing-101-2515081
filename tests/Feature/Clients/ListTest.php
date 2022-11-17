<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

it('has a client list page', function(){
    //create a user
    $user = User::factory()->make();

    //go to that page with the user autenticated
    $response = actingAs($user)->get('/admin/clients');

    //check if the http status was 200
    $response->assertStatus(200);
});

it('has to be authenticated', function(){
    $response = $this->get('/admin/clients');

    $response->assertStatus(302)
        ->assertRedirect(route('login'));
});
