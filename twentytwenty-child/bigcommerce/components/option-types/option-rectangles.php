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

$selected_option_name = "Choose Your Size";

foreach ( $options as $option ) {
	if ( $option['is_default'] ) {
		$selected_option_name = esc_html($option['label']);
	}
} 

?>

<!-- class="bc-product-form__control bc-product-form__control--rectangle" is required -->
<div id="option-<?php echo esc_attr( $id ); ?>" class="bc-product-form__control bc-product-form__control--rectangle">
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
				   data-option-name="<?php echo esc_html( $option[ 'label' ] ); ?>"
			       value="<?php echo esc_attr( $option['id'] ); ?>"
			       class="u-bc-visual-hide bc-product-variant__radio--hidden"
				<?php if ( 0 === $key && $required ) {?>
					required="required"
				<?php } ?>
				<?php checked( $option['is_default'] ); ?> />

			<label for="option--<?php echo esc_attr( $option['id'] ); ?>" class="bc-product-variant__label">
				<span class="bc-product-variant__label--rectangle">
					<?php echo esc_html( $option['label'] ); ?>
				</span>
			</label>

		<?php } ?>
	</div>
</div>
