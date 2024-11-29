<?php
if (get_theme_mod('faq_enabled', true)) :
    $faq_data = get_theme_mod('faq_items', TKNFC_DEMO_DATA['faq_items']);
    $faq_items = json_decode($faq_data, true);

    $bgImg = get_theme_mod('faq_bg_image', TKNFC_DEMO_DATA['faq_bg_image']);
    $bgColor = get_theme_mod('faq_bg_color', TKNFC_DEMO_DATA['faq_bg_color']);
    ?>

    <!-- ##### FAQ & Timeline Area Start ##### -->
    <div class="faq-timeline-area section-padding-100-85" id="faq"
         style="
         <?php echo ($bgColor) ? 'background-color: ' . esc_url($bgColor) . ';' : ''; ?>
         <?php echo ($bgImg) ? 'background-image: url(' . esc_url($bgImg) . ');' : ''; ?>
                 "
    >
        <div class="container">
            <div class="section-heading text-center">

                <div class="dream-dots justify-content-center fadeInUp faq-subtitle" data-wow-delay="0.2s">
                    <span class="gradient-t green"><?php echo get_theme_mod('faq_sub_title', TKNFC_DEMO_DATA['faq_sub_title']); ?></span>
                </div>
                <h2 class="fadeInUp faq-title" data-wow-delay="0.3s">  <?php echo get_theme_mod('faq_title', TKNFC_DEMO_DATA['faq_title']); ?></h2>
                <p class="fadeInUp faq-description" data-wow-delay="0.4s"><?php echo get_theme_mod('faq_description', TKNFC_DEMO_DATA['faq_description']); ?></p>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 offset-lg-0 col-md-8 offset-md-2 col-sm-12">
                    <div class="welcome-meter faq-image">
                        <img draggable="false" class="comp-img"
                             src="<?php echo esc_url(get_theme_mod('faq_image_1', TKNFC_DEMO_DATA['faq_image_1'])); ?>"
                             alt="">
                        <img draggable="false" class="supportImg floating-anim"
                             src="<?php echo esc_url(get_theme_mod('faq_image_2', TKNFC_DEMO_DATA['faq_image_2'])); ?>"
                             alt="image">
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-12">
                    <div class="dream-faq-area mt-s faq-div">
                        <dl style="margin-bottom:0">
                            <?php
                            // Split items into chunks for columns (1 items per column)
                            $index = 0;

                            foreach ($faq_items as $item) : ?>
                                    <!-- Single FAQ Area -->
                                    <dt class="wave fadeInUp"
                                        data-wow-delay="0.2s"><?php echo esc_html($item['question']); ?></dt>
                                    <dd class="fadeInUp" data-wow-delay="0.3s">
                                        <p><?php echo esc_html($item['answer']); ?></p>
                                    </dd>

                                <?php $index++; ?>
                            <?php endforeach;
                            ?>
                        </dl>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### FAQ & Timeline Area End ##### -->

<?php
endif;

