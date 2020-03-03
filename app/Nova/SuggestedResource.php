<?php

namespace App\Nova;

use App\Facades\Localization;
use App\Nova\Actions\ApproveSuggestedResource;
use App\Nova\Actions\RejectSuggestedResource;
use App\Nova\Filters\SuggestedResourceStatus;
use App\Nova\Filters\SuggestResourceOwner;
use App\SuggestedResource as EloquentSuggestedResource;
use Illuminate\Http\Request;
use Inspheric\Fields\Url;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class SuggestedResource extends BaseResource
{
    public static $model = \App\SuggestedResource::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name',
    ];

    public function typeFields()
    {
        return collect(EloquentSuggestedResource::TYPES)->mapWithKeys(function ($value) {
            return [$value => ucwords($value)];
        })->toArray();
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Url::make('URL')
                ->rules('required', 'max:255', 'url')
                ->clickableOnIndex()
                ->clickable(),

            Badge::make('Status')
                ->map([
                    'suggested' => 'info',
                    'approved' => 'success',
                    'rejected' => 'danger',
                ])
                ->sortable(),

            Text::make('Rejected Reason')
                ->showOnDetail(function() {
                    return $this->rejected_reason === 'rejected';
                })
                ->onlyOnDetail(),

            Select::make('Language')
                ->options(array_merge(['all' => 'All (contains multiple translations)'], Localization::all()))
                ->rules('required')
                ->hideFromIndex(),

            BelongsTo::make('Module')
                ->hideFromIndex(),

            Select::make('Type')
                ->options($this->typeFields())
                ->displayUsingLabels()
                ->rules('required'),

            Textarea::make('Notes'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new SuggestResourceOwner,
            new SuggestedResourceStatus,
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new ApproveSuggestedResource)
                ->canSee(function($request) {
                    return $request->user()->isAtLeastEditor();
                })
                ->onlyOnDetail(),

            (new RejectSuggestedResource)
                ->canSee(function($request) {
                    return $request->user()->isAtLeastEditor();
                })
                ->onlyOnDetail(),
        ];
    }
}
