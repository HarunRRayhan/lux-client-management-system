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

    public function testNormalUserCantViewCompanies()
    {
        $user     = User::factory()->create();
        $response = $this->actingAs( $user )->get( route( 'clients.companies.index' ) );
        $response->assertStatus( 403 );
    }

    public function testSuperAdminCanViewCompanies()
    {
        $user = User::factory()->create();
        $user->assignRole( 'super-admin' );
        $response = $this->actingAs( $user )->get( route( 'clients.companies.index' ) );
        $response->assertStatus( 200 );
    }

    public function testNormalUserCantAccessAddCompanyForm()
    {
        $user     = User::factory()->create();
        $response = $this->actingAs( $user )->get( route( 'clients.companies.create' ) );
        $response->assertStatus( 403 );
    }

    public function testUserCanSeeCompaniesListIfHasPermission()
    {
        $user = User::factory()->create();
        $user->givePermissionTo( 'read companies' );
        $response = $this->actingAs( $user )->get( route( 'clients.companies.index' ) );
        $response->assertStatus( 200 );
    }


    public function testAUserCanSeeAddCompanyFormIfHasPermission()
    {
        $user = User::factory()->create();
        $user->givePermissionTo( 'create companies' );
        $response = $this->actingAs( $user )->get( route( 'clients.companies.create' ) );
        $response->assertStatus( 200 );
    }

    public function testNormalUserCantAccessEditCompanyForm()
    {
        $user     = User::factory()->create();
        $company  = Company::factory()->create();
        $response = $this->actingAs( $user )->get( route( 'clients.companies.edit', $company ) );
        $response->assertStatus( 403 );
    }

    public function testUserCanAccessEditCompanyFormIfHasPermission()
    {
        $user = User::factory()->create();
        $user->givePermissionTo( 'update companies' );
        $company  = Company::factory()->create();
        $response = $this->actingAs( $user )->get( route( 'clients.companies.edit', $company ) );
        $response->assertStatus( 200 );
    }

    public function testSuperAdminCanViewCompany()
    {
        $user = User::factory()->create();
        $user->assignRole( 'super-admin' );
        $response = $this->actingAs( $user )->get( route( 'clients.companies.create' ) );
        $response->assertStatus( 200 );
    }

    public function testSeeAddCompanyFormComponent()
    {
        $user = User::factory()->create();
        $user->assignRole( 'super-admin' );
        $this->actingAs( $user )
             ->get( route( 'clients.companies.create' ) )
             ->assertSeeLivewire( 'companies.create' );
    }

    public function testSeeCompaniesListComponent()
    {
        $user = User::factory()->create();
        $user->assignRole( 'super-admin' );
        $this->actingAs( $user )
             ->get( route( 'clients.companies.index' ) )
             ->assertSeeLivewire( 'companies.index' );
    }

    public function testSeeEditCompanyComponent()
    {
        $user    = User::factory()->create();
        $company = Company::factory()->create();
        $user->assignRole( 'super-admin' );
        $this->actingAs( $user )
             ->get( route( 'clients.companies.edit', $company ) )
             ->assertSeeLivewire( 'companies.edit' );
    }
}
