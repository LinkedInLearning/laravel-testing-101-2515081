<?php

use App\Models\User;

// regular test.
it('the application returns a successful response', function () {
    $this->get('/login')
        ->assertStatus(200);
});

// higher order test. we don;t use a closure
it('the application returns a successful response chained')
    ->get('/login')
    ->assertStatus(200);

it('the application returns a successful response expectation', function () {
    $response = $this->get('/login');
    expect($response->getStatusCode())->toBe(200);
});

it('user is found and meets criteria expectations', function () {
    $user = User::factory()->make([
        'name' => 'Fernando',
        'email' => 'fernando@email.com'
    ]);

    expect($user)
        ->name->toBe('Fernando')
        ->email->toContain('fernando');
});
