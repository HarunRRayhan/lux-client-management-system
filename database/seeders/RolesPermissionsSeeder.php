<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // create roles and assign existing permissions
        $role0 = Role::create(['name' => 'super-admin', 'super_admin' => true]);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('add users', 'view users', 'edit users', 'delete users');

        $role2 = Role::create(['name' => 'staff']);
        $role2->givePermissionTo('add users', 'view users', 'edit users', 'delete users');

        $role3 = Role::create(['name' => 'support']);
        $role3->givePermissionTo('add users', 'view users', 'edit users', 'delete users');

        $role4 = Role::create(['name' => 'client']);

        // create demo users
        $user0 = User::factory()->create([
            'first_name' => 'Super',
            'last_name'  => 'Admin',
            'email'      => 'superadmin@lux.test',
        ]);
        $user0->assignRole($role0);

        $user1 = User::factory()->create([
            'first_name' => 'Admin',
            'last_name'  => 'User',
            'email'      => 'admin@lux.test',
        ]);
        $user1->assignRole($role1);

        $user2 = User::factory()->create([
            'first_name' => 'Staff',
            'last_name'  => 'User',
            'email'      => 'staff@test.test',
        ]);
        $user2->assignRole($role2);

        $user3 = User::factory()->create([
            'first_name' => 'Support',
            'last_name'  => 'User',
            'email'      => 'support@lux.test',
        ]);
        $user3->assignRole($role3);

        $user4 = User::factory()->create([
            'first_name' => 'Demo',
            'last_name'  => 'Client',
            'email'      => 'client@lux.test',
        ]);
        $user4->assignRole($role4);
    }
}
