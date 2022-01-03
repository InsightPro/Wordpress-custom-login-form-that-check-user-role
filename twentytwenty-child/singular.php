<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
$current_cat = get_the_category( get_the_ID() );
$bc_products = get_field( 'select_products', $current_cat[0] );
?>

<main id="site-content" role="main">
    <div class="section-inner">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
        ?>
    </div>
	<div class="section-inner flex-container">
		<div class="post--content">
			<?php
			if ( have_posts() ) {

				while ( have_posts() ) {
					the_post();

					get_template_part( 'template-parts/content', 'single-post' );
				}
			}

			?>
		</div>
		<sidebar class="post--sidebar">
            <div class="post--sidebar-block">
				<h3 class="post--sidebar-block-heading">Categories:</h3>
				<?php
				$categories = get_categories( array(
					'orderby' => 'name',
					'parent'  => 0
				) );

				?>
				<ul class="post--sidebar-block-cat-list">
                    <li><a href="/going-green/">All</a></li>
                    <?php
                        foreach ( $categories as $category ) {
                    ?>
                        <li class="<?php if ( $category->name === $current_cat[0] -> name ) : ?>active <?php endif; ?>"><a href="<?php echo esc_url(get_category_link( $category->term_id )); ?>"><?php echo esc_html($category->name); ?></a></li>
                    <?php
                    }
                    wp_reset_query();
                    ?>
				</ul>
			</div>
            
            <div class="post--sidebar-block">
                <h3 class="post--sidebar-block-heading">Recent Posts</h3>
                <ul class="post--sidebar-block-post-list">
                    <?php
                        $recent_posts = wp_get_recent_posts( array( 
                            'numberposts' => 3,
                            'post_status' => 'publish'
                        ) );

                        foreach( $recent_posts as $post ) :
                    ?>
                        <li><a href="<?php echo get_permalink( $post['ID'] );?>" tabindex="0"><?php echo get_the_title( $post['ID'] ); ?></a></li>
                    <?php
                        endforeach;
                    ?>
                </ul>
            </div>
            <div class="sticky-section">
                <div class="post--sidebar-block">
    
                   <div class="product-slider" data-flickity='{
                        "contain": true,
                        "draggable": true,
                        "freeScroll": true,
                        "groupCells": "100%",
                        "pageDots": false,
                        "prevNextButtons": true,
                        "autoPlay": true,
                        "autoPlay": 7000,
                        "wrapAround": true,
                        "cellAlign": "left"
                    }'>
                        <?php
                            if ( $bc_products ) :
                                foreach( $bc_products as $product ) : 
                                    echo '<div class="single-slide">' . pgi_get_product_card( $product ) . '</div>';
                                endforeach;
                            endif;
                        ?>
                    </div>     
                </div>
    
                <div class="post--sidebar-block">
                    <div class="post-subscription-form">
                        <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2021/01/PGI-Private-Branding-Logo-White.png" alt="All Natural Products: Eco-Friendly | Pure and Gentle Soap">
                        <p>Get planet-friendly posts just like this sent straight to your inbox</p>
                        <?php echo do_shortcode('[gravityform id="9" title="false" description="false" ajax="true" tabindex="49"]'); ?>
                    </div>
                </div>   
            </div>
        </sidebar>

		
	</div>

	<?php
		get_template_part( 'template-parts/other-posts' );
	?>

    <div class="section-inner">

        <!-- wp:spacer {"height":80,"className":"mobile-30"} -->
            <div style="height:80px" aria-hidden="true" class="wp-block-spacer mobile-30"></div>
        <!-- /wp:spacer -->
    
        <!-- our mission leads the way -->
    
        <!-- wp:heading {"textAlign":"center","className":"font-regular","style":{"color":{"text":"#252825"}}} -->
        <h2 class="has-text-align-center font-regular has-text-color" style="color:#252825">Our mission leads the way.</h2>
        <?php if ( have_rows('select_logos', 'option') ) : ?>
            <div class="gallery-block-wrapper">
                <?php while ( have_rows('select_logos', 'option') ) : the_row('select_logos', 'option'); ?>
                    <div class="gallery-block--card">
                        <img loading="lazy" src="<?php echo esc_url( get_sub_field('logo_image')['url'] ); ?>" alt="<?php echo esc_attr( get_sub_field('logo_image')['alt'] ); ?>">
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>


</main><!-- #site-content -->

<?php get_footer(); ?>
