<?php

namespace App\Nova\Actions;

use App\Mail\SuggestedResourceRejectionEmail;
use App\SuggestedResource;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Textarea;

class RejectSuggestedResource extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach($models as $model) {
            $model->update([
                'status' => SuggestedResource::REJECTED_STATUS,
                'rejected_reason' => $fields->reason_for_rejection,
            ]);

            $user = User::firstWhere('id', $model->user_id);

            Mail::to($user->email)->queue(new SuggestedResourceRejectionEmail($model, $user));
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Textarea::make('Reason For Rejection')
                ->rules('required'),
        ];
    }
}
