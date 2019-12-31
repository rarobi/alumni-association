<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'sessions',
        ]);

        $this->call(AuthTableSeeder::class);
//        $this->call(PurposeTableSeeder::class);
        Model::reguard();
    }
}
