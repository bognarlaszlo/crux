<?php

namespace Crux\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class InitialsExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('initials', $this->initials(...)),
        ];
    }

    public function initials(string $value): string
    {
        $words = preg_split('/[\s\p{Z}]+/u', $value, -1, PREG_SPLIT_NO_EMPTY);

        if ($words === false) {
            return '';
        }

        return implode('', array_map(
            static fn(string $word): string => mb_strtoupper(grapheme_substr($word, 0, 1)),
            $words,
        ));
    }
}
