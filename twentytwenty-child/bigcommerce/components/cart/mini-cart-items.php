<?php
/**
 * Cart Items
 *
 * @package BigCommerce
 *
 * @var array $cart
 * @var string $fallback_image The fallback image to use for items that do not have one
 * @var string $image_size     The image size to use for product images
 * @version 1.0.0
 */

use BigCommerce\Taxonomies\Brand\Brand;

?>

<?php foreach ( $cart['items'] as $item ) { ?>
	<div class="bc-cart-item" data-js="<?php echo esc_attr( $item['id'] ); ?>">
		<!-- data-js="remove-cart-item" and class="bc-cart-item__remove-button" are required -->
		<button
			class="bc-link bc-cart-item__remove-button"
			data-js="remove-cart-item"
			data-cart_item_id="<?php echo esc_attr( $item['id'] ); ?>"
			type="button"
		>
			<span class="screen-reader-text"><?php esc_html_e( '(Remove)', 'bigcommerce' ); ?></span>
			<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
		</button>
		<div class="bc-cart-item-image">

			<?php if ( ! empty( $item['post_id'] ) ) { ?>
			<a
					href="<?php echo esc_url( get_the_permalink( $item['post_id'] ) ); ?>"
					class="bc-product__thumbnail-link"
			>
				<?php } ?>

				<?php
				echo( $item['thumbnail_id'] ? wp_get_attachment_image( $item['thumbnail_id'], $image_size ) : $fallback_image );
				?>

				<?php if ( ! empty( $item['post_id'] ) ) { ?>
			</a>
		<?php } ?>
		</div>
		<div class="bc-cart-item-meta">
			<div class="bc-cart-item-meta--top">
				<h3 class="bc-cart-item__product-title">
					<?php if ( ! empty( $item['post_id'] ) ) { ?>
						<a
								href="<?php echo esc_url( get_the_permalink( $item['post_id'] ) ); ?>"
								class="bc-product__title-link"
						>
							<?php } ?>

							<?php echo esc_html( $item['name'] ); ?>

							<?php if ( ! empty( $item['post_id'] ) ) { ?>
						</a>
					<?php } ?>
				</h3>
				<?php if ( ! empty( $item['options'] ) ) { ?>
					<?php foreach ( $item['options'] as $option ) { ?>
						<span class="bc-cart-item__product-option">
								<span class="bc-cart-item__product-option-label"><?php echo esc_html( sprintf( _x( '%s: ', 'product option label', 'bigcommerce' ), $option['label'] ) ); ?></span>
								<span class="bc-cart-item__product-option-value"><?php echo esc_html( sprintf( _x( '%s', 'product option value', 'bigcommerce' ), $option['value'] ) ); ?></span>
							</span>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="bc-cart-item-meta--bottom">
				<div class="bc-cart-item--qty">
					<?php
						$max = ( 0 >= $item['maximum_quantity'] ) ? '' : $item['maximum_quantity'];
						$min = ( 0 <= $item['minimum_quantity'] ) ? 1 : $item['minimum_quantity'];
						?>
						<label
								for="bc-cart-item__quantity"
								class="u-bc-screen-reader-text"
						><?php esc_html_e( 'Quantity', 'bigcommerce' ); ?></label>

						<!-- data-js="bc-cart-item__quantity" is required -->
						<input
							type="number"
							name="bc-cart-item__quantity"
							class="bc-cart-item__quantity-input"
							data-js="bc-cart-item__quantity" data-cart_item_id="<?php echo esc_attr( $item['id'] ); ?>"
							value="<?php echo intval( $item['quantity'] ); ?>"
							min="<?php echo esc_attr( $min ); ?>"
							max="<?php echo esc_attr( $max ); ?>"
					>
				</div>
				<div class="bc-cart-item--price">
					<?php $price_classes = $item['on_sale'] ? 'bc-cart-item-total-price bc-cart-item--on-sale' : 'bc-cart-item-total-price'; ?>
					<div class="<?php echo esc_attr( $price_classes ); ?>">
						<?php echo esc_html( $item['total_sale_price']['formatted'] ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
