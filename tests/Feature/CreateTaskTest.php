<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTaskTest extends TestCase
{
    use RefreshDatabase; // <<< garante que as migrations rodem antes do teste

    public function test_create_task()
    {
        $response = $this->post('/tasks', [
            'title' => 'Estudar Laravel',
        ]);

        $response->assertStatus(302); // ou 201, dependendo da rota

        $this->assertDatabaseHas('tasks', [
            'title' => 'Estudar Laravel'
        ]);
    }
}
