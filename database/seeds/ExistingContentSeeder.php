<?php

use App\Module;
use Illuminate\Database\Seeder;

class ExistingContentSeeder extends Seeder
{
    public function run()
    {
        $en = require('learn.en.php');
        $es = require('learn.es.php');

        collect($en)->each(function ($entry) {
            if (array_key_exists('children', $entry)) {
                collect($entry['children'])->each(function ($child) {
                    $module = Module::create([
                        'name' => $child['name'],
                        'slug' => Str::slug($child['name']),
                    ]);

                    if (array_key_exists('links', $child) && count($child['links'])) {
                        collect($child['links'])->each(function ($resource) use ($module) {
                            $module->resources()->create([
                                'name' => $resource['name'],
                                'url' => $resource['url'],
                                'type' => $resource['type'],
                                'is_free' => true,
                            ]);
                        });
                    }

                });
            }

            if (array_key_exists('links', $entry)) {
                $module = Module::create([
                    'name' => $entry['name'],
                    'slug' => Str::slug($entry['name']),
                ]);

                if (array_key_exists('links', $entry) && count($entry['links'])) {
                    collect($entry['links'])->each(function ($resource) use ($module) {
                        $module->resources()->create([
                            'name' => $resource['name'],
                            'url' => $resource['url'],
                            'type' => $resource['type'],
                            'is_free' => true,
                        ]);
                    });
                }
            }
        });

        collect($es)->each(function ($entry) {
            if (array_key_exists('children', $entry)) {
                collect($entry['children'])->each(function ($child) {
                    $module = Module::create([
                        'name' => $child['name'],
                        'slug' => 'es_' . Str::slug($child['name']),
                    ]);

                    if (array_key_exists('links', $child) && count($child['links'])) {
                        collect($child['links'])->each(function ($resource) use ($module) {
                            $module->resources()->create([
                                'name' => $resource['name'],
                                'url' => $resource['url'],
                                'type' => $resource['type'],
                                'is_free' => true,
                            ]);
                        });
                    }

                });
            }

            if (array_key_exists('links', $entry)) {
                $module = Module::create([
                    'name' => $entry['name'],
                    'slug' => 'es_' . Str::slug($entry['name']),
                ]);

                if (array_key_exists('links', $entry) && count($entry['links'])) {
                    collect($entry['links'])->each(function ($resource) use ($module) {
                        $module->resources()->create([
                            'name' => $resource['name'],
                            'url' => $resource['url'],
                            'type' => $resource['type'],
                            'is_free' => true,
                        ]);
                    });
                }
            }
        });
    }
}
