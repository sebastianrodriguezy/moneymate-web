<?php

return [

  /*
    |--------------------------------------------------------------------------
    | Mensajes de Validación
    |--------------------------------------------------------------------------
    |
    | Las siguientes líneas de idioma contienen los mensajes de error predeterminados utilizados por
    | la clase de validador. Algunas de estas reglas tienen varias versiones, como las reglas de tamaño.
    | Siéntete libre de ajustar cada uno de estos mensajes aquí.
    |
    */

  'accepted' => 'El campo :attribute debe ser aceptado.',
  'accepted_if' => 'El campo :attribute debe ser aceptado cuando :other sea :value.',
  'active_url' => 'El campo :attribute debe ser una URL válida.',
  'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
  'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
  'alpha' => 'El campo :attribute debe contener solo letras.',
  'alpha_dash' => 'El campo :attribute debe contener solo letras, números, guiones y guiones bajos.',
  'alpha_num' => 'El campo :attribute debe contener solo letras y números.',
  'array' => 'El campo :attribute debe ser un array.',
  'ascii' => 'El campo :attribute debe contener solo caracteres alfanuméricos de un solo byte y símbolos.',
  'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
  'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
  'between' => [
    'array' => 'El campo :attribute debe tener entre :min y :max elementos.',
    'file' => 'El campo :attribute debe tener entre :min y :max kilobytes.',
    'numeric' => 'El campo :attribute debe estar entre :min y :max.',
    'string' => 'El campo :attribute debe tener entre :min y :max caracteres.',
  ],
  'boolean' => 'El campo :attribute debe ser verdadero o falso.',
  'can' => 'El campo :attribute contiene un valor no autorizado.',
  'confirmed' => 'La confirmación del campo :attribute no coincide.',
  'current_password' => 'La contraseña es incorrecta.',
  'date' => 'El campo :attribute debe ser una fecha válida.',
  'date_equals' => 'El campo :attribute debe ser una fecha igual a :date.',
  'date_format' => 'El campo :attribute debe coincidir con el formato :format.',
  'decimal' => 'El campo :attribute debe tener :decimal lugares decimales.',
  'declined' => 'El campo :attribute debe ser rechazado.',
  'declined_if' => 'El campo :attribute debe ser rechazado cuando :other sea :value.',
  'different' => 'El campo :attribute y :other deben ser diferentes.',
  'digits' => 'El campo :attribute debe tener :digits dígitos.',
  'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
  'dimensions' => 'El campo :attribute tiene dimensiones de imagen inválidas.',
  'distinct' => 'El campo :attribute tiene un valor duplicado.',
  'doesnt_end_with' => 'El campo :attribute no debe terminar con ninguno de los siguientes: :values.',
  'doesnt_start_with' => 'El campo :attribute no debe empezar con ninguno de los siguientes: :values.',
  'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
  'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes: :values.',
  'enum' => 'La opción seleccionada :attribute no es válida.',
  'exists' => 'La opción seleccionada :attribute no es válida.',
  'file' => 'El campo :attribute debe ser un archivo.',
  'filled' => 'El campo :attribute debe tener un valor.',
  'gt' => [
    'array' => 'El campo :attribute debe tener más de :value elementos.',
    'file' => 'El campo :attribute debe ser mayor que :value kilobytes.',
    'numeric' => 'El campo :attribute debe ser mayor que :value.',
    'string' => 'El campo :attribute debe ser mayor que :value caracteres.',
  ],
  'gte' => [
    'array' => 'El campo :attribute debe tener :value elementos o más.',
    'file' => 'El campo :attribute debe ser mayor o igual a :value kilobytes.',
    'numeric' => 'El campo :attribute debe ser mayor o igual a :value.',
    'string' => 'El campo :attribute debe ser mayor o igual a :value caracteres.',
  ],
  'image' => 'El campo :attribute debe ser una imagen.',
  'in' => 'La opción seleccionada :attribute no es válida.',
  'in_array' => 'El campo :attribute debe existir en :other.',
  'integer' => 'El campo :attribute debe ser un número entero.',
  'ip' => 'El campo :attribute debe ser una dirección IP válida.',
  'ipv4' => 'El campo :attribute debe ser una dirección IPv4 válida.',
  'ipv6' => 'El campo :attribute debe ser una dirección IPv6 válida.',
  'json' => 'El campo :attribute debe ser una cadena JSON válida.',
  'lowercase' => 'El campo :attribute debe ser minúscula.',
  'lt' => [
    'array' => 'El campo :attribute debe tener menos de :value elementos.',
    'file' => 'El campo :attribute debe ser menor que :value kilobytes.',
    'numeric' => 'El campo :attribute debe ser menor que :value.',
    'string' => 'El campo :attribute debe ser menor que :value caracteres.',
  ],
  'lte' => [
    'array' => 'El campo :attribute no debe tener más de :value elementos.',
    'file' => 'El campo :attribute debe ser menor o igual a :value kilobytes.',
    'numeric' => 'El campo :attribute debe ser menor o igual a :value.',
    'string' => 'El campo :attribute debe ser menor o igual a :value caracteres.',
  ],
  'mac_address' => 'El campo :attribute debe ser una dirección MAC válida.',
  'max' => [
    'array' => 'El campo :attribute no debe tener más de :max elementos.',
    'file' => 'El campo :attribute no debe ser mayor que :max kilobytes.',
    'numeric' => 'El campo :attribute no debe ser mayor que :max.',
    'string' => 'El campo :attribute no debe ser mayor que :max caracteres.',
  ],
  'max_digits' => 'El campo :attribute no debe tener más de :max dígitos.',
  'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
  'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
  'min' => [
    'array' => 'El campo :attribute debe tener al menos :min elementos.',
    'file' => 'El campo :attribute debe ser al menos :min kilobytes.',
    'numeric' => 'El campo :attribute debe ser al menos :min.',
    'string' => 'El campo :attribute debe ser al menos :min caracteres.',
  ],
  'min_digits' => 'El campo :attribute debe tener al menos :min dígitos.',
  'missing' => 'El campo :attribute debe faltar.',
  'missing_if' => 'El campo :attribute debe faltar cuando :other sea :value.',
  'missing_unless' => 'El campo :attribute debe faltar a menos que :other sea :value.',
  'missing_with' => 'El campo :attribute debe faltar cuando :values esté presente.',
  'missing_with_all' => 'El campo :attribute debe faltar cuando :values estén presentes.',
  'multiple_of' => 'El campo :attribute debe ser un múltiplo de :value.',
  'not_in' => 'La opción seleccionada :attribute no es válida.',
  'not_regex' => 'El formato del campo :attribute no es válido.',
  'numeric' => 'El campo :attribute debe ser un número.',
  'password' => [
    'letters' => 'El campo :attribute debe contener al menos una letra.',
    'mixed' => 'El campo :attribute debe contener al menos una letra mayúscula y una minúscula.',
    'numbers' => 'El campo :attribute debe contener al menos un número.',
    'symbols' => 'El campo :attribute debe contener al menos un símbolo.',
    'uncompromised' => 'El :attribute proporcionado ha aparecido en una filtración de datos. Por favor, elige un :attribute diferente.',
  ],
  'present' => 'El campo :attribute debe estar presente.',
  'prohibited' => 'El campo :attribute está prohibido.',
  'prohibited_if' => 'El campo :attribute está prohibido cuando :other sea :value.',
  'prohibited_unless' => 'El campo :attribute está prohibido a menos que :other esté en :values.',
  'prohibits' => 'El campo :attribute prohíbe la presencia de :other.',
  'regex' => 'El formato del campo :attribute no es válido.',
  'required' => 'El campo :attribute es obligatorio.',
  'required_array_keys' => 'El campo :attribute debe contener entradas para: :values.',
  'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
  'required_if_accepted' => 'El campo :attribute es obligatorio cuando :other es aceptado.',
  'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
  'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
  'required_with_all' => 'El campo :attribute es obligatorio cuando :values están presentes.',
  'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
  'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values está presente.',
  'same' => 'El campo :attribute debe coincidir con :other.',
  'size' => [
    'array' => 'El campo :attribute debe contener :size elementos.',
    'file' => 'El campo :attribute debe ser de :size kilobytes.',
    'numeric' => 'El campo :attribute debe ser :size.',
    'string' => 'El campo :attribute debe ser de :size caracteres.',
  ],
  'starts_with' => 'El campo :attribute debe comenzar con uno de los siguientes: :values.',
  'string' => 'El campo :attribute debe ser una cadena de texto.',
  'timezone' => 'El campo :attribute debe ser una zona horaria válida.',
  'unique' => 'El :attribute ya ha sido tomado.',
  'uploaded' => 'La subida del campo :attribute falló.',
  'uppercase' => 'El campo :attribute debe estar en mayúsculas.',
  'url' => 'El campo :attribute debe ser una URL válida.',
  'ulid' => 'El campo :attribute debe ser un ULID válido.',
  'uuid' => 'El campo :attribute debe ser un UUID válido.',

  /*
    |--------------------------------------------------------------------------
    | Mensajes de Validación Personalizados
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar mensajes de validación personalizados para atributos utilizando la
    | convención "attribute.rule" para nombrar las líneas. Esto hace que sea rápido
    | especificar una línea de idioma personalizada específica para una regla de atributo dada.
    |
    */

  'custom' => [
    'attribute-name' => [
      'rule-name' => 'mensaje-personalizado',
    ],
  ],

  /*
    |--------------------------------------------------------------------------
    | Atributos de Validación Personalizados
    |--------------------------------------------------------------------------
    |
    | Las siguientes líneas de idioma se utilizan para cambiar nuestro marcador de posición de atributo
    | con algo más fácil de leer, como "Dirección de correo electrónico" en lugar de "email".
    | Esto simplemente nos ayuda a hacer nuestro mensaje más expresivo.
    |
    */

  'attributes' => [
    'name' => 'Nombre',
    'password' => 'Contraseña',
    'password_confirm' => 'Confirmación de contraseña',
    'fk_user_id' => 'Id de usuario',
    'fk_category_id' => 'Id de categoria',
    'fk_person_id' => 'Id de persona',
    'type' => 'tipo',
    'comments' => 'comentarios',
    'amount' => 'cantidad',
    'movement_date' => 'Fecha del movimiento'
  ],

];
