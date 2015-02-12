<?php if( !is_user_logged_in() &&
	pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'menus.login.secret_login' ) ) ) : ?>
	<div id="secret-login">
		<button
			type="button"
			pw-modal-access
			ng-click="openModal({mode:'template',templateName:'modal-login'})">
			&pi;
		</button>
	</div>
<?php endif; ?>