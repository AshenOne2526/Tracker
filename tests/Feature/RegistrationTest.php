<?php

use App\Models\User;

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
