<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'member_status' => 'active',
            'email' => 'admin@society.com',
            'password' => '123456',
        ]);

        User::create([
            'first_name' => 'Robiul',
            'last_name' => 'Alam',
            'member_status' => 'active',
            'email' => 'member@society.com',
            'password' => '123456',
        ]);

        $this->enableForeignKeys();

    }
}
