<?php

use Crux\Twig\EncoreExtension;

return [
    'extensions' => [
        EncoreExtension::class => [
            '/public/build/'
        ]
    ],
];
