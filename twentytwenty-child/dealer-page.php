<?php
/**
* Template Name: Dealer Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();
$post_id = get_the_ID(); //specify post id here
$post = get_post($post_id); 
$slug = $post->post_name;
$is_admin = get_field('is_admin');

$is_active 	= false;
$user = wp_get_current_user();
$valid_roles = [ 'administrator','dealer', 'sales_r' ];
$the_roles = array_intersect( $valid_roles, $user->roles );
  if ( !empty( $the_roles ) ) {
    $is_active = true;
  }
?>

<main id="site-content" role="main" class="dealer--page">

<?php 
if ( is_user_logged_in() && $is_active ) : 
    echo the_title( '<h1 class="entry-title has-text-align-center">', '</h1>' );
?>

    <div class="section-inner <?php if ( $is_admin ) : ?>section-inner--admin<?php endif; ?>">
      <aside class="bc-subnav">
        <ul class="bc-subnav__list">
          <li class="bc-subnav__list-item">
              <a class="bc-link bc-subnav__link" href="<?php echo get_site_url(); ?>/account-profile/" title="Account Profile">Account Profile</a>
          </li>
          <li class="bc-subnav__list-item">
              <a class="bc-link bc-subnav__link" href="<?php echo get_site_url(); ?>/order-history/" title="Order History">Order History</a>
          </li>
          <li class="bc-subnav__list-item">
              <a class="bc-link bc-subnav__link" href="<?php echo get_site_url(); ?>/addresses/" title="Addresses">Addresses</a>
          </li>
          <li class="bc-subnav__list-item">
              <a class="bc-link bc-subnav__link" href="<?php echo get_site_url(); ?>/wish-lists/" title="Wish Lists">Wish Lists</a>
          </li>
          <?php 
            if(!empty( $the_roles[1] || $the_roles[0] )):
          ?>
          <li class="bc-subnav__list-item">
            <a class="bc-link bc-subnav__link" href="<?php echo site_url();?>/sales-representatives/" title="Sales Representatives">Sales Representatives</a>
          </li>
          <li class="bc-subnav__list-item <?php if($slug == 'dealer-resources'){ echo 'bc-subnav__list-item--current';}?>">
              <a class="bc-link bc-subnav__link" href="<?php echo get_site_url(); ?>/dealer-resources/" title="Dealer Resources">Dealer Resources</a>
          </li>
          <?php 
            elseif(!empty( $the_roles[2] || $the_roles[0] )):
          ?>
          <li class="bc-subnav__list-item <?php if($slug == 'direct-ship-order-form'){ echo 'bc-subnav__list-item--current';}?>">
            <a class="bc-link bc-subnav__link" href="<?php echo site_url();?>/direct-ship-order-form/" title="Sales List">Direct Ship Order Form</a>
          </li>
          <li class="bc-subnav__list-item <?php if($slug == 'form-entries'){ echo 'bc-subnav__list-item--current';}?>">
            <a class="bc-link bc-subnav__link" href="<?php echo site_url();?>/form-entries/" title="Sales List">Forms List</a>
          </li>
          <li class="bc-subnav__list-item <?php if($slug == 'dealer-resources'){ echo 'bc-subnav__list-item--current';}?>">
              <a class="bc-link bc-subnav__link" href="<?php echo get_site_url(); ?>/dealer-resources/" title="Dealer Resources">Dealer Resources</a>
          </li>
          <?php endif;?>
        </ul>
      </aside>
      <div class="bc-account-page">
        <?php the_content(); ?>
      </div>
    </div>

<?php else : ?>

    <div class="section-inner">

        <div class="intro-text"><p><?php _e( 'The page you were looking for is only for Dealers. Please login as a Dealer to view this Page', 'twentytwenty' ); ?></p></div>

    </div><!-- .section-inner -->

</main><!-- #site-content -->

<?php endif; ?>

<?php get_footer(); ?>