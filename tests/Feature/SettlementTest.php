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
    public function test_index_route_works_properly()
    {
        $response = $this->get('/settlements');

        $response->assertStatus(200);
    }

    public function test_detail_route()
    {
        $response = $this->get('/settlements/1');

        $response->assertStatus(200);
    }
}
