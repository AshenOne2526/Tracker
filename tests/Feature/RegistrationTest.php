<?php

use App\Models\User;
use App\Enums\UserRole;

test('guest can view registration page', function () {
    $this->get(route('register'))
        ->assertOk();
});

test('guest can register with valid data', function () {
    $response = $this->post(route('register.store'), [
        'name' => 'Alec Test',
        'email' => 'alec@example.com',
        'password' => 'Password1!',
        'terms' => '1',
    ]);

    $response->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();

    $this->assertDatabaseHas('users', [
        'name' => 'Alec Test',
        'email' => 'alec@example.com',
    ]);

    expect(User::where('email', 'alec@example.com')->first())
        ->name->toBe('Alec Test');
});

test('registration form shows an error when the email is taken', function () {
    User::factory()->create([
        'email' => 'alec@example.com',
    ]);

    $this->from(route('register'))
        ->followingRedirects()
        ->post(route('register.store'), [
            'name' => 'Alec Test',
            'email' => 'alec@example.com',
            'password' => 'Password1!',
            'terms' => '1',
        ])
        ->assertSee(__('validation.unique', ['attribute' => 'email']))
        ->assertSee('value="Alec Test"', false)
        ->assertSee('value="alec@example.com"', false);

    $this->assertGuest();
});

test('registration form shows an error when the password is too week', function () {
    $this->from(route('register'))
        ->followingRedirects()
        ->post(route('register.store'), [
            'name' => 'Alec Test',
            'email' => 'alec@example.com',
            'password' => 'password',
            'terms' => '1',
        ])
        ->assertSee(__('The password is too weak'))
        ->assertSee('value="Alec Test"', false)
        ->assertSee('value="alec@example.com"', false);

    $this->assertGuest();
});

test('registration form shows an error when terms are not accepted', function () {
    $this->from(route('register'))
        ->followingRedirects()
        ->post(route('register.store'), [
            'name' => 'Alec Test',
            'email' => 'alec@example.com',
            'password' => 'Password1!',
        ])
        ->assertSee(__('validation.accepted', ['attribute' => 'terms']));

    $this->assertGuest();
});

test('registered users default to the employee role and cannot escalate it', function () {
    $this->post(route('register.store'), [
            'name' => 'Alec Test',
            'email' => 'alec@example.com',
            'password' => 'Password1!',
            'terms' => '1',
            'role' => UserRole::Admin->value,
    ]);

    expect(User::where('email', 'alec@example.com')->firstOrFail()->role)
        ->toBe(UserRole::Employee);
});