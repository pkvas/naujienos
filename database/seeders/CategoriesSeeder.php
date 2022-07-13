<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name'          => 'Politika',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Sportas',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Mokslas',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Verslas',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'Muzika',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        ]);
    }
}
