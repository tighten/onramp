@if (auth()->check() && is_null(auth()->user()->track_id))
<div class="bg-orange-200 border-t-4 border-orange-600 rounded-b text-orange-700 p-5 md:pb-6 shadow-md" role="alert">
    <div class="flex container mx-auto max-w-4xl">
        <div class="pt-1 md:px-4">
            <svg class="fill-current h-5 w-5 md:h-6 md:w-6 text-orange-700 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
        </div>
      <div class="text-sm md:text-base">
        <p class="font-bold">Recommended updates to your preferences</p>
        <p class="text-sm">If you'd like to track your progress based on your current track, we recommend updating this setting in your <a href="{{ url_wlocale('preferences') }}">user preferences</a>.</p>
      </div>
    </div>
</div>
@endif
