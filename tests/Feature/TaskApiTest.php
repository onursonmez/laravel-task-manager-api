<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $response = $this->post('/api/login', [
            'email' => 'example@example.com',
            'password' => '123456',
        ]);

        $response->assertStatus(200);
        $this->token = $response->json('token');
    }

    public function test_create_task()
    {
        $response = $this->post('/api/tasks', [
            'title' => 'Test Task',
            'description' => 'Testing task creation',
            'status' => 'pending',
        ], [
            'Authorization' => 'Bearer ' . $this->token,
        ]);
    
        $response->assertStatus(201);
    }
}
