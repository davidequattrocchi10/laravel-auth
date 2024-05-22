<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = $faker->words(4, true);
            $project->description = $faker->text(300);
            $project->final_goal = $faker->text(100);
            $project->area = $faker->words(5, true);
            $project->cover_image = $faker->imageUrl(600, 400, 'Projects', true, $project->title, true, 'jpg');
            $project->save();
        }
    }
}
