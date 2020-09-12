<?php

namespace Tests\Feature\Commands;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MakeSuperAdminTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testShouldFailedIfUserNotExists()
    {
        $missingUserId = 193849;
        $this->artisan( "make:super-admin {$missingUserId}" )
             ->expectsOutput( "Invalid User Provided" )
             ->assertExitCode( 1 );
    }

    public function testMakeAnUserSuperAdminByCommandUsingUserID()
    {
        $user = User::factory()->create();
        $this->artisan( "make:super-admin {$user->id}" )
             ->expectsOutput( "User #{$user->id} made as super admin successfully" )
             ->assertExitCode( 0 );
        $this->assertTrue( $user->is_super_admin );
    }

    public function testMakeAnUserSuperAdminByCommandUsingUserEmail()
    {
        $user = User::factory()->create();
        $this->artisan( "make:super-admin {$user->email}" )
             ->expectsOutput( "User #{$user->id} made as super admin successfully" )
             ->assertExitCode( 0 );
        $this->assertTrue( $user->is_super_admin );
    }
}
