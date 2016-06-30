<header class="post-head <?php echo $post['post_type'] ?>-head pad-x-lg">
	
	<div class="post-buttons">

		<?php if( $device['is_desktop'] ): ?>
			<?php if( $post['post_type'] === 'post' ): ?>
				<!-- POST CONTROLS -->
				<div
					pw-include="panels/post-controls"
					include-post="post"
					include-eval="isLoggedIn()&&!isDevice(['mobile'])"
					class="pull-right">
				</div>
			<?php endif ?>
		<?php endif ?>

		<?php if( in_array( $post['post_type'], array('post','attachment') ) ): ?>

			<?php if( $device['is_desktop'] ): ?>
				<!-- DOWNLOAD -->
				<div
					class="download unit pull-right"
					ng-show="::showView('downloadSingleImage')"
					uib-tooltip="Download Image"
					tooltip-placement="bottom"
					tooltip-popup-delay="333">
					<a
						download
						pw-href="post.image.sizes.full.url">
						<i class="pwi-arrow-down-thin"></i>
					</a>
				</div>
			<?php endif ?>

			<!-- LINK -->
			<div
				class="link unit"
				ng-class="{ 'highlight-color': post.post_meta.<?php echo PW_POSTMETA_KEY ?>.link_url.label.highlight }"
				ng-show="ngBoolean(post.post_meta.<?php echo PW_POSTMETA_KEY ?>.link_url.label.show) || post.post_meta.<?php echo PW_POSTMETA_KEY ?>.link_url.label.show == 'custom' && post.post_meta.<?php echo PW_LINK_URL_KEY ?> && post.post_meta.<?php echo PW_LINK_FORMAT_KEY ?> == 'link'"
				uib-tooltip="<?php echo _get( $post, 'post_meta.'.PW_POSTMETA_KEY.'.link_url.label.tooltip.custom' ) ?>"
				tooltip-placement="bottom"
				tooltip-popup-delay="333">
				<a
					pw-href="post.post_meta.<?php echo PW_LINK_URL_KEY ?>"
					pw-target="post.post_meta.<?php echo PW_POSTMETA_KEY ?>.link_url.new_target">
					<i class="pwi-crosshairs"></i>
					<?php echo _get( $post, 'post_meta.'.PW_POSTMETA_KEY.'.link_url.label.custom' ) ?>
				</a>
			</div>

		<?php endif ?>

		<div class="clearfix"></div>

	</div>

	<h1 class="post-title">

		<?php if( !empty( $post_icon ) ): ?>
			<i class="icon <?php echo _get($post,'post_meta.'.PW_POSTMETA_KEY.'.icon.class') ?>"></i>
		<?php endif ?>
		
		<?php if( !empty( $post['parent_post'] ) ): ?>
			<span class="parent-post-link">
				<a href="<?php echo $post['parent_post']['post_permalink'] ?>">
					<?php echo $post['parent_post']['post_title'] ?>
				</a>
				&rsaquo;
			</span>
		<?php endif ?>

		<span ng-bind="::post.post_title">
			<?php echo $post['post_title'] ?> 
		</span>
	</h1>

	<?php if( $password_protected ): ?>
		<div class="password-protected">
			<i class="icon pwi-lock"></i>
			This content is password protected.
		</div>
	<?php endif ?>
	
	<?php if( $post['post_type'] === 'blog' ): ?>
		<!-- BLOG CATEGORIES -->
		<div class="taxonomy category" ng-show="uiBoolean(post.taxonomy.blog_category)">
			<span ng-repeat="term in ::post.taxonomy.blog_category">
				<a pw-href="term.url" class="term category">
					<span ng-bind-html="::term.name"></span>
				</a>
			</span>
		</div>
	<?php endif ?>

	<?php if( $post['post_type'] !== 'page' ): ?>
		<!-- CATEGORIES -->
		<div class="taxonomy categories" ng-show="uiBoolean(post.taxonomy.category)">
			<span ng-repeat="term in post.taxonomy.category">
			    <a pw-href="term.url" class="term category">
					<span ng-bind="::term.name"></span>
				</a>
			</span>
		</div>

		<?php if( !$device['is_mobile'] ): ?>
			<!-- TAGS -->
			<div class="taxonomy tags" ng-show="uiBoolean(post.taxonomy.post_tag)">
				<i class="pwi-tags"></i>
				<span ng-repeat="term in ::post.taxonomy.post_tag">
				    <a pw-href="term.url" class="term tag">
						<span ng-bind="::term.name"></span>
					</a>
				</span>
			</div>
		<?php endif ?>

		<!-- TIME -->
		<span
			class="time unit"
			uib-tooltip="<?php echo $post['post_date_gmt'] ?>"
			tooltip-placement="bottom"
			tooltip-popup-delay="333">
			<time datetime="<?php echo $post['post_date'] ?>">
				<?php echo $post['time_ago'] ?>
			</time>
		</span>
	<?php endif ?>

	<div class="clearfix"></div>

</header>