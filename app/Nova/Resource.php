<?php

namespace App\Nova;

use App\Facades\Localization;
use App\Resource as EloquentResource;
use Illuminate\Http\Request;
use Inspheric\Fields\Url;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class Resource extends BaseResource
{
    /**
     * The model the resource corresponds to.
     *
     */
    public static $model = \App\Resource::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     */
    public static $search = [
        'id', 'name'
    ];

    public function typeFields()
    {
        return collect(EloquentResource::TYPES)->mapWithKeys(function ($value) {
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

            Select::make('Type')
                ->options($this->typeFields())
                ->displayUsingLabels()
                ->rules('required'),

            Select::make('Language')
                ->options(array_merge(['all' => 'All (contains multiple translations)'], Localization::all()))
                ->rules('required'),

            Boolean::make('Is Free')
                ->hideFromIndex(),

            Boolean::make('Is Bonus')
                ->hideFromIndex(),

            Boolean::make('Is Assigned To Module', function () {
                return $this->isAssignedToAModule();
            }),

            BelongsToMany::make('Modules'),
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
        return [];
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
        return [];
    }
}
