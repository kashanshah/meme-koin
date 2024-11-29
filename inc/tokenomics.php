<?php

function tokenomics_customize_register($wp_customize)
{
    // Add Section
    $wp_customize->add_section('tokenomics_section', [
        'title' => __('Tokenomics', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'tokenomics_enabled',
        true,
        'Enable/disable tokenomics section',
        'checkbox',
        'tokenomics_section',
        'tokenomics_section',
        'wp_validate_boolean',
        '.tokenomics-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'tokenomics_bg_color',
        TKNFC_DEMO_DATA['tokenomics_bg_color'],
        'Background Color',
        'color',
        'tokenomics_section',
        'tokenomics_section',
        'sanitize_hex_color',
        '.tokenomics-sec',
    );

    add_customizer_setting(
        $wp_customize,
        'tokenomics_background_image',
        TKNFC_DEMO_DATA['tokenomics_background_image'],
        'Background Image',
        'image',
        'tokenomics_section',
        'tokenomics_section',
        'esc_url_raw',
        '.tokenomics-sec',
    );

    add_customizer_setting(
        $wp_customize,
        'tokenomics_sub_title',
        TKNFC_DEMO_DATA['tokenomics_sub_title'],
        'Sub Title',
        'text',
        'tokenomics_section',
        'tokenomics_section',
        'sanitize_text_field',
        '.tokenomics-sub_title',
    );
    add_customizer_setting(
        $wp_customize,
        'tokenomics_title',
        TKNFC_DEMO_DATA['tokenomics_title'],
        'Title',
        'text',
        'tokenomics_section',
        'tokenomics_section',
        'sanitize_text_field',
        '.tokenomics-title',
    );
    add_customizer_setting(
        $wp_customize,
        'tokenomics_description',
        TKNFC_DEMO_DATA['tokenomics_description'],
        'Description',
        'textarea',
        'tokenomics_section',
        'tokenomics_section',
        'sanitize_text_field',
        '.tokenomics-description',
    );

    $wp_customize->add_setting('tokenomics_items', [
        'default' => TKNFC_DEMO_DATA['tokenomics_items'],
        'sanitize_callback' => 'tknfc_sanitize_repeater',
    ]);

    // Add Dynamic Repeater Control
    $wp_customize->add_control(new WP_Customize_Dynamic_Repeater_Control($wp_customize, 'tokenomics_items', [
        'label' => __('Tokenomics', 'meme-koin'),
        'description' => __('Add tokenomics information.', 'meme-koin'),
        'section' => 'tokenomics_section',
        'settings' => 'tokenomics_items',
        'fields' => [
            ['id' => 'sub_title', 'label' => 'Sub Title', 'type' => 'text'],
            ['id' => 'title', 'label' => 'Title', 'type' => 'text'],
            ['id' => 'image_1', 'label' => 'Image 1', 'type' => 'image'],
            ['id' => 'image_2', 'label' => 'Image 2', 'type' => 'image'],
        ],
    ]));

    $wp_customize->selective_refresh->add_partial('tokenomics_items', [
        'selector' => '.token-information-div',
        'render_callback' => function () {
            get_template_part('template-parts/tokenomics');
        },
    ]);
}

add_action('customize_register', 'tokenomics_customize_register');

