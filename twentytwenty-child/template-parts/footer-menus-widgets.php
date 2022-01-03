<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
$has_sidebar_3 = is_active_sidebar( 'sidebar-3' );
$has_sidebar_4 = is_active_sidebar( 'sidebar-4' );
$has_sidebar_5 = is_active_sidebar( 'sidebar-5' );

// Only output the container if there are elements to display.
if ( $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3 || $has_sidebar_4 || $has_sidebar_5 ) {
	?>

	<div class="footer-nav-widgets-wrapper header-footer-group">

		<div class="footer-inner section-inner">

			<?php if ( $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3 || $has_sidebar_4 || $has_sidebar_5 ) { ?>

				<div class="footer-widgets-outer-wrapper" role="complementary">

					<div class="footer-widgets-wrapper">

						<?php if ( $has_sidebar_1 ) { ?>

							<div class="footer-widgets column-one grid-item">
								<?php dynamic_sidebar( 'sidebar-1' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_2 ) { ?>

							<div class="footer-widgets column-two grid-item">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_3 ) { ?>

							<div class="footer-widgets column-three grid-item">
								<?php dynamic_sidebar( 'sidebar-3' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_4 ) { ?>

							<div class="footer-widgets column-four grid-item">
								<?php dynamic_sidebar( 'sidebar-4' ); ?>
							</div>

						<?php } ?>

						<?php if ( $has_sidebar_5 ) { ?>

							<div class="footer-widgets column-five grid-item">
								<?php dynamic_sidebar( 'sidebar-5' ); ?>
							</div>

						<?php } ?>

					</div><!-- .footer-widgets-wrapper -->

				</div><!-- .footer-widgets-outer-wrapper -->

			<?php } ?>

		</div><!-- .footer-inner -->

	</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
