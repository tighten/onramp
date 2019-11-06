## How to add a new translation to Onramp

#### **Do you have a new translation you can add?**

* Follow the instructions in `contributing.md` to set up your own fork of the OnRamp repository

* Once you have the local copy up and running, create and checkout a new branch. Your branch name should follow the following convention: `{initials}/translating-UI-{language}` where `{initials}` are your initials and `{language}` is the language you are adding, e.g. `french`.

* Add the new language to `protected locales` in the `app/Localization/Locale.php` class. Use language code according to the [ISO 639-1 list of codes](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes).

* Create a new `xx.json` file in the `resources/lang` folder, where `xx` is the ISO code of the language you are adding, the same one you added to the `app/Localization/Locale.php` class. Copy paste the content from another `xx.json` file, e.g. `de.json`, to get the list of sentences you will translate. Replace the already translated sentences with your own translations.    

* Create a new folder in the `resources/lang` folder, giving it the ISO 639-1 language code name. Inside this folder, create the following files:
    - `auth.php`
    - `pagination.php`
    - `passwords.php`
    - `validation.php`

* Use the files in the `resources/lang/en` folder as a guide to see what needs translating. Duplicate the content of each file into your own files and add the new translations. Only translate the value of the key value pair, do not translate the key. 

* To help you with the translation, check out [Fred Delrieu's Laravel-lang repo](https://github.com/caouecs/Laravel-lang/tree/master/src) which has some translations available already.

* Make sure the new language shows in the dropdown menu of the local copy of the website and that you can select it. Once selected, various UI elements should be translated to the new language.

* When you are happy with your work and you made sure it is working locally, submit a pull request (PR) to [OnRamp](https://github.com/tightenco/onramp). Please follow the instructions in `contributing.md` to make sure your PR follows the required conventions.

Thank you for your contribution! :heart:

The OnRamp team