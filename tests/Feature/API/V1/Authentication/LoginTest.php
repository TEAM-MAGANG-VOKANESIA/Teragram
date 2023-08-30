<?php

use App\Models\User;

use function Pest\Laravel\post;

it('can\'t store login credentials (validation error)', function () {
    post(route('login.store.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can store login credentials', function () {
    $user = User::factory()->create();
    post(route('login.store.api'), [
        'email' => $user->email,
        'password' => 'password',
    ])
    ->assertJson([
        'success' => true,
    ])
    ;
});