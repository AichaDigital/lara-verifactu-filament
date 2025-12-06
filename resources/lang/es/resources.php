<?php

return [
    'registry' => [
        'navigation_label' => 'Registros',
        'model_label' => 'Registro',
        'plural_model_label' => 'Registros',

        'sections' => [
            'basic_info' => 'Información Básica',
            'hash_info' => 'Hash y Blockchain',
            'aeat_info' => 'Envío a AEAT',
        ],

        'fields' => [
            'registry_number' => 'Número de Registro',
            'registry_date' => 'Fecha de Registro',
            'status' => 'Estado',
            'invoice' => 'Factura',
            'hash' => 'Hash (SHA-256)',
            'previous_hash' => 'Hash Anterior',
            'submitted_at' => 'Enviado el',
            'aeat_csv' => 'CSV AEAT',
            'aeat_error' => 'Error AEAT',
            'submission_attempts' => 'Intentos',
            'created_at' => 'Creado el',
        ],
    ],
];
