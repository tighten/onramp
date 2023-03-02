<?php

namespace App\Nova\Filters;

use Illuminate\Database\Eloquent\Builder;
use App\Models\SuggestedResource;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SuggestedResourceStatus extends Filter
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
        return $query->where('status', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @return array
     */
    public function options(Request $request): array
    {
        return [
            'Approved' => SuggestedResource::APPROVED_STATUS,
            'Rejected' => SuggestedResource::REJECTED_STATUS,
            'Suggested' => SuggestedResource::SUGGESTED_STATUS,
        ];
    }
}
