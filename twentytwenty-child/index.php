<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

$slug = get_page_by_path( 'going-green' );

$blog_banner_image = (null !== get_field('blog_banner_image', $slug->ID) ? get_field('blog_banner_image', $slug->ID) : '');
$blog_banner_heading = (null !== get_field('blog_banner_heading', $slug->ID) ? get_field('blog_banner_heading', $slug->ID) : '');
$blog_banner_sub_content = (null !== get_field('blog_banner_sub_content', $slug->ID) ? get_field('blog_banner_sub_content', $slug->ID) : '');

$current_page = get_query_var( 'paged' );
?>

<main id="site-content" role="main">

	<?php if ( ! is_front_page() ) : ?>
		<div class="curve-banner-block align-center" style="background-image:url('<?php if ( $blog_banner_image ) : ?><?php echo esc_url( $blog_banner_image['url'] ); ?><?php else: ?>https://via.placeholder.com/1600x650<?php endif; ?>')">
			<div class="curve-banner--text">
				<h1><?php echo $blog_banner_heading; ?></h1>
				<p><?php echo $blog_banner_sub_content; ?></p>
			</div>

		</div>
	<?php endif; ?>

	<div class="section-inner">
	<!-- category post navigation -->
		<div class="blog-top--navigation">
			<!-- category lists navigation -->
			<div class="categories--list">
				<h3>Categories:</h3>
				<?php
				$categories = get_categories( array(
					'orderby' => 'name',
					'parent'  => 0
				) );

				?>
				<ul>
				<li <?php if( is_home() ) : ?> class="active"<?php endif; ?>><a href="/going-green/">All</a></li>
					<?php
						foreach ( $categories as $category ) {
						$class = ( is_category( $category->name ) ) ? 'active' : '';
					?>
						<li class="<?php echo $class; ?>"><a href="<?php echo esc_url(get_category_link( $category->term_id )); ?>"><?php echo esc_html($category->name); ?></a></li>
					<?php
					}
					?>
				</ul>
			</div>

			<div class="blog-post--search">
				<form role="search" aria-label="Search Blogs:" method="get" class="search-form" action="<?php bloginfo('url'); ?>/">
					<label for="search-form-1">
						<span class="screen-reader-text">Search Blogs:</span>
						<input type="search" id="search-form-1" class="search-field" placeholder="Search Blogs …" value="" name="s">
					</label>
					<input type="hidden" name="post_type" value="post">
					<input type="submit" class="search-submit" value="Search">
				</form>
			</div>
		</div>
		<!-- post list based on the category -->
		<div class="category-posts">
		<?php if ( is_home() ) : ?>
			<h2 class="category-posts--title">All Posts</h2>
		<?php else : ?>
			<h2 class="category-posts--title"><?php echo single_cat_title( '', false ); ?></h2>
		<?php endif; ?>
		<?php 
			$stickyPost = get_option( 'sticky_posts' );
			if ( is_home() ) :
				$args = array (
					'posts_per_page' => 1,
					'post__in' => $stickyPost,
					'ignore_sticky_posts' => 1
				);
			else :

			$category = get_category( get_query_var( 'cat' ) );
			$cat_id = $category->cat_ID;

			$args = array (
				'posts_per_page' => 1,
				'post__in' => $stickyPost,
				'ignore_sticky_posts' => 1,
				'category__in' => $cat_id
			);

			endif;
			
			$get_sticky_post = new WP_Query( $args );

			if ( $get_sticky_post -> have_posts() && $current_page === 0 ) :
				while ( $get_sticky_post -> have_posts() ) : $get_sticky_post -> the_post();
				?>
				<div class="sticky--post">
					<div class="sticky--post-column sticky--post-info">
						<a href="<?php echo get_permalink( get_the_ID() );?>" tabindex="0"><h3><?php echo get_the_title( get_the_ID() ); ?></h3></a>
						<div class="sticky--post-excerpt"><?php echo wp_trim_words( get_the_content( get_the_ID() ), 30, '...' ); ?> <span><a href="<?php echo get_the_permalink( get_the_ID() );?>">read more</a></span></div>
					</div>
					<div class="sticky--post-column sticky--post-image">
						<a href="<?php echo get_permalink( get_the_ID() );?>" tabindex="0">
							<?php echo get_the_post_thumbnail( get_the_ID() ); ?>
						</a>
					</div>
				</div>
				<?php
				endwhile;
			endif;
		?>
		<?php
			if ( have_posts() ) :
			?>
			<ul class="wp-block-latest-posts wp-block-latest-posts__list post--grid">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'blog-post' );

				endwhile;
				?>
			</ul>
				<?php

			else :

				get_template_part( 'template-parts/content', 'none' );
			?>
			
			<?php
			endif;
			?>

			<?php get_template_part( 'template-parts/pagination' ); ?>		
		</div>

		<!-- blog testimonial section -->

		<?php
			$testimonial_section_bg = (null !== get_field('testimonial_content_background', 'option') ? get_field('testimonial_content_background', 'option') : '');
		?>

		<div class="testimonail-full--block full-width blog-page--testimonial" style="background-image: url('<?php echo $testimonial_section_bg['url']; ?>')">
			<div class="section-inner">
				<div class="height-60"></div>
				<div class="testimonial--quotes"></div>
				<div class="height-60"></div>
				<div class="testimonial-block testimonial-slider" data-per-slide="1" data-flickity='{
					"contain": true,
					"draggable": true,
					"freeScroll": true,
					"groupCells": "100%",
					"adaptiveHeight": true,
					"pageDots": false,
					"prevNextButtons": true,
					"autoPlay": false,
					"wrapAround": true
				}'>
					<?php if ( have_rows('testimonial_content', 'option') ) : ?>
						<?php while ( have_rows('testimonial_content', 'option') ) : the_row(); ?>
						<div class="testimonial-slide">
							<div class="testimonial-slide-block">
								<?php echo get_sub_field('testimonial_text', 'option'); ?>
								<h5><?php echo get_sub_field('testimonial_author', 'option'); ?></h5>
							</div>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- most recent post -->
		<div class="section-inner">
			<h2 class="category-posts--title">Most Recent Posts</h2>
			<ul class="wp-block-latest-posts wp-block-latest-posts__list latest-post--slider">
				<?php
				$recent_args = array(
					"posts_per_page" => 5,
					"orderby"        => "date",
					"order"          => "DESC",
					'post_status' 	 => 'publish',
					'post_type'		 => 'post'
				); 
				$recent_posts = new WP_Query( $recent_args );
				if ( $recent_posts -> have_posts() ) :
					while ( $recent_posts -> have_posts() ) : $recent_posts -> the_post();
					get_template_part( 'template-parts/content', 'blog-post' );
					endwhile;
				endif;
				?>
			</ul>
		</div>

		<!-- media text section -->

		<div class="custom-media-text-block full-width">
			<div class="custom-media-text-column">
				<figure class="custom-media-image">
					<?php 
						$image_srcset = wp_get_attachment_image_srcset( get_field('media_with_text_section', 'option')['section_bg_image']['ID'],  array( 600,600 ) );  
					?>
					<img src="<?php echo esc_url(get_field('media_with_text_section', 'option')['section_bg_image']['url']); ?>" alt="<?php echo esc_url(get_field('media_with_text_section', 'option')['section_bg_image']['alt']); ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>">
				</figure>
			</div>
			<div class="custom-media-text-column" style="background-color:<?php echo get_field('media_with_text_section', 'option')['section_background_color']; ?>">
					<div class="custom-media-text v-align-center">
					<h3><?php echo get_field('media_with_text_section', 'option')['section_heading']; ?></h3>
					<?php if ( get_field('media_with_text_section', 'option')['section_button'] ) : ?>
						<a class="wp-block-button__link button button--white" href="<?php echo esc_url( get_field('media_with_text_section', 'option')['section_button']['url'] ); ?>" target="<?php echo esc_attr( get_field('media_with_text_section', 'option')['section_button']['target'] ); ?>"><?php echo esc_html( get_field('media_with_text_section', 'option')['section_button']['title'] ); ?></a>
					<?php endif;?>
				</div>
			</div>
		</div>

		<!-- instagram widget -->

		<!-- wp:heading {"textAlign":"center","className":"font-regular","style":{"color":{"text":"#252825"}}} -->
		<h2 class="has-text-align-center font-regular has-text-color" style="color:#252825">Follow Us.</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">Find us on Instagram: <a href="https://www.instagram.com/pureandgentlesoap/?hl=en">@pureandgentlesoap</a> <br><span style="color: #3d7eb6">#PureandGentleSoap</span></p>
		<!-- /wp:paragraph -->

		<!-- wp:spacer {"height":28} -->
		<div style="height:28px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:html -->
		<!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="https://cdn.lightwidget.com/widgets/366cd02909e557ee861284e34bcf8319.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
		<!-- /wp:html -->

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

<?php
get_footer();
