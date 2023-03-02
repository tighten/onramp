<?php

namespace App\Http\Controllers;

use App\Models\Completion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompletionsController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        Completion::updateOrCreate([
            'completable_id' => $request->input('completable_id'),
            'completable_type' => $request->input('completable_type'),
            'user_id' => $request->user()->id,
        ]);

        return response()->json(['message' => 'Marked as complete.']);
    }

    public function destroy(Request $request): JsonResponse
    {
        Completion::where([
            'completable_id' => $request->input('completable_id'),
            'completable_type' => $request->input('completable_type'),
            'user_id' => $request->user()->id,
        ])->delete();

        return response()->json(['message' => 'Marked as incomplete.']);
    }
}
