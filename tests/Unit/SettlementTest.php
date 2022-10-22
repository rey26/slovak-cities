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

    public function test_settlement_can_have_a_child()
    {
        $parent = Settlement::factory()->create();

        Settlement::factory()->state(['parent_id' => $parent->id])->create();

        $this->assertInstanceOf(Settlement::class, $parent->children->first());
    }

    public function test_settlement_can_have_a_parent()
    {
        $parent = Settlement::factory()->create();

        Settlement::factory()->state(['parent_id' => $parent->id])->create();

        $this->assertInstanceOf(Settlement::class, $parent->parent);
    }

    public function test_settlement_can_have_many_children()
    {
        $parent = Settlement::factory()->create();

        Settlement::factory()->state(['parent_id' => $parent->id])->create();
        Settlement::factory()->state(['parent_id' => $parent->id])->create();

        $this->assertCount(2, $parent->children);
    }

    public function test_settlement_relationship_recursion()
    {
        $parent = Settlement::factory()->create();

        $child = Settlement::factory()->state(['parent_id' => $parent->id])->create();
        Settlement::factory()->state(['parent_id' => $child->id])->create();

        $this->assertInstanceOf(Settlement::class, $parent->children->first());
        $this->assertInstanceOf(Settlement::class, $child->children->first());
    }

    public function test_root_settlement_is_valid()
    {
        $root = Settlement::factory()->state(['parent_id' => null])->create();

        $this->assertNull($root->parent);
    }
}
