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
            'name' => 'Admin',
            'email' => 'admin@society.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Member 1',
            'email' => 'member1@society.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Member 2',
            'email' => 'member2@society.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Member 3',
            'email' => 'member3@society.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Member 4',
            'email' => 'member4@society.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Member 5',
            'email' => 'member5@society.com',
            'password' => '123456',
        ]);

        User::create([
            'name' => 'Member 6',
            'email' => 'member6@society.com',
            'password' => '123456',
        ]);

        $this->enableForeignKeys();

    }
}
