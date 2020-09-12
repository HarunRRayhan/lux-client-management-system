<?php

namespace Tests\Feature\Models;

use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testCanCreateAddress()
    {
        $address = Address::factory()->create();
        $this->assertDatabaseHas( 'addresses', [ 'zip' => $address->zip ] );
    }
}
