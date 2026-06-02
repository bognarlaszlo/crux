<?php

namespace Crux\Infrastructure\WordPress;

class Bootstrap
{
    public static function init(): void
    {
        add_action('admin_menu', [static::class, 'editAdminMenu']);
        add_action('admin_init', [static::class, 'removeAdminFeatures']);
        add_filter('comments_array', '__return_empty_array', 10, 2);
        add_filter('comments_open', '__return_false', 20);
        add_filter('pings_open', '__return_false', 20);
        add_filter('use_block_editor_for_post_type', '__return_false');
        add_action('wp_before_admin_bar_render', [static::class, 'removeAdminBarComments']);
    }

    public static function editAdminMenu(): void
    {
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');
        remove_menu_page('themes.php');
        remove_menu_page('plugins.php');
        remove_menu_page('edit.php?post_type=acf-field-group');
        remove_menu_page('users.php');

        add_menu_page(
            __('Menük', 'crux'),
            __('Menük', 'crux'),
            'edit_theme_options',
            'nav-menus.php',
            '',
            'dashicons-menu',
            61
        );
    }

    public static function removeAdminFeatures(): void
    {
        remove_post_type_support('post', 'editor');

        foreach (['post', 'page'] as $postType) {
            remove_post_type_support($postType, 'comments');
            remove_post_type_support($postType, 'trackbacks');
        }

        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    }

    public static function removeAdminBarComments(): void
    {
        global $wp_admin_bar;

        $wp_admin_bar->remove_menu('comments');
    }
}
