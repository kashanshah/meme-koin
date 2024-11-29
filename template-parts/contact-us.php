<?php
if (get_theme_mod('contact_enabled', true)) :
    $bgImg = get_theme_mod('contact_bg_image', TKNFC_DEMO_DATA['contact_bg_image']);
    $bgColor = get_theme_mod('contact_bg_color', TKNFC_DEMO_DATA['contact_bg_color']);
    ?>
    
        <!-- ##### Contact Area Start ##### -->
        <div class="contact-sec contact_us_area section-padding-0-0" id="contact"
             style="
             <?php echo ($bgColor) ? 'background-color: ' . esc_url($bgColor) . ';' : ''; ?>
             <?php echo ($bgImg) ? 'background-image: url(' . esc_url($bgImg) . ');' : ''; ?>
                     "
        >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-center">
                            
                            <div class="dream-dots justify-content-center fadeInUp contact-subtitle" data-wow-delay="0.2s">
                                <span class="gradient-text"><?php echo get_theme_mod('contact_sub_title', TKNFC_DEMO_DATA['contact_sub_title']); ?></span>
                            </div>
                            <h2 class="fadeInUp contact-title contact-title" data-wow-delay="0.3s"><?php echo get_theme_mod('contact_title', TKNFC_DEMO_DATA['contact_title']); ?></h2>
                            <p class="fadeInUp contact-description" data-wow-delay="0.4s"><?php echo get_theme_mod('contact_description', TKNFC_DEMO_DATA['contact_description']); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="contact_form contact-form">
                            <?php echo do_shortcode(get_theme_mod('contact_shortcode', TKNFC_DEMO_DATA['contact_shortcode'])); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Contact Area End ##### -->

<?php
endif;

