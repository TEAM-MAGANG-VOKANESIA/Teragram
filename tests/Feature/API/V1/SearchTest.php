<?php

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('it can\'t access search page (unauthenticated)', function () {
    get(route('search.index.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('it can access search page', function () {
    $user = User::factory()->create();
    actingAs($user)
        ->get(route('search.index.api'))
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
        ]);
});

it('it can access search page with most popular post data', function () {
    $user = User::factory()->create();
    $post1 = Post::factory()->create();
    $post2 = Post::factory()->create();

    Like::factory()->create(['post_id' => $post2->id]);
    Like::factory()->create(['post_id' => $post2->id]);
    Like::factory()->create(['post_id' => $post1->id]);
    Comment::factory()->create(['post_id' => $post2->id]);

    actingAs($user)
        ->get(route('search.most.popular.api'))
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
            'posts' => [
                'data' => [
                    [
                        'id' => $post2->id,
                    ],
                    [
                        'id' => $post1->id,
                    ],
                ],
            ],
        ]);
});

it('it can access search page with most like post data', function () {
    $user = User::factory()->create();
    $post1 = Post::factory()->create();
    $post2 = Post::factory()->create();

    Like::factory()->create(['post_id' => $post2->id]);
    Like::factory()->create(['post_id' => $post2->id]);
    Like::factory()->create(['post_id' => $post1->id]);
    actingAs($user)
        ->get(route('search.most.like.api'))
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
            'posts' => [
                'data' => [
                    [
                        'id' => $post2->id,
                    ],
                    [
                        'id' => $post1->id,
                    ],
                ],
            ],
        ]);
});

it('it can access search page with most comment post data', function () {
    $user = User::factory()->create();
    $post1 = Post::factory()->create();
    $post2 = Post::factory()->create();

    Comment::factory()->create(['post_id' => $post2->id]);
    Comment::factory()->create(['post_id' => $post2->id]);
    Comment::factory()->create(['post_id' => $post1->id]);
    actingAs($user)
        ->get(route('search.most.comment.api'))
        ->assertStatus(200)
        ->assertJson([
            'success' => true,
            'posts' => [
                'data' => [
                    [
                        'id' => $post2->id,
                    ],
                    [
                        'id' => $post1->id,
                    ],
                ],
            ],
        ]);
});

it('it can\'t search (unauthenticated)', function() {
    post(route('search.api'))
        ->assertStatus(302)
        ->assertRedirect('/login');
});

it('it can\'t search (validation error)', function() {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('search.api'))
        ->assertJson([
            'success' => false,
        ]);
});

it('it can search', function() {
    $user = User::factory()->create();
    actingAs($user)
        ->post(route('search.api'), [
            'searchValue' => 'Jamal',
        ])
        ->assertJson([
            'success' => true,
        ]);
});