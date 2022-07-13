<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'          => 'demo',
                'email'         => 'demo@gmail.com',
                'password'      => '$2y$10$WNEJATzadqu1T7yqImCHT.axvcj7R9F8PmP.r3TvsuWAOP61IDHm6',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        ]);
    }
}
