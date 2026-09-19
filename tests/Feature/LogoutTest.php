<?php

use App\Models\User;

test('authenticated user can log out', function () {
    $this->actingAs(User::factory()->create());

    $this->post(route('logout'))
        ->assertRedirect('login');
    
    $this->assertGuest();
});

test('logged out user cannot open dashboard', function() {
    $this->actingAs(User::factory()->create());

    $this->post(route('logout'));

    $this->get(route('dashboard'))
        ->assertRedirect(route('login'));
});
