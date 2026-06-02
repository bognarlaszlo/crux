<?php

namespace Crux\Infrastructure\WordPress;

use Timber\Timber;
use Twig\Environment;
use Twig\Extension\AbstractExtension;

class Theme
{
    public static function init(): void
    {
        Timber::init();
        Navigation::register();

        add_filter('timber/twig', [static::class, 'registerTwigExtensions']);
    }

    public static function registerTwigExtensions(Environment $twig): Environment
    {
        $config = require get_template_directory() . '/config/packages/twig.php';
        $extensions = $config['extensions'] ?? [];

        if (! is_array($extensions)) {
            return $twig;
        }

        foreach ($extensions as $extensionClass => $params) {
            if (! class_exists($extensionClass) || ! is_array($params)) {
                continue;
            }

            if (! is_subclass_of($extensionClass, AbstractExtension::class)) {
                continue;
            }

            $twig->addExtension(new $extensionClass(...$params));
        }

        return $twig;
    }
}
