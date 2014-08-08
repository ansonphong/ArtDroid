<?php // Template Name: SANDBOX [ Templates ] ?>

<!-- INFINITE HEADER -->
<?php
	i_header();
	global $post;
	global $pwSiteGlobals;
?>

<div class="well" style="color:#000; margin-top:200px;">
	<?php
		call_user_func( 'i_download_image_option', 'postAdmin' )
	?>
</div>


<pre><code>pw_get_templates(  ) =
<?php echo json_encode(
	pw_get_templates(
		array(
			'subdirs' => array( 'menu-kit' ),
			'ext' => 'php',
			'path_type'	=>	'dir',
			)
		)
	, JSON_PRETTY_PRINT ); ?></code></pre>


<pre><code>pw_get_panel_template() =
<?php echo json_encode( pw_get_panel_template( 'ad-block' ) , JSON_PRETTY_PRINT ); ?></code></pre>

<pre><code>pw_get_dirs() =
<?php echo json_encode( pw_get_dirs( $pwSiteGlobals['templates']['dir']['default'] ), JSON_PRETTY_PRINT ); ?></code></pre>

<pre><code><small>pw_get_templates_new() = <?php //echo json_encode(pw_get_templates_new(), JSON_PRETTY_PRINT); ?></small></code></pre>

<!--
<pre><code><small>pw_construct_template_obj() = <?php /* echo json_encode(
	pw_construct_template_obj( array(
		'dir' => $pwSiteGlobals['templates']['dir']['default'],
		'url' => $pwSiteGlobals['templates']['url']['default'],
		'ext' => 'html',
		'path_type'	=>	'url',
		)
	), JSON_PRETTY_PRINT ); */?></small></code></pre>
-->

<pre><code><small>pw_get_templates() = <?php echo json_encode(pw_get_templates(), JSON_PRETTY_PRINT); ?></small></code></pre>


<!-- INFINITE FOOTER -->
<?php i_footer(); ?>