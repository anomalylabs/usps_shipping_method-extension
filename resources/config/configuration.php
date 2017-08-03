<?php

return [
    'service' => [
        'required' => true,
        'type'     => 'anomaly.field_type.select',
        'config'   => [
            'options' => [
                'anomaly.extension.usps_shipping_method::configuration.service.packages'  => [
                    'PRIORITY' => 'anomaly.extension.usps_shipping_method::configuration.service.option.PRIORITY',
                    'EXPRESS'  => 'anomaly.extension.usps_shipping_method::configuration.service.option.EXPRESS',
                    'PARCEL'   => 'anomaly.extension.usps_shipping_method::configuration.service.option.PARCEL',
                ],
                'anomaly.extension.usps_shipping_method::configuration.service.envelopes' => [
                    'FIRST CLASS' => 'anomaly.extension.usps_shipping_method::configuration.service.option.FIRST_CLASS',
                ],
                'anomaly.extension.usps_shipping_method::configuration.service.other'     => [
                    'MEDIA' => 'anomaly.extension.usps_shipping_method::configuration.service.option.MEDIA',
                ],
            ],
        ],
    ],
];
