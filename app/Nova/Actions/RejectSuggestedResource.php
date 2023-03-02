<?php

namespace App\Nova\Actions;

use App\Mail\SuggestedResourceRejectionEmail;
use App\Models\SuggestedResource;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class RejectSuggestedResource extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $suggestedResources)
    {
        foreach ($suggestedResources as $model) {
            $model->update([
                'status' => SuggestedResource::REJECTED_STATUS,
                'rejected_reason' => $fields->reason_for_rejection,
            ]);

            $user = User::find($model->user_id);

            Mail::to($user->email)->queue(new SuggestedResourceRejectionEmail($model, $user));
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Textarea::make('Reason For Rejection')
                ->rules('required'),
        ];
    }
}
