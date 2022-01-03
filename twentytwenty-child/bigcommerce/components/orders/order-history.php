<?php
/**
 * Template for the order history page/shortcode
 *
 * @var string[] $orders Rendered order objects
 * @var string   $pagination
 * @var bool     $wrap
 * @version 1.0.0
 */

$is_active 	= false;
$user = wp_get_current_user();
if ( in_array( 'dealer', (array) $user->roles ) ) {
    $is_active = true;
} else if ( in_array( 'administrator', (array) $user->roles ) ) {
    $is_active = true;
}
?>

<?php if ( $wrap ) { ?>
<!-- class="bc-load-items" is required -->
	<div class="bc-load-items bc-shortcode-order-list-wrapper">
	<?php if ( $is_active ) : ?>
		<p style="color: #409e71; font-weight: 400; font-size: 24px;">This feature is coming in full in Phase 2, estimated timeline July 2021.<br/> Thank you for your patience as we work for a fully optimized digital experience.</p>
	<?php endif; ?>
	<?php if ( ! empty( $pagination ) ) { ?>
		<!-- class="bc-load-items__loader" is required -->
		<div class="bc-load-items__loader"></div>
	<?php } ?>
	<!-- classs="bc-load-items-container" and the conditional class "bc-load-items-container--has-pages are required -->
	<ul class="bc-order-list bc-load-items-container <?php echo( ! empty( $pagination ) ? esc_attr( 'bc-load-items-container--has-pages' ) : '' ); ?>">
<?php } ?>

<?php foreach ( $orders as $order ) { ?>
	<li class="bc-order-list__item">
		<?php echo $order; ?>
	</li>
<?php } ?>

<?php echo $pagination; ?>

<?php if ( $wrap ) { ?>
	</ul>
	</div>
<?php } ?>