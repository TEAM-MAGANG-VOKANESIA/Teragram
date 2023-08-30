<?php

use function Pest\Laravel\get;

it('can access home api', function () {
    get(route('home.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});