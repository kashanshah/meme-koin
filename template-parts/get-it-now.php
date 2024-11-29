<?php
if(get_theme_mod('getitnow_enabled', true)) :
// Fetch getitnow data from Customizer settings
$gettoken_data = get_theme_mod('getitnow_items', TKNFC_DEMO_DATA['getitnow_items']);
$gettoken_items = json_decode($gettoken_data, true);
$getitnowbgImg = get_theme_mod('getitnow_background_image', TKNFC_DEMO_DATA['getitnow_bg_image']);
$getitnowbgColor = get_theme_mod('getitnow_bg_color', TKNFC_DEMO_DATA['getitnow_bg_color']);

?>
<div class="section-padding-100-70 about-bg relative getitnow-sec"
    style="
        <?php echo ($getitnowbgImg) ? 'background-image: url(' . esc_url($getitnowbgImg) . ');' : ''; ?>
        <?php echo ($getitnowbgColor) ? 'background-color: ' . esc_url($getitnowbgColor) . ';' : ''; ?>
            "
    >
    <div class="container">
        <div class="section-heading text-center">

            <div class="dream-dots justify-content-center fadeInUp getitnow-subtitle" data-wow-delay="0.2s">
                <span class="gradient-t green"><?php echo get_theme_mod('getitnow_subtitle', TKNFC_DEMO_DATA['getitnow_sub_title']); ?></span>
            </div>
            <h2 class="fadeInUp getitnow-title" data-wow-delay="0.3s">
                <?php echo get_theme_mod('getitnow_title', TKNFC_DEMO_DATA['getitnow_title']); ?>
            </h2>
            <p class="fadeInUp getitnow-description" data-wow-delay="0.4s">
                <?php echo get_theme_mod('getitnow_description', TKNFC_DEMO_DATA['getitnow_description']); ?>
            </p>
        </div>
        <div class="row align-items-center justify-content-center">
            <?php
             // Split items into chunks for columns (4 items per column)
            $index = 0;

            foreach ($gettoken_items as $item) : ?>
            <div class="col-lg-3 col-md-6">
                <div class="who-we-contant mt-s get-information-div">
                    <ul class="token-information">
                        <a href="<?php echo esc_html($item['link']); ?>" target="_blank">
                            <li>
                                <h6><img src="<?php echo esc_url($item['image']); ?>" class="mr-1"> <?php echo esc_html($item['title']); ?></h6>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
            <?php $index++; ?>
            <?php endforeach;
            ?>
        </div>
    </div>
</div>

<?php
endif;
?>
