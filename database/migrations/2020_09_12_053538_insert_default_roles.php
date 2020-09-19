<?php

use Illuminate\Database\Migrations\Migration;
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
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'read companies']);
        Permission::create(['name' => 'create companies']);
        Permission::create(['name' => 'update companies']);
        Permission::create(['name' => 'delete companies']);

        // create roles and assign existing permissions
        $role0 = Role::create(['name' => 'super-admin', 'super_admin' => true]);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('create users', 'read users', 'update users', 'delete users', 'read companies', 'create companies', 'update companies', 'delete companies');

        $role2 = Role::create(['name' => 'staff']);
        $role2->givePermissionTo('create users', 'read users', 'update users', 'delete users');

        $role3 = Role::create(['name' => 'support']);
        $role3->givePermissionTo('create users', 'read users', 'update users', 'delete users');

        $role4 = Role::create(['name' => 'client']);
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
