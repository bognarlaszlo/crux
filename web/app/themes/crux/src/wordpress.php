<?php

add_action('admin_menu', function (): void {
    remove_menu_page('edit.php');
    remove_menu_page('edit.php?post_type=page');
    remove_menu_page('edit-comments.php');
    remove_menu_page('themes.php');
    remove_menu_page('plugins.php');
    remove_menu_page('edit.php?post_type=acf-field-group');
});

add_action('admin_init', function (): void {
    foreach (['post', 'page'] as $postType) {
        remove_post_type_support($postType, 'editor');
        remove_post_type_support($postType, 'comments');
        remove_post_type_support($postType, 'trackbacks');
    }

    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
});

add_filter('comments_open', '__return_false', 20);
add_filter('pings_open', '__return_false', 20);
add_filter('comments_array', '__return_empty_array', 10, 2);

add_action('wp_before_admin_bar_render', function (): void {
    global $wp_admin_bar;

    $wp_admin_bar->remove_menu('comments');
});
