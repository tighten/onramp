# Onramp

[![Contributor Covenant](https://img.shields.io/badge/Contributor%20Covenant-v1.4%20adopted-ff69b4.svg)](code_of_conduct.md)
![Run tests](https://github.com/tighten/onramp/workflows/Run%20tests/badge.svg)

Onramp aims to be a collection of resources presented in a way that makes it possible for folks to become Laravel programmers as easily and effectively as possible.

## How can I help?

Check out the [Dev Page](https://onramp.dev/en/dev) to learn more about how to contribute.

## Language translations

To make language translation strings available to the Vue.js frontend, a `translations.js` file is generated from the Laravel language files found in the `resources/lang` directory. To regenerate this `translations.js` file after translations have been changed or added, run:

```bash
php artisan export:messages-flat
```
