<div class="archives-yearly">
	<ul>
	<?php
		$yearly_archives = array(
			'type' 		=> 'yearly',
			'format'	=>	'html',
			'post_type'	=>	$pw['query']['post_type'],
			);
		pw_get_archives( $yearly_archives );
	?>
	</ul>
</div>