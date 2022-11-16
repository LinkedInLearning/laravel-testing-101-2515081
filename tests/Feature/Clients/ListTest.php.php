<?php

it('has clients/listtest.php page', function () {
    $response = $this->get('/clients/listtest.php');

    $response->assertStatus(200);
});

it('can access the list while not logged in')->skip();

//it('can access the list while logged in');
//it('can list clients');
//it('lists name, email, and phone for each client');
