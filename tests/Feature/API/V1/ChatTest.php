<?php

use App\Models\Message;
use App\Models\Roomchat;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\delete;

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
            'message' => 'Conversation not found'
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

it('can\'t edit message (unauthenticated)', function() {
    post(route('edit.message.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t edit message (validation error)', function() {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('edit.message.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can\'t edit message (roomchat not found)', function() {
    $user = User::factory()->create();
    $message = Message::factory()->create();
    actingAs($user)
        ->post(route('edit.message.api'), [
            'roomchatId' => -1,
            'messageId' => $message->id,
            'newMessage' => 'Hai Bro!',
        ])
        ->assertJson([
            'success' => false,
            'message' => 'Roomchat not found',
        ]);
});

it('can\'t edit message (not allowed to edit message in this conversation)', function() {
    $user = User::factory()->create();
    $roomchat = Roomchat::factory()->create();
    $message = Message::factory()->create(['roomchat_id' => $roomchat->id]);
    actingAs($user)
        ->post(route('edit.message.api'), [
            'roomchatId' => $roomchat->id,
            'messageId' => $message->id,
            'newMessage' => 'Hai Bro!',
        ])
        ->assertJson([
            'success' => false,
            'message' => 'You\'re not allowed to see this conversation',
        ]);
});

it('can\'t edit message (message not found)', function() {
    $user = User::factory()->create();
    $roomchat = Roomchat::factory()->create(['user1_id' => $user->id]);
    actingAs($user)
        ->post(route('edit.message.api'), [
            'roomchatId' => $roomchat->id,
            'messageId' => -1,
            'newMessage' => 'Hai Bro!',
        ])
        ->assertJson([
            'success' => false,
            'message' => 'Message not found',
        ]);
});

it('can\'t edit message (not message owned)', function() {
    $user = User::factory()->create();
    $roomchat = Roomchat::factory()->create(['user1_id' => $user->id]);
    $message = Message::factory()->create(['roomchat_id' => $roomchat->id]);
    actingAs($user)
        ->post(route('edit.message.api'), [
            'roomchatId' => $roomchat->id,
            'messageId' => $message->id,
            'newMessage' => 'Hai Bro!',
        ])
        ->assertJson([
            'success' => false,
            'message' => 'Can\'t edit this message (not owned)',
        ]);
});

it('can\'t edit message (message not from this roomchat)', function() {
    $user = User::factory()->create();
    $roomchat = Roomchat::factory()->create(['user1_id' => $user->id]);
    $message = Message::factory()->create(['user_id' => $user->id]);
    actingAs($user)
        ->post(route('edit.message.api'), [
            'roomchatId' => $roomchat->id,
            'messageId' => $message->id,
            'newMessage' => 'Hai Bro!',
        ])
        ->assertJson([
            'success' => false,
            'message' => 'Can\'t edit this message (this message not from this roomchat)',
        ]);
});

it('can edit message', function() {
    $user = User::factory()->create();
    $roomchat = Roomchat::factory()->create(['user1_id' => $user->id]);
    $message = Message::factory()->create(['user_id' => $user->id, 'roomchat_id' => $roomchat->id]);
    $newMessage = 'Hai Bro!';
    actingAs($user)
        ->post(route('edit.message.api'), [
            'roomchatId' => $roomchat->id,
            'messageId' => $message->id,
            'newMessage' => $newMessage,
        ])
        ->assertJson([
            'success' => true,
            'message' => 'Successfull edit message',
        ]);
    assertDatabaseHas(Message::class, [
        'roomchat_id' => $roomchat->id,
        'user_id' => $user->id,
        'message' => $newMessage,
    ]);
});

it('can\'t delete message (unauthenticated)', function() {
    $message = Message::factory()->create();
    delete(route('delete.message.api', $message->id))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t delete message (message not found)', function() {
    $user = User::factory()->create();
    actingAs($user)
        ->delete(route('delete.message.api', -1))
        ->assertJson([
            'success' => false,
            'message' => 'Message not found',
        ]);
});

it('can\'t delete message (not owned)', function() {
    $user = User::factory()->create();
    $message = Message::factory()->create();
    actingAs($user)
        ->delete(route('delete.message.api', $message->id))
        ->assertJson([
            'success' => false,
            'message' => 'Can\'t delete message (not owned)',
        ]);
});

it('can delete message', function() {
    $user = User::factory()->create();
    $message = Message::factory()->create(['user_id' => $user->id]);
    actingAs($user)
        ->delete(route('delete.message.api', $message->id))
        ->assertJson([
            'success' => true,
            'message' => 'Successfull delete message',
        ]);
    assertDatabaseCount(Message::class, 0);
});