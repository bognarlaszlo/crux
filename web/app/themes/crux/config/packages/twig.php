<?php

use Crux\Twig\AssetExtension;
use Crux\Twig\EncoreExtension;
use Twig\Extra\Html\HtmlExtension;

return [
    'paths' => [
        'public/images' => 'images',
    ],
    'extensions' => [
        AssetExtension::class => [],
        EncoreExtension::class => [
            '/public/build/'
        ],
        HtmlExtension::class => []
    ],
];
