<?php

namespace Crux\Infrastructure\WordPress;

use Timber\Timber;

final class Navigation
{
    public static function register(): void
    {
        add_action('after_setup_theme', [self::class, 'registerMenus']);
        add_filter('timber/context', [self::class, 'addToContext']);
    }

    public static function registerMenus(): void
    {
        register_nav_menus([
            'primary' => __('Főmenü', 'crux'),
        ]);
    }

    public static function addToContext(array $context): array
    {
        $context['primary_menu'] = Timber::get_menu('primary');

        return $context;
    }
}
