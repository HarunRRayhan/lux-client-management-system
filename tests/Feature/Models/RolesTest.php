<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RolesTest extends TestCase
{
    use RefreshDatabase;

    public function testHasDefaultRoles()
    {
        $roles = Role::all();
        $this->assertTrue( $roles->count() > 0 );
    }

    public function testHasASuperAdminRole()
    {
        $superAdminRole = Role::where( 'super_admin', true )->count();
        $this->assertTrue( $superAdminRole > 0 );
    }
}
