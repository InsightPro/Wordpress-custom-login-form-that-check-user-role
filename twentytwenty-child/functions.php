<?php
// include shortcode
require get_stylesheet_directory() . '/custom-gravity-shortcode/shortcode.php';

//  PGI BigCommerce Card
function pgi_get_product_card( $id = null ) {
	
	if ( is_null( $id ) ) {
		$id = get_the_ID();
	}
	$product = new \BigCommerce\Post_Types\Product\Product( $id );
	$card    = new \BigCommerce\Templates\Product_Card( [
		'product' => $product,
	] );

	return $card->render();

}

//  enqueue scripts and styles

add_action( 'wp_enqueue_scripts', 'enqueue_styles_scripts' );

function enqueue_styles_scripts() {

	// flickity

	wp_enqueue_style('flickity-style', get_stylesheet_directory_uri() . '/vendor/flickity/flickity.min.css', array(), wp_get_theme()->get( 'Version' ), 'all');
	wp_enqueue_script('flickity-script', get_stylesheet_directory_uri() . '/vendor/flickity/flickity.pkgd.min.js', false, wp_get_theme()->get( 'Version' ), true);

	// child script
	wp_enqueue_script('child-script', get_stylesheet_directory_uri() . '/child-script.js', array('jquery'), '1.0.1', true);


	if ( is_home() || is_category() ) {
		wp_enqueue_style('blog-page-css', get_stylesheet_directory_uri() . '/files-for-pages/blog-page-style.css', array(),  wp_get_theme()->get( 'Version' ), 'all');
		wp_enqueue_script('blog-page-script', get_stylesheet_directory_uri() . '/files-for-pages/blog-page-script.js', array('jquery'), '1.0.1', true);
	}

	if ( is_singular( 'bigcommerce_product' ) ) {
		wp_enqueue_style('product-page-css', get_stylesheet_directory_uri() . '/files-for-pages/product-page-style.css', array(),  wp_get_theme()->get( 'Version' ), 'all');

		wp_enqueue_script('product-page-script', get_stylesheet_directory_uri() . '/files-for-pages/product-page-script.js', array('jquery'), '1.0.1', true);
	}

	if ( is_singular( 'post' ) ) {
		wp_enqueue_style('single-post-css', get_stylesheet_directory_uri() . '/files-for-pages/single-post.css', array(),  wp_get_theme()->get( 'Version' ), 'all');
		wp_enqueue_script('single-post-js', get_stylesheet_directory_uri() . '/files-for-pages/single-post.js', array(), '1.0.1', true);
	}

	if ( is_page( 'employment-application' ) ) {
		wp_enqueue_style('emp-style', get_stylesheet_directory_uri() . '/files-for-pages/employment-style.css', array(),  wp_get_theme()->get( 'Version' ), 'all');
		wp_enqueue_script('emp-script', get_stylesheet_directory_uri() . '/files-for-pages/employment-script.js', array(), '1.0.1', true);
	}

	if ( is_page( 'test-assessment' ) ) {
		wp_enqueue_style('assessment-style', get_stylesheet_directory_uri() . '/files-for-pages/assessment-test.css', array(),  wp_get_theme()->get( 'Version' ), 'all');
		wp_enqueue_script('assessment-script', get_stylesheet_directory_uri() . '/files-for-pages/assessment-test.js', array(), '1.0.1', true);
	}

	if ( is_page_template('dealer-login.php') ) {
		wp_enqueue_style('dealer-login-style', get_stylesheet_directory_uri() . '/files-for-pages/dealer-login-page.css', array(),  wp_get_theme()->get( 'Version' ), 'all');
	}

	wp_enqueue_script('main-script', get_stylesheet_directory_uri() . '/files-for-pages/main.js', array(), '1.0.1', true);

}

// degister files 

add_action( 'wp_enqueue_scripts', 'deregister_files', 1000 );

function deregister_files() {
	// deregister main theme js file

	wp_deregister_script( 'twentytwenty-js' );
}

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function twentytwenty_child_menus() {

	$locations = array(
		'left_menu'  => __( 'Logo Left Menu', 'twentytwenty' ),
		'right_menu' => __( 'Logo Right Menu', 'twentytwenty' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'twentytwenty_child_menus' );

// Theme Option Page

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function twentytwenty_child_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h6 class="widget-title subheading heading-size-6">',
		'after_title'   => '</h6>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #1', 'twentytwenty' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #2.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #2', 'twentytwenty' ),
				'id'          => 'sidebar-2',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #3.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #3', 'twentytwenty' ),
				'id'          => 'sidebar-3',
				'description' => __( 'Widgets in this area will be displayed in the Third column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #4.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #4', 'twentytwenty' ),
				'id'          => 'sidebar-4',
				'description' => __( 'Widgets in this area will be displayed in the Fourth column in the footer.', 'twentytwenty' ),
			)
		)
	);

	// Footer #5.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer #5', 'twentytwenty' ),
				'id'          => 'sidebar-5',
				'description' => __( 'Widgets in this area will be displayed in the Five column in the footer.', 'twentytwenty' ),
			)
		)
	);

}

add_action( 'widgets_init', 'twentytwenty_child_sidebar_registration', 15 );


// Custom Gutenberg Block with ACF

function register_acf_block_types() {

	// register curve banner block.
	acf_register_block_type(array(
			'name'              => 'curve-banner-block',
			'title'             => __('Curve Banner Block', 'twentytwenty'),
			'description'       => __('Banner Image with Curve Shape.', 'twentytwenty'),
			'render_template'   => 'template-parts/blocks/curve-banner-block/curve-banner-block.php',
			'category'          => 'layout',
			'icon'              => 'welcome-widgets-menus',
			'keywords'          => array( 'banner', 'custom' ),
			'enqueue_style'		=> get_stylesheet_directory_uri() . '/template-parts/blocks/curve-banner-block/curve-banner-block.css',
			'supports'			=> array(
				'align' 		=> array('wide', 'full')
			)
	));

	// register a custom media text block.
	acf_register_block_type(array(
		'name'              => 'custom-media-text-block',
		'title'             => __('Custom Media with Text Block', 'twentytwenty'),
		'description'       => __('Media with text having background color', 'twentytwenty'),
		'render_template'   => 'template-parts/blocks/custom-media-text-block/custom-media-text-block.php',
		'category'          => 'layout',
		'icon'              => 'align-pull-left',
		'keywords'          => array( 'media', 'text', 'background' ),
		'enqueue_style'	  	=> get_stylesheet_directory_uri() . '/template-parts/blocks/custom-media-text-block/custom-media-text-block.css',
		'supports'			=> array(
		   'align' 			=> array('wide', 'full')
		)
	));
	  
	// register a custom tab block.
	acf_register_block_type(array(
		'name'              => 'custom-tab-block',
		'title'             => __('Custom Tab', 'twentytwenty'),
		'description'       => __('Custom Tab Navigation with slider enable', 'twentytwenty'),
		'render_template'   => 'template-parts/blocks/custom-tab-block/custom-tab-block.php',
		'category'          => 'layout',
		'icon'              => 'welcome-widgets-menus',
		'keywords'          => array( 'media', 'text', 'background' ),
		'enqueue_style'	  	=> get_stylesheet_directory_uri() . '/template-parts/blocks/custom-tab-block/custom-tab-block.css',
		'supports'			=> array(
			'align' 		=> array('wide', 'full')
		)
	));

	// register a custom tab block.
	acf_register_block_type(array(
		'name'              => 'testimonial-block',
		'title'             => __('Testimonial Block', 'twentytwenty'),
		'description'       => __('Testimonial Block with slider enable', 'twentytwenty'),
		'render_template'   => 'template-parts/blocks/testimonial-block/testimonial-block.php',
		'category'          => 'layout',
		'icon'              => 'welcome-learn-more',
		'keywords'          => array( 'media', 'text', 'background' ),
		'enqueue_style'	  	=> get_stylesheet_directory_uri() . '/template-parts/blocks/testimonial-block/testimonial-block.css',
		'supports'			=> array(
			'align' 		=> array('wide', 'full')
		)
	));

	// register product custom block
	acf_register_block_type(array(
		'name'              => 'product-carousel-block',
		'title'             => __('Product Carousel Block', 'twentytwenty'),
		'description'       => __('Product with slider enable', 'twentytwenty'),
		'render_template'   => 'template-parts/blocks/product-carousel/product-carousel.php',
		'category'          => 'layout',
		'icon'              => 'welcome-widgets-menus',
		'keywords'          => array( 'media', 'text', 'background' ),
		'enqueue_style'	  	=> get_stylesheet_directory_uri() . '/template-parts/blocks/product-carousel/product-carousel.css',
		'supports'			=> array(
			'align' 		=> array('wide', 'full')
		)
	));

	// register post carousel block
	acf_register_block_type(array(
		'name'              => 'post-carousel-block',
		'title'             => __('Post Carousel Block', 'twentytwenty'),
		'description'       => __('Post Carousel Block with Flickity', 'twentytwenty'),
		'render_template'   => 'template-parts/blocks/post-carousel-block/post-carousel-block.php',
		'category'          => 'layout',
		'icon'              => 'welcome-widgets-menus',
		'keywords'          => array( 'media', 'text', 'background' ),
		'enqueue_style'	  	=> get_stylesheet_directory_uri() . '/template-parts/blocks/post-carousel-block/post-carousel-block.css',
		'supports'			=> array(
			'align' 		=> array('wide', 'full')
		)
	));

	// register gallery block

	acf_register_block_type(array(
		'name'              => 'gallery-block',
		'title'             => __('Image Gallery Block', 'twentytwenty'),
		'description'       => __('Custom Image Gallery Block with link and slider option', 'twentytwenty'),
		'render_template'   => 'template-parts/blocks/gallery-block/gallery-block.php',
		'category'          => 'layout',
		'icon'              => 'format-gallery',
		'keywords'          => array( 'media', 'link', 'gallery' ),
		'enqueue_style'	  	=> get_stylesheet_directory_uri() . '/template-parts/blocks/gallery-block/gallery-block.css',
		'enqueue_script'	=> get_stylesheet_directory_uri() . '/template-parts/blocks/gallery-block/gallery-block.js',
		'supports'			=> array(
			'align' 		=> array('wide', 'full')
		)
	));

	acf_register_block_type(array(
		'name'              => 'scents-block',
		'title'             => __('Scents Block', 'twentytwenty'),
		'description'       => __('Custom Scents Profile Block', 'twentytwenty'),
		'render_template'   => 'template-parts/blocks/scents-block/scents-block.php',
		'category'          => 'layout',
		'icon'              => 'format-gallery',
		'keywords'          => array( 'media', 'link', 'gallery' ),
		'enqueue_style'	  	=> get_stylesheet_directory_uri() . '/template-parts/blocks/scents-block/scents-block.css',
		'enqueue_script'	=> get_stylesheet_directory_uri() . '/template-parts/blocks/scents-block/scents-block.js',
		'supports'			=> array(
			'align' 		=> array('wide', 'full')
		)
	));
}

if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}

add_filter('acf/fields/flexible_content/layout_title/name=single_variant_details', 'my_acf_fields_flexible_content_layout_title', 10, 4);
function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

    // Remove layout name from title.
    $title = '';

    // load text sub field
    if( $text = get_sub_field('variant_title') ) {
        $title .= '<b>' . esc_html($text) . '</b>';
    }
    return $title;
}


// fix Gutenberg Style

add_action('admin_head', 'lf_fix_gutenberg_style');

function lf_fix_gutenberg_style() {
?>
  <style>

	.interface-interface-skeleton__sidebar {
		flex-basis: 25%;
	}

	.interface-complementary-area {
		width: 100%;
	}

  </style>
<?php 
}

// excule sticky post

function exclude_sticky_post( $query ) {
	$sticky = get_option( 'sticky_posts' );
	if ( is_home() && $query->is_main_query() || is_category() && $query->is_main_query() ) {
		$query->set ( 'post__not_in', $sticky );
		$query->set ( 'posts_per_page', 9 );
	}
}

add_action ( 'pre_get_posts', 'exclude_sticky_post' );

// hide admin bar for customer


function hide_admin_bar( $show ) {

	$user = wp_get_current_user();
	$allowed_roles = array( 'editor', 'administrator', 'author', 'contributor' );
	if ( !array_intersect( $allowed_roles, $user->roles ) ) {
		return false;
	}
	return $show;
}
add_filter( 'show_admin_bar', 'hide_admin_bar' );

//  redirect user to account profile page
// function custom_redirect( $redirect_to, $request, $user ) {
// 	$url = home_url( '/account-profile/' );

// 	return $url;
// }

// apply_filters( 'login_redirect', 'custom_redirect', 10, 3);

// custom validation message for only subscription form

add_filter("gform_field_validation", "change_message", 10, 4);
function change_message($result, $value, $form, $field){
	if ( $value == null ) {
		$result['message'] = 'ERROR: This field is required.';
	} 
	if ( ! $result['is_valid'] && $field->get_input_type() === 'email' && GFCommon::is_valid_email_list( $value ) ) {
		$result['message'] = 'ERROR: This field requires a unique entry and '. $value . ' has already been used';
	}

	return $result;
}

// start gravity form progress from zero

add_filter( 'gform_progressbar_start_at_zero', '__return_true' );



//Disable the new user notification sent to the site admin



// adding custom user role for dealer

function update_custom_roles() {
    if ( get_option( 'custom_roles_version' ) < 1 ) {
        add_role( 'dealer', 'Dealer', array( 'read' => true, 'level_0' => true ) );
        update_option( 'custom_roles_version', 1 );
    }
}
add_action( 'init', 'update_custom_roles' );


/**
 * Remove the slug from published post permalinks. Only affect our custom post type, though.
 */
function gp_remove_cpt_slug( $post_link, $post ) {

    if ( 'bigcommerce_product' === $post->post_type && 'publish' === $post->post_status ) {
        $post_link = str_replace( '/products/', '/', $post_link );
    }

    return $post_link;
}
add_filter( 'post_type_link', 'gp_remove_cpt_slug', 10, 2 );

/**
 * Have WordPress match postname to any of our public post types (post, page, race).
 * All of our public post types can have /post-name/ as the slug, so they need to be unique across all posts.
 * By default, WordPress only accounts for posts and pages where the slug is /post-name/.
 *
 * @param $query The current query.
 */
function gp_add_cpt_post_names_to_main_query( $query ) {

	// Bail if this is not the main query.
	if ( ! $query->is_main_query() ) {
		return;
	}

	// Bail if this query doesn't match our very specific rewrite rule.
	if ( ! isset( $query->query['page'] ) || 2 !== count( $query->query ) ) {
		return;
	}

	// Bail if we're not querying based on the post name.
	if ( empty( $query->query['name'] ) ) {
		return;
	}

	// Add CPT to the list of post types WP will include when it queries based on the post name.
	$query->set( 'post_type', array( 'post', 'page', 'bigcommerce_product', 'bigcommerce_category' ) );
}
add_action( 'pre_get_posts', 'gp_add_cpt_post_names_to_main_query' );


add_filter('request', 'rudr_change_term_request', 1, 1 );
 
function rudr_change_term_request($query){
 
	$tax_name = 'bigcommerce_category'; // specify you taxonomy name here, it can be also 'category' or 'post_tag'
 
	// Request for child terms differs, we should make an additional check
	if( $query['attachment'] ) :
		$include_children = true;
		$name = $query['attachment'];
	else:
		$include_children = false;
		$name = $query['name'];
	endif;
 
 
	$term = get_term_by('slug', $name, $tax_name); // get the current term to make sure it exists
 
	if (isset($name) && $term && !is_wp_error($term)): // check it here
 
		if( $include_children ) {
			unset($query['attachment']);
			$parent = $term->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $tax_name);
				$name = $parent_term->slug . '/' . $name;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}
 
		switch( $tax_name ):
			case 'category':{
				$query['category_name'] = $name; // for categories
				break;
			}
			case 'post_tag':{
				$query['tag'] = $name; // for post tags
				break;
			}
			default:{
				$query[$tax_name] = $name; // for another taxonomies
				break;
			}
		endswitch;
 
	endif;
 
	return $query;
 
}
 
 
add_filter( 'term_link', 'rudr_term_permalink', 10, 3 );
 
function rudr_term_permalink( $url, $term, $taxonomy ){
 
	$taxonomy_name = 'bigcommerce_category'; // your taxonomy name here
	$taxonomy_slug = '/products/categories/'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' )
 
	// exit the function if taxonomy slug is not in URL
	if ( strpos($url, $taxonomy_slug) === FALSE || $taxonomy != $taxonomy_name ) return $url;
 
	$url = str_replace('/' . $taxonomy_slug, '', $url);
 
	return $url;
}

add_action('template_redirect', 'rudr_old_term_redirect');
 
function rudr_old_term_redirect() {
 
	$taxonomy_name = 'bigcommerce_category';
	$taxonomy_slug = '/products/categories/';
 
	// exit the redirect function if taxonomy slug is not in URL
	if( strpos( $_SERVER['REQUEST_URI'], $taxonomy_slug ) === FALSE)
		return;
 
	if( ( is_category() && $taxonomy_name=='category' ) || ( is_tag() && $taxonomy_name=='post_tag' ) || is_tax( $taxonomy_name ) ) :
 
        	wp_redirect( site_url( str_replace($taxonomy_slug, '', $_SERVER['REQUEST_URI']) ), 301 );
		exit();
 
	endif;
 
}