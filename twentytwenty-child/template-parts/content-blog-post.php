<?php
/**
 * Template part for displaying post content in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PGI
 */

?>

<li> 
<div class="post--card">
    <div class="wp-block-latest-posts__featured-image aligncenter">
        <a href="<?php echo get_permalink( get_the_ID() );?>">
            <?php echo get_the_post_thumbnail( get_the_ID() ); ?>
        </a>
    </div>
    <a href="<?php echo get_permalink( get_the_ID() );?>" tabindex="0"><?php echo get_the_title( get_the_ID() ); ?></a>
    <div class="wp-block-latest-posts__post-excerpt"><?php echo wp_trim_words( get_the_content( get_the_ID() ), 30, '...' ); ?> <span><a href="<?php echo get_the_permalink( get_the_ID() );?>">read more</a></span></div>
</div>
</li>