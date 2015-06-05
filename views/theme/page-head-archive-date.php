<div class="page-head">
					
	<h1>
		<i class="pwi-calendar"></i>
		<?php
			// YEAR
			echo $pw['query']['year'];

			// MONTH
			$month = _get($pw, 'query.monthnum');
			if( $month )
				echo " / " . $month;

			// DAY
			$day = _get($pw, 'query.day');
			if( $day )
				echo " / " . $day;

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