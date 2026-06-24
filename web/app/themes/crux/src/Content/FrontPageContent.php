<?php

namespace Crux\Content;

final class FrontPageContent
{
    public static function all(): array
    {
        return [
            'hero' => self::hero(),
            'metrics' => self::metrics(),
            'funds_slider' => self::fundsSlider(),
            'activities' => self::activities(),
        ];
    }

    private static function hero(): array
    {
        return [
            'title' => '<strong>Fenntartható</strong> növekedés. Felelős befektetés.',
            'lead' => 'A Crux Tőkealap-kezelő Zrt. magán,- és kockázati tőkealapok kezelésével foglalkozik.',
            'text' => 'Tevékenységünk célja, hogy közép- és hosszú távú finanszírozást biztosítsunk nagy növekedési potenciállal rendelkező vállalkozások számára, miközben befektetőink számára stabil, értékalapú portfóliót építünk. Az alapkezelő működését a szakmai megalapozottság, az átláthatóság és a felelős működés elvei határozzák meg.',
            'actions' => [
                [
                    'label' => 'Kezelt alapok megtekintése',
                    'url' => '',
                    'class' => 'btn btn-secondary',
                ], [
                    'label' => 'Rólunk',
                    'url' => '',
                    'class' => 'btn btn-outline-secondary',
                ],
            ],
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

    private static function fundsSlider(): array
    {
        return [
            'title' => 'Befektetési alapok',
            'action' => [
                'label' => 'Összes kezelt alap',
                'url' => '',
            ],
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
}
