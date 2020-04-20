<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use MrMonat\Translatable\Translatable;

class Module extends BaseResource
{
    /**
     * The model the resource corresponds to.
     *
     */
    public static $model = \App\Module::class;

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
        'id', 'name', 'slug',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return $arrayName = array('' => , );
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Translatable::make('Name')
                ->singleLine()
                // @todo Figure out why this is necessary
                ->indexLocale('en'),

            Text::make('Slug')
                ->sortable()
                ->rules('required', 'max:255'),

            Translatable::make('Description')
                ->hideFromIndex(),

            // @todo Replace this with correct permissions after chatting with David
            BelongsToMany::make('Tracks')
                ->hideFromDetail($request->user()->role !== 'admin'),

            BelongsToMany::make('Resources'),

            HasMany::make('Skills'),
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
