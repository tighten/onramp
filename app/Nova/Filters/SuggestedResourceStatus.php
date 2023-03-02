<?php

namespace App\Nova\Filters;

use App\Models\SuggestedResource;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class SuggestedResourceStatus extends Filter
{
    /**
     * The filter's component.
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  mixed  $value
     */
    public function apply(NovaRequest $request, $query, $value): Builder
    {
        return $query->where('status', $value);
    }

    /**
     * Get the filter's available options.
     */
    public function options(NovaRequest $request): array
    {
        return [
            'Approved' => SuggestedResource::APPROVED_STATUS,
            'Rejected' => SuggestedResource::REJECTED_STATUS,
            'Suggested' => SuggestedResource::SUGGESTED_STATUS,
        ];
    }
}
