<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InsertDefaultRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create permissions
        Permission::create( [ 'name' => 'view users' ] );
        Permission::create( [ 'name' => 'add users' ] );
        Permission::create( [ 'name' => 'edit users' ] );
        Permission::create( [ 'name' => 'delete users' ] );
        Permission::create( [ 'name' => 'create companies' ] );
        Permission::create( [ 'name' => 'add companies' ] );
        Permission::create( [ 'name' => 'edit companies' ] );
        Permission::create( [ 'name' => 'delete companies' ] );

        // create roles and assign existing permissions
        $role0 = Role::create( [ 'name' => 'super-admin', 'super_admin' => true ] );

        $role1 = Role::create( [ 'name' => 'admin' ] );
        $role1->givePermissionTo( 'add users', 'view users', 'edit users', 'delete users' );

        $role2 = Role::create( [ 'name' => 'staff' ] );
        $role2->givePermissionTo( 'add users', 'view users', 'edit users', 'delete users' );

        $role3 = Role::create( [ 'name' => 'support' ] );
        $role3->givePermissionTo( 'add users', 'view users', 'edit users', 'delete users' );

        $role4 = Role::create( [ 'name' => 'client' ] );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
