<?php
/**
* Template Name: Dealer Login Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();

  $is_admin = get_field('is_admin');

  $is_active 	= false;
  $user = wp_get_current_user();
  if ( in_array( 'dealer', (array) $user->roles ) ) {
      $is_active = true;
  }

?>

<main id="site-content" role="main" class="dealer--login-page">

<?php 
if ( !$is_active ) : 
    echo the_title( '<h1 class="entry-title has-text-align-center" style="margin-bottom: 15px">', '</h1>' );
?>
    <div class="alignwide">
        <p>Logging in for the first time? Or having issues during logging in?</p>
        <p>Please reset your password using the <b>“Forgot your password?”</b> link below.</p>
    </div>
    <div class="wp-block-columns alignwide">
        <div class="wp-block-column dealer--login">
            <?php echo do_shortcode( '[gravityform action="login" title="false" description="false" login_redirect="/account-profile/" registration_link_display="false"/]' ); ?>
        </div>
        <div class="wp-block-column is-vertically-aligned-center">
        <p>Don’t have a dealer account?<br>Fill out our form to request an account.</p>
            <div class="wp-block-buttons button--full">
                <div class="wp-block-button"><a class="wp-block-button__link" href="<?php echo get_site_url(); ?>/become-a-dealer/">Register for account</a></div>
            </div>
        </div>
    </div>

<?php else : ?>

    <div class="section-inner">
      <div class="intro-text"><p>You are already Logged in as a Dealer, Please visit your profile page from <a href="<?php echo get_site_url(); ?>/account-profile/">here.</a></p></div>
    </div><!-- .section-inner -->

</main><!-- #site-content -->

<?php endif; ?>

<?php get_footer(); ?>