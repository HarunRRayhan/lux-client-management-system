<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class MakeSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:super-admin
    {user : The ID or email of the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a user as super admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $input = $this->argument('user');
        $user = User::whereId($input)->orWhere('email', $input)->first();
        if (! $user) {
            $this->error('Invalid User Provided');

            return 1;
        }

        $superAdminRole = Role::where('name', 'super-admin')->orWhere('super_admin', true)->first();
        if (! $superAdminRole) {
            $this->error('No super admin role found');

            return 1;
        }

        $user->assignRole($superAdminRole);
        $this->info("User #{$user->id} made as super admin successfully");

        return 0;
    }
}
