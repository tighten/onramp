<?php

use App\Module;
use App\Resource;
use App\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed a few modules
        $modules = [
            [
                'name' => 'Build a basic web site',
                'skills' => [
                    'Write HTML',
                    'Write CSS',
                ],
                'resources' => [
                    'Intro to HTML at CSS-tricks' => 'https://www.yay.com/',
                    'Intro to CSS at CSS-tricks' => 'https://www.superyay.com/',
                ],
            ],
            [
                'name' => 'Basic terminal and version control',
                'skills' => [
                    'Navigate, open, and create files',
                    'Create git repos',
                    'Create git branches',
                ],
                'resources' => [
                    'Intro to Git at Tower' => 'https://www.tower.com/',
                    'Intro to Git branching at Gitlab' => 'https://www.superyay.com/',
                ],
            ],
        ];

        foreach ($modules as $module) {
            $eloquentModule = Module::create(['name' => $module['name']]);

            // Seed skills
            foreach ($module['skills'] as $skill) {
                Skill::create(['name' => $skill, 'module_id' => $eloquentModule->id]);
            }

            // Seed resources
            foreach ($module['resources'] as $name => $url) {
                Resource::create([
                    'name' => $name,
                    'url' => $url,
                    'type' => Arr::random(['video', 'text', 'book']),
                    'module_id' => $eloquentModule->id,
                ]);
            }
        }

        // $this->call(UsersTableSeeder::class);
    }
}
