<?php

use App\Models\User;

test('guest can view login page', function () {
    $this->get(route('login'))
        ->assertOk();
});

test('user can log in with valid credentials', function () {
    $user = User::factory()->create([
        'email' => 'alec@example.com',
        'password' => 'Password1!',
    ]);

    $this->post(route('login.store'), [
        'email' => 'alec@example.com',
        'password' => 'Password1!',
    ])->assertRedirect(route('dashboard'));

    $this->assertAuthenticatedAs($user);
});

test('user cannot log in with an invalid password', function () {
    User::factory()->create([
        'email' => 'alec@example.com',
        'password' => 'Password1!',
    ]);

    $this->post(route('login.store'), [
        'email' => 'alec@example.com',
        'password' => 'wrong-password',
    ])->assertSessionHasErrors('email');

    $this->assertGuest();
});