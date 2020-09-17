@if (auth()->check() && auth()->user()->hasTrack())
    <display-current-track>
        <template v-slot:message>
            <div class="flex flex-row justify-start">
                <svg class="mr-6 h-6 w-6 overflow-visible flex-no-grow" viewBox="0 0 56 60">
                    <path d="M56.857 41.79L37.428 5.957c-3.121-5.273-10.73-5.28-13.856 0L4.144 41.79C.953 47.178 4.816 54 11.07 54H49.93c6.249 0 10.12-6.817 6.928-12.21z" stroke="black" fill="none" stroke-width="4"/>
                    <path d="M30.5 42c-1.209 0-2.193-.897-2.193-2s.984-2 2.193-2 2.193.897 2.193 2-.984 2-2.193 2zM32.693 32.857c0 1.181-.984 2.143-2.193 2.143s-2.193-.962-2.193-2.143V22.143c0-1.181.984-2.143 2.193-2.143s2.193.962 2.193 2.143z" fill="black" />
                </svg>

                <div class="text-black justify-start">You are on the <span class="font-semibold">{{ auth()->user()->track->name }}</span> track.
                <a class="mr-4 ml-4 font-bold text-indigo-700" href="{{ url_wlocale('preferences') }}">Change settings</a></div>
            </div>
        </template>
    </display-current-track>
@endif
