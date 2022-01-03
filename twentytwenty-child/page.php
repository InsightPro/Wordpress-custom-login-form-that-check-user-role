<?php
/**
 * Template Name: Cover Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

$is_admin = get_field('is_admin');
?>

<main id="site-content" role="main">

<div class="section-inner <?php if ( $is_admin ) : ?>section-inner--admin<?php endif; ?>">
		<?php
			if ( get_the_title() == 'Cart' && !is_user_logged_in() ) {
		?>
		<p style="text-align:center; margin-top: 6rem;">Please <a href="<?php echo home_url( '/login/' ); ?>">Login</a> or <a href="<?php echo home_url( '/registration/' ); ?>">Create an Account</a> before making a purchase.</p>
		<?php	
			}
		?>
        <?php the_content(); ?>

		<?php
			if ( get_the_title() == 'Cart' && !is_user_logged_in() ) {
		?>
		<p style="text-align:center; margin-top: 3rem; margin-bottom: 3rem;">Please <a href="<?php echo home_url( '/login/' ); ?>">Login</a> or <a href="<?php echo home_url( '/registration/' ); ?>">Create an Account</a> before making a purchase.</p>
		<?php	
			}
		?>
    </div>

</main><!-- #site-content -->

<?php if ( is_page( 51461 ) ) : ?>
<div class="authorization-modal cover-modal" data-modal-target-string=".authorization-modal">

	<div class="authorization-modal-inner modal-inner">

		<div class="section-inner">

			<?php echo do_shortcode( '[gravityform id="4" title="false" description="false" ajax="true" tabindex="49"]' ); ?>

			<button class="toggle search-untoggle authorization-toggle fill-children-current-color" data-toggle-target=".authorization-modal" data-toggle-body-class="showing-authorization-modal" data-set-focus=".authorization-modal" aria-expanded="false">
				<span class="screen-reader-text"><?php _e( 'Close modal', 'twentytwenty' ); ?></span>
				<?php twentytwenty_the_theme_svg( 'cross' ); ?>
			</button><!-- .search-toggle -->

		</div><!-- .section-inner -->

	</div><!-- .search-modal-inner -->

</div><!-- .menu-modal -->

<div class="authorization-espaniol-modal cover-modal" data-modal-target-string=".authorization-espaniol-modal">

	<div class="authorization-espaniol-modal-inner modal-inner">

		<div class="section-inner">

			<?php echo do_shortcode( '[gravityform id="7" title="false" description="false" ajax="true" tabindex="49"]' ); ?>

			<button class="toggle search-untoggle authorization-toggle fill-children-current-color" data-toggle-target=".authorization-espaniol-modal" data-toggle-body-class="showing-authorization-espaniol-modal" data-set-focus=".authorization-espaniol-modal" aria-expanded="false">
				<span class="screen-reader-text"><?php _e( 'Close modal', 'twentytwenty' ); ?></span>
				<?php twentytwenty_the_theme_svg( 'cross' ); ?>
			</button><!-- .search-toggle -->

		</div><!-- .section-inner -->

	</div><!-- .search-modal-inner -->

</div><!-- .menu-modal -->

<?php endif; ?>

<?php get_footer(); ?>
