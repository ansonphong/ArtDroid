<?php
	/**
	 * @todo Refactor in foreach, using filterable icons, so themes can define which icons are used.
	 */

	// Post from vars
	$post = pw_to_array($vars);

	// Share Networks
	$share_networks = i_get_option( array( "option_name" => "i-options", "key" => "social.share.networks" ) );
	//echo json_encode($share_networks);
	// Get the image url from the passed post object
	$image_url_from_post = pw_get_obj( $post, 'image.sizes.full.url' );
	
	///// IMAGE URL /////
	// If the image URL is set
	if( $image_url_from_post != false ){
		// Use the image URL from the post
		$image_url = $image_url_from_post;
	}
	else{
		// Otherwise, get it manually
		$image_obj = pw_get_featured_image_obj( $post['ID'] );
		$image_url = $image_obj['url'];
	}

	if( $image_url == null )
		$image_url = '';
	else
		$image_url = urlencode($image_url);

	///// PERMALINK /////
	$permalink = pw_get_obj( $post, 'post_permalink' );
	if( $permalink == false )
		$permalink = get_permalink( $post['ID'] );
	$permalink = urlencode( $permalink );

	///// TITLE & EXCERPT /////
	$title = urlencode($post['post_title']);
	$excerpt = urlencode($post['post_excerpt']);
	
	$site_name = urlencode( get_bloginfo( 'name' ) );
	$title_and_site_name = $title . urlencode(" | ") . $site_name;

	///// FACEBOOK LINK /////
	$facebook_link = "https://www.facebook.com/sharer/sharer.php?u=".$permalink;
	//https://www.facebook.com/sharer/sharer.php?u=http://phong.com

	///// TWITTER LINK /////
	$twitter_user = pw_get_option( array( 'option_name' => PW_OPTIONS_SOCIAL, 'key' => 'networks.twitter' ));
	
	$twitter_via = ( $twitter_user ) ?
		'via='.urlencode($twitter_user).'&' : '';

	$twitter_related = ( $twitter_user ) ?
		'related='.urlencode($twitter_user).'&' : '';

	$twitter_hashtags = i_get_option(array( 'option_name' => PW_OPTIONS_SOCIAL, 'key' => 'networks.twitter_hashtags' ));
	$twitter_hashtags = ( $twitter_hashtags ) ?
		'hashtags='.urlencode($twitter_hashtags) . '&' : '';

	$twitter_text = $title;
	//if( !empty( $excerpt ) )
	//	$twitter_text .= urlencode(' - ') . $excerpt
	$twitter_text = 'text=' . $twitter_text . '&';

	$twitter_url = 'url='.$permalink.'&';

	$twitter_link = "https://twitter.com/intent/tweet?" . $twitter_hashtags . $twitter_related . $twitter_text . $twitter_url . $twitter_via;
	//https://twitter.com/home?status=tweet%20this
	//&tw_p=tweetbutton

	///// REDDIT LINK /////
	$reddit_link = 'http://www.reddit.com/submit?url='.$permalink.'&title='.$title;

	///// GOOGLE PLUS LINK /////
	$google_plus_link = 'https://plus.google.com/share?url=' . $permalink;
	//https://plus.google.com/share?url=http://phong.com

	///// PINTEREST LINK /////
	$pinterest_link = 'https://pinterest.com/pin/create/button/?url='.$permalink.'&media='.$image_url.'&description='.$title_and_site_name;
	//https://pinterest.com/pin/create/button/?url=http://phong.com/image.jpg&media=Image%20Title&description=Description

?>

<?php if( in_array( 'facebook', $share_networks ) ){ ?> 
	<span class="pull-left" uib-tooltip="Share on Facebook" tooltip-popup-delay="500">
		<a href="<?php echo $facebook_link; ?>" target="_blank">
			<i class="icon pwi-facebook-square"></i>
		</a>
	</span>
<?php } ?>

<?php if( in_array( 'twitter', $share_networks ) ){ ?> 
	<span class="pull-left" uib-tooltip="Share on Twitter" tooltip-popup-delay="500">
		<a href="<?php echo $twitter_link; ?>" target="_blank">
			<i class="icon pwi-twitter-square"></i>
		</a>
	</span>
<?php } ?>

<?php if( in_array( 'reddit', $share_networks ) ){ ?> 
	<span class="pull-left" uib-tooltip="Share on Reddit" tooltip-popup-delay="500">
		<a href="<?php echo $reddit_link; ?>" target="_blank">
			<i class="icon pwi-reddit-square"></i>
		</a>
	</span>
<?php } ?>

<?php if( in_array( 'google_plus', $share_networks ) ){ ?> 
	<span class="pull-left" uib-tooltip="Share on Google Plus" tooltip-popup-delay="500">
		<a href="<?php echo $google_plus_link; ?>" target="_blank">
			<i class="icon pwi-google-plus-square"></i>
		</a>
	</span>
<?php } ?>

<?php if( in_array( 'pinterest', $share_networks ) ){ ?> 
	<span class="pull-left" uib-tooltip="Share on Pinterest" tooltip-popup-delay="500">
		<a href="<?php echo $pinterest_link; ?>" target="_blank">
			<i class="icon pwi-pinterest-square"></i>
		</a>
	</span>
<?php } ?>


<?php
	//echo json_encode( $vars );
?>