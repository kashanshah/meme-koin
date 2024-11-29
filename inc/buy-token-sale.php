<?php

function buyitnow_customize_register($wp_customize) {
    // Add Section
    $wp_customize->add_section('buyitnow_section', [
        'title'    => __('Token Sale Section', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'buyitnow_enabled',
        true,
        'Enable buyitnow section',
        'checkbox',
        'buyitnow_section',
        'buyitnow_section',
        'wp_validate_boolean',
        '.buyitnow-sec'
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_title',
        TKNFC_DEMO_DATA['buyitnow_title'],
        'Title',
        'text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.buyitnow-title',
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_description',
        TKNFC_DEMO_DATA['buyitnow_description'],
        'Content',
        'rich-text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_textarea_field',
        '.buyitnow-description',
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_cta_text',
        TKNFC_DEMO_DATA['buyitnow_cta_text'],
        'CTA Text',
        'text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.buyitnow-sec-cta'
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_cta_link',
        '#',
        TKNFC_DEMO_DATA['buyitnow_cta_link'],
        'url',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.cta-link'
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_image',
        TKNFC_DEMO_DATA['buyitnow_image'],
        'Image',
        'image',
        'buyitnow_section',
        'buyitnow_section',
        'esc_url_raw',
        '.buyitnow-image',
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_bg_image',
        TKNFC_DEMO_DATA['buyitnow_bg_image'],
        'Background Image',
        'image',
        'buyitnow_section',
        'buyitnow_section',
        'esc_url_raw',
        '.buyitnow-sec'
    );

    
        // Add BG color setting and control
    add_customizer_setting(
        $wp_customize,
        'buyitnow_bg_color',
        TKNFC_DEMO_DATA['buyitnow_bg_color'],
        'Background Color',
        'color',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_hex_color',
        '.buyitnow-sec'
    );

    // Add the text fields for the progress

    // Min Strength
    add_customizer_setting(
        $wp_customize,
        'buyitnow_timer_title',
        TKNFC_DEMO_DATA['buyitnow_timer_title'],
        'Timer Title',
        'text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.buyitnow-timer',
    );
    add_customizer_setting(
        $wp_customize,
        'current_strength',
        TKNFC_DEMO_DATA['buyitnow_timer_currentStrength'],
        'Current Strength',
        'text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.buyitnow-currentstrength',
    );

    // Min Strength
    add_customizer_setting(
        $wp_customize,
        'min_strength',
        TKNFC_DEMO_DATA['buyitnow_timer_minStrength'],
        'Min Strength',
        'text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.buyitnow-minstrength',
    );

    // Max Strength
    add_customizer_setting(
        $wp_customize,
        'max_strength',
        TKNFC_DEMO_DATA['buyitnow_timer_maxStrength'],
        'Maximum Strength',
        'text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.buyitnow-maxstrength',
    );

    // Softcap
    add_customizer_setting(
        $wp_customize,
        'softcap',
        TKNFC_DEMO_DATA['buyitnow_timer_softcap'],
        'Softcap Text',
        'text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.buyitnow-softcap',
    );

    // Hardcap
    add_customizer_setting(
        $wp_customize,
        'hardcap',
        TKNFC_DEMO_DATA['buyitnow_timer_hardcap'],
        'Hardcap Text',
        'text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.buyitnow-hardcap'
    );
    
    add_customizer_setting(
        $wp_customize,
        'token_value',
        TKNFC_DEMO_DATA['buyitnow_timer_tokenValue'],
        'Per Token Value',
        'text',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        '.buyitnow-per-token-val'
    );

    add_customizer_setting(
        $wp_customize,
        'buyitnow_buy_means_img',
        TKNFC_DEMO_DATA['buyitnow_timer_image'],
        'Accepted Cards Images',
        'image',
        'buyitnow_section',
        'buyitnow_section',
        'esc_url_raw',
        '.buyitnow-card-img'
    );

    // Timer
    add_customizer_setting(
        $wp_customize,
        'buyitnow_timer_year',
        TKNFC_DEMO_DATA['buyitnow_timer_year'],
        'Timer Year',
        'number',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        'simple_timer'
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_timer_month',
        TKNFC_DEMO_DATA['buyitnow_timer_month'],
        'Timer Month',
        'number',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        'simple_timer'
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_timer_day',
        TKNFC_DEMO_DATA['buyitnow_timer_day'],
        'Timer Day',
        'number',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        'simple_timer'
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_timer_hour',
        TKNFC_DEMO_DATA['buyitnow_timer_hour'],
        'Timer Hour',
        'number',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        'simple_timer'
    );
    add_customizer_setting(
        $wp_customize,
        'buyitnow_timer_minute',
        TKNFC_DEMO_DATA['buyitnow_timer_minute'],
        'Timer Minute',
        'number',
        'buyitnow_section',
        'buyitnow_section',
        'sanitize_text_field',
        'simple_timer'
    );
}

add_action('customize_register', 'buyitnow_customize_register');

