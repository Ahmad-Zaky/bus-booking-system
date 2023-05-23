<?php

namespace Tests\Feature;

use function Pest\Faker\fake;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(\Illuminate\Http\Response::class)->beforeAll(function() {
    global $globals;

    bootstrapApp();
    refreshDB();

    $globals["auth.user"] = newUser();
})
->beforeEach(function () { prepare($this, "auth"); })
->group("auth");

it('can authenticate user using the login screen', function () {
    $this->postJson(route("login"), [
        'email' => $this->user->email,
        'password' => 'password',
    ])
    ->assertStatus(Response::HTTP_OK)
    ->assertJsonFragment([
        "status" => true,
        'message' => __("User Logged In Successfully"),
    ])
    ->assertJsonStructure([
        "status",
        'message',
        'token',
    ]);
});

it("show validation error on email when user credential donot match", function () {
    $this->postJson(route("login"), [
        'email' => 'wrong@email.com',
        'password' => 'wrong password'
    ])
    ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
});

it('can register as new user using the register screen', function () {
    $this->actingAs($this->user)
        ->postJson(route("register"), [
            "name" => fake()->name(),
            "email" => fake()->email(),
            "password" => "password",
            "password_confirmation" => "password"
        ])
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonFragment([
            "status" => true,
            'message' => __("User registered Successfully"),
        ])
        ->assertJsonStructure([
            "status",
            'message',
            'token',
        ]);
});

it('can logout user', function () {
    $this->actingAs($this->user)
        ->postJson(route("logout"))
        ->assertStatus(Response::HTTP_OK)
        ->assertJson([
            "status" => true,
            "message" => __("User Logged out Successfully"),
        ]);
});