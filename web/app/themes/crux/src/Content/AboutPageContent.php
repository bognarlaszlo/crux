<?php

namespace Crux\Content;

class AboutPageContent
{
    public static function all(): array
    {
        return [
            'timeline' => self::timeline(),
        ];
    }

    private static function timeline(): array
    {
        return [
            'title' => 'Történetünk',
            'items' =>  [
                'A társaságot 2021-ben alapították, működését a Magyar Nemzeti Bank 2022-ben engedélyezte.',
                '2025 decemberében a vállalat Crux Tőkealap-kezelő Zrt. néven folytatta tevékenységét.',
                'A társaság magántőkealap-kezelőként csatlakozott a Befektetési Alapkezelők és Vagyonkezelők Magyarországi Szövetségéhez (BAMOSZ).',
            ]
        ];
    }
}
