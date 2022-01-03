<?php

/**
 * Template for rendering sub-navigation links
 *
 * @var array[] $links An array of associative arrays of links with 'url', 'label', and 'current' keys
 * @version 1.0.0
 */
$is_active 	= false;
$user = wp_get_current_user();
if ( in_array( 'dealer', (array) $user->roles ) ) {
    $is_active = true;
}
?>
<aside class="bc-subnav">
	<ul class="bc-subnav__list">
		<?php foreach ( $links as $link ) { ?>
			<li class="bc-subnav__list-item <?php echo esc_attr( $link[ 'current' ] ? 'bc-subnav__list-item--current' : '' ); ?>">
				<a class="bc-link bc-subnav__link" href="<?php echo esc_url( $link[ 'url' ] ); ?>" title="<?php echo esc_attr( $link[ 'label' ] ); ?>"><?php echo esc_html( $link[ 'label' ] ); ?></a>
			</li>
		<?php } ?>
		<?php if ($is_active) : ?>
			<li class="bc-subnav__list-item">
				<a class="bc-link bc-subnav__link" href="<?php echo get_site_url(); ?>/dealer-resources/" title="Dealer Resources">Dealer Resources</a>
			</li>
		<?php endif; ?>
	</ul>
</aside>
