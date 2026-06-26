<?php

namespace Crux\Content;

final class GlobalContent
{
    public static function all(): array
    {
        return [
            'footer' => self::footer(),
            'sustainability' => self::sustainability(),
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

    private static function sustainability(): array
    {
        return [
            'title' => 'A fenntarthatóság számunkra nem különálló cél, hanem a működésünk alapja.',
            'subtitle' => 'Fenntarthatósági jelentések',
            'text' => 'Tekintse meg legfrissebb közzétételeinket.',
            'button' => [
                'label' => 'Közzétételek',
                'url' => '#',
            ],
        ];
    }
}
