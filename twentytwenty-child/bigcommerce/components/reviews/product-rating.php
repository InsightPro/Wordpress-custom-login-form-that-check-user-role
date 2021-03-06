<?php
/**
 * @var float   $stars        The number of stars out of 5
 * @var int     $percentage   The star rating converted to a percentage (e.g., 4.2 stars = 84%)
 * @var int     $review_count The number of reviews the product has received
 * @var string  $link         Destination for the link to reviews
 * @var Product $product
 * @version 1.0.0
 */

use BigCommerce\Post_Types\Product\Product;

?>
<div class="bc-single-product__ratings">
	<div class="bc-single-product__rating">
		<div class="bc-single-product__rating--mask" style="width: <?php echo (int) $percentage; ?>%">
			<div class="bc-single-product__rating--top">
				<span class="bc-rating-star"></span>
				<span class="bc-rating-star"></span>
				<span class="bc-rating-star"></span>
				<span class="bc-rating-star"></span>
				<span class="bc-rating-star"></span>
			</div>
		</div>
		<div class="bc-single-product__rating--bottom">
			<span class="bc-rating-star"></span>
			<span class="bc-rating-star"></span>
			<span class="bc-rating-star"></span>
			<span class="bc-rating-star"></span>
			<span class="bc-rating-star"></span>
		</div>
	</div>
	<div class="bc-single-product__rating-reviews">
		<!-- data-js="bc-single-product-reviews-anchor" is required -->
		<span>(<?php printf( esc_html( _n( '%d review', '%d reviews', $review_count, 'bigcommerce' ) ), $review_count ); ?>)</span>
		<a
			<?php if ( $link ) { ?>
				href="<?php echo esc_url( $link ); ?>"
			<?php } ?>
			class="bc-link bc-single-product__reviews-anchor"
			data-js="bc-single-product-reviews-anchor"
		>
			<?php esc_html_e( 'Write a Review', 'bigcommerce' ); ?>
		</a>
	</div>
</div>