<?php

namespace Crux\Twig\Helper;

final class ThemePublicAssetHelper
{
    public static function url(string $path): string
    {
        return wp_make_link_relative(
            get_theme_file_uri('public/' . ltrim($path, '/')),
        );
    }
}
