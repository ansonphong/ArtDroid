<?php
	$slider = $vars;
	$home_menu_id = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home.secondary_menu' ) );;
	$menu_theme_location = 'home-page-slider';
	$home_slider_has_menu = has_nav_menu($menu_theme_location);
	$slider_has_menu = ( is_front_page() && $home_slider_has_menu );
	//$slider_vars = $slider;
	//$slider_vars['posts'] = '';
	//pw_log('slider', $slider_vars);
?>
<script>
	postworld.controller( '<?php echo $slider['instance']; ?>',
		function( $scope, $_, $log, $window ){
		$scope.slider = <?php echo json_encode($slider); ?>;
	});
</script>
<div
	id="<?php echo $slider['id']; ?>"
	class="<?php echo $slider['class']; ?> <?php if( $slider_has_menu ) echo 'slider-with-menu'; ?>"
	ng-controller="<?php echo $slider['instance']; ?>"

	pw-height="<?php echo $slider['height']['method'] ?>"
	height-value="<?php echo $slider['height']['value'] ?>"
	>
	<uib-carousel
		interval="slider.interval"

		<?php if( $slider['no_pause'] == true ):?>
			no-pause="true"
		<?php endif ?>

		<?php if( $slider['transition'] == false || $slider['transition'] == 'false' ):?>
			no-transition="true"
		<?php endif ?>

		ng-cloak>
		
		<uib-slide class="slide" ng-repeat="slide in ::slider.posts" active="slide.active">

			<?php if( $slider['hyperlink'] == true ){ ?>
				<a ng-href="{{slide.post_permalink}}" target="{{slide.post_meta.link_target}}">
			<?php } ?>
				<div
					class="slide-frame">
					
					<div
						pw-smart-image="::slide.image"
						smart-image-override="::slide.image.alt"
						smart-image-min-height="512"
						smart-image-dynamic
						pw-parallax
						parallax-depth="<?php echo $slider['parallax_depth'] ?>">
					</div>

					<div class="carousel-caption" ng-show="slider.show_title || slider.show_excerpt">
						<h2 ng-show="slider.show_title">
							<span class="post-format-icon" ng-show="slide.link_format == 'video'">
								<i class="pwi-play"></i>
							</span>
							<span class="post-format-icon" ng-show="slide.link_format == 'audio'">
								<i class="pwi-headphones"></i>
							</span>
							{{slide.post_title}}
						</h2>
						<p ng-show="slider.show_excerpt && slide.post_excerpt">
							{{slide.post_excerpt}}
						</p>
					</div>
				</div>
			<?php if( $slider['hyperlink'] == true ){ ?>
				</a>
			<?php } ?>
		</uib-slide>

		<?php
		///// FRONT PAGE /////
		// If a Home Menu ID is specified
		if( $slider_has_menu ){
			?>
			<!-- SLIDER BOTTOM BAR -->
			<div class="slider-bottom-bar">
				<?php include locate_template( 'views/theme/menu-home-slider.php' ); ?>
			</div>
			<?php
		}
		?>
	</uib-carousel>
</div>