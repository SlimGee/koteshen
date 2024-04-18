<?php

// tests/Feature/Onboarding/BusinessControllerTest.php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Onbordable\Facades\Onboarding;

uses(RefreshDatabase::class);

test('the business setup page can be accessed', function () {
    $user = User::factory()->create();
    $this
        ->actingAs($user)
        ->get(route('app.onboarding.business.create'))
        ->assertStatus(200)
        ->assertViewIs('app.onboarding.business.create');
});

test('a new business can be created', function () {
    $user = User::factory()->create();
    $user->assignRole('user');
    $this
        ->actingAs($user)
        ->from(route('app.onboarding.business.create'))
        ->post(route('app.onboarding.business.store'), [
            'name' => 'Test Business',
            'address' => '123 Main St',
            'phone' => '719071581',
            'industry' => 'Technology',
            'phone_country' => 'ZW',
            'city' => 'Harare',
            'country' => 'Zimbabwe',
        ])
        ->assertRedirect();

    $this->assertDatabaseHas('businesses', [
        'user_id' => $user->id,
        'name' => 'Test Business',
        'address' => '123 Main St',
        'phone' => '555-1234',
        'industry' => 'Technology',
    ]);
});

test('the business setup page cannot be accessed if the user is not authenticated', function () {
    $this
        ->get(route('app.onboarding.business.create'))
        ->assertRedirect(route('login'));
});
