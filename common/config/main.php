<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'formatter' => [
            'class' => yii\i18n\Formatter::class,
            'defaultTimeZone' => 'Europe/Budapest',
            'timeZone' => 'Europe/Budapest',
            'dateFormat' => 'php:Y.m.d.',
            'datetimeFormat' => 'php:Y.m.d. H:i',
            'timeFormat' => 'php:H:i',
        ],
    ],
    'timeZone' => 'Europe/Budapest',
];
