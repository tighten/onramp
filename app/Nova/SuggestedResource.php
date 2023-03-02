<?php

namespace App\Nova;

use App\Facades\Localization;
use App\Models\SuggestedResource as EloquentSuggestedResource;
use App\Nova\Actions\ApproveSuggestedResource;
use App\Nova\Actions\RejectSuggestedResource;
use App\Nova\Filters\SuggestedResourceStatus;
use App\Nova\Filters\SuggestResourceOwner;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;

class SuggestedResource extends BaseResource
{
    public static $model = \App\Models\SuggestedResource::class;

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
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            URL::make('URL')
                ->displayUsing(fn () => "{$this->url}")
                ->rules('required', 'max:255', 'url'),

            Badge::make('Status')
                ->map([
                    EloquentSuggestedResource::SUGGESTED_STATUS => 'info',
                    EloquentSuggestedResource::APPROVED_STATUS => 'success',
                    EloquentSuggestedResource::REJECTED_STATUS => 'danger',
                ])
                ->sortable(),

            Text::make('Rejected Reason')
                ->showOnDetail(function () {
                    return $this->status === EloquentSuggestedResource::REJECTED_STATUS;
                })
                ->hideFromIndex(function ($request) {
                    return ! $request->user()->isAdmin();
                })
                ->readonly(function ($request) {
                    return ! $request->user()->isAdmin();
                })
                ->hideWhenCreating(),

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

            Boolean::make('Is Free')
                ->hideFromIndex(),

            Textarea::make('Notes'),
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
            new SuggestResourceOwner,
            new SuggestedResourceStatus,
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
            (new ApproveSuggestedResource)
                ->canSee(function ($request) {
                    if ($request->has('resourceId')) {
                        return $request->findModelQuery()->first()?->isPendingReview();
                    }

                    return $request->user()->isAtLeastEditor();
                })
                ->onlyOnDetail(),

            (new RejectSuggestedResource)
                ->canSee(function ($request) {
                    if ($request->has('resourceId')) {
                        return $request->findModelQuery()->first()?->isPendingReview();
                    }

                    return $request->user()->isAtLeastEditor();
                })
                ->onlyOnDetail(),
        ];
    }
}
