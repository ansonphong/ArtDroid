<script>
	jQuery( document ).ready(function() {
		jQuery('#loading-overlay').fadeOut(1000);
	});
</script>
<style>
	#loading-overlay{
		position: fixed;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		background: <?php echo pw_grab_option( PW_OPTIONS_STYLES, 'colors.core.global-background-color' ) ?>;
		z-index: 1000;
		height: 100vh;
		overflow: hidden;
		text-align: center;
		opacity: .66;
	}
	#loading-overlay .loading-icon{
		text-align: center;
		margin: auto;
		font-size: 32px;
		padding: 20px;
		position: relative;
		top: 33%;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
		height: 128px;
		width: 128px;
		background-repeat: no-repeat;
		background-size: contain;
		background-position: center;
	}
	#loading-overlay svg{
		color: <?php echo pw_grab_option( PW_OPTIONS_STYLES, 'colors.core.global-foreground-color' ) ?>;
  		fill: currentColor;
  		animation: spin 2s linear infinite;
	}
	#loading-overlay .loader-spinner{
		border: 16px solid <?php echo pw_grab_option( PW_OPTIONS_STYLES, 'colors.core.primary-color-dark' ) ?>;
		border-top: 16px solid <?php echo pw_grab_option( PW_OPTIONS_STYLES, 'colors.core.primary-color-medium' ) ?>;
		border-bottom: 16px solid <?php echo pw_grab_option( PW_OPTIONS_STYLES, 'colors.core.primary-color-medium' ) ?>;
		border-radius: 50%;
		width: 120px;
		height: 120px;
		animation: spin 2s linear infinite;
	}
	@keyframes spin {
		0% { transform: rotate(0deg); }
		100% { transform: rotate(360deg); }
	}
</style>
<div id="loading-overlay">
	<div class="loading-icon">
		<div class="loader-spinner"></div>
	</div>
</div>