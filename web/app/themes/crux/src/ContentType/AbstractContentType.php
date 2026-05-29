<?php

namespace Crux\ContentType;

abstract class AbstractContentType
{
    public static function register(): void
    {
        add_action('init', [static::class, 'registerPostType']);
        add_action('init', [static::class, 'registerTaxonomies']);
        add_action('acf/include_fields', [static::class, 'registerFields']);
    }

    abstract public static function registerPostType(): void;

    final public static function registerTaxonomies(): void
    {
        foreach (static::taxonomies() as $taxonomy => $args) {
            register_taxonomy($taxonomy, [static::NAME], $args);
        }
    }

    final public static function registerFields(): void
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        foreach (static::fields() as $fieldGroup) {
            acf_add_local_field_group($fieldGroup);
        }
    }

    protected static function taxonomies(): array
    {
        return [];
    }

    protected static function fields(): array
    {
        return [];
    }
}
