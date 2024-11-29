<?php

function howtobuy_customize_register($wp_customize)
{
    // Add Section
    $wp_customize->add_section('howtobuy_section', [
        'title' => __('How To Buy Token', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'howtobuy_enabled',
        true,
        'Enable How To Buy Section',
        'checkbox',
        'howtobuy_section',
        'howtobuy_section',
        'wp_validate_boolean',
        '.howtobuy-sec'
    );

    // add background image
    add_customizer_setting(
        $wp_customize,
        'howtobuy_bg_image',
        TKNFC_DEMO_DATA['howtobuy_bg_image'],
        'Background Image',
        'image',
        'howtobuy_section',
        'howtobuy_section',
        'esc_url',
        '.howtobuy-sec'
    );

    // add background color
    add_customizer_setting(
        $wp_customize,
        'howtobuy_bg_color',
        TKNFC_DEMO_DATA['howtobuy_bg_color'],
        'Background Color',
        'color',
        'howtobuy_section',
        'howtobuy_section',
        'sanitize_hex_color',
        '.howtobuy-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'howtobuy_sub_title',
        TKNFC_DEMO_DATA['howtobuy_sub_title'],
        'Sub Title',
        'text',
        'howtobuy_section',
        'howtobuy_section',
        'sanitize_text_field',
        '.howtobuy-sub_title',
    );
    add_customizer_setting(
        $wp_customize,
        'howtobuy_title',
        TKNFC_DEMO_DATA['howtobuy_title'],
        'Title',
        'text',
        'howtobuy_section',
        'howtobuy_section',
        'sanitize_text_field',
        '.howtobuy-title',
    );
    add_customizer_setting(
        $wp_customize,
        'howtobuy_description',
        TKNFC_DEMO_DATA['howtobuy_description'],
        'Content',
        'text',
        'howtobuy_section',
        'howtobuy_section',
        'sanitize_text_field',
        '.howtobuy-description',
    );

    add_customizer_setting(
        $wp_customize,
        'howtobuy_cta_text',
        TKNFC_DEMO_DATA['howtobuy_cta_text'],
        'CTA Text',
        'text',
        'howtobuy_section',
        'howtobuy_section',
        'sanitize_text_field',
        '.howtobuy-sec-cta'
    );
    add_customizer_setting(
        $wp_customize,
        'howtobuy_cta_link',
        TKNFC_DEMO_DATA['howtobuy_cta_link'],
        'CTA Link',
        'url',
        'howtobuy_section',
        'howtobuy_section',
        'sanitize_text_field',
        '.cta-link'
    );


    $wp_customize->add_setting('howtobuy_items', [
        'default' => TKNFC_DEMO_DATA['howtobuy_items'],
        'sanitize_callback' => 'tknfc_sanitize_repeater',
    ]);

    // Add Dynamic Repeater Control
    $wp_customize->add_control(new WP_Customize_Dynamic_Repeater_Control($wp_customize, 'howtobuy_items', [
        'label' => __('HowToBuy', 'meme-koin'),
        'description' => __('Three Easy Steps.', 'meme-koin'),
        'section' => 'howtobuy_section',
        'settings' => 'howtobuy_items',
        'fields' => [
            ['id' => 'title', 'label' => 'Title', 'type' => 'text'],
            ['id' => 'description', 'label' => 'Subtitle', 'type' => 'text'],
            ['id' => 'image', 'label' => 'Image 1', 'type' => 'image'],
        ],
    ]));

    $wp_customize->selective_refresh->add_partial('howtobuy_items', [
        'selector' => '.buying-information-div',
        'render_callback' => function () {
            get_template_part('template-parts/how-to-buy');
        },
    ]);
}

add_action('customize_register', 'howtobuy_customize_register');

