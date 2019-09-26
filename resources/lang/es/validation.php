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

    'accepted'             => 'Se debe de aceptar el atributo :attribute.',
    'active_url'           => ':attribute no es una URL válida.',
    'after'                => ':attribute debe de ser una fecha que mayor al  :date.',
    'after_or_equal'       => ':attribute debe de ser una fecha mayor o igual al :date.',
    'alpha'                => ':attribute sólo puede tener letras.',
    'alpha_dash'           => ':attribute sólo puede tener letras, números y guiones.',
    'alpha_num'            => ':attribute sólo puede tener letras y números.',
    'array'                => ':attribute debe ser un arreglo.',
    'before'               => ':attribute debe ser una fecha menor a :date.',
    'before_or_equal'      => ':attribute debe ser una fecha menor o igual a :date.',
    'between'              => [
        'numeric' => ':attribute debe ser un valor entre :min y :max.',
        'file'    => ':attribute debe de medir entre :min y :max kilobytes.',
        'string'  => ':attribute debe de tener una longitud de entre :min y :max caracteres.',
        'array'   => ':attribute debe tener entre :min y :max items.',
    ],
    'boolean'              => ':attribute debe ser verdadero o falso.',
    'confirmed'            => 'La confirmación de :attribute no concuerda.',
    'date'                 => ':attribute no es una fecha válida.',
    'date_format'          => ':attribute no concuerda con el formato :format.',
    'different'            => ':attribute y :other deben ser diferentes.',
    'digits'               => ':attribute debe de ser de :digits dígitos.',
    'digits_between'       => ':attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => ':attribute tiene dimensiones de imagen inválidas.',
    'distinct'             => ':attribute tiene un valor duplicado.',
    'email'                => ':attribute debe ser una dirección de correo válida.',
    'exists'               => ':attribute es inválido.',
    'file'                 => ':attribute debe ser un archivo.',
    'filled'               => 'El campo de :attribute debe tener un valor.',
    'image'                => ':attribute debe ser una imagen.',
    'in'                   => ':attribute seleccionado es inválido.',
    'in_array'             => 'El campo :attribute no existe en :other.',
    'integer'              => ':attribute debe ser un entero.',
    'ip'                   => ':attribute debe ser una dirección IP válida.',
    'ipv4'                 => ':attribute debe ser una dirección IPv4 válida.',
    'ipv6'                 => ':attribute debe ser una dirección IPv6 válida.',
    'json'                 => ':attribute debe ser un JSON String válido.',
    'max'                  => [
        'numeric' => ':attribute no puede ser mayor que :max.',
        'file'    => ':attribute no puede medir más de :max kilobytes.',
        'string'  => ':attribute no puede tener más de :max caracteres.',
        'array'   => ':attribute no puede tener más de :max items.',
    ],
    'mimes'                => ':attribute debe ser un archivo de tipo :values.',
    'mimetypes'            => ':attribute debe ser un archivo de tipo :values.',
    'min'                  => [
        'numeric' => ':attribute debe ser al menos :min.',
        'file'    => ':attribute debe medir al menos :min kilobytes.',
        'string'  => ':attribute debe tener al menos :min caracteres.',
        'array'   => ':attribute debe tener al menos :min items.',
    ],
    'not_in'               => ':attribute es inválido.',
    'numeric'              => ':attribute debe ser un número.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute es inválido.',
    'required'             => 'El campo :attribute es requerido.',
    'required_if'          => 'El campo :attribute es requerido cuando :other es :value.',
    'required_unless'      => 'El campo :attribute es requerido a menos que :other está en :values.',
    'required_with'        => 'El campo :attribute es requerido cuando :values está presente.',
    'required_with_all'    => 'El campo :attribute es requerido cuando todos los :values están presente.',
    'required_without'     => 'El campo :attribute es requerido cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando ninguno de los:values están presentes.',
    'same'                 => ':attribute y :other deben concordar.',
    'size'                 => [
        'numeric' => ':attribute debe ser :size.',
        'file'    => ':attribute debe medir :size kilobytes.',
        'string'  => ':attribute debe tener :size caracteres.',
        'array'   => ':attribute debe tener :size items.',
    ],
    'string'               => ':attribute debe ser un string.',
    'timezone'             => ':attribute deb ser una zona horaria válida.',
    'unique'               => ':attribute ya ha sido tomado.',
    'uploaded'             => ':attribute falló en subirse.',
    'url'                  => 'El formato de :attribute es inválido.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
