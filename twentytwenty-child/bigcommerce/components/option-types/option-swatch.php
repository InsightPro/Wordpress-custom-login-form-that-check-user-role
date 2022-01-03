<?php
/**
 * Display the fields to select options for a product
 *
 * @var string  $id
 * @var string  $label
 * @var array[] $options
 * @var bool    $required
 * @version 1.0.0
 */

$selected_option_name = "Choose Your Fragrance";

foreach ( $options as $option ) {
	if ( $option['is_default'] ) {
		$selected_option_name = esc_html($option['label']);
	}
} 
?>
<!-- class="bc-product-form__control bc-product-form__control--swatch" is required -->
<div class="option-bg"></div>
<div class="mobile-option--swatch">
	<?php foreach ( $options as $key => $option ) : 
		if ( $key === 0 ) : 
	?>
		<div class="option-default--wrapper">
			<div class="option-default--wrapper-patter-box">
			<?php if ( $option[ 'type' ] == 'image' ) { ?>
				<span style="background-image: url(<?php echo esc_url( $option[ 'src' ] ); ?>);"></span>
			<?php } elseif ( $option[ 'type' ] == '3-color' ) {
				$gradient = sprintf( '45deg, %1$s 0%%, %1$s 34%%, %2$s 34%%, %2$s 66%%, %3$s 66%%, %3$s 100%%', esc_attr( $option[ 'colors' ][ 0 ] ), esc_attr( $option[ 'colors' ][ 1 ] ), esc_attr( $option[ 'colors' ][ 2 ] ) );
				?>
				<span style="background: linear-gradient(<?php echo $gradient; ?>)">
				</span>
			<?php } elseif ( $option[ 'type' ] == '2-color' ) {
				$gradient = sprintf( '45deg, %1$s 0%%, %1$s 50%%, %2$s 50%%, %2$s 100%%', esc_attr( reset( $option[ 'colors' ] ) ), esc_attr( end( $option[ 'colors' ] ) ) );
				?>
				<span style="background: linear-gradient(<?php echo $gradient; ?>)"></span>
			<?php } elseif ( $option[ 'type' ] == '1-color' ) { ?>
				<span style="background-color: <?php echo esc_attr( reset( $option[ 'colors' ] ) ); ?>;"></span>
			<?php } ?>
			</div>
			<div class="option-default--wrapper-text">
				<span><?php echo esc_html( $label ); ?></span>
				<span class="option-name"><?php echo $selected_option_name; ?></span>
			</div>
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="24" viewBox="0 0 22 24">
				<path fill="#252825" d="M0 6c0-0.128 0.049-0.256 0.146-0.354 0.195-0.195 0.512-0.195 0.707 0l8.646 8.646 8.646-8.646c0.195-0.195 0.512-0.195 0.707 0s0.195 0.512 0 0.707l-9 9c-0.195 0.195-0.512 0.195-0.707 0l-9-9c-0.098-0.098-0.146-0.226-0.146-0.354z"></path>
			</svg>
		</div>
	<?php endif; endforeach; ?>
</div>
<div id="option-<?php echo esc_attr( $id ); ?>" class="bc-product-form__control bc-product-form__control--swatch">
	<div class="mobile-swatch--close">
		<svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><polygon fill="" fill-rule="evenodd" points="6.852 7.649 .399 1.195 1.445 .149 7.899 6.602 14.352 .149 15.399 1.195 8.945 7.649 15.399 14.102 14.352 15.149 7.899 8.695 1.445 15.149 .399 14.102"></polygon></svg>
	</div>
	<div class="bc-form__label-wrapper">
	<span class="bc-form__label bc-product-form__option-label"><?php echo esc_html( $label ); ?>:</span>
	<small><?php echo $selected_option_name; ?></small>
	</div>
	<!-- data-js="product-form-option" and data-field="product-form-option-radio" are required -->
	<div class="bc-product-form__option-variants--inline" data-js="product-form-option" data-field="product-form-option-radio">
		<?php foreach ( $options as $key => $option ) { ?>

			<input type="radio"
			       name="option[<?php echo esc_attr( $id ); ?>]"
			       data-option-id="<?php echo esc_attr( $id ); ?>"
			       data-js="bc-product-option-field"
			       id="option--<?php echo esc_attr( $option['id'] ); ?>"
				   value="<?php echo esc_attr( $option['id'] ); ?>"
				   data-option-name="<?php echo esc_html( $option[ 'label' ] ); ?>"
			       class="u-bc-visual-hide bc-product-variant__radio--hidden"
				<?php if ( 0 === $key && $required ) {?>
					required="required"
				<?php } ?>
				<?php checked( $option['is_default'] ); ?> />

			<label for="option--<?php echo esc_attr( $option[ 'id' ] ); ?>" class="bc-product-variant__label">
				<?php if ( $option[ 'type' ] == 'image' ) { ?>
					<span class="bc-product-variant__label--swatch bc-product-variant__label--image"
								style="background-image: url(<?php echo esc_url( $option[ 'src' ] ); ?>);">
					</span>
				<?php } elseif ( $option[ 'type' ] == '3-color' ) {
					$gradient = sprintf( '45deg, %1$s 0%%, %1$s 34%%, %2$s 34%%, %2$s 66%%, %3$s 66%%, %3$s 100%%', esc_attr( $option[ 'colors' ][ 0 ] ), esc_attr( $option[ 'colors' ][ 1 ] ), esc_attr( $option[ 'colors' ][ 2 ] ) );
					?>
					<span class="bc-product-variant__label--swatch bc-product-variant__label--3-color"
								style="background: linear-gradient(<?php echo $gradient; ?>)">
					</span>
				<?php } elseif ( $option[ 'type' ] == '2-color' ) {
					$gradient = sprintf( '45deg, %1$s 0%%, %1$s 50%%, %2$s 50%%, %2$s 100%%', esc_attr( reset( $option[ 'colors' ] ) ), esc_attr( end( $option[ 'colors' ] ) ) );
					?>
					<span class="bc-product-variant__label--swatch bc-product-variant__label--2-color"
								style="background: linear-gradient(<?php echo $gradient; ?>)">
					</span>
				<?php } elseif ( $option[ 'type' ] == '1-color' ) { ?>
					<span class="bc-product-variant__label--swatch bc-product-variant__label--1-color"
								style="background-color: <?php echo esc_attr( reset( $option[ 'colors' ] ) ); ?>;">
					</span>
				<?php } ?>
				<span class="bc-product-variant__label-text"><?php echo esc_html( $option[ 'label' ] ); ?></span>
			</label>

		<?php } ?>
	</div>
</div>
