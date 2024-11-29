<?php
/**
 * Theme functions and definitions
 *
 * @package Memecoin_Master
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
require_once get_template_directory() . '/inc/social-navigation-widget.php';

require_once get_template_directory() . '/inc/class-wp-repeater-control.php';
require_once get_template_directory() . '/inc/customizer-utils.php';

require_once get_template_directory() . '/inc/demo-data.php';

require_once get_template_directory() . '/inc/footer-menu-widget.php';
require_once get_template_directory() . '/inc/footer-intro-widget.php';
require_once get_template_directory() . '/inc/footer.php';

require_once get_template_directory() . '/inc/hero.php';

require_once get_template_directory() . '/inc/bulletin.php';

require_once get_template_directory() . '/inc/about.php';

require_once get_template_directory() . '/inc/how-to-buy.php';

require_once get_template_directory() . '/inc/get-it-now.php';

require_once get_template_directory() . '/inc/buy-token-sale.php';

require_once get_template_directory() . '/inc/roadmap.php';

require_once get_template_directory() . '/inc/tokenomics.php';

require_once get_template_directory() . '/inc/faq.php';

require_once get_template_directory() . '/inc/newsletter-sec.php';

require_once get_template_directory() . '/inc/contact-us.php';

require_once get_template_directory() . '/inc/404.php';

require_once get_template_directory() . '/inc/demo-import.php';

function memecoin_master_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('meme-koin-style', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.3', 'all');

    // Enqueue main JavaScript
    // Enqueue jQuery (included in WordPress core)
    wp_enqueue_script('jquery', [], '2.2.4', true);

    // Enqueue Popper.js
//    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', [], '2.11.8', true);

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', ['jquery'], '5.1.0', true);

    // Enqueue custom JS files
    wp_enqueue_script('meme-koin-plugins-script', get_template_directory_uri() . '/assets/js/plugins.js', ['jquery'], '1.0', true);
    wp_enqueue_script('meme-koin-syotimer-script', get_template_directory_uri() . '/assets/js/jquery.syotimer.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('meme-koin-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0', true);
    wp_enqueue_script('meme-koin-copy-script', get_template_directory_uri() . '/assets/js/copy.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'memecoin_master_enqueue_scripts');

// Register navigation menus
function memecoin_master_register_menus() {
    register_nav_menus([
        'main-menu' => __('Main Menu', 'meme-koin'),
    ]);
}
add_action('init', 'memecoin_master_register_menus');

// Add theme support
function memecoin_master_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
//    add_theme_support('custom-logo');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('widgets');
    remove_theme_support('widgets-block-editor');
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'memecoin_master_theme_support');

function memecoin_master_customize_register($wp_customize) {
    // Add a Global Options Section
    $wp_customize->add_section('global_options_section', array(
        'title'       => __('Global Options', 'meme-koin'),
        'priority'    => 20,
        'description' => __('Manage global settings for the theme', 'meme-koin'),
    ));

    // Add Setting for Enabling/Disabling Preloader
    add_customizer_setting(
        $wp_customize,
        'enable_preloader',
        true,
        'Enable Preloader',
        'checkbox',
        'global_options_section',
        'global_options_section',
        'wp_validate_boolean',
        '.preloader',
    );

    // Add Link and text for Header CTA
    add_customizer_setting(
        $wp_customize,
        'global_header_cta_text',
        TKNFC_DEMO_DATA['global_header_cta_text'],
        'Header CTA Text',
        'text',
        'global_options_section',
        'global_options_section',
        'sanitize_text_field',
        '.copy-btn',
    );
    add_customizer_setting(
        $wp_customize,
        'global_header_cta_link',
        TKNFC_DEMO_DATA['global_header_cta_link'],
        'Header CTA Link',
        'text',
        'global_options_section',
        'global_options_section',
        'esc_url',
        '.copy-btn',
    );

    add_customizer_setting(
        $wp_customize,
        'use_theme_home_page',
        true,
        'Use theme\'s home page',
        'checkbox',
        'global_options_section',
        'global_options_section',
        'wp_validate_boolean',
        'body',
    );

    // Add Contract Address Setting
    add_customizer_setting(
        $wp_customize,
        'global_contract_address',
        TKNFC_DEMO_DATA['global_contract_address'],
        'Contract Address',
        'text',
        'global_options_section',
        'global_options_section',
        'sanitize_text_field',
        '.contract-address',
    );
}
add_action('customize_register', 'memecoin_master_customize_register');

function theme_customize_register($wp_customize) {
    // Add primary color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_primary_color',
        TKNFC_DEMO_DATA['global_primary_color'],
        'Primary Colors',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );
    // Add secondary color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_secondary_color',
        TKNFC_DEMO_DATA['global_secondary_color'],
        'Secondary Colors',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );

    // Add background color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_body_bg_color',
        TKNFC_DEMO_DATA['global_body_bg_color'],
        'Background Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'global_body_bg_color', array(
        'label'   => __('Background Color', 'your-theme'),
        'section' => 'global_options_section',
        'settings' => 'global_body_bg_color',
    )));

    // add btn bg and btn color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_btn_bg',
        TKNFC_DEMO_DATA['global_btn_bg'],
        'Button Background Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );
    add_customizer_setting(
        $wp_customize,
        'global_btn_color',
        TKNFC_DEMO_DATA['global_btn_color'],
        'Button Text Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );

    // Add text color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_body_color',
        TKNFC_DEMO_DATA['global_body_color'],
        'Text Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );

    // Add light color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_color_light',
        TKNFC_DEMO_DATA['global_color_light'],
        'Light Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );

    // Add lighter color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_color_lighter',
        TKNFC_DEMO_DATA['global_color_lighter'],
        'Lighter Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );

    // Add white color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_color_white',
        TKNFC_DEMO_DATA['global_color_white'],
        'White Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );

    // Add black color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_color_black',
        TKNFC_DEMO_DATA['global_color_black'],
        'Black Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );

    // Add dark color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_color_dark',
        TKNFC_DEMO_DATA['global_color_dark'],
        'Dark Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );

    // Add darker color setting and control
    add_customizer_setting(
        $wp_customize,
        'global_color_darker',
        TKNFC_DEMO_DATA['global_color_darker'],
        'Darker Color',
        'color',
        'global_options_section',
        'global_options_section',
        'sanitize_hex_color',
        'body',
    );

    // Add headings font family setting and control
    add_customizer_setting(
        $wp_customize,
        'global_headings_font_family',
        TKNFC_DEMO_DATA['global_headings_font_family'],
        'Headings Font Family',
        'text',
        'global_options_section',
        'global_options_section',
        'sanitize_text_field',
        'body',
    );

    // Add body font family setting and control
    add_customizer_setting(
        $wp_customize,
        'global_body_font_family',
        TKNFC_DEMO_DATA['global_body_font_family'],
        'Body Font Family',
        'text',
        'global_options_section',
        'global_options_section',
        'sanitize_text_field',
        'body',
    );
}

add_action('customize_register', 'theme_customize_register');

function theme_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary: <?php echo get_theme_mod('global_primary_color', TKNFC_DEMO_DATA['global_primary_color']); ?>;
            --secondary: <?php echo get_theme_mod('global_secondary_color', TKNFC_DEMO_DATA['global_secondary_color']); ?>;
            --bg-body: <?php echo get_theme_mod('global_body_bg_color', TKNFC_DEMO_DATA['global_body_bg_color']); ?>;
            --body-color: <?php echo get_theme_mod('global_body_color', TKNFC_DEMO_DATA['global_body_color']); ?>;
            --btn-bg: <?php echo get_theme_mod('global_btn_bg', TKNFC_DEMO_DATA['global_btn_bg']); ?>;
            --btn-color: <?php echo get_theme_mod('global_btn_color', TKNFC_DEMO_DATA['global_btn_color']); ?>;
            --light: <?php echo get_theme_mod('global_color_light', TKNFC_DEMO_DATA['global_color_light']); ?>;
            --white: <?php echo get_theme_mod('global_color_white', TKNFC_DEMO_DATA['global_color_white']); ?>;
            --lighter: <?php echo get_theme_mod('global_color_lighter', TKNFC_DEMO_DATA['global_color_lighter']); ?>;
            --black: <?php echo get_theme_mod('global_color_black', TKNFC_DEMO_DATA['global_color_black']); ?>;
            --dark: <?php echo get_theme_mod('global_color_dark', TKNFC_DEMO_DATA['global_color_dark']); ?>;
            --darker: <?php echo get_theme_mod('global_color_darker', TKNFC_DEMO_DATA['global_color_darker']); ?>;
            --headings-font-family: <?php echo get_theme_mod('global_headings_font_family', TKNFC_DEMO_DATA['global_headings_font_family']); ?>;
            --body-font-family: <?php echo get_theme_mod('global_body_font_family', TKNFC_DEMO_DATA['global_body_font_family']); ?>;
        }
    </style>
    <?php
}

add_action('wp_head', 'theme_customize_css');


