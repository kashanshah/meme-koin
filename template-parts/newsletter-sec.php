<?php
if (get_theme_mod('newsletter_enabled', true)) :
    $bgImg = get_theme_mod('newsletter_bg_image', TKNFC_DEMO_DATA['newsletter_bg_image']);
    $bgColor = get_theme_mod('newsletter_bg_color', TKNFC_DEMO_DATA['newsletter_bg_color']);
    ?>

    <section class="newsletter-sec" style="">
        <div class="container">
            <div class="subscribe">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="subscribe-wrapper"
                             style="
                             <?php echo ($bgColor) ? 'background-color: ' . esc_url($bgColor) . ';' : ''; ?>
                             <?php echo ($bgImg) ? 'background-image: url(' . esc_url($bgImg) . ');' : ''; ?>
                                     "
                        >
                            <div class="section-heading text-center">
                                <h2 class="newsletter-title wow fadeInUp" data-wow-delay="0.3s"
                                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"><?php echo get_theme_mod('newsletter_title', TKNFC_DEMO_DATA['newsletter_title']); ?></h2>
                                <p class="newsletter-description wow fadeInUp" data-wow-delay="0.4s"
                                   style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;"><?php echo get_theme_mod('newsletter_description', TKNFC_DEMO_DATA['newsletter_description']); ?></p>
                            </div>
                            <div class="newsletter-form service-text text-center">
                                <?php echo do_shortcode(get_theme_mod('newsletter_shortcode', TKNFC_DEMO_DATA['newsletter_shortcode'])); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php
endif;

