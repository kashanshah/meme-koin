<?php
    $bgImg = get_theme_mod('404_background_image', TKNFC_DEMO_DATA['404_bg_image']);
    $bgColor = get_theme_mod('404_bg_color', TKNFC_DEMO_DATA['404_bg_color']);
?><section class="hero-section version1 section-padding relative"
           style="
           <?php echo ($bgColor) ? 'background-color: ' . esc_url($bgColor) . ';' : ''; ?>
           <?php echo ($bgImg) ? 'background-image: url(' . esc_url($bgImg) . ');' : ''; ?>
                   "
         id="home">
    <div class="hero-section-content">
        <div class="container">
            <div class="row align-items-center">
                <!-- Welcome Content -->
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="welcome-content">
                        <h1 class="not-found-title fadeInUp" data-wow-delay="0.2s">
                            <?php echo get_theme_mod('404_title', TKNFC_DEMO_DATA['404_title']); ?>
                        </h1>
                        <div class="not-found-description">
                            <p class="fadeInUp" data-wow-delay="0.3s">
                                <?php echo get_theme_mod('404_description', TKNFC_DEMO_DATA['404_description']); ?>
                            </p>
                        </div>
                        <div class="not-found-cta">
                            <?php
                            if (get_theme_mod('404_cta_text', TKNFC_DEMO_DATA['404_cta_ext'])) { ?>
                                <a class="not-found-sec-cta btn copy-btn v2 mt-15 fadeInUp" data-wow-delay="0.6s"
                                   href="<?php echo get_theme_mod('404_cta_link', TKNFC_DEMO_DATA['404_cta_link']); ?>"><?php echo get_theme_mod('404_cta_text', TKNFC_DEMO_DATA['404_cta_ext']); ?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="not-found-image hedo-wrapper floating-anim mt-50">
                        <img src="<?php echo get_theme_mod('404_image', TKNFC_DEMO_DATA['404_image']); ?>"
                             alt="page not found">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
