<?php

use App\Models\Story;
use App\Models\User;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('can\'t get story (unauthenticated)', function () {
    get(route('get.story.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can get story', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->get(route('get.story.api'))
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
        ]);
});

it('can\'t upload story (unauthenticated)', function () {
    post(route('post.story.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t upload story (validation error)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('post.story.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can upload story', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('post.story.api'), [
            'user_id' => $user->id,
            'image' => UploadedFile::fake()->image('hello.jpg'),
            'text' => 'hello world',
        ])
        ->assertJson([
            'success' => true,
            'message' => 'Successfull upload story',
        ]);
    assertDatabaseCount(Story::class, 1);
});

it('can upload story without text', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('post.story.api'), [
            'user_id' => $user->id,
            'image' => UploadedFile::fake()->image('hello.jpg'),
        ])
        ->assertJson([
            'success' => true,
            'message' => 'Successfull upload story',
        ]);
    assertDatabaseCount(Story::class, 1);
});

it('can\'t show story (unauthenticated)', function () {
    $story = Story::factory()->create();
    get(route('show.story.api', $story))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can show story', function () {
    $user = User::factory()->create();
    $story = Story::factory()->create();
    actingAs($user)
        ->get(route('show.story.api', $story->id))
        ->assertJson([
            'success' => true,
        ]);
});

it('can\'t delete story (unauthenticated)', function () {
    post(route('delete.story.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t delete story (validation error)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('delete.story.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can\'t delete story (not owner)', function () {
    $user = User::factory()->create();
    $story = Story::factory()->create();
    actingAs($user)
        ->post(route('delete.story.api'), [
            'storyId' => $story->id,
        ])
        ->assertJson([
            'success' => false,
            'message' => 'You\'re not owner of the story',
        ]);
});

it('can delete story', function () {
    $user = User::factory()->create();
    $story = Story::factory()->create(['user_id' => $user->id]);
    actingAs($user)
        ->post(route('delete.story.api'), [
            'storyId' => $story->id,
        ])
        ->assertJson([
            'success' => true,
            'message' => 'Successfull delete story',
        ]);
    assertDatabaseMissing(Story::class, [
        'user_id' => $user->id,
        'image' => $story->image,
        'text' => $story->text,
    ]);
    assertDatabaseCount(Story::class, 0);
});