<?php
/**
 * Product Single Form Actions
 *
 * @package BigCommerce
 *
 * @var Product $product
 * @var string  $options
 * @var string  $button
 * @var string  $message
 * @var int     $min_quantity
 * @var int     $max_quantity
 * @var bool    $ajax_add_to_cart
 * @var string  $quantity_field_type
 * @version 1.0.1
 */

use BigCommerce\Post_Types\Product\Product;

$product = new \BigCommerce\Post_Types\Product\Product( get_the_ID() );
$variants = $product->options;
$count = (count($variants));

$custom_class = "";
foreach ($variants as $variant) {
	$display_name = $variant->display_name;
	if ( strpos($display_name, 'Fragrance') !== FALSE ) {
		$custom_class = "fragrance";
	}
}
$short_desc = get_field('product_short_description');
?>

<form action="<?php echo esc_url( $product->purchase_url() ); ?>" method="post" enctype="multipart/form-data"
	  class="bc-form bc-product-form">
	<div class="first-sub-row">
		<?php if ( $short_desc ) : ?>
			<div class="product_short_desc">
				<?php echo $short_desc; ?>
			</div>
		<?php endif;?>
		<?php echo $options; ?>
		<!-- data-js="bc-product-message" is required. -->
		<div class="bc-product-form__product-message" data-js="bc-product-message"></div>
		<!-- data-js="variant_id" is required. -->
		<input type="hidden" name="variant_id" class="variant_id" data-js="variant_id" value="">
	</div>
	 
	<div class="second-sub-row second-sub-row-<?php echo $count; ?> <?php echo $custom_class; ?>">
		<div class="bc-product-addToCart">
			<div class="bc-product-form__quantity">
				<?php if ( $quantity_field_type !== 'hidden' ) { ?>
				<label class="bc-product-form__quantity-label screen-reader-text">
					<span class="bc-product-single__meta-label"><?php esc_html_e( 'Quantity', 'bigcommerce' ); ?>:</span>
				</label>
				<?php } ?>
				<div class="custom-number-input">
					<span onclick="stepper( jQuery( this ), 'down' );" class="step-btn reduce-number">-</span>
					<input type="number" class="bc-product-form__quantity-input" name="quantity" value="<?php echo absint( $min_quantity ); ?>" data-min="<?= absint( $min_quantity ); ?>" <?php if ( $max_quantity > 0 ) { ?>max="<?= absint( $max_quantity ); ?>"<?php } ?> />
					<span onclick="stepper( jQuery( this ), 'up' );" class="step-btn increase-number">+</span>
				</div>
			</div>
			<div class="bc-product-form__action">
				<?php echo $button; ?>
			</div>
		</div>
		<?php if ( $message ) { ?>
			<span class="bc-product-form__purchase-message"><?php echo wp_strip_all_tags( $message ); ?></span>
		<?php } ?>
		<?php if ( $ajax_add_to_cart ) { ?>
			<!-- data-js="bc-ajax-add-to-cart-message" is required. -->
			<div class="bc-ajax-add-to-cart__message-wrapper" data-js="bc-ajax-add-to-cart-message" style="display:none;"></div>
		<?php } ?>
	</div>


</form>
