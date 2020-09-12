# Adding a new translation to Onramp

Follow the instructions in [contributing.md](/contributing.md) to set up your own fork of the Onramp repository.

Once you have the local copy up and running, create and checkout a new branch.

Your branch name should follow the following convention: `{initials}/translating-ui-{language}` where `{initials}` are your initials and `{language}` is the language you are adding, e.g. `mes/translating-ui-french`.

## Step 1. Add the locale to Onramp's localization system

Add the new language to `protected locales` property in the [app/Localization/Locale.php](/app/Localization/Locale.php) class. Use language code according to the list of locales provided by PHP's `Locale` class. If there are variants with significant differentiation in your language, please use the variant instead of the base locale. For example, since the language in Portuguese and Brazilian Portuguese would differ significantly, you would choose `pt_pt` instead of `pt`. To see a (not perfect but close) list of possible locales, view [this gist](https://gist.github.com/mattstauffer/5d88119825667916aa618dedb4988381).

## Step 2. Create a `lang` translation file

Create a new `xx.json` file in the [resources/lang](/resources/lang) folder, where `xx` is the locale code of the language you are adding, the same one you added to `app/Localization/Locale.php`. Copy and paste the content from another `xx.json` file, e.g. [de.json](/resources/lang/de.json), to get the list of sentences you will translate. Replace the already translated sentences with your own translations.

## Step 3. Create translation files for UI elements

Create a new folder in the `resources/lang` folder, naming it with the same locale code. Inside this folder, create the following files:

    - `auth.php`
    - `pagination.php`
    - `passwords.php`
    - `validation.php`

Use the files in the [resources/lang/en](/resources/lang/en) folder as a guide to see what needs translating. Duplicate the content of each file into your own files and add the new translations. Only translate the value of the key value pair; do not translate the key.

> TIP: To help you with the translation, check out [Fred Delrieu's Laravel-lang repo](https://github.com/caouecs/Laravel-lang/tree/master/src) which has some translations available already.

## Step 4. Testing

Make sure the new language shows in the dropdown menu of your local copy of the website and that you can select it. Once selected, various UI elements should be translated to the new language.

When you are happy with your work and you made sure it is working locally, submit a pull request (PR) to [Onramp](https://github.com/tighten/onramp). Please follow the instructions in `contributing.md` to make sure your PR follows the required conventions.

Thank you for your contribution! :heart:

The Onramp team
