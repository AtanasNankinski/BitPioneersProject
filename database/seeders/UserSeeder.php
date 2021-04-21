<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [
    		[
       			'email' => 'user1@test.com',
       			'password' => 'user1pass',
       			'firstName' => 'Georgi',
       			'lastName' => 'Kujoharov',
       			'birthdate' => '1998-02-12',
            'isRetailer' => true
       		],
       		[
       			'email' => 'user2@test.com',
       			'password' => 'user2pass',
       			'firstName' => 'Nikolay',
       			'lastName' => 'Georgiev',
       			'birthdate' => '1995-12-22',
            'isRetailer' => false
       		],
       		[
       			'email' => 'user3@test.com',
       			'password' => 'user3pass',
       			'firstName' => 'Kaloyan',
       			'lastName' => 'Minzuharov',
       			'birthdate' => '1996-11-02',
            'isRetailer' => false
       		],
       		[
       			'email' => 'user4@test.com',
       			'password' => 'user4pass',
       			'firstName' => 'Nikolay',
       			'lastName' => 'Georgiev',
       			'birthdate' => '1992-12-12',
            'isRetailer' => false
       		]
       	];

       	DB::table('users')->delete();
       	DB::table('users')->insert($users);
    }
}
