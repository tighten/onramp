<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Spatie\NovaTranslatable\Translatable;

class Term extends BaseResource
{
    public static $model = \App\Models\Term::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'description',
    ];

    public static $tableStyle = 'tight';

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Translatable::make([
                Text::make('Name'),
                Text::make('Description')->hideFromIndex(),
            ]),

            BelongsToMany::make('Resources'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request): array
    {
        return [];
    }
}
