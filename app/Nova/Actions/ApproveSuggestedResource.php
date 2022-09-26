<?php

namespace App\Nova\Actions;

use App\Models\Resource;
use App\Models\SuggestedResource;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class ApproveSuggestedResource extends Action
{
    use InteractsWithQueue;
    use Queueable;

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
                'language' => $model->language,
                'is_free' => $model->is_free,
            ]);

            $resource->modules()->attach($model->module_id);
        }
    }
}
