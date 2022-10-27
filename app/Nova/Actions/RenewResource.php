<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class RenewResource extends Action implements ShouldQueue
{
    use InteractsWithQueue;
    use Queueable;

    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $model->expiration_date = now()->addMonths(6);

            $model->save();
        }

        return Action::message('The resource was renewed!');
    }

    public function fields(NovaRequest $request)
    {
        return [];
    }
}
