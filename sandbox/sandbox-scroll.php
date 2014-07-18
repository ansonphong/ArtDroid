<?php // Template Name: SANDBOX [ Scroll ] ?>

<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
	global $pwSiteGlobals;
?>

<script>
	
	var testCtrl = function( $scope, $log ){

		$scope.test = function(){
			$log.debug( "<<<<<<<<<<<< TEST >>>>>>>>>>" );
		}

	}

</script>

<!-- SPACER -->
<div class="header-spacer"></div>
<hr>
<h1><?php echo $post->post_title; ?></h1>
<hr>
<!-- ////////// FEED ////////// -->


<div
	class="modal-view-post"
	style="
	overflow:scroll;
	overflow-y:scroll;
	height:400px;
	display:block;
	background:#fff;
	"
	>
		<div
			class="scroll-inner"
			infinite-y-scroll
			scroll-container=".modal"
			scroll-action="test()"
			scroll-distance="100">
			
		</div>

		<div style="width:200px; height:2000px; background:#ccc;">
			
		</div>

</div>


<!-- ////////// END FEED ////////// -->

<!-- DEV 
<pre><code><?php echo json_encode( $pwSiteGlobals['images'] ); ?></code></pre>
-->
<!-- INFINITE FOOTER -->
<?php i_footer(); ?>