<?php
if (get_theme_mod('tokenomics_enabled', true)) :
// Fetch tokenomics data from Customizer settings
    $tokenomics_data = get_theme_mod('tokenomics_items', TKNFC_DEMO_DATA['tokenomics_items']);
    $tokenomics_items = json_decode($tokenomics_data, true);

    $bgImg = get_theme_mod('tokenomics_background_image', TKNFC_DEMO_DATA['tokenomics_background_image']);
    $bgColor = get_theme_mod('tokenomics_bg_color', TKNFC_DEMO_DATA['tokenomics_bg_color']);

    ?>
    <!-- ##### Token Info Start ##### -->
    <div class="section-padding-100-70 dotted-bg relative" id="tokenomics"
         style="
         <?php echo ($bgColor) ? 'background-color: ' . esc_url($bgColor) . ';' : ''; ?>
         <?php echo ($bgImg) ? 'background-image: url(' . esc_url($bgImg) . ');' : ''; ?>
                 "
    >
        <div class="container">
            <div class="section-heading text-center">
                <div class="dream-dots justify-content-center fadeInUp tokenomics-sub_title" data-wow-delay="0.2s">
                    <span class="gradient-t green"><?php echo get_theme_mod('tokenomics_sub_title', TKNFC_DEMO_DATA['tokenomics_sub_title']); ?></span>
                </div>
                <h2 class="tokenomics-title fadeInUp"
                    data-wow-delay="0.3s"><?php echo get_theme_mod('tokenomics_title', TKNFC_DEMO_DATA['tokenomics_title']); ?></h2>
                <p class="tokenomics-description fadeInUp" data-wow-delay="0.4s">
                    <?php echo get_theme_mod('tokenomics_description', TKNFC_DEMO_DATA['tokenomics_description']); ?>
                </p>
            </div>
            <div class="row align-items-center justify-content-center">
                <?php
                // Split items into chunks for columns (3 items per column)
                //                $columns = array_chunk($tokenomics_items, 3);
                $index = 0;

                foreach ($tokenomics_items as $item) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="who-we-contant mt-s token-information-div">
                            <ul class="token-information">
                                <li>
                                    <?php if (!empty($item['image_1'])) : ?>
                                        <img src="<?php echo esc_url($item['image_1']); ?>"
                                             class="mon-img1 token-information-title-<?php echo $index; ?>-1"
                                             alt="">
                                    <?php endif; ?>
                                    <h6 class="token-information-title-<?php echo $index; ?>">
                                        <span class="gradient-t green mr-1"><?php echo esc_html($item['sub_title']); ?></span>
                                        <?php echo esc_html($item['title']); ?>
                                    </h6>
                                    <?php if (!empty($item['image_2'])) : ?>
                                        <img src="<?php echo esc_url($item['image_2']); ?>"
                                             class="mon-img2 token-information-image_2-<?php echo $index; ?>"
                                             alt="">
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php $index++; ?>
                <?php endforeach;
                ?>
            </div>
        </div>
    </div>
    <!-- ##### Token Info End ##### -->
<?php
endif;
?>
