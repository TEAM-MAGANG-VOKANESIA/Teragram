<?php

use function Pest\Laravel\get;

it('can access homepage', function () {
    get(route('home.index'))
        ->assertStatus(200);
});
