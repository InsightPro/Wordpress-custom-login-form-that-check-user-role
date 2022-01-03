<?php

$post_id = get_the_ID();
$cats_id = array();
$categories = get_the_category( get_the_ID() );

if ( !empty( $categories ) && !is_wp_error($categories) ) {
    foreach( $categories as $category ) : 
        array_push( $cats_id, $category -> term_id );
    endforeach;
}

$current_post_type = get_post_type( get_the_ID() );

$pgi_related_posts_args = array( 
    'category__in'      => $cats_id,
    'post_type'         => $current_post_type,
    'post__not_in'      => array( $post_id ),
    'posts_per_page'    => '-1',
);

$pgi_related_posts = new WP_Query( $pgi_related_posts_args );

?>

<div class="related--posts">
    <div class="section-inner">
        <div class="related--posts-header">
            <?php the_category( ' ' ); ?>
            <h3>Up Next</h3>
        </div>
        <?php if ( $pgi_related_posts -> have_posts() ) : ?>
            <ul class="wp-block-latest-posts wp-block-latest-posts__list latest-post--slider" data-flickity='{
                "contain": true,
                "draggable": true,
                "freeScroll": true,
                "groupCells": "100%",
                "pageDots": false,
                "prevNextButtons": true
            }'>
                <?php while( $pgi_related_posts -> have_posts()) : $pgi_related_posts -> the_post(); 
                    get_template_part( 'template-parts/content', 'blog-post' );
                ?>
                <?php endwhile; ?>
            </ul>
        <?php endif; wp_reset_query(); ?>
    </div>
</div>