@if (auth()->check() && is_null(auth()->user()->track_id))
<div class="bg-orange-300 border-t-4 border-orange-600" role="alert">
    <div class="py-3 mx-auto fluid-container lg:py-4">
        <div class="flex flex-wrap items-center justify-between">
            <div class="flex items-start flex-1 w-0">
                <svg class="flex-none w-5 h-5 mt-1 text-orange-600 fill-current" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 320.83 320.83">
                    <path
                        d="M21.617 290.246h277.604c9.469 0 17.013-4.553 20.168-12.184 2.904-7.011 1.36-14.8-4.107-21.212L180.497 39.684l-1.333-1.333c-5.009-5.009-11.667-7.767-18.748-7.767-7.082 0-13.739 2.758-18.743 7.767l-1.333 1.333L5.55 256.844c-5.466 6.413-7.016 14.207-4.106 21.212 3.159 7.632 10.698 12.19 20.173 12.19zM160.416 69.213L277.35 257.606H43.487L160.416 69.213z" />
                    <path
                        d="M160.416 105.345c-9.197 0-16.654 7.457-16.654 16.654v71.388c0 9.197 7.457 16.654 16.654 16.654s16.654-7.457 16.654-16.654v-71.388c.006-9.197-7.451-16.654-16.654-16.654z" />
                    <circle cx="160.248" cy="234.903" r="16.486" />
                </svg>

                <p class="ml-3 text-base font-medium text-orange-600 lg:ml-5">
                    <span class="font-bold">Recommended updates to your preferences</span><br>

                    <span class="text-sm">If you'd like to track your progress based on your current track, we recommend updating this setting in your <a class="underline" href="{{ url_wlocale('preferences') }}">user preferences</a>.</span>
                </p>
            </div>
        </div>
    </div>
</div>
@endif
