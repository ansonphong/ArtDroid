<?php
	$home_menu_id = i_get_option( array( 'option_name' => 'i-options', 'key' => 'home.secondary_menu' ) );
	$home_slider_has_menu = !empty($home_menu_id);
	$slider_has_menu = ( is_front_page() && $home_slider_has_menu );
?>
<script>
	function <?php echo $slider['instance']; ?>($scope) {
		$scope.sliderInterval = <?php echo $slider['interval']; ?>;
		$scope.slides = <?php echo json_encode($posts); ?>;
	}
</script>

<div
	id="<?php echo $slider['id']; ?>"
	class="<?php echo $slider['class']; ?> <?php if( $slider_has_menu ) echo 'slider-with-menu'; ?>"
	ng-controller="<?php echo $slider['instance']; ?>"
	window-height="<?php echo $slider['height']; ?>">

	<carousel
		interval="sliderInterval"
		<?php
			// NO PAUSE SETTING
			if( $slider['no_pause'] == true )
				echo ' no-pause="true" ';
			// NO TRANSITION SETTING
			if( $slider['transition'] == false || $slider['transition'] == 'false' )
				echo ' no-transition="true" ';
		?>
		ng-cloak>

		<?php
		///// FRONT PAGE /////
		if( is_front_page() ){?>
			<!-- LOGO OVERLAY -->
			<div
				class="logo-overlay"
				pw-timeout="<?php echo $slider['interval']; ?>"
				timeout-action="addClass('fadeout')">
				<img
					src="<?php echo i_site_logo_overlay(); ?>"
					class="logo"
					parallax
					parallax-ratio="0.5">
			</div>
		<?php } ?>
		
		<slide class="slide" ng-repeat="slide in slides" active="slide.active">
			<!--<a ng-href="{{slide.post_permalink}}">-->
				<div
					class="slide-frame"
					style="background-image: url( {{slide.image.sizes.widescreen.url}}); "
					parallax-background
					parallax-ratio="-0.6">
					<!--
					<div class="carousel-caption">
						<h4>{{slide.post_title}}</h4>
						<p>{{slide.post_excerpt}}</p>
					</div>
					-->
				</div>
			<!--</a>-->
		</slide>

		<?php
		///// FRONT PAGE /////
		// If a Home Menu ID is specified
		if( $slider_has_menu ){
			?>
			<!-- MENU BAR -->
			<div class="bar-bottom">
				<?php include locate_template( 'views/menus/menu-home-slider.php' ); ?>
			</div>
			<?php
		}
		?>

	</carousel>

</div>

