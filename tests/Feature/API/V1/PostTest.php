<?php

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\post;

it('can\'t upload post (unauthenticated)', function () {
    post(route('post.store.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t upload post (validation error)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('post.store.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can upload post without caption', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('post.store.api'), [
            'image' => UploadedFile::fake()->image('hello.jpg'),
        ])
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
        ]);
    assertDatabaseCount(Post::class, 1);
});

it('can upload post', function () {
    $user = User::factory()->create();
    $image = UploadedFile::fake()->image('hello.jpg');
    actingAs($user)
        ->post(route('post.store.api'), [
            'image' => $image,
            'caption' => 'hello world'
        ])
        ->assertJson([
            'success' => true
        ]);
    assertDatabaseCount(Post::class, 1);
});

it('can\'t store comment to post (unauthenticated)', function () {
    post(route('store.comment.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t store comment to post (validation error', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('store.comment.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can\'t delete post (unauthenticated)', function () {
    post(route('post.delete.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t delete post (validation error)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('post.delete.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can\'t delete post (not allowed)', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    actingAs($user)
        ->post(route('post.delete.api'), [
            'postId' => $post->id,
        ])
        ->assertJson([
            'success' => false,
            'message' => 'you\'re not allowew to delete this post',
        ]);
    assertDatabaseCount(Post::class, 1);
});

it('can\'t delete post (post not found)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('post.delete.api'), [
            'postId' => -1,
        ])
        ->assertJson([
            'success' => false,
            'message' => 'Post not found',
        ]);
});

it('can delete post', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);
    actingAs($user)
        ->post(route('post.delete.api'), [
            'postId' => $post->id,
        ]);
    assertDatabaseMissing(Post::class, [
        'user_id' => $user->id,
        'image' => $post->image,
        'caption' => $post->caption,
    ]);
    assertDatabaseCount(Post::class, 0);
});

it('can store comment to post', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    actingAs($user)
        ->post(route('store.comment.api'), [
            'postId' => $post->id,
            'comment' => 'keren',
        ])
        ->assertJson([
            'success' => true,
        ]);
    assertDatabaseCount(Comment::class, 1);
});

it('can\'t show comment (validation error)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('show.comment.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can show comment', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    actingAs($user)
        ->post(route('show.comment.api'), [
            'postId' => $post->id,
        ])
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
        ]);
});

it('can\'t like post (unauthenticated)', function () {
    post(route('like.post.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('can\'t like post (validation error)', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('like.post.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('can like post', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    actingAs($user)
        ->post(route('like.post.api'), [
            'postId' => $post->id,
        ])
        ->assertJson([
            'success' => true,
        ]);
    assertDatabaseCount(Like::class, 1);
});

it('can unlike post', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();
    Like::factory()->create(['post_id' => $post->id, 'user_id' => $user->id]);
    actingAs($user)
        ->post(route('like.post.api'), [
            'postId' => $post->id,
        ])
        ->assertJson([
            'success' => true,
            'message' => 'post unlike',
        ]);
    assertDatabaseCount(Like::class, 0);
    assertDatabaseMissing(Like::class, [
        'post_id' => $post->id,
        'user_id' => $user->id,
    ]);
});