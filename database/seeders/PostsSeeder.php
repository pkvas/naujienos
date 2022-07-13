<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title'          => 'Naujienos Pavadinimas',
                'slug'           => Str::slug('Naujienos Pavadinimas'),
                'content'        => '<div>Naujienos turinys</div>',
                'meta'           => '<div>Meta aprašymas</div>',
                'author_id'      => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]
        ]);
    }
}
