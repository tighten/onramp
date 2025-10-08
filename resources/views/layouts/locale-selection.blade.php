<script>
    (function () {
        const EXCLUDED_PATHS = ['nova', 'nova-api', 'nova-vendor', '_debugbar'];

        const isValidLocale = (locale) => {
            return Boolean(window.locales?.[locale]);
        };

        const getStoredLocale = () => {
            try {
                return localStorage.getItem('onramp_locale');
            } catch {
                return null;
            }
        };

        const enforcePersistedLocale = () => {
            const storedLocale = getStoredLocale();
            if (!storedLocale || !isValidLocale(storedLocale)) return;

            const segments = window.location.pathname.split('/').filter(Boolean);
            const currentLocale = segments[0];

            if (EXCLUDED_PATHS.includes(currentLocale) || currentLocale === storedLocale) return;

            if (isValidLocale(currentLocale)) {
                segments[0] = storedLocale;
            } else {
                segments.unshift(storedLocale);
            }

            const targetUrl = `${window.location.origin}/${segments.join('/')}${window.location.search}${window.location.hash}`;
            if (targetUrl !== window.location.href) {
                window.location.replace(targetUrl);
            }
        };

        enforcePersistedLocale();
        window.addEventListener('popstate', enforcePersistedLocale);
    })();
</script>
