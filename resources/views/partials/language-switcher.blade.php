<language-switcher language="{{ $language }}" class="pb-4 md:pb-0">
    @foreach ($localeSlugs as $locale)
        <a href="{{ switch_locale_link($locale) }}"
           class="block px-4 py-2 text-blue-700 hover:bg-blue-700 hover:text-white"
           style="text-decoration: none">{{ Localization::languageForLocale($locale) }}</a>
    @endforeach
</language-switcher>
