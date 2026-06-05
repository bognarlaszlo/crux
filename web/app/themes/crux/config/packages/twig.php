<?php

use Crux\Twig\EncoreExtension;

return [
    'paths' => [
        'public/images' => 'images',
    ],
    'extensions' => [
        EncoreExtension::class => [
            '/public/build/'
        ]
    ],
];
