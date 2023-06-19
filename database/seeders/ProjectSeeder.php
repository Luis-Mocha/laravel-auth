<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// implemento Faker
use Faker\Generator as Faker;

use App\Models\Admin\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        for($i = 0; $i < 8; $i++) {
            //creo una nuova istanza
            $new_project = new Project();
            $new_project->title = $faker->sentence(3);
            $new_project->slug = 
            $new_project->description = $faker->text(500);
            $new_project->link_project = $faker->url();
            $new_project->save();
            
        }

    }
}
