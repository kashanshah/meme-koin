<?php
if (get_theme_mod('howtobuy_enabled', true)) :
// Fetch howtobuy data from Customizer settings
    $buytoken_data = get_theme_mod('howtobuy_items', TKNFC_DEMO_DATA['howtobuy_items']);
    $buytoken_items = json_decode($buytoken_data, true);

    $bgImg = get_theme_mod('howtobuy_bg_image', TKNFC_DEMO_DATA['howtobuy_bg_image']);
    $bgColor = get_theme_mod('howtobuy_bg_color', TKNFC_DEMO_DATA['howtobuy_bg_color']);

    ?>
    <section class="howtobuy-sec darky how section-padding-100-50 dotted-bg"
             style="
             <?php echo ($bgColor) ? 'background-color: ' . esc_url($bgColor) . ';' : ''; ?>
             <?php echo ($bgImg) ? 'background-image: url(' . esc_url($bgImg) . ');' : ''; ?>
                     "
    >

        <div class="container">

            <div class="section-heading text-center">

                <div class="dream-dots justify-content-center wow fadeInUp howtobuy-sub_title" data-wow-delay="0.2s">
                    <span class="gradient-t green"><?php echo get_theme_mod('howtobuy_sub_title', TKNFC_DEMO_DATA['howtobuy_sub_title']); ?></span>
                </div>
                <h2 class="howtobuy-title wow fadeInUp" data-wow-delay="0.3s">
                    <?php echo get_theme_mod('howtobuy_title', TKNFC_DEMO_DATA['howtobuy_title']); ?>
                </h2>
                <p class="howtobuy-description wow fadeInUp" data-wow-delay="0.4s">
                    <?php echo get_theme_mod('howtobuy_description', TKNFC_DEMO_DATA['howtobuy_description']); ?>
                </p>
            </div>
            <div class="row justify-content-center">
                <?php
                // Split items into chunks for columns (3 items per column)
                $index = 0;

                foreach ($buytoken_items as $item) : ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <!-- Content -->
                            <div class="service_single_content box-shadow text-center mb-100 wow fadeInUp buying-information-div"
                                 data-wow-delay="0.2s">
                                <h6 class="token-information-title-<?php echo $index; ?>"><?php echo esc_html($item['title']); ?></h6>
                                <p><?php echo esc_html($item['description']); ?></p>
                                <!-- Icon -->
                                <div class="service_icon">
                                    <?php if (!empty($item['image'])) : ?>
                                        <img draggable="false" src="<?php echo esc_url($item['image']); ?>"
                                             class="white-icon" alt="">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php $index++; ?>
                <?php endforeach;
                ?>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <?php
                    if(get_theme_mod('howtobuy_cta_text', TKNFC_DEMO_DATA['howtobuy_cta_text'])) { ?>
                        <a class="howtobuy-sec-cta btn copy-btn v2 mt-15 fadeInUp" data-wow-delay="0.6s" href="<?php echo get_theme_mod('howtobuy_cta_link', TKNFC_DEMO_DATA['howtobuy_cta_link']); ?>"><?php echo get_theme_mod('howtobuy_cta_text', TKNFC_DEMO_DATA['howtobuy_cta_text']); ?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
endif;
?>
