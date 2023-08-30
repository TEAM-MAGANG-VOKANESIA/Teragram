<?php

use App\Models\Message;
use App\Models\Roomchat;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('can\'t access chat (unauthenticated', function () {
    get(route('get.message.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can access chat', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->get(route('get.message.api'))
        ->assertStatus(200);
});

it('can\'t access single chat (don\'t have permision)', function () {
    $user = User::factory()->create();
    $roomchat = Roomchat::factory()->create();
    actingAs($user)
        ->get(route('get.single.message.api', $roomchat->id))
        ->assertJson([
            'success' => false,
            'message' => 'You do not have permission to view this conversation',
        ]);
});

it('can\'t access single chat (unauthenticated)', function () {
    $roomchat = Roomchat::factory()->create();
    get(route('get.single.message.api', $roomchat->id))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t access single chat (conversation not found)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->get(route('get.single.message.api', -1))
        ->assertJson([
            'success' => false,
            'message' => 'Conversations not found'
        ]);
});

it('can access single chat', function () {
    $roomchat = Roomchat::factory()->create();
    actingAs($roomchat->user1)
        ->get(route('get.single.message.api', $roomchat->id))
        ->assertJson([
            'success' => true,
        ]);
});

it('can\'t store new chat (validation error)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('message.store.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can store new chat', function () {
    $roomchat = Roomchat::factory()->create();
    actingAs($roomchat->user1)
        ->post(route('message.store.api', $roomchat->id),[
            'user2_id' => $roomchat->user2->id,
            'message' => 'Hai bro',
        ])
        ->assertStatus(200);
    assertDatabaseCount(Message::class, 1);
});

it('can make new roomchat', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    actingAs($user1)
        ->post(route('message.store.api'), [
            'user2_id' => $user2->id,
            'message' => 'hello world',
        ])
        ->assertStatus(200);
    assertDatabaseCount(Roomchat::class, 1);
});

it('can\'t search user (validation error)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('user.search.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can\'t search user (unauthenticated', function () {
    post(route('user.search.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can search user', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('user.search.api'), [
            'searchValue' => 'Jamal',
        ])
        ->assertJson([
            'success' => true,
        ]);
});