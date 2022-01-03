<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<!-- google fonts -->
		<link rel="stylesheet" href="https://use.typekit.net/gbx7ysz.css">
		<link href="https://fonts.googleapis.com/css2?family=Ovo&display=swap" rel="stylesheet">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
		<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>

		<header id="site-header" class="header-footer-group" role="banner">

			<?php 
				$showTopHeader = get_field('show_top_header', 'option');
				if ( $showTopHeader ) : 

			?>
				<div class="site-header--top">
					<div class="header-inner section-inner">
						<!-- Top Header Contact Number Section -->
						<?php if ( get_field('header_contact_number', 'option') ) : 
							
							$contact_linkObj = ( get_field('header_contact_number', 'option') );
							$contact_link = $contact_linkObj['url'];
							$contact_link_target = $contact_linkObj['target'] ? $contact_linkObj['target'] : '_self';
							$contact_link_title = $contact_linkObj['title'];
						?>
							<a href="<?php echo esc_url( $contact_link ); ?>" target="<?php echo esc_attr( $contact_link_target ); ?>" class="site-header--top-link hide-mobile">
								<svg fill="currentColor" width="14" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" x="13386">
								<path xmlns="http://www.w3.org/2000/svg" d="M0 0h24v24H0z" fill="none"></path><path xmlns="http://www.w3.org/2000/svg" d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 00-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path>
								</svg>
								<?php echo esc_html( $contact_link_title ); ?>
							</a>
						<?php endif;?>

						<!-- Sitewide Banner Section -->
						<?php if ( get_field('sitewide_banner', 'option') ) : ?>
							<div class="siteWide-banner has-text-align-center">
								<?php echo get_field('sitewide_banner', 'option'); ?>
							</div>
						<?php endif;?>

						<!-- Top Redeem Link -->
						<a href="<?php echo get_site_url(); ?>/redemption-form/" class="site-header--top-link hide-mobile text-underline">Redeem Voucher</a>
					</div>
				</div>
			<?php endif; ?>

			<div id="header" class="main-header">
				<div class="header-inner section-inner">

					<div class="header-navigation-wrapper">
						<?php
						if ( has_nav_menu( 'left_menu' ) ) {
						?>

							<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Left Navigation', 'twentytwenty' ); ?>" role="navigation">

								<ul class="primary-menu reset-list-style">

								<?php
								if ( has_nav_menu( 'left_menu' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'left_menu',
										)
									);
								}
								?>

								</ul>

							</nav><!-- .primary-menu-wrapper -->

						<?php } ?>

						<button class="mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
							<span class="toggle-inner">
								<span class="toggle-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><g transform="translate(0 1)"><line x2="18" fill="none" stroke="#252825" stroke-width="2"/><line x2="18" transform="translate(0 8)" fill="none" stroke="#252825" stroke-width="2"/><line x2="18" transform="translate(0 16)" fill="none" stroke="#252825" stroke-width="2"/></g></svg>
								</span>
								<span class="toggle-text screen-reader-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
							</span>
						</button><!-- .nav-toggle -->

						<?php

						// Check whether the header search is activated in the customizer.
						$enable_header_search = get_theme_mod( 'enable_header_search', true );

						if ( true === $enable_header_search ) {

							?>

							<button class="mobile-search-toggle" data-target=".search--form" aria-expanded="false">
								<span class="toggle-inner">
									<span class="toggle-icon">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 19.69"><defs><style>.cls-1{fill:none;}.cls-1,.cls-2{stroke:#231f20;stroke-miterlimit:10;stroke-width:2px;}.cls-2{fill:#fff;}</style></defs><g id="Layer_1" data-name="Layer 1"><line class="cls-1" x1="13.35" y1="13.04" x2="19.29" y2="18.99"/></g><g id="Layer_2" data-name="Layer 2"><circle class="cls-2" cx="8.15" cy="8.15" r="7.15"/></g></svg>
									</span>
									<span class="toggle-text screen-reader-text"><?php _e( 'Search', 'twentytwenty' ); ?></span>
								</span>
							</button><!-- .search-toggle -->

						<?php } ?>

						<div class="search--form mobile-search">
							<form role="search" aria-label="Search Products:" method="get" class="search-form" action="<?php bloginfo('url'); ?>/">
								<label for="search-form-2">
									<span class="screen-reader-text">Search Products:</span>
									<input type="search" id="search-form-2" class="search-field" placeholder="Search Products..." value="" name="s">
								</label>
								<input type="hidden" name="post_type" value="bigcommerce_product">
								<input type="submit" class="search-submit" value="Search">
							</form>
						</div>
					</div>

					<div class="header-titles-wrapper">

						<div class="header-titles">

							<?php
								// Site title or logo.
								twentytwenty_site_logo();
							?>

						</div><!-- .header-titles -->


					</div><!-- .header-titles-wrapper -->

					<div class="header-navigation-wrapper">

						<?php
						if ( has_nav_menu( 'right_menu' ) ) {
							?>

								<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Right Navigation', 'twentytwenty' ); ?>" role="navigation">

									<ul class="primary-menu reset-list-style">

									<?php
									if ( has_nav_menu( 'right_menu' ) ) {

										wp_nav_menu(
											array(
												'container'  => '',
												'items_wrap' => '%3$s',
												'theme_location' => 'right_menu',
											)
										);
									}
									?>

									</ul>

								</nav><!-- .primary-menu-wrapper -->

							<?php
						}

						?>
						<ul class="header-toggles--list">
						<?php
							if ( true === $enable_header_search ) {
								?>

								<li class="header-toggles--list-item hide-tab">

									<a class="desktop-search-toggle" data-target=".search--form" aria-expanded="false">
										<span class="toggle-inner">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 19.69"><defs><style>.cls-1{fill:none;}.cls-1,.cls-2{stroke:#231f20;stroke-miterlimit:10;stroke-width:2px;}.cls-2{fill:#fff;}</style></defs><g id="Layer_1" data-name="Layer 1"><line class="cls-1" x1="13.35" y1="13.04" x2="19.29" y2="18.99"/></g><g id="Layer_2" data-name="Layer 2"><circle class="cls-2" cx="8.15" cy="8.15" r="7.15"/></g></svg>
											<span class="toggle-text screen-reader-text"><?php _e( 'Search', 'twentytwenty' ); ?></span>
										</span>
									</a><!-- .search-toggle -->
									<div class="search--form">
										<form role="search" aria-label="Search Products:" method="get" class="search-form" action="<?php bloginfo('url'); ?>/">
											<label for="search-form-2">
												<span class="screen-reader-text">Search Products:</span>
												<input type="search" id="search-form-2" class="search-field" placeholder="Search Products..." value="" name="s">
											</label>
											<input type="hidden" name="post_type" value="bigcommerce_product">
											<input type="submit" class="search-submit" value="Search">
										</form>
									</div>

								</li>

								<?php } ?>
							<li class="header-toggles--list-item account--tab">
								<a href="<?php echo get_site_url(); ?>/account-profile/">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.03 22.44"><g id="Layer_2" data-name="Layer 2"><ellipse style="fill:#fff;stroke:#231f20;stroke-miterlimit:10;" cx="11.02" cy="11.22" rx="10.52" ry="10.72"/><circle style="fill:#fff;stroke:#231f20;stroke-miterlimit:10;" cx="11.02" cy="8.77" r="4.28"/><path style="fill:#fff;stroke:#231f20;stroke-miterlimit:10;" d="M7.34,21.56a11.32,11.32,0,0,1,9-3.73,11.45,11.45,0,0,1,8.81,4" transform="translate(-5.31 -4.78)"/></g></svg>
									<span class="toggle-text screen-reader-text"><?php _e( 'User Account', 'twentytwenty' ); ?></span>
								</a>
								<?php 
									$is_active 	= false;
									$user = wp_get_current_user();
									if ( in_array( 'dealer', (array) $user->roles ) ) {
										$is_active = true;
									}

									if ( !$is_active ) :
								?>
								<ul class="account--options">
									<?php if ( is_user_logged_in() ) : ?>
										<li><a href="<?php echo get_site_url(); ?>/account-profile/">My Account</a></li>
									<?php else : ?>
										<li><a href="<?php echo get_site_url(); ?>/login/">Sign In</a></li>
										<li><a href="<?php echo get_site_url(); ?>/registration/">Register</a></li>
									<?php endif; ?>
										<li><a href="<?php echo get_site_url(); ?>/order-history">My Orders</a></li>
									<?php if ( is_user_logged_in() ) : ?>
										<li><a href="<?php echo get_site_url(); ?>/wp-login.php?action=logout">Sign Out</a></li>
									<?php endif; ?>
								</ul>
								<?php endif; ?>
							</li>
							<li class="menu-item-bigcommerce-cart header-toggles--list-item">
								<a href="/cart/">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20.72 19.35"><g id="Layer_2" data-name="Layer 2"><polyline style="fill:none;stroke:#231f20;stroke-miterlimit:10;stroke-width:1.5px;" points="0 0.75 1.92 0.75 3.64 10.96 17.39 10.96 19.72 3.08 2.63 3.08"/><path style="fill:none;stroke:#231f20;stroke-miterlimit:10;stroke-width:1.5px;" d="M9.84,16.67a2.41,2.41,0,0,0-2.12.61,1.81,1.81,0,0,0-.51,1.21,1.84,1.84,0,0,0,.41,1.11,2.42,2.42,0,0,0,1.31.91H25" transform="translate(-6.42 -5.71)"/><circle style="fill:none;stroke:#231f20;stroke-miterlimit:10;stroke-width:1.5px;" cx="5.84" cy="16.9" r="1.69"/><circle style="fill:none;stroke:#231f20;stroke-miterlimit:10;stroke-width:1.5px;" cx="14.13" cy="16.9" r="1.69"/></g></svg>
									<span class="bigcommerce-cart__item-count"></span>
								</a>
							</li>
						</ul>

					</div><!-- .header-navigation-wrapper -->

				</div><!-- .header-inner -->
			</div>

		</header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );

?>
<div class="side-cart-bg"></div>
<div class="side-cart-area <?php if ( !is_user_logged_in() ) : ?>not-loggedin<?php endif; ?>">
	<section id="bigcommerce_mini_cart-4" class="widget bigcommerce_mini_cart">
		<div class="bigcommerce_mini_cart-header">
			<h4 class="side-cart-title">Cart</h4>
			<button class="close-cart">
				<span class="screen-reader-text">Close</span>
				<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
			</button>
		</div>
		<?php if ( !is_user_logged_in() ) : ?>
			<p style="text-align:center; margin-top: 3rem; margin-bottom: 3rem;">Please <a href="<?php echo home_url( '/login/' ); ?>">Login</a> or <a href="<?php echo home_url( '/registration/' ); ?>">Create an Account</a> before making a purchase.</p>
		<?php endif; ?>
		<div data-js="bc-mini-cart"><span class="bc-loading">Loading</span></div>
	</section>
</div>
<?php