<?php

use App\Domains\Desk\Models\Desk;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

//GET
test('GET /api/v1/desks 200', function () {
    Desk::factory()->count(5)->create();
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

test('GET /api/v1/desks/{id} 200', function () {
    $desk = Desk::factory()->create();
    $expected = [
        'data' => [
            'id' => $desk['id'],
            'name' => $desk['name'],
        ]
    ];
    $this->getJson("/api/v1/desks/{$desk->id}")
        ->assertStatus(200)
        ->assertJson($expected);
});

test('GET /api/v1/desks/{id} 404', function () {
    $this->getJson("/api/v1/desks/-1")
        ->assertStatus(404);
});


//POST
test('POST /api/v1/desks 201', function () {
    $desk = Desk::factory()->raw();
    $expected = [
        'data' => [
            'name' => $desk['name'],
        ]
    ];
    $this->postJson("/api/v1/desks", $desk)
        ->assertStatus(201)
        ->assertJson($expected);
});

test('POST /api/v1/desks 400', function () {
    $desk = Desk::factory()->raw();
    unset($desk['name']);

    $this->postJson("/api/v1/desks", $desk)
        ->assertStatus(400);
});

//PUT
test('PUT /api/v1/desks/{id} 200', function () {
    $desk = Desk::factory()->create();

    $requestBody = [
        'name' => 'new name',
    ];

    $expected = [
        'data' => [
            'id' => $desk['id'],
            'name' => $requestBody['name'],
        ]
    ];
    $this->putJson("/api/v1/desks/{$desk->id}", $requestBody)
        ->assertStatus(200)
        ->assertJson($expected);
});

test('PUT /api/v1/desks/{id} 404', function () {
    Desk::factory()->create();

    $requestBody = [
        'name' => 'new name',
    ];

    $this->putJson("/api/v1/desks/-1", $requestBody)
        ->assertStatus(404);
});

test('PUT /api/v1/desks/{id} 400', function () {
    $desk = Desk::factory()->create();

    $requestBody = [];

    $this->putJson("/api/v1/desks/{$desk->id}", $requestBody)
        ->assertStatus(400);
});

//PATCH
test('PATCH /api/v1/desks/{id} 200', function () {
    $desk = Desk::factory()->create();

    $requestBody = [
        'name' => 'new name',
    ];

    $expected = [
        'data' => [
            'id' => $desk['id'],
            'name' => $requestBody['name'],
        ]
    ];
    $this->patchJson("/api/v1/desks/{$desk->id}", $requestBody)
        ->assertStatus(200)
        ->assertJson($expected);
});

test('PATCH /api/v1/desks/{id} 404', function () {
    $requestBody = [
        'name' => 'new name',
    ];

    $this->patchJson("/api/v1/desks/-1", $requestBody)
        ->assertStatus(404);
});

test('PATCH /api/v1/desks/{id} 400', function () {
    $desk = Desk::factory()->create();

    $requestBody = [
        'name' => 50
    ];

    $this->patchJson("/api/v1/desks/{$desk->id}", $requestBody)
        ->assertStatus(400);
});

//DELETE
test('DELETE /api/v1/desks/{id} 204', function () {
    $desk = Desk::factory()->create();

    $this->deleteJson("/api/v1/desks/{$desk->id}")
        ->assertStatus(204);
});

test('DELETE /api/v1/desks/{id} 204 non-existing desk', function () {
    $this->deleteJson("/api/v1/desks/-1")
        ->assertStatus(204);
});
