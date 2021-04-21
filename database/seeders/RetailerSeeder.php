<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RetailerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $retailers = [
        	'dealername' => 'Georgi Kujorharov',
        	'dealernumber' => '0884562345',
        	'user' => '1'
        ];

        DB::table('retailers')->delete();
        DB::table('retailers')->insert($retailers);
    }
}
