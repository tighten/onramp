<?php

namespace App\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\URL;
use App\Facades\Localization;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsToMany;
use App\Models\Resource as EloquentResource;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\ActionRequest;

class Resource extends BaseResource
{
    /**
     * The model the resource corresponds to.
     *
     */
    public static $model = \App\Models\Resource::class;

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
        'id', 'name',
    ];

    public static $tableStyle = 'tight';

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

            URL::make('URL')
                ->displayUsing(fn () => "{$this->url}")
                ->rules('required', 'max:255', 'url')
                ->hideFromIndex(),

            URL::make('URL')
                ->displayUsing(fn () => 'Visit Link')
                ->onlyOnIndex(),

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

            Boolean::make('Assigned To Module', function () {
                return $this->isAssignedToAModule();
            }),

            Boolean::make('Can Expire')
                ->hideFromIndex(),

            DateTime::make('Expiration Date')
                ->onlyOnDetail(),

            DateTime::make('Date Added', 'created_at')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Textarea::make('Internal Notes', 'notes')
                ->alwaysShow()
                ->rows(4)
                ->withMeta(['extraAttributes' => [
                    'placeholder' => 'Add notes that are helpful for managing this resource.',
                ]]),

            BelongsToMany::make('Modules'),

            BelongsToMany::make('Terms'),
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
            new Filters\ExpiredResource(),
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
            (new Actions\RenewResource())
                ->canSee(function ($request) {
                    if (! $resourceIds = (array) $request->input('resources')) {
                        return;
                    }
                    $resources = EloquentResource::whereIn('id', $resourceIds)->get();
                    $cantRenew = $resources->filter(function ($resource) {
                        // if resource not expired or expiring or is in trash, cant renew
                        return ! ($resource->isExpired() || $resource->isExpiring()) || $resource->trashed();
                    });

                    return $request instanceof ActionRequest || ! count($cantRenew);
                }),
        ];
    }
}
