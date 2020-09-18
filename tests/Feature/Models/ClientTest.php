<?php

namespace Tests\Feature\Models;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testCreateClient()
    {
        $client = User::factory()->create();
        $client->assignRole( 'client' );
        $this->assertDatabaseHas( 'users', [ 'email' => $client->email ] );
    }

    public function testClientCanOwnACompany()
    {
        $client = User::factory()->has( Company::factory()->hasAddress() )->create();
        $client->assignRole( 'client' );
        $this->assertDatabaseHas( 'companies', [ 'name' => $client->company->name ] );
    }

    public function testNormalUserCantViewClients()
    {
        $user     = User::factory()->create();
        $response = $this->actingAs( $user )->get( route( 'clients.index' ) );
        $response->assertStatus( 403 );
    }

    public function testSuperAdminCanViewClients()
    {
        $user = User::factory()->create();
        $user->assignRole( 'super-admin' );
        $response = $this->actingAs( $user )->get( route( 'clients.index' ) );
        $response->assertStatus( 200 );
    }

    public function testUserCanSeeClientsIfHasPermission()
    {
        $user = User::factory()->create();
        $user->givePermissionTo( 'read users' );
        $response = $this->actingAs( $user )->get( route( 'clients.index' ) );
        $response->assertStatus( 200 );
    }

    public function testUserCantSeeClientsListComponent()
    {
        $user = User::factory()->create();
        $this->actingAs( $user )
             ->get( route( 'clients.index' ) )
             ->assertDontSeeLivewire( 'clients.index' );
    }

    public function testAUseCanSeeClientsListComponentIfHasPermission()
    {
        $user = User::factory()->create();
        $user->givePermissionTo( 'read users' );
        $this->actingAs( $user )
             ->get( route( 'clients.index' ) )
             ->assertSeeLivewire( 'clients.index' );
    }

    public function testSuperAdminCanSeeClientsListComponent()
    {
        $user = User::factory()->create();
        $user->assignRole( 'super-admin' );
        $this->actingAs( $user )
             ->get( route( 'clients.index' ) )
             ->assertSeeLivewire( 'clients.index' );
    }

    public function testClientShowingOnList()
    {
        $user = User::factory()->create();
        $user->givePermissionTo( 'read users' );
        $client = User::factory()->create();
        $client->assignRole( 'client' );
        $this->actingAs( $user )->get( route( 'clients.index' ) )->assertSee( $client->full_name );
    }

    public function testSeeClientCompanyOnList()
    {
        $user = User::factory()->create();
        $user->givePermissionTo( 'read users' );
        $client = User::factory()->has( Company::factory()->hasAddress() )->create();
        $client->assignRole( 'client' );
        $this->actingAs( $user )->get( route( 'clients.index' ) )->assertSee( $client->company->name );
    }
}
