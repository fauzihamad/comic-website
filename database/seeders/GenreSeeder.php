<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'action',
        ]);

        Genre::create([
            'name' => 'martial arts',
        ]);

        Genre::create([
            'name' => 'drama',
        ]);

        Genre::create([
            'name' => 'romance',
        ]);

        Genre::create([
            'name' => 'manhwa',
        ]);

        Genre::create([
            'name' => 'manhua',
        ]);

        Genre::create([
            'name' => 'isekai',
        ]);

    }
}
