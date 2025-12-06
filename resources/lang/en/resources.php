<?php

return [
    'registry' => [
        'navigation_label' => 'Registries',
        'model_label' => 'Registry',
        'plural_model_label' => 'Registries',

        'sections' => [
            'basic_info' => 'Basic Information',
            'hash_info' => 'Hash & Blockchain',
            'aeat_info' => 'AEAT Submission',
        ],

        'fields' => [
            'registry_number' => 'Registry Number',
            'registry_date' => 'Registry Date',
            'status' => 'Status',
            'invoice' => 'Invoice',
            'hash' => 'Hash (SHA-256)',
            'previous_hash' => 'Previous Hash',
            'submitted_at' => 'Submitted At',
            'aeat_csv' => 'AEAT CSV',
            'aeat_error' => 'AEAT Error',
            'submission_attempts' => 'Attempts',
            'created_at' => 'Created At',
        ],
    ],
];
