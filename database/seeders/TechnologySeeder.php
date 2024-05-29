<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'Bootstrap', 'JS', 'Laravel', 'SQL', 'PHP', 'phpMyAdmin'];
        foreach ($technologies as $technology) {
            $newTech = new Technology();
            $newTech->name = $technology;
            $newTech->save();
        }
    }
}
