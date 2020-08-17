<?php

$custom_feed_id = _get($vars,'custom_feed_id');

if($custom_feed_id !== false){
	pw_feed( array(
		'aux_template'	=>	'seo-list',
		'feed' => pw_get_feed_by_id($custom_feed_id)
		));
}
