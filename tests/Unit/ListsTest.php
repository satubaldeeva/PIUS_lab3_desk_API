<?php

use App\Domains\Desk\Models\Desk;
use App\Domains\Lists\Models\Lists;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

//GET
test('GET /api/v1/lists 200', function () {
    Lists::factory()->create([
        'desk_id' => Desk::factory()->create()->id
    ]);
    $response = $this->get('/api/v1/lists');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'desk_id',
                    'description',
                ]
            ]
        ]);
});

test('GET /api/v1/lists/{id} 200', function () {
    $list = Lists::factory()->create([
        'desk_id' => Desk::factory()->create()->id
    ]);

    $expected = [
        'data' => [
            'id' => $list['id'],
            'name' => $list['name'],
            'desk_id' => $list['desk_id'],
            'description' => $list['description'],
        ]
    ];

    $this->getJson("/api/v1/lists/{$list->id}")
        ->assertStatus(200)
        ->assertJson($expected);
});

test('GET /api/v1/lists/{id} 404', function () {
    $this->getJson("/api/v1/lists/-1")
        ->assertStatus(404);
});


//POST
test('POST /api/v1/lists 201', function () {
    $list = Lists::factory()->raw([
            'desk_id' => Desk::factory()->create()->id
        ]);
    $expected = [
        'data' => [
            'name' => $list['name'],
            'desk_id' => $list['desk_id'],
            'description' => $list['description'],
        ]
    ];
    $this->postJson("/api/v1/lists", $list)
        ->assertStatus(201)
        ->assertJson($expected);
});

test('POST /api/v1/lists 400', function () {
    $list = Lists::factory()->raw([
        'desk_id' => Desk::factory()->create()->id
    ]);
    unset($list['name']);

    $this->postJson("/api/v1/lists", $list)
        ->assertStatus(400);
});

//PUT
test('PUT /api/v1/lists/{id} 200', function () {
    $list = Lists::factory()->create([
        'desk_id' => Desk::factory()->create()->id
    ]);

    $requestBody = [
        'name' => 'new name',
        'desk_id' => Desk::factory()->create()->id,
        'description' => 'new description',
    ];

    $expected = [
        'data' => [
            'id' => $list['id'],
            'name' => $requestBody['name'],
            'desk_id' => $requestBody['desk_id'],
            'description' => $requestBody['description'],
        ]
    ];
    $this->putJson("/api/v1/lists/{$list->id}", $requestBody)
        ->assertStatus(200)
        ->assertJson($expected);
});

test('PUT /api/v1/lists/{id} 404', function () {
    $requestBody = [
        'name' => 'new name',
        'desk_id' => Desk::factory()->create()->id,
        'description' => 'new description',
    ];

    $this->putJson("/api/v1/lists/-1", $requestBody)
        ->assertStatus(404);
});

test('PUT /api/v1/lists/{id} 400', function () {
    $list = Lists::factory()->create([
        'desk_id' => Desk::factory()->create()->id
    ]);

    $requestBody = [];

    $this->putJson("/api/v1/lists/{$list->id}", $requestBody)
        ->assertStatus(400);
});

//PATCH
test('PATCH /api/v1/lists/{id} 200', function () {
    $list = Lists::factory()->create([
        'desk_id' => Desk::factory()->create()->id
    ]);

    $requestBody = [
        'name' => 'new name',
    ];

    $expected = [
        'data' => [
            'id' => $list['id'],
            'name' => $requestBody['name'],
            'desk_id' => $list['desk_id'],
            'description' => $list['description'],
        ]
    ];
    $this->patchJson("/api/v1/lists/{$list->id}", $requestBody)
        ->assertStatus(200)
        ->assertJson($expected);
});

test('PATCH /api/v1/lists/{id} 404', function () {
    $requestBody = [
        'name' => 'new name',
    ];

    $this->patchJson("/api/v1/lists/-1", $requestBody)
        ->assertStatus(404);
});

test('PATCH /api/v1/lists/{id} 400', function () {
    $list = Lists::factory()->create([
        'desk_id' => Desk::factory()->create()->id
    ]);

    $requestBody = [
        'name' => 50
    ];

    $this->patchJson("/api/v1/lists/{$list->id}", $requestBody)
        ->assertStatus(400);
});

//DELETE
test('DELETE /api/v1/lists/{id} 204', function () {
    $list = Lists::factory()->create([
        'desk_id' => Desk::factory()->create()->id
    ]);

    $this->deleteJson("/api/v1/lists/{$list->id}")
        ->assertStatus(204);
});

test('DELETE /api/v1/lists/{id} 204 non-existing desk', function () {
    $this->deleteJson("/api/v1/lists/-1")
        ->assertStatus(204);
});
