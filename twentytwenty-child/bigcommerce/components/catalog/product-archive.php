<?php
/**
 * The template for rendering the product archive page content
 *
 * @var string[] $posts
 * @var string   $no_results
 * @var string   $title
 * @var string   $description
 * @var string   $refinery
 * @var string   $pagination
 * @var string   $columns
 * @version 1.0.0
 */
?>
<div class="bc-product-archive">
	<?php
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
	?>
	<header class="bc-product-archive__header">
		<h2 class="bc-product-archive__title"><?php echo single_term_title( "" ); ?></h2>
		<div><?php echo wp_kses_post( $description ); ?></div>
	</header>

	<?php //echo $refinery; ?>

	<section class="bc-product-grid bc-product-grid--archive bc-product-grid--<?php echo esc_attr( $columns ); ?>col">
		<?php
		if ( ! empty( $posts ) ) {
			foreach ( $posts as $post ) {
				echo $post;
			}
		} else {
			echo $no_results;
		}
		?>
	</section>

	<?php echo $pagination; ?>

</div>
