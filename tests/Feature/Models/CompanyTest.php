<?php

namespace Tests\Feature\Models;

use App\Models\Address;
use App\Models\Company;
use App\Models\User;
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

    public function testNormalUserCantAccessCompany()
    {
        $user     = User::factory()->create();
        $response = $this->actingAs( $user )->get( route( 'companies.create' ) );
        $response->assertStatus( 403 );
    }

//    public function testNormalUserCantAddACompany()
//    {
//        $user        = User::factory()->create();
//        $testCompany = [
//            'name' => 'Test Company'
//        ];
//        $response    = $this->actingAs( $user )->post( '/companies', $testCompany );
//        $response->assertStatus( 403 );
//
//        $this->assertDatabaseMissing( 'companies', $testCompany );
//    }
}
