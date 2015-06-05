<div class="page-head">
	<h1>
		<?php
			// Show Tag Icon
			if( $pw['view']['taxonomy']['name'] == 'post_tag' ){?>
				<i class="pwi-tag" tooltip="tag" tooltip-placement="bottom"></i> 
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