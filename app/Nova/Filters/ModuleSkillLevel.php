<?php

namespace App\Nova\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Module;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class ModuleSkillLevel extends Filter
{
    /**
     * The filter's component.
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, Builder $query, $value): Builder
    {
        return $query->where('skill_level', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @return array
     */
    public function options(Request $request): array
    {
        return array_flip(Module::SKILL_LEVELS);
    }
}
