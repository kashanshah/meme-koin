<?php

class Footer_Menu_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'footer_menu_widget', // Base ID
            __('Footer Menu', 'textdomain'), // Name
            array('description' => __('Displays a custom menu in the footer.', 'textdomain')) // Args
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Display the menu
        echo '<div class="contact_info_area d-sm-flex justify-content-between"><div class="contact_info mt-x text-center fadeInUp" data-wow-delay="0.3s">';

        // Widget Title
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $menu_id = !empty($instance['menu_id']) ? $instance['menu_id'] : '';
        if (!empty($menu_id)) {
            wp_nav_menu(array(
                'menu' => $menu_id,
                'container' => 'div',
                'container_class' => 'footer-menu',
                'depth' => 1,
            ));
        } else {
            echo '<p>' . esc_html__('No menu assigned. Please select a menu in the widget settings.', 'textdomain') . '</p>';
        }
        echo '</div></div>';

        echo $args['after_widget'];
    }

    public function form($instance) {
        // Title
        $title = !empty($instance['title']) ? $instance['title'] : __('NAVIGATE', 'textdomain');
        // Menu
        $menu_id = !empty($instance['menu_id']) ? $instance['menu_id'] : '';

        // Get all menus
        $menus = wp_get_nav_menus();

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'textdomain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('menu_id')); ?>"><?php esc_attr_e('Select Menu:', 'textdomain'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('menu_id')); ?>" name="<?php echo esc_attr($this->get_field_name('menu_id')); ?>">
                <option value=""><?php esc_html_e('Select a Menu', 'textdomain'); ?></option>
                <?php foreach ($menus as $menu) : ?>
                    <option value="<?php echo esc_attr($menu->term_id); ?>" <?php selected($menu_id, $menu->term_id); ?>>
                        <?php echo esc_html($menu->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['menu_id'] = (!empty($new_instance['menu_id'])) ? absint($new_instance['menu_id']) : '';
        return $instance;
    }
}

// Register the widget
function register_footer_menu_widget() {
    register_widget('Footer_Menu_Widget');
}
add_action('widgets_init', 'register_footer_menu_widget');
