<?php
$id = 'testimonial-block-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$enable_slider = get_field('enable_slider');

$per_slide_item = get_field('per_slide_item');

$enable_content_bg = get_field('enable_slide_content_background');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="testimonial-block <?php if ( $enable_slider ) : ?>testimonial-slider <?php else: ?>testimonial-not-slider<?php endif; ?> <?php if ( $enable_content_bg ) : ?>testimonial-slider-bg<?php endif;?>" data-per-slide="<?php echo $per_slide_item; ?>" <?php if ( $enable_slider ) : ?>data-flickity='{
        "contain": true,
        "draggable": true,
        "freeScroll": true,
        "groupCells": "100%",
        "adaptiveHeight": true,
        "pageDots": false,
        "prevNextButtons": true,
        "autoPlay": false,
        "wrapAround": true
    }'<?php endif; ?>>

        <?php if ( have_rows('testimonial_group') ) : 
            while ( have_rows('testimonial_group') ) : the_row('testimonial_group');
        ?>
        <div class="testimonial-slide">
            <?php if ( have_rows('testimonial') ) : 
                while ( have_rows('testimonial') ) : the_row('testimonial');
                
                $testimonial_text = get_sub_field('testimonial_text');
                $testimonial_author = get_sub_field('testimonial_author');
            ?>
                <div class="testimonial-slide-block">
                    <p><?php echo $testimonial_text; ?></p>
                    <h5><?php echo $testimonial_author; ?></h5>
                </div>
            <?php endwhile; endif; ?>
        </div>

        <?php endwhile; endif; ?>
    </div>
</div>