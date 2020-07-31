<?php

namespace App\Nova\Actions;

use App\Resource;
use App\SuggestedResource;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class ApproveSuggestedResource extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $suggestedResources
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $suggestedResources)
    {
        foreach ($suggestedResources as $model) {
            $model->update([
                'status' => SuggestedResource::APPROVED_STATUS,
            ]);

            $resource = Resource::firstOrCreate([
                'name' => $model->name,
                'url' => $model->url,
                'type' => $model->type,
                'module_id' => $model->module_id,
                'language' => $model->language,
                'is_free' => $model->is_free,
            ]);

            $resource->modules()->attach($model->module_id);
        }
    }
}
