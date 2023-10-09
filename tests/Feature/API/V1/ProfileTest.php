<?php

use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\delete;

it('it can\'t access my profile (unauthenticated)', function () {
    get(route('my.profile.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('it can access my profile', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->get(route('my.profile.api'))
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
        ]);
});

it('it can\'t access profile (unauthenticated)', function () {
    $someone = User::factory()->create();
    get(route('profile.api', $someone->id))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('it can\'t access profile (user not found)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->get(route('profile.api', -1))
        ->assertJson([
            'success' => false,
            'message' => 'User not found',
        ]);
});

it('it can access profile', function () {
    $user = User::factory()->create();
    $someone = User::factory()->create();
    actingAs($user)
        ->get(route('profile.api', $someone->id))
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
        ]);
});

it('it can\'t update profile index (unauthenticated)', function () {
    get(route('update.profile.index.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('it can update profile index', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->get(route('update.profile.index.api'))
        ->assertJson([
            'success' => true,
        ]);
});

it('it can\'t update profile (unauthenticated)', function () {
    post(route('update.profile.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('it can\'t update profile (validation error)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('update.profile.api'), [
            'profileImage' => 'Anjay Mabar!'
        ])
        ->assertJson([
            'success' => false,
        ]);
});

it('it can update profile', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('update.profile.api'), [
            'name' => 'Ricardo Milos',
            'email' => 'ricardo@gmail.com',
            'about' => 'Manusia anime misterius',
        ])
        ->assertJson([
            'success' => true,
        ]);
});

it('it can\'t delete user profile (unauthenticated)', function () {
    delete(route('delete.user.profile.api', 1))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('it can\'t delete user profile (not owned)', function () {
    $user = User::factory()->create();
    $otherUser = User::factory()->create();
    actingAs($user)
        ->delete(route('delete.user.profile.api', $otherUser->id))
        ->assertJson([
            'success' => false,
            'message' => 'You\'re not the owner of this account',
        ]);
});

it('it can delete user profile', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->delete(route('delete.user.profile.api', $user->id))
        ->assertJson([
            'success' => true,
            'message' => 'Succcessfull delete account',
        ]);
    assertDatabaseMissing(User::class, [
        'id' => $user->id,
    ]);
});