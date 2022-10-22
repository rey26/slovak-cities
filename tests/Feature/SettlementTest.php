<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettlementTest extends TestCase
{
    /**
     * A basic route works properly.
     *
     * @return void
     */
    public function test_basic_route_works_properly()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
