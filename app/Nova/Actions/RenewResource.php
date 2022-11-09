<?php

namespace App\Nova\Actions;

use App\Models\Resource;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class RenewResource extends Action
{
    use InteractsWithQueue;
    use Queueable;

    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $model->expiration_date = Resource::getNewExpirationDate();

            $model->save();
        }

        return Action::message('The resource was renewed!');
    }

    public function fields(NovaRequest $request)
    {
        return [];
    }
}
