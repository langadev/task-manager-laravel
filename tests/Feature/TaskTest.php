<?php

namespace Tests\Feature;

use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_homepage_loads()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
