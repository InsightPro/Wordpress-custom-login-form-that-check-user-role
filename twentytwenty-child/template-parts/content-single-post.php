<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$current_cat = get_the_category( get_the_ID() );
?>


<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">
        <div class="entry-header-inner">
            <?php
            /**
             * Allow child themes and plugins to filter the display of the categories in the entry header.
             *
             * @since Twenty Twenty 1.0
             *
             * @param bool   Whether to show the categories in header, Default true.
             */
            $show_categories = apply_filters( 'twentytwenty_show_categories_in_entry_header', true );

            if ( true === $show_categories && has_category() ) {
                ?>

                <div class="entry-categories">
                    <span class="screen-reader-text"><?php _e( 'Categories', 'twentytwenty' ); ?></span>
                    <div class="entry-categories-inner">
                        <?php the_category( ' ' ); ?>
                    </div><!-- .entry-categories-inner -->
                </div><!-- .entry-categories -->

                <?php
            }

            the_title( '<h1 class="entry-title">', '</h1>' );
            ?>

            <div class="post--meta">
                posted <?php echo get_the_date( 'F j, Y', get_the_ID() ); ?>
            </div>
        </div>
    </header>

    <?php

    if ( has_post_thumbnail() && ! post_password_required() ) {

    ?>

    <figure class="featured-media">

        <div class="featured-media-inner">

            <?php
            the_post_thumbnail();

            $caption = get_the_post_thumbnail_caption();

            if ( $caption ) {
                ?>

                <figcaption class="wp-caption-text"><?php echo wp_kses_post( $caption ); ?></figcaption>

                <?php
            }
            ?>

        </div><!-- .featured-media-inner -->

    </figure><!-- .featured-media -->

    <?php
    }

    $post_tags = wp_get_post_tags( get_the_ID() );

    if ( !empty( $post_tags ) ) : 
    ?>

    <span class="post--tags">Tags: 
        <?php foreach( $post_tags as $tag ) : ?>
            <a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a>
        <?php endforeach; ?>
    </span>

    <?php endif; ?>


    <div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

        <div class="entry-content">

            <?php
            if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                the_excerpt();
            } else {
                the_content( __( 'Continue reading', 'twentytwenty' ) );
            }
            ?>

        </div><!-- .entry-content -->

    </div><!-- .post-inner -->

    <!-- social share -->
    <div class="post--share">
        <button class="post--share-btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92c0-1.61-1.31-2.92-2.92-2.92zM18 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM6 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm12 7.02c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/></svg>
            <span>share</span>
        </button>
        <ul class="post--share-icon-list">
            <li>
                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                    <span class="screen-reader-text">share on facebook</span>
                </a>
            </li>
            <li>
                <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=Simple Share Buttons&hashtags=simplesharebuttons" target="_blank">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                    <span class="screen-reader-text">share on twitter</span>
                </a>
            </li>
            <li>
                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
                    <span class="screen-reader-text">share on linkedin</span>
                </a>
            </li>
            <li>
                <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>&title=<?php the_title(); ?>&caption=<?php the_title(); ?>&tags=pgi" target="_blank">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="tumblr" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M309.8 480.3c-13.6 14.5-50 31.7-97.4 31.7-120.8 0-147-88.8-147-140.6v-144H17.9c-5.5 0-10-4.5-10-10v-68c0-7.2 4.5-13.6 11.3-16 62-21.8 81.5-76 84.3-117.1.8-11 6.5-16.3 16.1-16.3h70.9c5.5 0 10 4.5 10 10v115.2h83c5.5 0 10 4.4 10 9.9v81.7c0 5.5-4.5 10-10 10h-83.4V360c0 34.2 23.7 53.6 68 35.8 4.8-1.9 9-3.2 12.7-2.2 3.5.9 5.8 3.4 7.4 7.9l22 64.3c1.8 5 3.3 10.6-.4 14.5z"></path></svg>
                    <span class="screen-reader-text">share on tumblr</span>
                </a>
            </li>
            <li>
                <a href="http://pinterest.com/pin/create/link/?url=<?php the_permalink(); ?>" target="_blank">
                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="pinterest-p" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"></path></svg>
                    <span class="screen-reader-text">share on pinterest</span>
                </a>
            </li>
            <li>
                <a href="mailto:?Subject=Simple Share Buttons&Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php the_permalink(); ?>" target="_blank">
                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z"></path></svg>
                    <span class="screen-reader-text">share on email</span>
                </a>
            </li>
        </ul>
    </div>
    
    
    
	<?php
		get_template_part( 'template-parts/navigation' );
	?>
</div><!-- .post -->
