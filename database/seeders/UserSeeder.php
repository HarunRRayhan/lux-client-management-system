<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::factory()
                          ->create( [
                              'email' => 'superadmin@example.com',
                          ] );
        $superAdmin->assignRole( 'super-admin' );

        $admin = User::factory()
                     ->create( [
                         'email' => 'admin@example.com',
                     ] );
        $admin->assignRole( 'admin' );

        $staff = User::factory()
                     ->create( [
                         'email' => 'staff@example.com',
                     ] );
        $staff->assignRole( 'staff' );

        $support = User::factory()
                       ->create( [
                           'email' => 'support@example.com',
                       ] );
        $support->assignRole( 'support' );


    }
}
