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

- Create a [GitHub OAuth Application](https://github.com/settings/developers). If you use Valet to serve your application locally, you can use the following settings:
    - Application Name: `Local Onramp`
    - Homepage URL: `http://onramp.test`
    - Application Description: `Local Version of Onramp`
    - Authorization Callback URL: `http://onramp.test/en/login/github/callback`

## How can I help?

Check out the [Contribution Guide](https://github.com/tighten/onramp/blob/main/contributing.md) to learn more about how to contribute.

## Language translations

To make language translation strings available to the Vue.js frontend, a `translations.js` file is generated from the Laravel language files found in the `resources/lang` directory. To regenerate this `translations.js` file after translations have been changed or added, run:

```bash
php artisan export:messages-flat
```

## Seeding Data

Onramp creates and uses JSON files to seed your local database. To update these JSON files use the following command. Be sure to commit your changes to the repo:

> Note: You may run the below command without the `--all` flag to choose a table to sync. Run with `--override` to automatically override the contents in an existing seed file.

```bash
php artisan generate:seeds-from-db --all
```

Then, to seed your local database run:

```bash
php artisan migrate:fresh --seed
```

> Warning: Any changes made to your local database will be overridden when seeding your database from the production seeder files.

## Security

If you discover any security related issues, please email matt.stauffer@tighten.co instead of using the issue tracker.

## Credits

- [Matt Stauffer](https://github.com/mattstauffer)
- [Tammy Robinson](https://github.com/tammytee)
- [All Contributors](https://github.com/tighten/onramp/graphs/contributors)

## Support us

Tighten's whole-business approach transcends engineering, propelling software-driven businesses forward with clarity and confidence. You can learn more about us on our [web site](https://tighten.com/).
