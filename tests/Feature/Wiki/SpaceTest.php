<?php

use App\Enums\Wiki\SpaceRole;
use App\Enums\Wiki\SpaceVisibility;
use App\Models\User;
use App\Models\Wiki\Space;

test('a manager can create a space and becomes its admin', function () {
    $manager = User::factory()->manager()->create();

    $responce = $this->actingAs($manager)->post(route('wiki.spaces.store'), [
        'name' => 'Company Handbook',
        'description' => 'Who we work.',
        'visibility' => SpaceVisibility::Open->value,
    ]);

    $space = Space::where('name', 'Company Handbook')->firstOrFail();

    $responce->assertRedirect(route('wiki.spaces.show', $space));

    expect($space->slug)->toBe('company-handbook')
        ->and($space->created_by)->toBe($manager->id)
        ->and($space->roleFor($manager))->toBe(SpaceRole::Admin);
});

test('an employee cannot create a space', function () {
    $this->actingAs(User::factory()->create())
        ->post(route('wiki.spaces.store'), [
            'name' => 'Company Handbook',
            'visibility' => SpaceVisibility::Open->value,
        ])
        ->assertForbidden();

    expect(Space::where('name', 'Company Handbook')->exists())->toBeFalse();
});