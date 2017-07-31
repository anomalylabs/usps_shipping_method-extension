<?php

return [
    'service' => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'options' => [
                'parcel'      => 'Parcel',
                'express'     => 'Express',
                'priority'    => 'Priority',
                'first_class' => 'First Class',
            ],
        ],
    ],
];
