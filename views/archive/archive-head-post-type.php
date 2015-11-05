<div class="archive-head">

	<h1>
		<a href="<?php echo get_post_type_archive_link( _get($pw,'view.post_type.name') ); ?>">
			<?php echo $pw['view']['post_type']['labels']['name']; ?>
		</a>
	</h1>
		
	<div class="share-social pull-right">
		<?php echo pw_social_share(); ?>
	</div>

	<div class="pull-right">
		<?php include locate_template( 'views/menus/menu-archive-years.php' ); ?>
	</div>
	
</div>