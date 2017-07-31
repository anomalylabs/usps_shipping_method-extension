<?php

return [
    'access_key' => [
        'env'  => 'USPS_ACCESS_KEY',
        'bind' => 'anomaly.extension.usps_shipping_method::config.access_key',
        'type' => 'anomaly.field_type.encrypted',
    ],
    'username'   => [
        'env'  => 'USPS_USERNAME',
        'bind' => 'anomaly.extension.usps_shipping_method::config.username',
        'type' => 'anomaly.field_type.encrypted',
    ],
    'password'   => [
        'env'  => 'USPS_PASSWORD',
        'bind' => 'anomaly.extension.usps_shipping_method::config.password',
        'type' => 'anomaly.field_type.encrypted',
    ],
];
