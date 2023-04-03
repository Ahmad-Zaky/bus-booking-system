<?php

namespace Tests\Feature\Admin;

use function Pest\Faker\fake;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

uses(\Tests\TestCase::class)
    ->beforeAll(function() {
        global $globals;
        
        bootstrapApp();
        refreshDB();

        $globals["admin.auth.admin"] = newAdmin();
        $globals["admin.auth.superAdmin"] = newSuperAdmin();
    })
    ->beforeEach(function () { prepare($this, "admin.auth"); })
    ->group("auth");

it('can authenticate admin using the login screen', function () {
    $this->postJson(route("admin.login"), [
        'email' => $this->admin->email,
        'password' => 'password',
    ])
    ->assertStatus(Response::HTTP_OK)
    ->assertJsonFragment([
        "status" => true,
        'message' => __("Admin Logged In Successfully"),
    ])
    ->assertJsonStructure([
        "status",
        'message',
        'token',
    ]);
});

it("show validation error on email when admin credential donot match", function () {
    $this->postJson(route("admin.login"), [
        'email' => 'wrong@email.com',
        'password' => 'wrong password'
    ])
    ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
    ->assertJson([
        'status' => false,
        'message' => __('Email & Password does not match with our record.'),
    ]);
});


it('can authenticate super admin using the login screen', function () {
    $this->postJson(route("admin.login"), [
        'email' => $this->superAdmin->email,
        'password' => 'password',
    ])
    ->assertStatus(Response::HTTP_OK)
    ->assertJsonFragment([
        "status" => true,
        'message' => __("Admin Logged In Successfully"),
    ])
    ->assertJsonStructure([
        "status",
        'message',
        'token',
    ]);
});

it('can register as new admin using the register screen', function () {
    $this->actingAs($this->admin, "admin")
        ->postJson(route("admin.register"), [
            "name" => fake()->name(),
            "email" => fake()->email(),
            "password" => "password",
            "password_confirmation" => "password"
        ])
        ->assertStatus(Response::HTTP_OK)
        ->assertJsonFragment([
            "status" => true,
            'message' => __("Admin registered Successfully"),
        ])
        ->assertJsonStructure([
            "status",
            'message',
            'token',
        ]);
});

it('can logout admin', function () {
    $response = $this->actingAs($this->admin, "admin")
        ->postJson(route("admin.logout"))
        ->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            "status" => true,
            "message" => __("Admin Logged out Successfully"),
        ]);
});