<?php
/**
 * CRON TASKS
 * These are pseudo-cron tasks which are run on regular intervals.
 */

// Add new schedules
add_filter( 'cron_schedules', 'theme_cron_add_schedules' ); 
function theme_cron_add_schedules( $schedules ) {
	$schedules['weekly'] = array(
		'interval' 	=> 3600*24*7,
		'display'	=> __( 'Once Weekly' )
	);
	$schedules['fifteen_minutes'] = array(
		'interval' => 900,
		'display' => __( '15 Minutes' )
	);
	return $schedules;
}

// Setup the Schedule when WP runs
add_action( 'wp', 'theme_setup_schedule' );
function theme_setup_schedule() {
	// On an early action hook,check if the hook is scheduled - if not, schedule it.
	if ( ! wp_next_scheduled( 'theme_15_minute_event' ) ) 
		wp_schedule_event( time(), 'fifteen_minutes', 'theme_15_minute_event');
}

// Perform this action every 15 minutes
add_action( 'theme_15_minute_event', 'theme_do_this_every_fifteen_minutes' );
function theme_do_this_every_fifteen_minutes(){
	if( pw_module_enabled('post_cache') )
		pw_delete_post_caches();
}

// Do not run if in dev mode
if( !pw_dev_mode() )
	wp_cron();

?>