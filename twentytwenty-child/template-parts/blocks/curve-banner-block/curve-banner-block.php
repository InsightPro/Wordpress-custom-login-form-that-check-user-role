<?php
$id = 'curve-banner-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'curve-banner-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$banner_image = get_field('banner_image');
$banner_title = get_field('banner_title') ?: 'Add Banner Title';
$banner_text = get_field('banner_text');
$banner_button = get_field('banner_button');
$v_align = get_field('vertically_centered');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if ($v_align) : ?>align-center<?php endif; ?>" style="background-image:url('<?php if ( $banner_image ) : ?><?php echo esc_url( $banner_image['url'] ); ?><?php else: ?>https://via.placeholder.com/1600x650<?php endif; ?>')">
    <div class="curve-banner--text">
        <?php
            if ( $banner_title ) {
                echo $banner_title; 
            } 
        ?>
        <?php if ( $banner_text ) : ?>
            <p><?php echo $banner_text; ?></p>
        <?php endif; ?>
        <?php if ( $banner_button ) : ?>
            <a class="wp-block-button__link" href="<?php echo esc_url( $banner_button['url'] ); ?>" target="<?php echo esc_attr( $banner_button['target'] ); ?>"><?php echo esc_html( $banner_button['title'] ); ?></a>
        <?php endif; ?>
    </div>

</div>