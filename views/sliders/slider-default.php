<?php
	$home_menu_id = pw_get_option( array( 'option_name' => PW_OPTIONS_THEME, 'key' => 'home.secondary_menu' ) );;
	$home_slider_has_menu = !empty($home_menu_id);
	$slider_has_menu = ( is_front_page() && $home_slider_has_menu );
?>
<script>
	postworld.controller( '<?php echo $slider['instance']; ?>',
		[ '$scope', '_', function( $scope, $_ ){
		$scope.slider = <?php echo json_encode($slider); ?>;
		$scope.sliderInterval = <?php echo $slider['interval']; ?>;
		$scope.slides = <?php echo json_encode($posts); ?>;
		$scope.slideImageUrl = function( slide ){
			// Return the alternative image URL if it's available
			var imgExp = 'sizes.widescreen.url';
			var altImgUrl = $_.get( slide, 'image.alt.'+imgExp );
			if( !_.isEmpty( altImgUrl ) )
				return altImgUrl;
			return $_.get( slide, 'image.'+imgExp );
		}
	}]);
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
		
		<slide class="slide" ng-repeat="slide in slides" active="slide.active">
			<?php if( $slider['hyperlink'] == true ){ ?>
				<a ng-href="{{slide.post_permalink}}">
			<?php } ?>
				<div
					class="slide-frame"
					style="background-image: url( {{ slideImageUrl(slide) }}); "
					parallax-background
					parallax-ratio="-0.6">
					<div class="carousel-caption" ng-show="slider.show_title || slider.show_excerpt">
						<h2 ng-show="slider.show_title">
							<span class="post-format-icon" ng-show="slide.link_format == 'video'">
								<i class="glyphicon glyphicon-play"></i>
							</span>
							<span class="post-format-icon" ng-show="slide.link_format == 'audio'">
								<i class="glyphicon glyphicon-headphones"></i>
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
		</slide>

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
	</carousel>
</div>

<!--
<pre><?php // echo json_encode($slider); ?></pre>
-->