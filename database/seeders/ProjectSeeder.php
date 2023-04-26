<?php

namespace Database\Seeders;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i < 10; $i++){
            $project = new Project();
            $project->title = $faker->unique()->sentence($faker->numberBetween(1, 10));
            $project->description = $faker -> optional->text(250);
            $project->slug = Str::slug($project->title, '_');
            $project->date = $faker->dateTimeBetween('-1 year', 'now');
            $project->url = $faker->url;
            $project->save();

        }
    }
}
