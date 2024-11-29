<?php
if (get_theme_mod('bulletin_enabled', true)) :

    $bulletinTextColor = get_theme_mod('bulletin_text_color', TKNFC_DEMO_DATA['bulletin_text_color']);
    $bulletinbgColor = get_theme_mod('bulletin_bg_color', TKNFC_DEMO_DATA['bulletin_bg_color']);
    ?>
    <div class="moving-bg bulletin-items"
         style="
         <?php echo ($bulletinTextColor) ? 'color: ' . esc_url($bulletinTextColor) . ';' : ''; ?>
         <?php echo ($bulletinbgColor) ? 'background-color: ' . esc_url($bulletinbgColor) . ';' : ''; ?>
                 "
    >
        <?php
        $bulletin_img = get_theme_mod('bulletin_icon', TKNFC_DEMO_DATA['bulletin_icon']);
        $bulletin_items = get_theme_mod('bulletin_items', TKNFC_DEMO_DATA['bulletin_items']);
        $bulletin_items_arr = json_decode($bulletin_items, true);


        for ($i = 0; $i < 10; $i++) {
            foreach ($bulletin_items_arr as $item) :
                ?>
                <div class="marquee-block">
                    <img src="<?php echo $bulletin_img; ?>" alt="">
                    <p class="color-inherit"><?php echo esc_html($item['text']); ?></p>
                </div>
            <?php endforeach;
        }
        ?>
    </div>
<?php
endif;