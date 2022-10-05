<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([

            [
                'full_name' => 'Ahmed M Bakri',
                'phone' => '01015891836',
                'password' => bcrypt('123456'),

            ]




            ]);
    }
}
