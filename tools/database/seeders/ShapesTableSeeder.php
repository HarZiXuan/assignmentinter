<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShapesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shapes')->insert([
            ['name' => 'John', 'shape' => 'Circle', 'color' => 'Red', 'timestamp' => now()],
            ['name' => 'Ben', 'shape' => 'Square', 'color' => 'Blue', 'timestamp' => now()],
            ['name' => 'Tim', 'shape' => 'Triangle', 'color' => 'Green', 'timestamp' => now()],
        ]);
    }
}
