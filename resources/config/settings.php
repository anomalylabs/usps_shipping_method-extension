<?php

return [
    'username' => [
        'env'  => 'USPS_USERNAME',
        'bind' => 'anomaly.extension.usps_shipping_method::config.username',
        'type' => 'anomaly.field_type.encrypted',
    ],
];
