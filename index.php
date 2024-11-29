<?php
/**
 * The main template file
 *
 * @package Memecoin_Master
 */
get_header();
?>

<main>
    <!-- Content sections will go here -->
    <?php
    if(is_home() && get_theme_mod('use_theme_home_page', true)) {
        // Example: Include template parts
        get_template_part('template-parts/hero');
        get_template_part('template-parts/bulletin');
        get_template_part('template-parts/about');
        get_template_part('template-parts/how-to-buy');
        get_template_part('template-parts/get-it-now');
        get_template_part('template-parts/buy-token-sale');
        get_template_part('template-parts/roadmap');
        get_template_part('template-parts/tokenomics');
        get_template_part('template-parts/faq');
        get_template_part('template-parts/newsletter-sec');
        get_template_part('template-parts/contact-us');
    }
    else {
        if(have_posts()) {
            while(have_posts()) {
                the_post();
                the_content();
            }
        }
    }
    ?>
</main>

<?php get_footer(); ?>
