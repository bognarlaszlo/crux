<?php

namespace Crux\ContentType;

final class Board extends AbstractContentType
{
    public const string NAME = 'board';

    public static function registerPostType(): void
    {
        register_post_type(self::NAME, [
            'labels' => array(
                'name' => __('Igazgatósági tagok', 'crux'),
                'singular_name' => __('Igazgatósági tag', 'crux'),
                'menu_name' => __('Igazgatóság', 'crux'),
            ),
            'public' => true,
            'show_in_rest' => false,
            'menu_icon' => 'dashicons-groups',
            'supports' => [
                'title',
                'editor',
                'excerpt',
            ],
            'delete_with_user' => false,
        ]);
    }

    protected static function fields(): array
    {
        return [
            [
                'key' => 'crux_field_group_board',
                'title' => 'Igazgatósái tag adatai',
                'fields' => [
                    [
                        'key' => 'crux_field_board_member_position',
                        'label' => 'Titulus',
                        'name' => 'board_member_position',
                        'type' => 'text',
                        'required' => 1,
                    ],
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => self::NAME,
                        ],
                    ],
                ],
                'position' => 'acf_after_title',
            ]
        ];
    }
}
