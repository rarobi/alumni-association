<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        User::find(1)->assignRole(config('access.users.admin_role'));
        User::find(2)->assignRole('member');
        User::find(3)->assignRole('member');
        User::find(4)->assignRole('member');
        User::find(5)->assignRole('member');
        User::find(6)->assignRole('member');
        User::find(7)->assignRole('member');
//        User::find(3)->assignRole(config('access.users.default_role'));

        $this->enableForeignKeys();
    }
}
