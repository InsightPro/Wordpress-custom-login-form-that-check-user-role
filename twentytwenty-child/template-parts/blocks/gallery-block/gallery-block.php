<?php
$id = 'gallery-block-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gallery-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" <?php if ( get_field('enable_slider') ) : ?>data-slider<?php endif; ?>>
    <?php if ( have_rows('image_gallery') ) : ?>
      <div class="gallery-block-wrapper column-<?php echo get_field('number_of_image_each_row'); ?>">
      <?php while ( have_rows('image_gallery') ) : the_row('image_gallery'); ?>
        <div class="gallery-block--card">
          <?php if ( get_sub_field('gallery_image_link') != null ) : ?>
            <a href="<?php echo get_sub_field('gallery_image_link'); ?>">
          <?php endif; ?>
            <img loading="lazy" src="<?php echo esc_url( get_sub_field('gallery_image')['url'] ); ?>" alt="<?php echo esc_attr( get_sub_field('gallery_image')['alt'] ); ?>">
          <?php if ( get_sub_field('gallery_image_link') != null ) : ?>
          </a>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
      </div>
    <?php endif; ?>
</div>