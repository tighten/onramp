<?php

namespace App\Nova;

use App\Facades\Localization;
use App\Models\Resource as EloquentResource;
use App\Nova\Actions\RenewResource;
use App\Nova\Filters\ExpiredResource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\ActionRequest;

class Resource extends BaseResource
{
    /**
     * The model the resource corresponds to.
     */
    public static $model = \App\Models\Resource::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
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
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255')
                ->showOnPreview(),

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
                ->onlyOnDetail()
                ->showOnPreview(),

            DateTime::make('Date Added', 'created_at')
                ->hideFromIndex()
                ->hideWhenCreating()
                ->hideWhenUpdating(),

            Textarea::make('Internal Notes', 'notes')
                ->alwaysShow()
                ->rows(4)
                ->withMeta(['extraAttributes' => [
                    'placeholder' => 'Add notes that are helpful for managing this resource.',
                ]])
                ->showOnPreview(),

            BelongsToMany::make('Modules'),

            BelongsToMany::make('Terms'),
        ];
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(Request $request): array
    {
        return [
            new ExpiredResource,
        ];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(Request $request): array
    {
        return [
            (new RenewResource)
                ->showInline()
                ->canSee(function ($request) {
                    if (! $resourceIds = (array) $request->input('resources')) {
                        return $request instanceof ActionRequest ||
                            ($this->resource->exists && $this->resource->isDueForRenewal());
                    }
                    $resources = EloquentResource::whereIn('id', $resourceIds)->get();
                    $cantRenew = $resources->filter(function ($resource) {
                        // if resource not expired or expiring or is in trash, cant renew
                        return ! $resource->isDueForRenewal() || $resource->trashed();
                    });

                    return $request instanceof ActionRequest || ! count($cantRenew);
                }),
        ];
    }
}
