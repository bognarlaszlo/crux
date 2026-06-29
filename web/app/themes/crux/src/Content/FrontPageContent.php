<?php

namespace Crux\Content;

final class FrontPageContent
{
    public static function all(): array
    {
        return [
            'hero' => self::hero(),
            'funds_slider' => self::fundsSlider(),
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
}
