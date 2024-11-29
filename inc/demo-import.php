<?php
if (class_exists('WP_Customize_Control')) {
    class Custom_Button_Control extends WP_Customize_Control
    {
        public $type = 'button';

        public function render_content()
        {
            if (!empty($this->label)) {
                echo '<label><span class="customize-control-title">' . esc_html($this->label) . '</span></label>';
            }
            echo '<button 
                    class="button button-primary" 
                    onclick="' . esc_attr($this->input_attrs['onclick']) . '">' .
                esc_html($this->input_attrs['value']) .
                '</button>';
        }
    }
}

function theme_customize_demo_import_register($wp_customize)
{
    // Add a new section
    $wp_customize->add_section('demo_import_section', array(
        'title' => __('Demo Import', 'theme-textdomain'),
        'priority' => 999,
    ));

    // Add a button to trigger demo import
    $wp_customize->add_setting('import_demo_data', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));


// Add the button control
    $wp_customize->add_control(new Custom_Button_Control($wp_customize, 'import_demo_data_control', array(
        'label' => __('Import Demo Data 1', 'theme-textdomain'),
        'section' => 'demo_import_section',
        'settings' => 'import_demo_data',
        'input_attrs' => array(
            'value' => __('Import Demo Data', 'theme-textdomain'),
            'onclick' => 'window.startDemoImport(1)',
        ),
    )));
    $wp_customize->add_control(new Custom_Button_Control($wp_customize, 'import_demo_data_2_control', array(
        'label' => __('Import Demo Data 2', 'theme-textdomain'),
        'section' => 'demo_import_section',
        'settings' => 'import_demo_data',
        'input_attrs' => array(
            'value' => __('Import Demo Data', 'theme-textdomain'),
            'onclick' => 'window.startDemoImport(2)',
        ),
    )));
}

add_action('customize_register', 'theme_customize_demo_import_register');

function theme_enqueue_customizer_demo_import_scripts()
{
    wp_enqueue_script('demo-import-js', get_template_directory_uri() . '/assets/js/demo-import.js', array('jquery', 'customize-controls'), '1.0', true);

    wp_localize_script('demo-import-js', 'demoImportAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('demo-import-nonce'),
    ));
}

add_action('customize_controls_enqueue_scripts', 'theme_enqueue_customizer_demo_import_scripts');

function theme_import_demo_data()
{
    check_ajax_referer('demo-import-nonce', 'nonce');

    // check demo type in req body
    $demoType = isset($_POST['demo']) ? $_POST['demo'] : 1;

    if (!class_exists('WPCF7_ContactForm')) {
        wp_send_json_error(array('message' => __('Please install and activate Contact Form 7 plugin.', 'theme-textdomain')));
    }

    // 1. Import Customizer Settings
    $customizer_data = TKNFC_IMPORT_DEMO['demo-' . $demoType];
    foreach ($customizer_data as $key => $value) {
        set_theme_mod($key, $value);
    }

    // 2. Create Menus
    delete_all_menus_and_items();

    $menu_id = wp_create_nav_menu('Main Menu');
    // Assign menu to theme location
    $menu_locations = get_theme_mod('nav_menu_locations');
    $menu_locations['main-menu'] = $menu_id;
    set_theme_mod('nav_menu_locations', $menu_locations);

    $main_menu_items = [
        ['title' => __('Home', 'theme-textdomain'), 'url' => home_url('/')],
        ['title' => __('About Us', 'theme-textdomain'), 'url' => '#about'],
        ['title' => __('Roadmap', 'theme-textdomain'), 'url' => '#roadmap'],
        ['title' => __('Tokenomics', 'theme-textdomain'), 'url' => '#tokenomics'],
        ['title' => __('FAQ', 'theme-textdomain'), 'url' => '#faq'],
        ['title' => __('Contact', 'theme-textdomain'), 'url' => '#contact']
    ];
    insert_menu_items_into_menu($main_menu_items, $menu_id);

    $privacy_menu_id = wp_create_nav_menu('PRIVACY & TOS');
    $privacy_menu_items = [
        ['title' => __('Advertiser Agreement', 'theme-textdomain'), 'url' => '#'],
        ['title' => __('Acceptable Use Policy', 'theme-textdomain'), 'url' => '#'],
        ['title' => __('Privacy Policy', 'theme-textdomain'), 'url' => '#'],
        ['title' => __('Technology Privacy', 'theme-textdomain'), 'url' => '#'],
        ['title' => __('Developer Agreement', 'theme-textdomain'), 'url' => '#'],
    ];
    insert_menu_items_into_menu($privacy_menu_items, $privacy_menu_id);

    $navigations_menu_id = wp_create_nav_menu('NAVIGATE');
    $navigate_menu_items = [
        ['title' => __('Advertisers', 'theme-textdomain'), 'url' => '#'],
        ['title' => __('Developers', 'theme-textdomain'), 'url' => '#'],
        ['title' => __('Resources', 'theme-textdomain'), 'url' => '#'],
        ['title' => __('Company', 'theme-textdomain'), 'url' => '#'],
        ['title' => __('Connect', 'theme-textdomain'), 'url' => '#contact']
    ];
    insert_menu_items_into_menu($navigate_menu_items, $navigations_menu_id);


    // 4. Create a Contact Form (if Contact Form 7 is active)
    if (class_exists('WPCF7_ContactForm')) {
        $form = WPCF7_ContactForm::get_template();
        $form->set_title('Contact Form');
        $form->set_properties(array(
            'form' => '<div class="row"> <div class="col-md-6"><div class="group fadeInUp" data-wow-delay="0.2s">[text* your-name autocomplete:name]<span class="highlight"></span<span class="bar"></span><label>Name</label></div></div> <div class="col-md-6"><div class="group fadeInUp" data-wow-delay="0.3s">[email* your-email autocomplete:email]<span class="highlight"></span><span class="bar"></span><label>Email</label></div></div> <div class="col-12"><div class="group fadeInUp" data-wow-delay="0.4s">[text* your-subject]<span class="highlight"></span><span class="bar"></span><label>Subject</label></div></div> <div class="col-12"><div class="group fadeInUp" data-wow-delay="0.5s">[textarea* your-message]<span class="highlight"></span><span class="bar"></span><label>Message</label></div></div> <div class="col-12 text-center fadeInUp" data-wow-delay="0.6s">[submit class:btn class:copy-btn class:v2 "Send Message"]</div> </div>',
        ));
        $form->save();
        $form_id = $form->id();
        $shortcode = '[contact-form-7 id="' . $form_id . '"]';
        set_theme_mod('contact_shortcode', $shortcode);

        $form = WPCF7_ContactForm::get_template();
        $form->set_title('Newsletter Form');
        $form->set_properties(array(
            'form' => '<div class="newsletter-wpcf7-div"> <div class="input-wrapper"><i class="fa fa-home"></i>[email email placeholder "Enter your Email"]</div> [submit class:btn class:copy-btn class:v2 "Subscribe"] </div>',
        ));
        $form->save();
        $form_id = $form->id();
        $shortcode = '[contact-form-7 id="' . $form_id . '"]';
        set_theme_mod('newsletter_shortcode', $shortcode);
    }


    $result = mytheme_upload_logo_programmatically(get_template_directory_uri() . '/assets/img/core-img/logo.png');
    if (!is_wp_error($result)) {
        $default_logo_id = $result;
        set_theme_mod('custom_logo', $default_logo_id);
    }

    // 1. Reset Specific Sidebars
    reset_selected_sidebars_and_widgets();

//    wp_send_json_error(json_decode(TKNFC_DEMO_DATA['social_links']));

    // 2. Add Widgets to Footer Areas
    $widget_instances = array(
        // Footer Intro Widget
        'footer_intro_widget' => array(
            0 => array(),
            1 => array(
                'logo' => TKNFC_DEMO_DATA['footer_intro_logo'], // Replace with your logo URL
                'text' => TKNFC_DEMO_DATA['footer_intro_text'],
            ),
        ),
        // Social Navigation Widget
        'social_navigation_widget' => array(
            0 => array(),
            1 => array(
                'title' => '',
                'social_links' => json_decode(TKNFC_DEMO_DATA['social_links'], true),
            ),
        ),
        // Footer Menu Widgets
        'footer_menu_widget' => array(
            0 => array(),
            1 => array(
                'title' => 'PRIVACY & TOS',
                'menu_id' => $privacy_menu_id, // Replace with your menu ID
            ),
            2 => array(
                'title' => 'NAVIGATE',
                'menu_id' => $navigations_menu_id, // Replace with your menu ID
            ),
        ),
        'text' => array(
            0 => array(),
            1 => array(
                'title' => 'Contact Us',
                'text' => '<p>Mailing Address:xx00 E. Union Ave<br/>Suite 1100. Denver, CO 80237<br/>+999 90932 627<br/>support@yourdomain.com</p>',
            ),
        )
    );

    // Update each widget option with the specified instances
    $responseArr = [];
    foreach ($widget_instances as $widget_id => $instances) {
        $existing_widgets = get_option('widget_' . $widget_id, []);
        $updated_widgets = array_merge($existing_widgets, $instances);
        update_option('widget_' . $widget_id, $updated_widgets);
        $responseArr[] = ['widget_id' => 'widget_' . $widget_id, 'updated_widgets' => $updated_widgets];
    }

    // 3. Assign Widgets to Footer Widget Areas
    $sidebars_widgets = [];

    $sidebars_widgets['footer-widget-1'] = array('footer_intro_widget-1', 'social_navigation_widget-1');
    $sidebars_widgets['footer-widget-2'] = array('footer_menu_widget-1');
    $sidebars_widgets['footer-widget-3'] = array('footer_menu_widget-2');
    $sidebars_widgets['footer-widget-4'] = array('text-1');

//    wp_send_json_error($responseArr);

    wp_set_sidebars_widgets($sidebars_widgets);

    // 5. Send Success Response
    wp_send_json_success(array('message' => __('Demo data imported successfully.', 'theme-textdomain'), 'response' => $customizer_data));
}

add_action('wp_ajax_import_demo_data', 'theme_import_demo_data');

function reset_selected_sidebars_and_widgets($sidebars_to_reset = [])
{
    // Get all registered sidebars
    $sidebars = wp_get_sidebars_widgets();

    // Reset only the specified sidebars
    foreach ($sidebars_to_reset as $sidebar_id) {
//        if (isset($sidebars[$sidebar_id])) {
        $sidebars[$sidebar_id] = []; // Clear widgets in the specified sidebar
//        }
    }
    wp_set_sidebars_widgets($sidebars);

    // Optionally clear widget instances of specific widget types
    $widget_types_to_clear = ['footer_intro_widget', 'social_navigation_widget', 'footer_menu_widget', 'text'];

    foreach ($widget_types_to_clear as $widget_type) {
        $widget_option_name = 'widget_' . $widget_type;
        delete_option($widget_option_name); // Remove widget instances of this type
    }
}

function delete_all_menus_and_items() {
    // Get all menus
    $menus = wp_get_nav_menus();

    // Iterate through each menu
    foreach ($menus as $menu) {
        // Get menu items for the current menu
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        // Delete all menu items in the current menu
        if ($menu_items) {
            foreach ($menu_items as $menu_item) {
                wp_delete_post($menu_item->ID, true); // Delete menu item permanently
            }
        }

        // Delete the menu itself
        wp_delete_term($menu->term_id, 'nav_menu');
    }

    // Optionally, reset menu locations
    set_theme_mod('nav_menu_locations', []);
}


function insert_menu_items_into_menu($menu_items, $menu_id) {
    foreach ($menu_items as $item) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title'  => $item['title'],
            'menu-item-url'    => $item['url'],
            'menu-item-status' => 'publish',
        ));
    }
}

function mytheme_upload_logo_programmatically($file_url) {
    // Convert URL to file path
    $file_path = str_replace(get_template_directory_uri(), get_template_directory(), $file_url);
    if (!file_exists($file_path)) {
        return new WP_Error('file_not_found', __('The specified file does not exist.', 'mytheme'));
    }

    // Read file content
    $file_content = file_get_contents($file_path);
    if ($file_content === false) {
        return new WP_Error('read_error', __('Unable to read the file.', 'mytheme'));
    }

    // Create a temporary file manually
    $temp_file_path = wp_tempnam($file_path); // Generate a temporary file path
    if (!$temp_file_path) {
        return new WP_Error('temp_file_error', __('Could not create a temporary file.', 'mytheme'));
    }

    // Write the file content to the temporary file
    file_put_contents($temp_file_path, $file_content);

    // Simulate the $_FILES array
    $file_array = [
        'name'     => basename($file_path),
        'type'     => mime_content_type($file_path),
        'tmp_name' => $temp_file_path,
        'error'    => 0,
        'size'     => filesize($file_path),
    ];

    // Include WordPress media library functions
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    // Upload the file to the WordPress Media Library
    $upload = wp_handle_sideload($file_array, ['test_form' => false]);

    // Remove the temporary file
    unlink($temp_file_path);

    if (isset($upload['error'])) {
        return new WP_Error('upload_error', $upload['error']);
    }

    // Insert the uploaded file as an attachment in the Media Library
    $attachment_id = wp_insert_attachment(
        [
            'guid'           => $upload['url'],
            'post_mime_type' => $upload['type'],
            'post_title'     => sanitize_file_name(basename($file_path)),
            'post_content'   => '',
            'post_status'    => 'inherit',
        ],
        $upload['file']
    );

    // Generate and update attachment metadata
    $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $upload['file']);
    wp_update_attachment_metadata($attachment_id, $attachment_metadata);

    // Set the uploaded file as the site logo
//    set_theme_mod('custom_logo', $attachment_id);

    return $attachment_id;
}
