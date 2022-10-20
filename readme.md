![Onramp - Providing an easy entrance into Laravel for new developers.](onramp-banner.png?version=1)

# Onramp

[![Contributor Covenant](https://img.shields.io/badge/Contributor%20Covenant-v1.4%20adopted-ff69b4.svg)](code_of_conduct.md)
![Run tests](https://github.com/tighten/onramp/workflows/Run%20tests/badge.svg)

Onramp aims to be a collection of resources presented in a way that makes it possible for folks to become Laravel programmers as easily and effectively as possible.

## Requirements

- PHP 8.1
- [Composer](https://getcomposer.org/download/)
- [NPM](https://nodejs.org/)

> [Vite](https://vitejs.dev/) requires node `^14.18.0 || >=16.0.0` to run

## How can I help?

Check out the [Contribution Guide](https://github.com/tighten/onramp/blob/main/contributing.md) to learn more about how to contribute.

## Language translations

To make language translation strings available to the Vue.js frontend, a `translations.js` file is generated from the Laravel language files found in the `resources/lang` directory. To regenerate this `translations.js` file after translations have been changed or added, run:

```bash
php artisan export:messages-flat
```

## Security

If you discover any security related issues, please email matt.stauffer@tighten.co instead of using the issue tracker.

## Credits

- [Matt Stauffer](https://github.com/mattstauffer)
- [Tammy Robinson](https://github.com/tammytee)
- [All Contributors](https://github.com/tighten/onramp/graphs/contributors)

## Support us

Tighten's whole-business approach transcends engineering, propelling software-driven businesses forward with clarity and confidence. You can learn more about us on our [web site](https://tighten.com/).
