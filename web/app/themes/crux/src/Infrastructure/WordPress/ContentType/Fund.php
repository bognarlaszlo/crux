<?php

namespace Crux\Infrastructure\WordPress\ContentType;

final class Fund extends AbstractContentType
{
    public const string NAME = 'fund';

    public static function registerPostType(): void
    {
        register_post_type(self::NAME, [
            'labels' => array(
                'name' => __('Kezelt alapok', 'crux'),
                'singular_name' => __('Kezelt alap', 'crux'),
                'menu_name' => __('Kezelt alapok', 'crux'),
            ),
            'public' => true,
            'show_in_rest' => false,
            'menu_icon' => 'dashicons-vault',
            'supports' => [
                'title',
                'editor',
                'excerpt',
            ],
            'taxonomies' => ['fund_category'],
        ]);
    }

    protected static function fields(): array
    {
        return [
            [
                'key' => 'crux_filed_group_fund',
                'title' => 'Befektetési alap részletek',
                'fields' => [
                    [
                        'key' => 'crux_group_fund_properties',
                        'label' => 'Alapadatok',
                        'name' => 'fund_properties',
                        'type' => 'group',
                        'wrapper' => [
                            'width' => '50',
                        ],
                        'layout' => 'row',
                        'sub_fields' => [
                            [
                                'key' => 'crux_field_fund_type',
                                'label' => 'Befektetési alap típusa',
                                'name' => 'fund_type',
                                'type' => 'text',
                                'required' => 1,
                            ],
                            [
                                'key' => 'crux_field_fund_kind',
                                'label' => 'Befektetési alap fajtája',
                                'name' => 'fund_kind',
                                'type' => 'text',
                                'required' => 1,
                            ],
                            [
                                'key' => 'crux_field_fund_harmonization',
                                'label' => 'Befektetési alap harmonizációja',
                                'name' => 'fund_harmonization',
                                'type' => 'text',
                                'required' => 1,
                            ],
                            [
                                'key' => 'crux_field_fund_distribution_method',
                                'label' => 'Befektetési jegy forgalomba hozatalának módja',
                                'name' => 'fund_distribution_method',
                                'type' => 'text',
                                'required' => 1,
                            ],
                            [
                                'key' => 'crux_field_fund_term',
                                'label' => 'Befektetési alap futamideje',
                                'name' => 'fund_term',
                                'type' => 'date_picker',
                                'required' => 1,
                                'display_format' => 'Y.m.d.',
                                'return_format' => 'Y.m.d.',
                                'first_day' => 1,
                            ],
                            [
                                'key' => 'crux_field_fund_registration_date',
                                'label' => 'Nyilvántartásba vétel időpontja',
                                'name' => 'fund_registration_date',
                                'type' => 'date_picker',
                                'required' => 1,
                                'display_format' => 'Y.m.d.',
                                'return_format' => 'Y.m.d.',
                                'first_day' => 1,
                            ],
                            [
                                'key' => 'crux_field_fund_registration_number',
                                'label' => 'Nyilvántartásba vétel száma',
                                'name' => 'fund_registration_number',
                                'type' => 'text',
                                'required' => 1,
                            ],
                            [
                                'key' => 'crux_field_fund_capital',
                                'label' => 'Jegyzett tőke nagysága',
                                'name' => 'fund_capital',
                                'type' => 'number',
                                'required' => 1,
                                'min' => 0,
                                'step' => 1,
                                'append' => 'HUF',
                            ],
                            [
                                'key' => 'crux_field_fund_period',
                                'label' => 'Befektetési időszak',
                                'name' => 'fund_period',
                                'type' => 'text',
                                'required' => 1,
                            ],
                            [
                                'key' => 'crux_field_fund_investors',
                                'label' => 'Befektetők személye',
                                'name' => 'fund_investors',
                                'type' => 'textarea',
                                'required' => 1,
                                'rows' => 2,
                            ],
                        ],
                    ],
                    [
                        'key' => 'crux_field_publications',
                        'label' => 'Közzétételek',
                        'name' => 'publications',
                        'type' => 'relationship',
                        'wrapper' => [
                            'width' => '50',
                        ],
                        'post_type' => [
                            Publication::NAME,
                        ],
                        'filters' => [
                            'search',
                        ],
                        'return_format' => 'object',
                        'bidirectional' => 1,
                        'bidirectional_target' => [
                            'crux_field_related_fund',
                        ],
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
            ]
        ];
    }

    protected static function taxonomies(): array
    {
        return [
            'fund_category' => [
                'labels' => [
                    'name' => __('Kategóriák', 'crux'),
                    'singular_name' => __('Kategória', 'crux'),
                ],
                'public' => true,
                'show_in_rest' => true,
                'hierarchical' => false,
                'rewrite' => [
                    'slug' => 'fund-category'
                ],
            ]
        ];
    }
}
