<?php

use Crux\Twig\AssetExtension;
use Crux\Twig\EncoreExtension;

return [
    'paths' => [
        'public/images' => 'images',
    ],
    'extensions' => [
        AssetExtension::class => [],
        EncoreExtension::class => [
            '/public/build/'
        ]
    ],
];
