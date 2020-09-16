@if (auth()->check() && auth()->user()->hasTrack())
    <div class="fluid-container py-4 bg-gray-200">
        <div class="text-center lg:text-left text-base">You are on the <span class="font-semibold">{{ auth()->user()->track->name }}</span> track.
            <a class="mr-4 underline" href="{{ url_wlocale('preferences') }}">Change</a>
        </div>
    </div>
@endif
