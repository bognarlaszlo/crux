<?php

namespace Crux\Twig;

use Crux\Twig\Helper\ThemePublicAssetHelper;
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
        return ThemePublicAssetHelper::url($path);
    }
}
