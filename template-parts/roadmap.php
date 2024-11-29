<?php
if (get_theme_mod('roadmap_enabled', true)) :
// Fetch roadmap data from Customizer settings
    $roadmap_data = get_theme_mod('roadmap_items', TKNFC_DEMO_DATA['roadmap_items']);
    $roadmap_items = json_decode($roadmap_data, true);

    $bgImg = get_theme_mod('roadmap_bg_image', TKNFC_DEMO_DATA['roadmap_bg_image']);
    $borderImg = get_theme_mod('roadmap_border_image', TKNFC_DEMO_DATA['roadmap_border_image']);
    $itemBgImg = get_theme_mod('roadmap_item_bg_image', TKNFC_DEMO_DATA['roadmap_item_bg_image']);
    $bgColor = get_theme_mod('roadmap_bg_color', TKNFC_DEMO_DATA['roadmap_bg_color']);

    ?>

    <section class="roadmap section-padding-100 roadmap-sec" id="roadmap"
             style="
             <?php echo ($bgColor) ? 'background-color: ' . esc_url($bgColor) . ';' : ''; ?>
             <?php echo ($bgImg) ? 'background-image: url(' . esc_url($bgImg) . ');' : ''; ?>
                     "
    >
        <div class="section-heading text-center">

            <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                <span class="gradient-text green roadmap-subtitle">
                    <?php echo get_theme_mod('roadmap_subtitle', TKNFC_DEMO_DATA['roadmap_sub_title']); ?>
                </span>
            </div>
            <h2 class="fadeInUp roadmap-title" data-wow-delay="0.3s">
                <?php echo get_theme_mod('roadmap_title', TKNFC_DEMO_DATA['roadmap_title']); ?>
            </h2>
            <p class="fadeInUp roadmap-description" data-wow-delay="0.4s">
                <?php echo get_theme_mod('roadmap_description', TKNFC_DEMO_DATA['roadmap_description']); ?>
            </p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline roadmap-timeline">
                        <?php
                        $index = 0;

//                        foreach ($columns as $column) : ?>
                            <?php foreach ($roadmap_items as $item) : ?>
                                <div class="timeline">
                                    <div class="icon"></div>
                                    <div class="date-content">
                                        <div class="date-outer"
                                                style="
                                                <?php echo ($borderImg) ? 'border-image: url(' . esc_url($borderImg) . ') 30 round;' : ''; ?>
                                                        "
                                        ><span class="date"> <span
                                                        class="month"><?php echo esc_html($item['subTitle']); ?></span> <span
                                                        class="year gradient-t green"><?php echo esc_html($item['title']); ?></span> </span>
                                        </div>
                                    </div>
                                    <div class="timeline-content"
                                         style="
                                         <?php echo ($itemBgImg ? 'background-image: url(' . esc_url($itemBgImg) . ');' : ''); ?>
                                                 "
                                    >
                                        <span class="arrowo"></span>
                                        <h5 class="title"><?php echo esc_html($item['mainTitle']); ?></h5>
                                        <p class="description text-light-gray"> <?php echo esc_html($item['description']); ?></p>
                                    </div>
                                </div>
<!--                            --><?php //endforeach; ?>
                            <?php $index++; ?>
                        <?php endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
endif;
?>
