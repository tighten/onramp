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

    'accepted' => 'Attributet :attribute måste accepteras.',
    'active_url' => 'Attributet :attribute är inte en giltig URL.',
    'after' => 'Attributet :attribute måste vara ett datum efter :date.',
    'after_or_equal' => 'Attributet :attribute måste vara ett datum efter eller samma som :date.',
    'alpha' => 'Attributet :attribute får bara innehålla bokstäver.',
    'alpha_dash' => 'Attributet :attribute får bara innehålla bokstäver, siffror, - eller _.',
    'alpha_num' => 'Attributet :attribute får bara innehålla bokstäver och siffror.',
    'array' => 'Attributet :attribute måste vara en array.',
    'before' => 'Attributet :attribute måste vara ett datum före :date.',
    'before_or_equal' => 'Attributet :attribute måste vara ett datum före eller samma som :date.',
    'between' => [
        'numeric' => 'Attributet :attribute måste vara större än :min och mindre än :max.',
        'file' => 'Attributet :attribute måste vara större än :min och mindre än :max kilobytes.',
        'string' => 'Attributet :attribute måste vara större än :min och mindre :max tecken.',
        'array' => 'Attributet :attribute måste ha fler än :min och mindre :max objekt.',
    ],
    'boolean' => 'Attributet :attribute måste vara sant eller falskt.',
    'confirmed' => 'Attributet :attribute matchar inte bekräftelsefältet.',
    'date' => 'Attributet :attribute är inte ett giltigt datum.',
    'date_equals' => 'Attributet :attribute måste vara samma datum som :date.',
    'date_format' => 'Attributet :attribute måste formatteras enligt :format.',
    'different' => 'Attributet :attribute och :other får inte vara samma.',
    'digits' => 'Attributet :attribute måste vara :digits siffror.',
    'digits_between' => 'Attributet :attribute måste vara fler än :min och mindre än :max siffror.',
    'dimensions' => 'Attributet :attribute är feldimensionerat.',
    'distinct' => 'Attributet :attribute har ett duplicerat värde.',
    'email' => 'Attributet :attribute måste vara en giltig email adress.',
    'ends_with' => 'Attributet :attribute måste sluta med något av följande: :values',
    'exists' => 'Det valda attributet ":attribute" är ogiltigt.',
    'file' => 'Attributet :attribute måste vara en fil.',
    'filled' => 'Attributet :attribute måste ha ett värde.',
    'gt' => [
        'numeric' => 'Attributet :attribute måste vara större än :value.',
        'file' => 'Attributet :attribute  måste vara större än :value kilobytes.',
        'string' => 'Attributet :attribute  måste vara större än :value tecken.',
        'array' => 'Attributet :attribute måste ha fler än :value objekt.',
    ],
    'gte' => [
        'numeric' => 'Attributet :attribute måste vara minst :value.',
        'file' => 'Attributet :attribute får minst vara :value kilobytes.',
        'string' => 'Attributet :attribute får minst vara :value characters.',
        'array' => 'Attributet :attribute måste ha :value objekt eller fler.',
    ],
    'image' => 'Attributet :attribute måste vara en bild.',
    'in' => 'Det valda attributet ":attribute" är ogiltigt.',
    'in_array' => 'Attributet ":attribute" finns inte i :other.',
    'integer' => 'Attributet ":attribute" måste vara en siffra.',
    'ip' => 'Attributet :attribute måste vara en giltig IP address.',
    'ipv4' => 'Attributet :attribute måste vara en giltig IPv4 address.',
    'ipv6' => 'Attributet :attribute måste vara en giltig IPv6 address.',
    'json' => 'Attributet :attribute måste vara en giltig JSON string.',
    'lt' => [
        'numeric' => 'Attributet :attribute måste vara mindre än :value.',
        'file' => 'Attributet :attribute måste vara mindre än :value kilobytes.',
        'string' => 'Attributet :attribute måste vara mindre än :value characters.',
        'array' => 'Attributet :attribute måste ha färre än :value objekt.',
    ],
    'lte' => [
        'numeric' => 'Attributet :attribute får bara vara mindre :value eller mindre.',
        'file' => 'Attributet :attribute får bara vara :value kilobytes eller mindre.',
        'string' => 'Attributet :attribute får max ha :value tecken.',
        'array' => 'Attributet :attribute får inte ha fler än :value objekt.',
    ],
    'max' => [
        'numeric' => 'Attributet :attribute får inte vara större än :max.',
        'file' => 'Attributet :attribute får inte vara större än :max kilobytes.',
        'string' => 'Attributet :attribute får inte vara större än :max characters.',
        'array' => 'Attributet :attribute får inte vara ha fler än :max objekt.',
    ],
    'mimes' => 'Attributet :attribute måste vara av filtypen: :values.',
    'mimetypes' => 'Attributet :attribute måste vara av filtypen: :values.',
    'min' => [
        'numeric' => 'Attributet :attribute måste åtminstone vara :min.',
        'file' => 'Attributet :attribute måste åtminstone vara :min kilobytes.',
        'string' => 'Attributet :attribute måste åtminstone vara :min tecken.',
        'array' => 'Attributet :attribute måste ha minst :min objekt.',
    ],
    'not_in' => 'Det valda attributet ":attribute" är ogiltigt.',
    'not_regex' => 'Formatet på attributet :attribute är ogiltigt.',
    'numeric' => 'Attributet :attribute måste vara ett nummer.',
    'present' => 'Attributet :attribute måste finnas med.',
    'regex' => 'Formatet på attributet ":attribute" är ogiltigt.',
    'required' => 'Attributet :attribute är obligatoriskt.',
    'required_if' => 'Attributet :attribute är obligatoriskt om :other är :value.',
    'required_unless' => 'Attributet :attribute om inte :other är en av: :values.',
    'required_with' => 'Attributet :attribute är obligatoriskt om :values finns.',
    'required_with_all' => 'Attributet :attribute är obligatoriskt om :values finns.',
    'required_without' => 'Attributet :attribute är obligatoriskt om :values inte finns.',
    'required_without_all' => 'Attributet :attribute är obligatoriskt om :values finns.',
    'same' => 'Attributen :attribute och :other måste matcha.',
    'size' => [
        'numeric' => 'Attributet :attribute måste vara :size.',
        'file' => 'Attributet :attribute måste vara :size kilobyte.',
        'string' => 'Attributet :attribute måste vara :size tecken.',
        'array' => 'Attributet :attribute måste innehålla :size objekt.',
    ],
    'starts_with' => 'Attributet :attribute måste börja med en av följande: :values',
    'string' => 'Attributet :attribute måste vara en sträng.',
    'timezone' => 'Attributet :attribute måste vara en giltig tidszon.',
    'unique' => 'Attributet :attribute har redan använts.',
    'uploaded' => ':attribute misslyckades laddas upp.',
    'url' => 'Formatet på attributet :attribute är ogiltigt.',
    'uuid' => 'Attributet :attribute måste vara ett giltigt UUID.',

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
