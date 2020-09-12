<?php

namespace Tests\Feature\Models;

use App\Models\Address;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testCreateCompany()
    {
        $company = Company::factory()->create();
        $this->assertDatabaseHas( 'companies', [ 'name' => $company->name ] );
    }

    public function testCompanyCanHaveAnAddress()
    {
        $company = Company::factory()->create();
        $address = Address::factory()->create( [
            'addressable_type' => Company::class,
            'addressable_id'   => $company->id,
        ] );

        $this->assertSame( $company->address->id, $address->id );
    }
}
