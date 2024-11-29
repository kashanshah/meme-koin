<?php
/*
Template Name: Home Page Template
*/

get_header();
?>

<main>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        }
    }

    get_template_part('template-parts/hero');
    get_template_part('template-parts/about');
    get_template_part('template-parts/how-to-buy');
    get_template_part('template-parts/get-it-now');
    get_template_part('template-parts/buy-token-sale');
    get_template_part('template-parts/roadmap');
    get_template_part('template-parts/tokenomics');
    get_template_part('template-parts/faq');
    get_template_part('template-parts/newsletter-sec');
    get_template_part('template-parts/contact-us');
    ?>
</main>

<?php get_footer(); ?>
