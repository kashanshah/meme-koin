<?php

function roadmap_customize_register($wp_customize)
{
    // Add Section
    $wp_customize->add_section('roadmap_section', [
        'title' => __('Token Road Map', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'roadmap_enabled',
        true,
        'Enable roadmap section',
        'checkbox',
        'roadmap_section',
        'roadmap_section',
        'wp_validate_boolean',
        '.roadmap-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'roadmap_sub_title',
        TKNFC_DEMO_DATA['roadmap_sub_title'],
        'Sub Title',
        'text',
        'roadmap_section',
        'roadmap_section',
        'sanitize_text_field',
        '.roadmap-subtitle',
    );
    add_customizer_setting(
        $wp_customize,
        'roadmap_title',
        TKNFC_DEMO_DATA['roadmap_title'],
        'Title',
        'text',
        'roadmap_section',
        'roadmap_section',
        'sanitize_text_field',
        '.roadmap-title',
    );
    add_customizer_setting(
        $wp_customize,
        'roadmap_description',
        TKNFC_DEMO_DATA['roadmap_description'],
        'Description',
        'textarea',
        'roadmap_section',
        'roadmap_section',
        'sanitize_text_field',
        '.roadmap-description',
    );

    // Add background color setting and control
    add_customizer_setting(
        $wp_customize,
        'roadmap_bg_color',
        TKNFC_DEMO_DATA['roadmap_bg_color'],
        'Background Color',
        'color',
        'roadmap_section',
        'roadmap_section',
        'sanitize_hex_color',
        '.roadmap-sec',
    );

    add_customizer_setting(
        $wp_customize,
        'roadmap_bg_image',
        TKNFC_DEMO_DATA['roadmap_bg_image'],
        'Background Image',
        'image',
        'roadmap_section',
        'roadmap_section',
        'esc_url_raw',
        '.roadmap-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'roadmap_border_image',
        TKNFC_DEMO_DATA['roadmap_border_image'],
        'Border Image',
        'image',
        'roadmap_section',
        'roadmap_section',
        'esc_url_raw',
        '.roadmap-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'roadmap_item_bg_image',
        TKNFC_DEMO_DATA['roadmap_item_bg_image'],
        'Item Background Image',
        'image',
        'roadmap_section',
        'roadmap_section',
        'esc_url_raw',
        '.roadmap-sec'
    );

    $wp_customize->add_setting('roadmap_items', [
        'default' => (TKNFC_DEMO_DATA['roadmap_items']),
        'sanitize_callback' => 'tknfc_sanitize_repeater',
    ]);


    // Add Dynamic Repeater Control
    $wp_customize->add_control(new WP_Customize_Dynamic_Repeater_Control($wp_customize, 'roadmap_items', [
        'label' => __('Roadmap', 'meme-koin'),
        'description' => __('Roadmap Phase.', 'meme-koin'),
        'section' => 'roadmap_section',
        'settings' => 'roadmap_items',
        'fields' => [
            ['id' => 'subTitle', 'label' => 'Sub Title', 'type' => 'text'],
            ['id' => 'title', 'label' => 'Title', 'type' => 'text'],
            ['id' => 'mainTitle', 'label' => 'Main Title', 'type' => 'text'],
            ['id' => 'description', 'label' => 'Description', 'type' => 'text'],
        ],
    ]));

    $wp_customize->selective_refresh->add_partial('roadmap_items', [
        'selector' => '.roadmap-timeline',
        'render_callback' => function () {
            get_template_part('template-parts/roadmap');
        },
    ]);
}

add_action('customize_register', 'roadmap_customize_register');

