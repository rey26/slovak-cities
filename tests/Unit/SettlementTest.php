<?php

namespace Tests\Unit;

use App\Models\Settlement;
use Tests\TestCase;

class SettlementTest extends TestCase
{
    /**
     * Test if settlement can be created
     *
     * @return void
     */
    public function test_settlement_can_be_created()
    {
        /** @var Settlement $settlement */
        $settlement = Settlement::create([
            'name' => 'Test Name',
            'mayor_name' => 'Mayor Name',
            'city_hall_address' => 'Address 1',
            'phone' => '+4219',
            'web_address' => 'www.test.com'
        ]);

        $this->assertNull($settlement->parent_id);
        $this->assertCount(0, $settlement->children);
        $this->assertEquals('Test Name', $settlement->name);
        $this->assertEquals('Mayor Name', $settlement->mayor_name);
        $this->assertEquals('Address 1', $settlement->city_hall_address);
        $this->assertEquals('+4219', $settlement->phone);
        $this->assertNull($settlement->fax);
        $this->assertNull($settlement->email);
        $this->assertEquals('www.test.com', $settlement->web_address);
    }
}
