<?php

$nl_banner_image = get_field('nl_image', 'option');
$nl_banner_title = get_field('nl_heading', 'option');
$nl_banner_text = get_field('nl_text', 'option');
$nl_form = get_field('nl_form', 'option');
?>

<div class="nl_curve-banner-block" style="background-image:url('<?php if ( $nl_banner_image ) : ?><?php echo esc_url( $nl_banner_image['url'] ); ?><?php else: ?>https://wordpress-497380-1572773.cloudwaysapps.com/wp-content/uploads/2020/11/image-newsletter.jpg<?php endif; ?>')">
    <div class="nl_curve-banner--text">
        <?php if ( $nl_banner_title ) : ?>
            <h3><?php echo $nl_banner_title; ?></h3>
        <?php endif; ?>
        <?php if ( $nl_banner_text ) : ?>
            <p><?php echo $nl_banner_text; ?></p>
        <?php endif; ?>
        <?php if ( $nl_form ) : ?>
            <?php echo $nl_form; ?>
        <?php endif; ?>
    </div>

</div>