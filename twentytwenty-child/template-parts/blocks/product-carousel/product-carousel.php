<?php
$id = 'product-carousel-block-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'product-carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$bigCommerce_product = get_field('select_bigcommerce_product');

$queryProducts = new WP_Query( array(
    'post_type'			=> 'bigcommerce_product',
    'posts_per_page'	=> -1,
    'post__in'			=> $bigCommerce_product
) );

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="product-slider" data-flickity='{
        "contain": true,
        "draggable": true,
        "pageDots": false,
        "prevNextButtons": true,
        "autoPlay": true,
        "autoPlay": 7000,
        "wrapAround": true,
        "cellAlign": "left"
    }'>
        <?php
            if ( $queryProducts->have_posts() && $queryProducts->post_count > 0 ) :
                while ( $queryProducts->have_posts() ) : $queryProducts->the_post();
                    echo '<div class="single-slide">' . pgi_get_product_card( get_the_ID() ) . '</div>';
                endwhile;
            endif;
        ?>
    </div>
</div>