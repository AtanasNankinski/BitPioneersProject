<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            [
        	   'uuid' => '12ds-r343-ade5-234d',
           	    'orderedStartTime' => '2021-05-08 13:00:00',
                'orderedEndTime' => '2021-05-12 13:00:00',
                'user' => '1'
            ],
            [
               'uuid' => '13ds-r343-ade5-234d',
                'orderedStartTime' => '2021-05-23 13:00:00',
                'orderedEndTime' => '2021-05-26 13:00:00',
                'user' => '1'
            ],
            [
               'uuid' => '14ds-r343-ade5-234d',
                'orderedStartTime' => '2021-08-04 13:00:00',
                'orderedEndTime' => '2021-08-12 13:00:00',
                'user' => '1'
            ],
            [
               'uuid' => '15ds-r343-ade5-234d',
                'orderedStartTime' => '2021-05-08 13:00:00',
                'orderedEndTime' => '2021-05-12 13:00:00',
                'user' => '2'
            ],
            [
               'uuid' => '16ds-r343-ade5-234d',
                'orderedStartTime' => '2021-05-26 13:00:00',
                'orderedEndTime' => '2021-05-29 13:00:00',
                'user' => '3'
            ]
        ]);
    }
}
