<?php

use App\Models\Follow;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;

it('can\'t follow user (unauthenticated)', function () {
    get(route('follow.user.api', 1))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t follow user (already following)', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    Follow::factory()->create(['user_id' => $user1, 'followed_user_id' => $user2,]);
    actingAs($user1)
        ->get(route('follow.user.api', $user2))
        ->assertJson([
            'message' => 'You already following this user',
        ]);
});

it('can follow user', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    actingAs($user1)
        ->get(route('follow.user.api', $user2))
        ->assertJson([
            'message' => 'Successfull follow user',
        ]);
    assertDatabaseCount(Follow::class, 1);
});

it('can\'t unfollow user (unauthenticated)', function () {
    get(route('unfollow.user.api', 1))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t unfollow user (not following this user)', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    actingAs($user1)
        ->get(route('unfollow.user.api', $user2))
        ->assertJson([
            'message' => 'You\'re not following this user',
        ]);
});

it('can unfollow user', function () {
    $user1 = User::factory()->create();
    $user2 = User::factory()->create();
    $follow = Follow::factory()->create(['user_id' => $user1, 'followed_user_id' => $user2]);
    actingAs($user1)
        ->get(route('unfollow.user.api', $user2))
        ->assertJson([
            'message' => 'Successfull unfollow user',
        ]);
    assertDatabaseCount(Follow::class, 0);
    assertDatabaseMissing(Follow::class, [
        'id' => $follow->id,
    ]);
});
