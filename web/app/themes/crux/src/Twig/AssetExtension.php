<?php

namespace Crux\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AssetExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('asset', $this->asset(...)),
        ];
    }

    public function asset(string $path): string
    {
        return wp_make_link_relative(
            get_theme_file_uri('public/' . $path)
        );
    }
}
