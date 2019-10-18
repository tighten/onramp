<?php

use App\Module;
use App\Track;
use Illuminate\Database\Seeder;

class ExistingContentSeeder extends Seeder
{
    public function run()
    {
        // @todo: This seeder won't work until we make skills translateable and add a language field to modules
        $tracks = Track::all();

        collect(require('learn.php'))->each(function ($moduleArray) use ($tracks) {
            $module = Module::create([
                'name' => $moduleArray['name'],
                'slug' => Str::slug($moduleArray['name']),
            ]);

            // Well that's not good... @÷todo
            $module->tracks()->save($tracks->random());

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

            collect($moduleArray['skills'])->each(function ($skillGrouping) use ($module) {
                $module->skills()->create([
                    'name' => $skillGrouping,
                ]);
            });
        });
    }
}
