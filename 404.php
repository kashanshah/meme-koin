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
        // Example: Include template parts
        get_template_part('template-parts/404');
//    get_template_part('template-parts/section-services');
//    get_template_part('template-parts/section-contact');
//        if(have_posts()) {
//            while(have_posts()) {
//                the_post();
//                the_content();
//            }
//        }
    ?>
</main>

<?php get_footer(); ?>
