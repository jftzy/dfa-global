<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Region::insert([
            [
                'name' => 'Americas and Canada',
                'created_at' => now()
            ],
            [
                'name' => 'Europe',
                'created_at' => now()
            ],
            [
                'name' => 'Middle East and Africa',
                'created_at' => now()
            ],
            [
                'name' => 'Asia and Pacific',
                'created_at' => now()
            ]
        ]);
    }
}
