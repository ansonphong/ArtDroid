<a name="comments"></a>
<script type="text/javascript" charset="utf-8">
	pw.comments['single_post'] = {
			query : {
				//post_id : 0,
				status: 'approve',
				orderby : 'date',
				},
			labels : {
				title: "Comments",
				title_icon: "pwi-bubbles",
				add_comment: "reply",
				add_comment_icon: "pwi-bubble",
				save: "save",
				save_icon: "pwi-disk",
				placeholder: "What do you think?",
				sort_by: "Sort by :",
			},
			fields : [
				'comment_ID',
				'comment_post_ID',
				'comment_author',
				//'comment_author_email',
				'comment_author_url',
				'comment_author_IP',
				'comment_date',
				'comment_date_gmt',
				'comment_content',
				'comment_karma',
				'comment_approved',
				'comment_agent',
				'comment_type',
				'comment_parent',
				'user_id',
				'time_ago'
			],
			tree : true,
			order_options : {
				'comment_points' : 'Points',
				'comment_date' : 'Date',
				},
			min_points : -1,
			view: 'default', // Optional, default value is default
	};
</script>
<div
	streeview
	pw-comments="single_post"
	post-id="post.ID">
</div>