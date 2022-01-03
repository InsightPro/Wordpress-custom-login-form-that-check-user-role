<?php
$id = 'custom-media-text-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'custom-media-text-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$media_image = get_field('image');
$use_custom_image_size = get_field('use_custom_image_size');
$media_image_size = get_field('image_size');
$media_content_heading = get_field('heading') ?: 'Heading Goes Here...';
$media_content_heading_font_size = get_field('heading_font_size');
$media_content_text = get_field('text') ?: 'Lorem Impsum Dolor is the best dummy text generator';
$media_content_text_boxSize = get_field('text_box_max_size');
$media_content_button = get_field('button');
$media_content_bg = get_field('background_color');
$media_content_overlay = get_field('content_overlay');
$layout_swap = get_field('layout_swap');
$content_align = get_field('content_align');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if ($layout_swap) : ?>swap<?php endif; ?>" <?php if ($media_content_overlay) : ?>data-content-overlay<?php endif; ?>>
    <div class="custom-media-text-column">
        <figure class="custom-media-image">
            <?php if ($media_image) : 
                $image_srcset = wp_get_attachment_image_srcset( $media_image['ID'],  array( 600,600 ) );  
            ?>	

                <img src="<?php echo esc_url($media_image['url']); ?>" alt="<?php echo esc_url($media_image['alt']); ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" <?php if ( $use_custom_image_size ) : ?>style="max-height: <?php echo $media_image_size; ?>px" <?php endif; ?> loading="lazy">

            <?php else : ?>

                <img src="https://via.placeholder.com/600x600" alt="placeholder"/>

            <?php endif; ?>
        </figure>
    </div>
    <div class="custom-media-text-column" style="background-color:<?php echo $media_content_bg; ?>">
        <div class="custom-media-text <?php if ( $content_align ) : ?>v-align-center<?php endif; ?>">
            <?php if ($media_content_overlay) : ?>
                <h3 style="font-size: <?php echo $media_content_heading_font_size; ?>rem"><?php echo $media_content_heading; ?></h3>
                <?php echo $media_content_text; ?>
                <?php if ($media_content_button) : ?>
                    <a class="wp-block-button__link button button--white" href="<?php echo esc_url( $media_content_button['url'] ); ?>" target="<?php echo esc_attr( $media_content_button['target'] ); ?>"><?php echo esc_html( $media_content_button['title'] ); ?></a>
                <?php endif;?>
            <?php else : ?>
            <div class="custom-media-text--wrapper">
                <h3 style="font-size: <?php echo $media_content_heading_font_size; ?>rem"><?php echo $media_content_heading; ?></h3>
                <?php if ( $media_content_text_boxSize ) : ?>
                    <div style="max-width: <?php echo $media_content_text_boxSize; ?>px"><?php echo $media_content_text; ?></div>
                <?php else : ?>
                    <?php echo $media_content_text; ?>
                <?php endif; ?>
                <?php if ($media_content_button) : ?>
                    <a class="wp-block-button__link button button--white" href="<?php echo esc_url( $media_content_button['url'] ); ?>" target="<?php echo esc_attr( $media_content_button['target'] ); ?>"><?php echo esc_html( $media_content_button['title'] ); ?></a>
                <?php endif;?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>