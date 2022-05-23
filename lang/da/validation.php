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

    'accepted' => ':attribute skal accepteres.',
    'active_url' => ':attribute er ikke en valid URL.',
    'after' => ':attribute skal være en dato efter :date.',
    'after_or_equal' => ':attribute skal være en dato efter eller lig med :date.',
    'alpha' => ':attribute må kun indeholde bogstaver.',
    'alpha_dash' => ':attribute må kun indeholde bogstaver, tal, bindestreg eller underscores.',
    'alpha_num' => ':attribute må kun indeholde bogstaver og tal.',
    'array' => ':attribute skal være en liste.',
    'before' => ':attribute skal være en dato før :date.',
    'before_or_equal' => ':attribute skal være en dator før eller lig med :date.',
    'between' => [
        'numeric' => ':attribute skal være imellem :min og :max.',
        'file' => ':attribute skal være imellem :min og :max kilobytes.',
        'string' => ':attribute skal være imellem :min og :max karakterer.',
        'array' => ':attribute skal være imellem :min og :max elementer.',
    ],
    'boolean' => ':attribute skal være sand eller falsk.',
    'confirmed' => ':attribute stemmer ikke overens med bekræftelsesfeltet.',
    'date' => ':attribute er ikke en valid dato.',
    'date_equals' => ':attribute skal være en dato lig med :date.',
    'date_format' => ':attribute matcher ikke formatet :format.',
    'different' => ':attribute og :other skal være forskellige.',
    'digits' => ':attribute skal være :digits cifre.',
    'digits_between' => ':attribute skal være mellem :min og :max cifre.',
    'dimensions' => ':attribute har forkerte billededimensioner.',
    'distinct' => ':attribute har en duplikeret værdi.',
    'email' => ':attribute skal være en gyldig e-mail adresse.',
    'ends_with' => ':attribute skal slut med en af de følgende værdier: :values',
    'exists' => 'Den valgte :attribute er ugyldig.',
    'file' => ':attribute skal være en fil.',
    'filled' => ':attribute må ikke være tomt.',
    'gt' => [
        'numeric' => ':attribute skal være større end :value.',
        'file' => ':attribute skal være større end :value kilobytes.',
        'string' => ':attribute skal være mere end :value karakterer.',
        'array' => ':attribute skal være mere end :value elementer.',
    ],
    'gte' => [
        'numeric' => ':attribute skal være større end eller lig med :value.',
        'file' => ':attribute skal være større end eller lig med :value kilobytes.',
        'string' => ':attribute skal være mere eller lig med :value karakter.',
        'array' => ':attribute skal have :value elementer eller flere.',
    ],
    'image' => ':attribute skal være et billede.',
    'in' => 'Den valgte :attribute er ikke gyldig.',
    'in_array' => ':attribute eksistere ikke i :other.',
    'integer' => ':attribute skal være et heltal.',
    'ip' => ':attribute skal være en gyldig IP adresse.',
    'ipv4' => ':attribute skal være en gyldig IPv4 adresse.',
    'ipv6' => ':attribute skal være en gyldig IPv6 adresse.',
    'json' => ':attribute skal være en gyldig JSON streng.',
    'lt' => [
        'numeric' => ':attribute skal være mindre end :value.',
        'file' => ':attribute skal være mindre end :value kilobytes.',
        'string' => ':attribute skal være mindre end :value karakterer.',
        'array' => ':attribute skal have mindre end :value elementer.',
    ],
    'lte' => [
        'numeric' => ':attribute skal være mindre end eller lig med :value.',
        'file' => ':attribute skal være mindre end eller lig med :value kilobytes.',
        'string' => ':attribute skal være mindre end eller lig med :value karakterer.',
        'array' => ':attribute skal være mindre end eller lig med :value elementer.',
    ],
    'max' => [
        'numeric' => ':attribute må ikke være størrer end :max.',
        'file' => ':attribute må ikke være størrer end :max kilobytes.',
        'string' => ':attribute må ikke være længere end :max karakter.',
        'array' => ':attribute må ikke have mere end :max elementer.',
    ],
    'mimes' => ':attribute skal være en fil af typen: :values.',
    'mimetypes' => ':attribute skal være en fil af typen: :values.',
    'min' => [
        'numeric' => ':attribute skal mindst være :min.',
        'file' => ':attribute skal mindst være :min kilobytes.',
        'string' => ':attribute skal mindst være :min karakter lang.',
        'array' => ':attribute skal mindst være have :min elementer.',
    ],
    'not_in' => 'Den valgte :attribute er ikke gyldig.',
    'not_regex' => 'Formatet for :attribute er ugyldigt.',
    'numeric' => ':attribute skal være et tal.',
    'present' => ':attribute skal være tilstede.',
    'regex' => 'Formatet for :attribute er ugyldigt.',
    'required' => 'Feltet :attribute er krævet.',
    'required_if' => 'Feltet :attribute er krævet når :other er :value.',
    'required_unless' => 'Feltet :attribute er krævet medmindre :other er i :values.',
    'required_with' => 'Feltet :attribute er krævet når :values er udfyldt.',
    'required_with_all' => 'Feltet :attribute er krævet når :values er udfyldt.',
    'required_without' => 'Feltet :attribute er krævet når :values ikke er udfyldt.',
    'required_without_all' => 'Feltet :attribute er krævet når ingen af :values er udfyldte.',
    'same' => ':attribute og :other skal være ens.',
    'size' => [
        'numeric' => ':attribute skal være :size.',
        'file' => ':attribute skal være :size kilobytes.',
        'string' => ':attribute skal være :size karakter lang.',
        'array' => ':attribute skal indeholde :size elementer.',
    ],
    'starts_with' => ':attribute skal starte med én af de følgende: :values',
    'string' => ':attribute skal være en streng.',
    'timezone' => ':attribute skal være en gyldig tidszone.',
    'unique' => ':attribute er allerede taget.',
    'uploaded' => ':attribute fejlede i upload.',
    'url' => ':attribute formatet er ikke gyldigt.',
    'uuid' => ':attribute skal være en gyldig UUID.',

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
