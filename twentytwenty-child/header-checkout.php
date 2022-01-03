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

		<header id="site-header" class="header-footer-group" role="banner">

			<div id="header" class="main-header">
				<div class="header-inner section-inner justify-center">

					<div class="header-titles-wrapper">

						<div class="header-titles">

							<?php
								// Site title or logo.
								twentytwenty_site_logo();
							?>

						</div><!-- .header-titles -->


					</div><!-- .header-titles-wrapper -->

				</div><!-- .header-inner -->
			</div>

		</header><!-- #site-header -->

		<?php