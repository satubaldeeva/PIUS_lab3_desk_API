<?php

namespace Tests\Unit\Security;

use App\Models\Desk;
use Database\Factories\DeskFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

//GET
test('get: list all desks', function () {
    $desk = Desk::factory()->count(5)->create();
    $response = $this->get('/api/v1/desks');

    $response->assertStatus(200)
        ->assertJsonCount(5, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                ]
            ]
        ]);
});

//todo get with id

//todo get with wrong id (404)


//POST
test('post: create a valid security', function () {
    $desk = DeskFactory::new()->raw();
    $expected = [
        'data' => [
            'name' => $desk['name'],
        ]
    ];
    $this->postJson("/api/v1/desks", $desk)
        ->assertStatus(201)
        ->assertJson($expected);
});

//todo bad request post