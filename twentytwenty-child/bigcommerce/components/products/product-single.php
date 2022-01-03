<?php
/**
 * @var Product $product
 * @var string  $images
 * @var string  $title
 * @var string  $brand
 * @var string  $price
 * @var string  $rating
 * @var string  $form
 * @var string  $description
 * @var string  $sku
 * @var string  $specs
 * @var string  $related
 * @var string  $reviews
 * @version 1.0.0
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
<?php
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
	}
?>
<!-- data-js="bc-product-data-wrapper" is required. -->
<section class="bc-product-single__top" data-js="bc-product-data-wrapper">
	<?php echo $images; ?>

	<!-- data-js="bc-product-meta" is required. -->
	<div class="bc-product-single__meta" data-js="bc-product-meta">
		<div class="first-row">
			<?php echo $title; ?>
		</div>
		<div class="second-row second-row-<?php echo $count; ?> <?php echo $custom_class; ?><?php if ( $custom_class == null && $short_desc ) : ?>short-desc<?php endif; ?>">
			<?php echo $form; ?>
		</div>
		<div class="third-row">
			<?php echo $rating; ?>
			<?php echo $price; ?>
		</div>
	</div>
</section>

<!-- product variation description control  -->

<?php 

$current_ID = current( $product );

?>

<section class="bc-single-product__description">
	<?php if ( have_rows('single_variant_details', $current_ID ) ) : 
		while ( have_rows('single_variant_details', $current_ID ) ) : the_row();
		if ( get_row_layout() === 'content' ):
			
		$variant_title 		 = 	get_sub_field('variant_title');
		$variant_description =  get_sub_field('single_variant_description');
		$variant_ingredients =  get_sub_field('single_variant_ingredients');
		$variant_htui 		 =  get_sub_field('single_variant_htui');
	?>
		<div class="bc-single-variant__details <?php if ( get_row_index() === 1 ) : ?>active<?php endif; ?>" id="<?php echo (str_replace(' ', '-', strtolower($variant_title))); ?>">
			<?php if ( $variant_description ) : ?>
				<div class="bc-single-variant__description full-width" <?php if ( $variant_description['description_image'] ) : ?>style="background-image:url('<?php echo esc_url( $variant_description['description_image']['url'] ); ?>')"<?php else : ?>style="background-image: url('https://wordpress-497380-1572773.cloudwaysapps.com/wp-content/uploads/2020/09/product-image-description-homeproducts.jpg')"<?php endif; ?>>
					<?php if ( $variant_description['description_content'] ) : ?>
						<div class="bc-single-variant__description-content">
							<h4 class="bc-single-product__section-title"><?php echo esc_html__( 'Description', 'bigcommerce' ); ?></h4>
							<?php echo $variant_description['description_content']; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( $variant_ingredients['ingredients_top_text'] ) : ?>
				<div class="bc-single-variant__ingredients-top full-width">
					<h4 class="bc-single-product__section-title"><?php echo esc_html__( 'Ingredients', 'bigcommerce' ); ?></h4>
					<p><?php echo $variant_ingredients['ingredients_top_text']; ?></p>
				</div>
			<?php endif; ?>

			<?php if ( have_rows('made_with') ) : ?>
				<ul class="made-with--list">
					<?php while ( have_rows('made_with') ) : the_row(); 
						$made_with_image = get_sub_field('made_with_image');
					?>
					<li>
						<a href="#" class="made-with--list-box">
							<?php if ( $made_with_image ) : ?>
								<img src="<?php echo esc_url( $made_with_image['url'] ); ?>" alt="<?php echo esc_url( $made_with_image['alt'] ); ?>">
							<?php endif; ?>
						</a>
					</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
					

			<?php if ( $variant_ingredients['single_variant_image'] ) : ?>
				<img class="bc-single-variant__ingredients-image" src="<?php echo esc_url( $variant_ingredients['single_variant_image']['url'] ); ?>" alt="<?php echo esc_url( $variant_ingredients['single_variant_image']['alt'] ); ?>">
			<?php else: ?>
				<img class="bc-single-variant__ingredients-image" src="<?php echo get_the_post_thumbnail_url( get_the_ID() ); ?>" alt="<?php echo $variant_title; ?>">
			<?php endif; ?>
			
			<?php if ( $variant_ingredients['ingredients_bottom_text'] && !$variant_ingredients['show_bottom_text_in_column'] ) : ?>
				<div class="bc-single-variant__ingredients-bottom">
					<?php echo $variant_ingredients['ingredients_bottom_text']; ?>
				</div>
			<?php endif; ?>

			<?php if ( $variant_ingredients['show_bottom_text_in_column'] ) : ?>
				<?php
					$repeaters =  $variant_ingredients['ingredients_bottom_text_colum'];
				?>
					<div class="bc-single-variant__ingredients-bottom flex-group">
						<?php foreach ( $repeaters as $repeater ) : ?>
							<div class="bc-single-variant__ingredients-bottom-text-card">
								<?php echo $repeater['each_column_text']; ?>
							</div>
						<?php endforeach; ?>
					</div>
			<?php endif; ?>

			<?php if ( $variant_htui ) : ?>
				<div class="bc-single-variant__hw full-width">
					<div class="bc-single-variant__hw-content">
						<h4 class="bc-single-product__section-title"><?php echo esc_html__( 'How to use', 'bigcommerce' ); ?></h4>
						<?php echo $variant_htui; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>	
	<?php endif; endwhile; endif; ?>
</section>

<?php echo $reviews; ?>

<?php echo $related; ?>
