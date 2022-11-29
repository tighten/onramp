<?php

namespace App\Nova\Filters;

use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class ExpiredResource extends Filter
{
    public $component = 'select-filter';

    public $name = 'Expired';

    public function apply(NovaRequest $request, $query, $value)
    {
        if ($value === '<>') {
            return $query->whereBetween('expiration_date', [
                now()->toDateTimeString(),
                now()->addDays(15)->toDateTimeString(),
            ]);
        }

        return $query->where('expiration_date', $value, now());
    }

    public function options(NovaRequest $request)
    {
        return [
            'Only Expired' => '<',
            'Only Expiring' => '<>',
            'Only Active' => '>',
        ];
    }
}
