<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute harus diterima.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus tanggal setelah :date.',
    'after_or_equal' => ':attribute harus tanggal setelah atau sama dengan :date.',
    'alpha' => ':attribute cuma boleh mengandung huruf.',
    'alpha_dash' => ':attribute cuma boleh mengandung huruf, angka, tanda penghubung, dan garis bawah.',
    'alpha_num' => ':attribute cuma boleh mengandung huruf dan angka.',
    'array' => ':attribute harus dalam bentuk array.',
    'before' => ':attribute harus tanggal sebelum :date.',
    'before_or_equal' => ':attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus berada di antara :min dan :max.',
        'file' => ':attribute harus berada di antara :min dan :max kilobytes.',
        'string' => ':attribute harus berada di antara :min dan :max karakter.',
        'array' => ':attribute herus berada di antara :min dan :max items.',
    ],
    'boolean' => ':attribute cuma boleh diisi true atau false.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date' => ':attribute bukan merupakan tanggal yang valid.',
    'date_equals' => ':attribute harus sama dengan tanggal :date.',
    'date_format' => ':attribute tidak sesuai format :format.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus :digits digit.',
    'digits_between' => ':attribute harus berada di antara :min dan :max digit.',
    'dimensions' => 'Dimensi :attribute tidak sesuai.',
    'distinct' => ':attribute memiliki nilai yang sama.',
    'email' => ':attribute tidak sesuai format email.',
    'ends_with' => ':attribute harus berakhir setidanya dengan: :values',
    'exists' => ':attribute yang dipilih tidak valid.',
    'file' => ':attribute harus merupakan sebuah file.',
    'filled' => ':attribute harus memiliki nilai.',
    'gt' => [
        'numeric' => ':attribute harus lebih besar dari:value.',
        'file' => ':attribute harus lebih besar dari :value kilobytes.',
        'string' => ':attribute harus lebih besar dari :value karakter.',
        'array' => ':attribute harus memiliki lebih dari :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar dari atau equal :value.',
        'file' => ':attribute harus lebih besar dari atau equal :value kilobytes.',
        'string' => ':attribute harus lebih besar dari atau equal :value karakter.',
        'array' => ':attribute harus memiliki :value item atau lebih.',
    ],
    'image' => ':attribute harus berupa gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => ':attribute tidak ditemukan pada :other.',
    'integer' => ':attribute harus berupa bilangan bulat.',
    'ip' => ':attribute harus berupa IP address yang valid.',
    'ipv4' => ':attribute harus IPv4 address yang valid.',
    'ipv6' => ':attribute harus berupa IPv6 address yang valid .',
    'json' => ':attribute harus berupa JSON string yang valid.',
    'lt' => [
        'numeric' => ':attribute harus lebih kecil dari :value.',
        'file' => ':attribute harus lebih kecil dari :value kilobytes.',
        'string' => ':attribute harus lebih kecil dari :value karakter.',
        'array' => ':attribute harus lebih sedikit dari :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute harus lebih kecil dari atau sama dengan :value.',
        'file' => ':attribute harus lebih kecil dari atau sama dengan :value kilobytes.',
        'string' => ':attribute harus lebih kecil dari atau sama dengan :value characters.',
        'array' => ':attribute tidak boleh lebih dari :value item.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh lebih besar dari :max.',
        'file' => ':attribute tidak boleh lebih besar dari :max kilobytes.',
        'string' => ':attribute tidak boleh lebih besar dari :max karakter.',
        'array' => ':attribute tidak boleh have more than :max item.',
    ],
    'mimes' => ':attribute harus berupa file dengan tipe: :values.',
    'mimetypes' => ':attribute harus berupa file dengan tipe: :values.',
    'min' => [
        'numeric' => ':attribute setidaknya bernilai :min.',
        'file' => ':attribute harus setidaknya berukuran :min kilobytes.',
        'string' => ':attribute harus setidaknya berjumlah :min karakter.',
        'array' => ':attribute harus setidaknya memiliki :min item.',
    ],
    'not_in' => ':attribute yang dipilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => ':attribute harus berupa angka.',
    'present' => ':attribute harus ada.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => ':attribute wajib diisi.',
    'required_if' => ':attribute wajib diisi jika :other adalah :value.',
    'required_unless' => ':attribute wajib diisi kecuali :other adalah :values.',
    'required_with' => ':attribute wajib diisi ketika salah satu atau lebih :values diisi.',
    'required_with_all' => ':attribute wajib diisi ketika semua :values diisi.',
    'required_without' => ':attribute wajib diisi ketika :values tidak diisi.',
    'required_without_all' => ':attribute wajib diisi jika :values dikosongkan.',
    'same' => ':attribute dan :other harus sama.',
    'size' => [
        'numeric' => ':attribute harus sebesar :size.',
        'file' => ':attribute harus sebesar :size kilobytes.',
        'string' => ':attribute harus berjumlah :size karakter.',
        'array' => ':attribute harus mengandung :size item.',
    ],
    'starts_with' => ':attribute harus dimulai dengan: :values',
    'string' => ':attribute harus berupa teks.',
    'timezone' => ':attribute harus berupa zona waktu yang valid.',
    'unique' => ':attribute telah digunakan.',
    'uploaded' => ':attribute gagal diunggah.',
    'url' => ':attribute harus merupakan URL yang valid.',
    'uuid' => ':attribute harus berupa UUID yang valid.',

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
