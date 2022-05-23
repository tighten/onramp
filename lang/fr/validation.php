<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Le champ :attribute doit être accepté.',
    'active_url' => 'Le champ :attribute n\'est pas une URL valide.',
    'after' => 'Le champ :attribute doit être une date après :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date après ou égale à :date.',
    'alpha' => 'Le champ :attribute doit seulement contenir des lettres.',
    'alpha_dash' => 'Le champ :attribute peut seulement contenir des lettres, chiffres, tirets et tirets-bas.',
    'alpha_num' => 'Le champ :attribute peut seulement contenir des lettres et chiffres.',
    'array' => 'Le champ :attribute doit être un array.',
    'before' => 'Le champ :attribute doit être une date avant :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date avant ou égale à :date.',
    'between' => [
        'numeric' => 'Le champ :attribute doit être entre :min et :max.',
        'file' => 'Le champ :attribute doit être entre :min et :max kilobytes.',
        'string' => 'Le champ :attribute doit être entre :min et :max charactères.',
        'array' => 'Le champ :attribute doit être entre :min et :max attributs.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'Confirmation de :attribute ne correspondent pas.',
    'date' => 'Le champ :attribute n\'est pas une date valide.',
    'date_equals' => 'Le champ :attribute doit être une date égale à :date.',
    'date_format' => 'Le champ :attribute ne correspond pas au format :format.',
    'different' => 'Le champ :attribute et :other doivent être différents.',
    'digits' => 'Le champ :attribute doit contenir :digits chiffres.',
    'digits_between' => 'Le champ :attribute doit contenir entre :min et :max chiffres.',
    'dimensions' => 'Le champ :attribute à des dimensions d\'image invalides.',
    'distinct' => 'Le champ :attribute a des valeurs dupliquées.',
    'email' => 'Le champ :attribute doit être une adresse électronique valide.',
    'ends_with' => 'Le champ :attribute doit se terminer avec une des valeurs suivantes: :values',
    'exists' => 'Le champ :attribute sélectionné est invalide.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit contenir une valeur.',
    'gt' => [
        'numeric' => 'Le champ :attribute doit être supérieur à :value.',
        'file' => 'Le champ :attribute doit être supérieur :value kilobytes.',
        'string' => 'Le champ :attribute doit être supérieur :value charactères.',
        'array' => 'Le champ :attribute doit être plus de :value attributs.',
    ],
    'gte' => [
        'numeric' => 'Le champ :attribute doit être supérieur à :value.',
        'file' => 'Le champ :attribute doit être supérieur :value kilobytes.',
        'string' => 'Le champ :attribute doit être supérieur :value characters.',
        'array' => 'Le champ :attribute doit contenir :value attributs ou plus.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'Le champ :attribute selectionné est invalide.',
    'in_array' => 'Le champ :attribute n\'existe pas dans :other.',
    'integer' => 'Le champ :attribute doit être un nombre entier.',
    'ip' => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6' => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json' => 'Le champ :attribute doit être un object JSON valide.',
    'lt' => [
        'numeric' => 'Le champ :attribute doit être inférieur à :value.',
        'file' => 'Le champ :attribute doit être inférieur à :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur à :value charactères.',
        'array' => 'Le champ :attribute doit être inférieur à :value attributs.',
    ],
    'lte' => [
        'numeric' => 'Le champ :attribute doit être inférieur ou égal à :value.',
        'file' => 'Le champ :attribute doit être inférieur ou égal à :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur ou égal à :value charactères.',
        'array' => 'Le champ :attribute doit être inférieur ou égal à :value attributs.',
    ],
    'max' => [
        'numeric' => 'Le champ :attribute ne doit pas dépasser :max.',
        'file' => 'Le champ :attribute ne doit pas dépasser :max kilobytes.',
        'string' => 'Le champ :attribute ne doit pas dépasser :max charactères.',
        'array' => 'Le champ :attribute ne doit pas dépasser :max attributs.',
    ],
    'mimes' => 'Le champ :attribute doit être un fichier du type: :values.',
    'mimetypes' => 'Le champ :attribute doit être un fichier du type: :values.',
    'min' => [
        'numeric' => 'Le champ :attribute doit être au moins :min.',
        'file' => 'Le champ :attribute doit être au moins :min kilobytes.',
        'string' => 'Le champ :attribute doit être au moins :min charactères.',
        'array' => 'Le champ :attribute doit être au moins :min attributs.',
    ],
    'not_in' => 'Le champ :attribute sélectionné est invalide.',
    'not_regex' => 'Le format du champ :attribute est invalide.',
    'numeric' => 'Le champ :attribute doit être un chiffre.',
    'present' => 'Le champ :attribute doit être rempli.',
    'regex' => 'Le format du champ :attribute est invalide.',
    'required' => 'Le champ :attribute est requis.',
    'required_if' => 'Le champ :attribute est requis quand :other est :value.',
    'required_unless' => 'Le champ :attribute est requis à moins que :other soit présent dans les valeurs :values.',
    'required_with' => 'Le champ :attribute est requis quand :values est présent.',
    'required_with_all' => 'Le champ :attribute est requis quand les valeurs :values sont présentes.',
    'required_without' => 'Le champ :attribute est requis quand les valeurs :values ne sont pas présentes.',
    'required_without_all' => 'Le champ :attribute est requis quand aucunes des valeurs :values sont présentes.',
    'same' => 'Les champs :attribute et :other doivent correspondre.',
    'size' => [
        'numeric' => 'Le champ :attribute doit être :size.',
        'file' => 'Le champ :attribute doit être :size kilobytes.',
        'string' => 'Le champ :attribute doit être :size charactères.',
        'array' => 'Le champ :attribute doit contenir :size attributs.',
    ],
    'starts_with' => 'Le champ :attribute doit commencer par une des valeurs suivantes: :values',
    'string' => 'Le champ :attribute doit être du texte.',
    'timezone' => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique' => 'Le champ :attribute n\'est pas disponible.',
    'uploaded' => 'Le téléchargement du champ :attribute a échoué.',
    'url' => 'Le format du champ :attribute est invalide.',
    'uuid' => 'Le champ :attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
