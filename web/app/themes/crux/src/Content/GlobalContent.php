<?php

namespace Crux\Content;

final class GlobalContent
{
    public static function all(): array
    {
        return [
            'activities' => self::activities(),
            'contact' => self::contact(),
            'footer' => self::footer(),
            'metrics' => self::metrics(),
            'sustainability' => self::sustainability(),
        ];
    }

    private static function activities(): array
    {
        return [
            'title' => 'Tevékenységi körünk',
            'items' => [
                [
                    'icon' => 'building-01.svg',
                    'title' => 'Befektetéskezelés',
                    'text' => 'Közép- és hosszú távú finanszírozást biztosítunk növekedési potenciállal rendelkező vállalkozások számára.',
                ], [
                    'icon' => 'chart.svg',
                    'title' => 'Kockázatkezelés',
                    'text' => 'Befektetéseinket strukturált, transzparens kockázatkezelési rendszer mentén kezeljük.',
                ], [
                    'icon' => 'building-02.svg',
                    'title' => 'Alapkezelés',
                    'text' => 'Alternatív befektetési alapok kezelésével diverzifikált, értékalapú portfóliót építünk.',
                ],
            ],
        ];
    }

    private static function contact(): array
    {
        return [
            'title' => 'Kérdése van?',
            'subtitle' => 'Állunk rendelkezésére.',
            'email' => [
                'label' => 'info@cruxventures.hu',
                'url' => 'mailto:info@cruxventures.hu',
            ],
            'phone' => [
                'label' => '+36 1 220 2356',
                'url' => 'tel:+3612202356',
            ],
            'action' => [
                'label' => 'Kapcsolat',
                'url' => '/kapcsolat',
            ],
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

    private static function metrics(): array
    {
        return [
            [
                'title' => 'Alapítás',
                'value' => '2021',
            ], [
                'title' => 'Tevékenység',
                'value' => 'Kollektív portfóliókezelés',
            ], [
                'title' => 'Szövetségi tagság',
                'value' => 'BAMOSZ',
            ], [
                'title' => 'MNB engedély',
                'value' => '2022',
            ],
        ];
    }

    private static function sustainability(): array
    {
        return [
            'title' => 'Fenntarthatósági gyakorlatunk',
            'items' => [
                [
                    'icon' => 'building-01.svg',
                    'title' => 'ESG szempontok integrálása ',
                    'text' => 'A befektetési döntések során figyelembe vesszük az ESG (Environmental, Social, Governance) szempontokat.',
                ], [
                    'icon' => 'chart.svg',
                    'title' => 'Portfólió monitorozás ',
                    'text' => 'Nyomon követjük portfólióvállalataink fenntarthatósági teljesítményét, és szükség esetén beavatkozunk.',
                ], [
                    'icon' => 'building-02.svg',
                    'title' => 'Jelentések és közzétételek',
                    'text' => 'A fenntarthatósággal kapcsolatos releváns információkat és jelentéseket rendszeresen publikáljuk.',
                ],
            ],
            'card' => [
                'title' => 'A fenntarthatóság számunkra nem különálló cél, hanem a működésünk alapja.',
                'subtitle' => 'Fenntarthatósági jelentések',
                'text' => 'Tekintse meg legfrissebb közzétételeinket.',
                'action' => [
                    'label' => 'Közzétételek',
                    'url' => '#',
                ],
            ],
        ];
    }
}
