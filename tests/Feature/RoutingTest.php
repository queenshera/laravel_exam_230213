<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function test_task1()
    {
        $response = $this->get('/');

        $response->assertOk();

        $response->assertSeeText('Welcome to Laravel');
    }

    public function test_task2()
    {
        $response = $this->get('/aboutus');

        $response->assertNotFound();
    }
}
