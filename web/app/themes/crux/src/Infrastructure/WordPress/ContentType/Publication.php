<?php

namespace Crux\Infrastructure\WordPress\ContentType;

final class Publication extends AbstractContentType
{
    public const string NAME = 'publication';

    public static function registerPostType(): void
    {
        register_post_type(self::NAME, [
            'has_archive' => true,
            'labels' => array(
                'name' => __('Közzététel', 'crux'),
                'singular_name' => __('Közzétételek', 'crux'),
                'menu_name' => __('Közzétételek', 'crux'),
            ),
            'public' => true,
            'show_in_rest' => false,
            'menu_icon' => 'dashicons-media-document',
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
                'key' => 'crux_filed_group_publication',
                'title' => 'Közzététel részletek',
                'fields' => [
                    [
                        'key' => 'crux_field_file',
                        'label' => 'Dokumentum',
                        'name' => 'file',
                        'type' => 'file',
                        'return_format' => 'url',
                        'library' => 'uploadedTo',
                        'mime_types' => 'pdf',
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
                'position' => 'side'
            ]
        ];
    }
}
