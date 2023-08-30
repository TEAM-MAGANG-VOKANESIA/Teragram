<?php

use function Pest\Laravel\post;

it('can\'t register (validation error)', function () {
    post(route('register.store.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can register', function () {
    post(route('register.store.api'), [
        'name' => 'japet',
        'email' => 'sendaljapet@gmail.com',
        'password' => '12345678',
    ])
        ->assertJson([
            'success' => true,
        ]);
});
