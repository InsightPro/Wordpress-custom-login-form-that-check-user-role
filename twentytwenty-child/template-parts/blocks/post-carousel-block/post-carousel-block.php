<?php
$id = 'post-carousel-block-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'post-carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$post_carousel = get_field('select_product_carousel');

$sticky = get_option( 'sticky_posts' );

$queryPosts = new WP_Query( array(
    'post_type'			=> 'post',
    'posts_per_page'	=> 3,
    'post__in'			=> $post_carousel,
    'post__not_in'      => $sticky
) );

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="post-slider wp-block-latest-posts wp-block-latest-posts__list latest-post--slider" data-flickity='{
        "contain": true,
        "draggable": true,
        "freeScroll": true,
        "groupCells": "100%",
        "pageDots": false,
        "prevNextButtons": false,
        "cellAlign": "left"
    }'>
        <?php
            if ( $queryPosts->have_posts() && $queryPosts->post_count > 0 ) :
                while ( $queryPosts->have_posts() ) : $queryPosts->the_post();
                ?>
                <div class="post--card-wrapper"> 
                    <div class="post--card">
                        <div class="wp-block-latest-posts__featured-image aligncenter">
                            <a href="<?php echo get_permalink( get_the_ID() );?>">
                                <?php echo get_the_post_thumbnail( get_the_ID() ); ?>
                            </a>
                        </div>
                        <a href="<?php echo get_permalink( get_the_ID() );?>" tabindex="0"><?php echo get_the_title( get_the_ID() ); ?></a>
                        <div class="wp-block-latest-posts__post-excerpt"><?php echo wp_trim_words( get_the_content( get_the_ID() ), 30, '...' ); ?> <span><a href="<?php echo get_the_permalink( get_the_ID() );?>">read more</a></span></div>
                    </div>
                </div>
                <?php
                endwhile;
            endif;
        ?>
    </div>
</div>