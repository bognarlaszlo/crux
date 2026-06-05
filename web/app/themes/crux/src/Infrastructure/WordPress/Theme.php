<?php

namespace Crux\Infrastructure\WordPress;

use Timber\Loader;
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
        add_filter('timber/locations', [static::class, 'registerTwigLocations']);
    }

    public static function registerTwigExtensions(Environment $twig): Environment
    {
        $config = require get_template_directory() . '/config/packages/twig.php';
        $extensions = $config['extensions'] ?? [];

        if (!is_array($extensions)) {
            return $twig;
        }

        foreach ($extensions as $extensionClass => $params) {
            if (!class_exists($extensionClass) || !is_array($params)) {
                continue;
            }

            if (!is_subclass_of($extensionClass, AbstractExtension::class)) {
                continue;
            }

            $twig->addExtension(new $extensionClass(...$params));
        }

        return $twig;
    }

    public static function registerTwigLocations(array $paths): array
    {
        $config = require get_template_directory() . '/config/packages/twig.php';
        $configuredPaths = $config['paths'] ?? [];

        if (!is_array($configuredPaths)) {
            return $paths;
        }

        foreach ($configuredPaths as $path => $alias) {
            if (!is_string($path)) {
                continue;
            }

            $namespace = is_string($alias) && $alias !== '' ? $alias : Loader::MAIN_NAMESPACE;
            $resolvedPath = static::resolveTwigPath($path);

            if ($resolvedPath === null) {
                continue;
            }

            $paths[$namespace][] = $resolvedPath;
        }

        return $paths;
    }

    private static function resolveTwigPath(string $path): ?string
    {
        $resolvedPath = str_starts_with($path, '/') ? $path : get_theme_file_path($path);
        $realPath = realpath($resolvedPath);

        return is_string($realPath) && is_dir($realPath) ? $realPath : null;
    }
}
