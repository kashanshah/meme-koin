<?php
if (get_theme_mod('about_enabled', true)) :
    $bgImg = get_theme_mod('about_background_image', TKNFC_DEMO_DATA['about_background_image']);
    $bgColor = get_theme_mod('about_bg_color', TKNFC_DEMO_DATA['about_bg_color']);
    ?>
<section
        class="about-sec section-padding-100 about-bg"
        id="about"
        style="
        <?php echo ($bgColor) ? 'background-color: ' . esc_url($bgColor) . ';' : ''; ?>
        <?php echo ($bgImg) ? 'background-image: url(' . esc_url($bgImg) . ');' : ''; ?>
                "
>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 offset-lg-0 col-md-12 no-padding-left">
                <div class="welcome-meter about-image">
                    <img draggable="false" class="comp-img floating-anim" src="<?php echo esc_url(get_theme_mod('about_image', TKNFC_DEMO_DATA['about_image'])); ?>" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-6 offset-lg-0 mt-s">
                <div class="who-we-contant wavy-border">
                    <div class="dream-dots text-left fadeInUp about-subtitle" data-wow-delay="0.2s">
                        <span class="gradient-text"><?php echo esc_html(get_theme_mod('about_sub_title', TKNFC_DEMO_DATA['about_sub_title'])); ?></span>
                    </div>
                    <h4 class="fadeInUp fadeInUp about-title" data-wow-delay="0.3s">
                        <?php echo esc_html(get_theme_mod('about_title', TKNFC_DEMO_DATA['about_title'])); ?>
                    </h4>
                    <div class="about-description">
                        <p class="fadeInUp" data-wow-delay="0.4s">
                            <?php echo wp_kses_post(get_theme_mod('about_description', TKNFC_DEMO_DATA['about_description'])); ?>
                        </p>
                    </div>
                    <?php
                    if(get_theme_mod('about_cta_text', TKNFC_DEMO_DATA['about_cta_text'])) { ?>
                        <a class="about-sec-cta btn copy-btn v2 mt-15 fadeInUp" data-wow-delay="0.6s" href="<?php echo get_theme_mod('about_cta_link', TKNFC_DEMO_DATA['about_cta_link']); ?>"><?php echo get_theme_mod('about_cta_text', TKNFC_DEMO_DATA['about_cta_text']); ?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
endif;

