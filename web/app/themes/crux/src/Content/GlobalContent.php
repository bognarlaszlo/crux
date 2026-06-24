<?php

namespace Crux\Content;

final class GlobalContent
{
    public static function all(): array
    {
        return [
            'footer' => self::footer(),
        ];
    }

    private static function footer(): array
    {
        return [
            'links' => [
                [
                    'label' => 'BAMOSZ',
                    'url' => '#',
                ], [
                    'label' => 'Adatkezelési tájékoztató',
                    'url' => '#',
                ], [
                    'label' => 'Impresszum',
                    'url' => '#',
                ],
            ],
            'copyright' => 'CRUX Tőkealap-Kezelő',
        ];
    }
}
