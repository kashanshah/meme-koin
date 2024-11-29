<?php
if(get_theme_mod('buyitnow_enabled', true)) :
// Fetch buyitnow data from Customizer settings
$tokensalebgImg = get_theme_mod('buyitnow_bg_image', TKNFC_DEMO_DATA['buyitnow_bg_image']);
$tokensalebgColor = get_theme_mod('buyitnow_bg_color', TKNFC_DEMO_DATA['buyitnow_bg_color']);
?>

    <!-- ##### Token Info Start ##### -->
    <div class="section-padding-100 relative"
    
    style="
        <?php echo ($tokensalebgImg) ? 'background-image: url(' . esc_url($tokensalebgImg) . ');' : ''; ?>
        <?php echo ($tokensalebgColor) ? 'background-color: ' . esc_url($tokensalebgColor) . ';' : ''; ?>"
    >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 col-md-12 buyitnow-sec">

                    <div class="who-we-contant white-section has-shadow">
                        <h4 class="fadeInUp buyitnow-title" data-wow-delay="0.3s"><?php echo get_theme_mod('buyitnow_title', TKNFC_DEMO_DATA['buyitnow_title']); ?></h4>
                        <div class="fadeInUp buyitnow-description" data-wow-delay="0.4s">
                            <p><?php echo get_theme_mod('buyitnow_description', TKNFC_DEMO_DATA['buyitnow_description']); ?></p>
                        </div>
                        <div class="white-cat-img buyitnow-image">
                            <img src="<?php echo get_theme_mod('buyitnow_image', TKNFC_DEMO_DATA['buyitnow_image']); ?>" alt="" />
                        </div>
                    </div>
                    <div class="mt-30">
                        <?php
                        if(get_theme_mod('buyitnow_cta_text', TKNFC_DEMO_DATA['buyitnow_cta_text'])) { ?>
                            <a class="buyitnow-sec-cta btn w-100 copy-btn v3 mt-15 fadeInUp" data-wow-delay="0.6s" href="<?php echo get_theme_mod('buyitnow_cta_link', TKNFC_DEMO_DATA['buyitnow_cta_link']); ?>"><?php echo get_theme_mod('buyitnow_cta_text', TKNFC_DEMO_DATA['buyitnow_cta_text']); ?></a>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-12 col-lg-5 offset-lg-1 col-md-12 mt-s">
                    <div class="creamy-section">
                        <div class="ico-counter buyitnow-sec"
                             style="
                             <?php echo ($tokensalebgImg) ? 'background-image: url(' . esc_url($tokensalebgImg) . ');' : ''; ?>
                             <?php echo ($tokensalebgColor) ? 'background-color: ' . esc_url($tokensalebgColor) . ';' : ''; ?>"
                        >
                            <div class="counter-down">
                                <div class="content">
                                    <div class="conuter-header">
                                        <h3 class="w-text text-center buyitnow-timer"><?php echo get_theme_mod('buyitnow_timer_title', TKNFC_DEMO_DATA['buyitnow_timer_title']); ?></h3>
                                    </div>
                                    <div class="counterdown-content">
                                        <!-- Countdown  -->
                                        <div class="count-down titled circled text-center">
                                            <div
                                                    class="simple_timer"
                                                    data-year="<?php echo get_theme_mod('buyitnow_timer_year', TKNFC_DEMO_DATA['buyitnow_timer_year']); ?>"
                                                    data-month="<?php echo get_theme_mod('buyitnow_timer_month', TKNFC_DEMO_DATA['buyitnow_timer_month']); ?>"
                                                    data-day="<?php echo get_theme_mod('buyitnow_timer_day', TKNFC_DEMO_DATA['buyitnow_timer_day']); ?>"
                                                    data-hour="<?php echo get_theme_mod('buyitnow_timer_hour', TKNFC_DEMO_DATA['buyitnow_timer_hour']); ?>"
                                                    data-minute="<?php echo get_theme_mod('buyitnow_timer_minute', TKNFC_DEMO_DATA['buyitnow_timer_minute']); ?>"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $min_strength = get_theme_mod('min_strength', TKNFC_DEMO_DATA['buyitnow_timer_minStrength']);
                        $max_strength = get_theme_mod('max_strength', TKNFC_DEMO_DATA['buyitnow_timer_maxStrength']);
                        if($max_strength == 0) {
                            $max_strength = 1;
                        }
                        $current_strength = get_theme_mod('current_strength', TKNFC_DEMO_DATA['buyitnow_timer_currentStrength']);
                        ?>
                        <div class="ico-progress">
                            <ul class="list-unstyled list-inline clearfix mb-10">
                                <li class="title buyitnow-minstrength"><?php echo $min_strength; ?></li>
                                <li class="strength buyitnow-maxstrength"><?php echo $max_strength; ?></li>
                            </ul>
                            <!-- skill strength -->
                            <div class="current-progress">
                                <div class="progress-bar has-gradient" style="width: <?php echo ((intval($current_strength) / intval($max_strength)) * 100);  ?>%"></div>
                            </div>
                            <span class="pull-left buyitnow-softcap"><?php echo get_theme_mod('softcap', TKNFC_DEMO_DATA['buyitnow_timer_softcap']); ?></span>
                            <span class="pull-right buyitnow-hardcap"><?php echo get_theme_mod('hardcap', TKNFC_DEMO_DATA['buyitnow_timer_hardcap']); ?></span>
                        </div>
                        <h4 class="pre-price buyitnow-per-token-val"><?php echo get_theme_mod('token_value', TKNFC_DEMO_DATA['buyitnow_timer_tokenValue']); ?></h4>
                        <div class="buyitnow-card-img">
                            <img src="<?php echo get_theme_mod('buyitnow_buy_means_img', TKNFC_DEMO_DATA['buyitnow_timer_image']); ?>" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
endif;
?>
