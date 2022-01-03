<?php
$id = 'custom-tab-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'custom-tab-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$block_title = get_field('block_title');
$block_content_background_color = get_field('block_content_background_color');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="custom-tab-title">
        <?php echo $block_title; ?>
    </div>
    <?php if ( have_rows('block_tab') ) : ?>
        <ul class="carousel-control" data-flickity='{
                "contain": true,
                "pageDots": false,
                "prevNextButtons": true,
                "asNavFor": ".custom-tab-carousel",
                "wrapAround": true,
                "cellAlign": "left",
                "autoPlay": true,
                "autoPlay": 5000
            }'>
            <?php while ( have_rows('block_tab') ) : the_row(); ?>
                <li class="carousel-control-list" id="carousel-<?php echo get_row_index(); ?>"><img class="main-image" src="<?php echo get_sub_field('tab_navigation_image')['url']; ?>" alt="<?php echo esc_html( get_sub_field('tab_content_heading') );?>" width="100" height="100" loading="lazy"/></li>
            <?php endwhile; ?>
        </ul>
        <?php reset_rows(); ?>
    <?php endif; ?>

    <?php if ( have_rows('block_tab') ) : ?>
        <div class="custom-tab-carousel-wrapper" style="background-color: <?php echo $block_content_background_color; ?>">
            <div class="custom-tab-carousel" data-flickity='{
                "contain": true,
                "draggable": true,
                "freeScroll": true,
                "groupCells": "100%",
                "pageDots": false,
                "prevNextButtons": false,
                "fade": true
            }'>
                <?php while ( have_rows('block_tab') ) : the_row(); ?>
                    <div class="custom-tab-carousel-single">
                        <div class="custom-tab-carousel-box alignwide">
                            <figure class="custom-tab-carousel-box-image">
                                <img src="<?php echo get_sub_field('tab_content_image')['url']; ?>" alt="<?php echo esc_html( get_sub_field('tab_content_heading') ); ?>">
                            </figure>
                            <div class="custom-tab-carousel-box-content">
                                <h3 data-id="carousel-<?php echo get_row_index(); ?>"><?php echo get_sub_field('tab_content_heading'); ?></h3>
                                <p><?php echo get_sub_field('tab_content_text'); ?></p>
                                <?php if ( get_sub_field('tab_content_button') ) : ?>
                                    <a class="wp-block-button__link button button--white" href="<?php echo esc_url( get_sub_field('tab_content_button')['url'] ); ?>" target="<?php echo esc_attr( get_sub_field('tab_content_button')['target'] ); ?>"><?php echo esc_html( get_sub_field('tab_content_button')['title'] ); ?></a>
                                <?php else : ?>
                                    <a class="wp-block-button__link button button--white" href="#" target="_self">Learn More</a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
</div>