<?php

function getitnow_customize_register($wp_customize)
{
    // Add Section
    $wp_customize->add_section('getitnow_section', [
        'title' => __('Get It Now', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'getitnow_enabled',
        true,
        'Enable Get It Now Section',
        'checkbox',
        'getitnow_section',
        'getitnow_section',
        'wp_validate_boolean',
        '.getitnow-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'getitnow_subtitle',
        TKNFC_DEMO_DATA['getitnow_sub_title'],
        'Sub Title',
        'text',
        'getitnow_section',
        'getitnow_section',
        'sanitize_text_field',
        '.getitnow-subtitle',
    );
    add_customizer_setting(
        $wp_customize,
        'getitnow_title',
        TKNFC_DEMO_DATA['getitnow_title'],
        'Title',
        'text',
        'getitnow_section',
        'getitnow_section',
        'sanitize_text_field',
        '.getitnow-title',
    );
    add_customizer_setting(
        $wp_customize,
        'getitnow_description',
        TKNFC_DEMO_DATA['getitnow_description'],
        'Content',
        'text',
        'getitnow_section',
        'getitnow_section',
        'sanitize_text_field',
        '.getitnow-description',
    );
    add_customizer_setting(
        $wp_customize,
        'getitnow_background_image',
        TKNFC_DEMO_DATA['getitnow_bg_image'],
        'Background Image',
        'image',
        'getitnow_section',
        'getitnow_section',
        'esc_url_raw',
        '.getitnow-sec'
    );
    // Add primary color setting and control
    add_customizer_setting(
        $wp_customize,
        'getitnow_bg_color',
        TKNFC_DEMO_DATA['getitnow_bg_color'],
        'Background Color',
        'color',
        'getitnow_section',
        'getitnow_section',
        'sanitize_hex_color',
        '.getitnow-sec'
    );


    $wp_customize->add_setting('getitnow_items', [
        'default' => TKNFC_DEMO_DATA['getitnow_items'],
        'sanitize_callback' => 'tknfc_sanitize_repeater',
    ]);
    // Add Dynamic Repeater Control
    $wp_customize->add_control(new WP_Customize_Dynamic_Repeater_Control($wp_customize, 'getitnow_items', [
        'label' => __('Links', 'meme-koin'),
        'description' => __('Platforms.', 'meme-koin'),
        'section' => 'getitnow_section',
        'settings' => 'getitnow_items',
        'fields' => [
            ['id' => 'link', 'label' => 'Link', 'type' => 'url'],
            ['id' => 'title', 'label' => 'Title', 'type' => 'text'],
            ['id' => 'image', 'label' => 'Image', 'type' => 'image'],
        ],
    ]));

    $wp_customize->selective_refresh->add_partial('getitnow_items', [
        'selector' => '.get-information-div',
        'render_callback' => function () {
            get_template_part('template-parts/get-it-now');
        },
    ]);

}

add_action('customize_register', 'getitnow_customize_register');

