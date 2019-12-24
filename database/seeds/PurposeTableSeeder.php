<?php

use App\Modules\Account\Models\Purpose;
use Illuminate\Database\Seeder;

class PurposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purpose = Purpose::findOrNew(1);
        $purpose->purpose = 'Others';
        $purpose->save();
    }
}
