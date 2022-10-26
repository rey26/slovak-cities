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

    public function test_search_page_works()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_search_endpoint_failure()
    {
        $response = $this->postJson('/', ['name' => 'Te']);

        $response->assertStatus(422);
        $response->assertJson([
            'message' => 'The name must be at least 3 characters.'
        ]);
    }

    public function test_search_endpoint()
    {
        $response = $this->postJson('/', ['name' => 'Tes']);

        $response->assertStatus(200);
        $response->assertJson([
            'result' => [],
        ]);
    }
}
