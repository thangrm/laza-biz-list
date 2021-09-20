<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class ListingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $number = 3;
        for ($i = 0; $i < $number; $i++) {
            DB::table('listings')->insert([
                'user_id' => 1,
                'name' => 'Listing ' . $i,
                'address' => 'address ' . $i,
                'website' => 'website' . $i . '.com',
                'email' => 'listing' . $i . '@email.com',
                'phone' => strval(rand(100000000,999999999999)),
                'bio' => Str::random('50'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
