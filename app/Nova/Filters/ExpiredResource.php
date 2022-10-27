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
        return $query->where('expiration_date', $value === 'expired' ? '<' : '>', now());
    }

    public function options(NovaRequest $request)
    {
        return [
            'Only Expired' => 'expired',
            'Only Active' => 'active',
        ];
    }
}
