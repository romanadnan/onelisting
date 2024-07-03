<?php
/**
 * @author  wpWax
 * @since   1.0
 * @version 1.0
 */

use wpWax\OneListing\Helper;
use wpWax\OneListing\Theme;

if ( is_user_logged_in() || atbdp_is_page( 'login' ) || atbdp_is_page( 'registration' ) ) {
	return;
}

if ( empty( Theme::$options['header_account'] ) ) {
	return;
}

if ( atbdp_is_page( 'add_listing' ) && get_directorist_option( 'guest_listings' ) ) {
	return;
}

wp_enqueue_script( 'directorist-account' );

$user_type = ! empty( $atts['user_type'] ) ? $atts['user_type'] : '';
$user_type = ! empty( $_REQUEST['user_type'] ) ? $_REQUEST['user_type'] : $user_type;

$login_args = [
	'log_username'          => get_directorist_option( 'log_username', __( 'Username or Email Address', 'onelisting' ) ),
	'log_password'          => get_directorist_option( 'log_password', __( 'Password', 'onelisting' ) ),
	'display_rememberMe'    => get_directorist_option( 'display_rememberme', 1 ),
	'log_rememberMe'        => get_directorist_option( 'log_rememberme', __( 'Remember Me', 'onelisting' ) ),
	'log_button'            => get_directorist_option( 'log_button', __( 'Log In', 'onelisting' ) ),
	'display_recpass'       => get_directorist_option( 'display_recpass', 1 ),
	'recpass_text'          => get_directorist_option( 'recpass_text', __( 'Recover Password', 'onelisting' ) ),
	'recpass_desc'          => get_directorist_option( 'recpass_desc', __( 'Lost your password? Please enter your email address. You will receive a link to create a new password via email.', 'onelisting' ) ),
	'recpass_username'      => get_directorist_option( 'recpass_username', __( 'E-mail:', 'onelisting' ) ),
	'recpass_placeholder'   => get_directorist_option( 'recpass_placeholder', __( 'eg. mail@example.com', 'onelisting' ) ),
	'recpass_button'        => get_directorist_option( 'recpass_button', __( 'Get New Password', 'onelisting' ) ),
	'reg_text'              => get_directorist_option( 'reg_text', __( "Don't have an account?", 'onelisting' ) ),
	'reg_url'               => ATBDP_Permalink::get_registration_page_link(),
	'reg_linktxt'           => get_directorist_option( 'reg_linktxt', __( 'Sign Up', 'onelisting' ) ),
	'display_signup'        => get_directorist_option( 'display_signup', 1 ),
	'new_user_registration' => get_directorist_option( 'new_user_registration', true ),
];

$reg_args = [
	'parent'               => 0,
	'container_fluid'      => is_directoria_active() ? 'container' : 'container-fluid',
	'username'             => get_directorist_option( 'reg_username', __( 'Username', 'onelisting' ) ),
	'password'             => get_directorist_option( 'reg_password', __( 'Password', 'onelisting' ) ),
	'display_password_reg' => get_directorist_option( 'display_password_reg', 1 ),
	'require_password'     => get_directorist_option( 'require_password_reg', 1 ),
	'email'                => get_directorist_option( 'reg_email', __( 'Email', 'onelisting' ) ),
	'display_website'      => get_directorist_option( 'display_website_reg', 0 ),
	'website'              => get_directorist_option( 'reg_website', __( 'Website', 'onelisting' ) ),
	'require_website'      => get_directorist_option( 'require_website_reg', 0 ),
	'display_fname'        => get_directorist_option( 'display_fname_reg', 0 ),
	'first_name'           => get_directorist_option( 'reg_fname', __( 'First Name', 'onelisting' ) ),
	'require_fname'        => get_directorist_option( 'require_fname_reg', 0 ),
	'display_lname'        => get_directorist_option( 'display_lname_reg', 0 ),
	'last_name'            => get_directorist_option( 'reg_lname', __( 'Last Name', 'onelisting' ) ),
	'require_lname'        => get_directorist_option( 'require_lname_reg', 0 ),
	'display_bio'          => get_directorist_option( 'display_bio_reg', 0 ),
	'bio'                  => get_directorist_option( 'reg_bio', __( 'About/bio', 'onelisting' ) ),
	'require_bio'          => get_directorist_option( 'require_bio_reg', 0 ),
	'reg_signup'           => get_directorist_option( 'reg_signup', __( 'Sign Up', 'onelisting' ) ),
	'display_login'        => get_directorist_option( 'display_login', 1 ),
	'login_text'           => get_directorist_option( 'login_text', __( 'Already have an account? Please login', 'onelisting' ) ),
	'login_url'            => ATBDP_Permalink::get_login_page_link(),
	'log_linkingmsg'       => get_directorist_option( 'log_linkingmsg', __( 'Here', 'onelisting' ) ),
	'terms_label'          => get_directorist_option( 'regi_terms_label', __( 'I agree with all', 'onelisting' ) ),
	'terms_label_link'     => get_directorist_option( 'regi_terms_label_link', __( 'terms & conditions', 'onelisting' ) ),
	't_C_page_link'        => ATBDP_Permalink::get_terms_and_conditions_page_url(),
	'privacy_page_link'    => ATBDP_Permalink::get_privacy_policy_page_url(),
	'privacy_label'        => get_directorist_option( 'registration_privacy_label', __( 'I agree to the', 'onelisting' ) ),
	'privacy_label_link'   => get_directorist_option( 'registration_privacy_label_link', __( 'Privacy & Policy', 'onelisting' ) ),
	'user_type'            => $user_type,
	'author_checked'       => ( 'general' !== $user_type ) ? 'checked' : '',
	'general_checked'      => ( 'general' === $user_type ) ? 'checked' : '',
];

$redirect_to = get_directorist_option( 'redirection_after_login', 'previous_page' );

if( 'previous_page' == $redirect_to ): ?>
	<script>
		<?php
			$protocol =  (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		?>
		var currentUrl = '<?php echo $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>';
		var redirect_url = new URL(currentUrl);
		redirect_url.searchParams.append('loggedIn', 'true');
		directorist.redirect_url = redirect_url.toString();
	</script>
<?php endif;?>

<div class="theme-authentication-modal">

	<div class="modal fade" id="theme-login-modal" role="dialog" aria-hidden="true">

		<div class="modal-dialog modal-dialog-centered" role="document">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title" id="login_modal_label"><?php esc_html_e( 'Sign In', 'onelisting' );?></h5>

					<button type="button" class="theme-close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				
				</div>

				<div class="modal-body">

					<?php Helper::get_template_part( 'directorist/custom/account/login', $login_args );?>

				</div>

			</div>

		</div>

	</div>

	<div class="modal fade" id="theme-register-modal" role="dialog" aria-hidden="true">

		<div class="modal-dialog modal-dialog-centered">

			<div class="modal-content">

				<div class="modal-header">

					<h5 class="modal-title"><?php esc_attr_e( 'Registration', 'onelisting' ); ?></h5>

					<button type="button" class="theme-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>

				</div>

				<div class="modal-body">

					<?php Helper::get_template_part( 'directorist/custom/account/registration', $reg_args );?>

				</div>

			</div>

		</div>

	</div>

</div>


