<?php
	global $pw;
	global $i_paths;
	$child_theme_url = $i_paths['child_theme']['url'];
	$i_meta_header = pw_get_postmeta( array( "sub_key" => "header" ));
?>

<header>
	<?php
	///// SWITCH HEADER TYPE /////
	switch( $i_meta_header['type'] ){
		case 'slider':
			include locate_template("views/modules/slider-page.php");
			break;
		case 'featured_image':
			include locate_template("views/modules/page-head-image.php");
			break;
		default:
			include locate_template("views/modules/page-head-default.php");
			break;
	}
	?>
	<!-- LABEL -->
	<div class="page-meta">
		<?php
			///// SWITCH LABELS /////
			if( in_array( 'archive-taxonomy', $pw['view']['context'] ) ){
			?>
				<div class="page-head">
					<h1>
						<?php
							// Show Tag Icon
							if( $pw['view']['taxonomy']['name'] == 'post_tag' ){?>
								<i class="icon-tag" tooltip="tag" tooltip-placement="bottom"></i> 
							<?php
							}
							// Show Name of the Taxonomy
							else{ ?>
								<?php echo $pw['view']['taxonomy']['labels']['singular_name']; ?> :
							<?php
							}
						?>
						<a href="<?php echo $pw['view']['term']['term_link']; ?>">
							<?php echo $pw['view']['term']['name']; ?>
						</a>
					</h1>
				</div>
			<?php
			}
			if( in_array( 'archive-date', $pw['view']['context'] ) ){
			?>
				<div class="page-head">
					
					<h1>
						<i class="glyphicon glyphicon-calendar"></i>
						<?php
							// YEAR
							echo $pw['view']['query']['year'];
							// MONTH
							if( !empty( $pw['view']['query']['monthnum'] ) )
								echo " / " . $pw['view']['query']['monthnum'];
							// DAY
							if( !empty( $pw['view']['query']['day'] ) )
								echo " / " . $pw['view']['query']['day'];
							?>
					</h1>

					<div class="archives-yearly">
						<ul>
						<?php
							$yearly_archives = array(
								'type' 		=> 'yearly',
								'format'	=>	'html',
								);
							wp_get_archives( $yearly_archives );
						?>
						</ul>
					</div>
					<div class="clearfix"></div>
					<?php //echo json_encode($pw['view']);?>
				</div>
			<?php
			}
		?>
	</div>
</header>

