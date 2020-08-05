<?php

use App\Term;
use Illuminate\Database\Seeder;

class GlossaryFromScratchSeeder extends Seeder
{
    public function run()
    {
        Term::truncate();

        collect(require('glossary.php'))->each(function ($term) {
            Term::create($term);
        });
    }
}
