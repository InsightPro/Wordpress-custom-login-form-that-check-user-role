<?php
/**
* Template Name: Dealer / SR login
* @var array[] $links An array of associative arrays of links with 'url', 'label', and 'current' keys
* @version 1.0.0
*/

	get_header();
?>
	<main id="site-content" role="main" class="dealer--login-page">
		<h1 class="entry-title has-text-align-center" style="margin-bottom: 15px">Dealer Login</h1>
		<div class="alignwide">
			<p>Logging in for the first time? Or having issues during logging in?</p>
			<p>Please reset your password using the <b>“Forgot your password?”</b> link below.</p>
		</div>
	  <div class="wp-block-columns alignwide">
	    <div id="dealer--login" class="wp-block-column dealer--login">
			<div id="dealer_login_notice" class="dealer_login_notice"><h3><?php echo esc_html( 'You are not allowed to use this login.' )?></h3></div>
			<?php 
				wp_clear_auth_cookie();
				if (isset($_POST['wp-submit'])) {
					$email = $_POST['log'];
					$pass = $_POST['pwd'];
					$user = get_user_by( 'email', $email );
					$user_role = $user->roles[0];
					if ( $user && wp_check_password( $pass, $user->data->user_pass, $user->ID) ) {
					    wp_set_current_user ( $user->ID ); 
					    wp_set_auth_cookie  ( $user->ID ); 
						if ($user_role != NULL) {
							if ($user_role == 'dealer' || $user_role == 'sales_r') {
								$url = site_url( '/account-profile' );
								wp_redirect($url);
							}else{echo "You are not allowed to use this login.";}
						}
					}else {echo "Please check that you have entered your email address and password correctly."; }
				}
		  	?>
	    </div>
	    <div class="wp-block-column is-vertically-aligned-center">
	      <p>Don’t have a dealer account?<br>Fill out our form to request an account.</p>
				<div class="wp-block-buttons button--full">
					<div class="wp-block-button"><a class="wp-block-button__link" href="<?php echo get_site_url(); ?>/become-a-dealer/">Register for account</a></div>
				</div>
	    </div>
	  </div>
	</main>

	

	<form name="loginform" id="loginform" action="" method="post" >
	  <p>Username: <input id="user_login" type="text" size="20" value="" name="log"></p>
	  <p>Password: <input id="user_pass" type="password" size="20" value="" name="pwd"></p>
	  
	  <p><input id="wp-submit" type="submit" value="Login" name="wp-submit"></p>
	  <input type="hidden" value="1" name="testcookie">
	</form>




<?php get_footer(); ?>