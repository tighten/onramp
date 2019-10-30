<?php

use App\Module;
use App\Term;
use App\Track;
use Illuminate\Database\Seeder;

class ExistingContentSeeder extends Seeder
{
    public function run()
    {
        $tracks = Track::all();

        collect(require('learn.php'))->each(function ($moduleArray) use ($tracks) {
            $module = Module::create([
                'name' => $moduleArray['name'],
                'description' => $moduleArray['description'],
                'slug' => Str::slug($moduleArray['name']['en']),
            ]);

            $module->tracks()->save($tracks->random());

            $this->createSkills($moduleArray, $module);
            $this->createResources($moduleArray, $module);
        });

        collect(require('glossary.php'))->each(function ($term){
            Term::create($term);
        });
    }

    protected function createSkills($moduleArray, $module)
    {
        collect($moduleArray['skills'])->each(function ($skillGrouping) use ($module) {
            $module->skills()->create([
                'name' => $skillGrouping,
            ]);
        });
    }

    protected function createResources($moduleArray, $module)
    {
		collect($moduleArray['resources'])->each(function ($resources, $language) use ($module) {
            foreach ($resources as $resource) {
                $module->resources()->create([
                    'name' => $resource['name'],
                    'url' => $resource['url'],
                    'type' => $resource['type'],
                    'is_free' => true,
                    'language' => $language,
                ]);
            }
        });
    }
}
