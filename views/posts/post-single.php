<?php
	extract($vars);
	$gallery_template = _get( $post, 'post_meta.pw_meta.gallery.template' );
?>

<article
	pw-post
	art-post
	pw-modal-access
	class="post <?php echo $post_class ?> view-full"
	pw-globals="pw"
	pw-ui
	ng-cloak
	pw-device-class>

	<?php if( $post['post_type'] == 'post' ): ?>
		<?php if( _get( $theme_options, 'colors.views.single.dynamic_colors' ) ) :?>
			<style
				pw-style-colors="colorStyles"
				color-profiles="post.image.colors">
			</style>
		<?php endif ?>
	<?php endif ?>

	<?php if( $gallery_template == 'frame' ): ?>
		<!-- FRAME GALLERY -->
		<div
			pw-include="galleries/gallery-frame"
			include-post="post"
			include-vars="{keybind:showView('galleryFrame')}"
			ng-show="::showView('galleryFrame')"
			class="full-page-width">
		</div>
	<?php endif ?>

	<?php if( $gallery_template == 'horizontal' ): ?>
		<!-- HORIZONTAL GALLERY -->
		<div
			pw-include="galleries/gallery-horizontal"
			include-post="post"
			include-enable="::showView('galleryHorizontal')"
			class="full-page-width"></div>
	<?php endif ?>


	<?php if( !empty( $post['link_url'] ) ): ?>
		<!-- EMBED -->
		<div
			class="media-viewer"
			pw-height="<?php echo _get($pw,'options.theme.posts.embeds.height.method') ?>"
			height-value="<?php echo _get($pw,'options.theme.posts.embeds.height.value') ?>"
			ng-show="::showView('singleEmbed')">
			<div class="view-embed">
				<div
					class="o-embed"
					o-embed="<?php echo $post['link_url'] ?>"
					embed-run="::showView('singleEmbed')">
				</div>
			</div>
		</div>
	<?php endif ?>

	<?php if( in_array( $post['post_type'], array('post','attachment') ) ): ?>
	
		<!-- IMAGE -->
		<div
			class="media-viewer post-image full-page-width"
			ng-class="imageFormat(post)"

			pw-height="<?php echo _get($pw,'options.theme.posts.embeds.height.method') ?>"
			height-value="<?php echo _get($pw,'options.theme.posts.embeds.height.value') ?>"

			ng-show="::showView('singleImage')"
			pw-x-scroll-status>

			<!-- LEFT OFF -->
			
			{% if post.post_type == 'post' %}
				<!-- SHOW DYNAMIC SIZE FOR POSTS -->
				<div
					ng-show="imageFormat(post) == 'standard'"
					class="view-image"
					pw-smart-image="post.image"
					smart-image-dynamic>
				</div>

				<!-- SCROLL INDICATOR -->
				<div
					class="scroll-indicator"
					pw-device-class>
					<div class="message-scroll">
						<span class="text">Scroll</span>
						<i class="icon pwi-arrow-right-thin"></i>
					</div>
					<div class="message-slide">
						<i class="icon pwi-arrow-left-thin"></i>
						<span class="text">Slide</span>
					</div>
				</div>

				<img
					ng-show="imageFormat(post) == 'panorama'"
					class="view-image"
					pw-smart-image="post.image"
					smart-image-dynamic>

			{% endif %}

			{% if post.post_type == 'attachment' %}
			<!-- SHOW FULL SIZE IMAGE FOR ATTACHMENTS -->
			<div
				class="view-image"
				pw-background-image="post.image.sizes.full.url">
			</div>
			{% endif %}
		</div>

	<?php endif ?>


	
	{% if post.post_type == 'blog' %}
		<div
			pw-include="panels/featured-image--slice"
			include-vars="{themeOptions:pw.options.theme,postImage:post.image}"
			include-enable="::showView('fiDisplay--slice')">
		</div>
		<div
			pw-include="panels/featured-image--full"
			include-vars="{themeOptions:pw.options.theme,postImage:post.image}"
			include-enable="::showView('fiDisplay--full')">
		</div>
	{% endif %}


	{% if !is_page_header_image %}
		<header class="post-head {{ post.post_type }}-head pad-x-lg">
			


			<div class="post-buttons">

				{% if device.is_desktop %}
					{% if post.post_type == 'post' %}
					<!-- POST CONTROLS -->
					<div
						pw-include="panels/post-controls"
						include-post="post"
						include-eval="isLoggedIn()&&!isDevice(['mobile'])"
						class="pull-right">
					</div>
					{% endif %}
				{% endif %}

				{% if post.post_type != 'page' %}
				{% if post.post_type != 'blog' %}

					{% if device.is_desktop %}
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
					{% endif %}

					<!-- LINK -->
					<div
						class="link unit"
						ng-class="{ 'highlight-color': post.post_meta.pw_meta.link_url.label.highlight }"
						ng-show="ngBoolean(post.post_meta.pw_meta.link_url.label.show) || post.post_meta.pw_meta.link_url.label.show == 'custom' && post.link_url && post.link_format == 'link'"
						uib-tooltip="{{ post.post_meta.pw_meta.link_url.label.tooltip.custom }}"
						tooltip-placement="bottom"
						tooltip-popup-delay="333">
						<a
							pw-href="post.link_url"
							pw-target="post.post_meta.pw_meta.link_url.new_target">
							<i class="pwi-crosshairs"></i>
							{{ post.post_meta.pw_meta.link_url.label.custom }}
						</a>
					</div>

				{% endif %}
				{% endif %}

				<div class="clearfix"></div>

			</div>

			

			<h1 class="post-title">

				{% if post.post_meta.pw_meta.icon.class %}
					<i class="icon {{post.post_meta.pw_meta.icon.class}}"></i>
				{% endif %}
				
				{% if post.parent_post.ID %}
					<span class="parent-post-link">
						<a href="{{ post.parent_post.post_permalink }}">
							{{ post.parent_post.post_title }}
						</a>
						&rsaquo;
					</span>
				{% endif %}
				<span ng-bind="::post.post_title">
					{{ post.post_title }}
				</span>
			</h1>

			{% if password_protected %}
				<div class="password-protected">
					<i class="icon pwi-lock"></i>
					This content is password protected.
				</div>
			{% endif %}
			
			{% if post.post_type == 'blog' %}
				<!-- CATEGORIES -->
				<div class="taxonomy category" ng-show="uiBoolean(post.taxonomy.blog_category)">
					<span ng-repeat="term in ::post.taxonomy.blog_category">
						<a pw-href="term.url" class="term category">
							<span ng-bind-html="::term.name"></span>
						</a>
					</span>
				</div>
			{% endif %}

			{% if post.post_type != 'page' %}
				<!-- CATEGORIES -->
				<div class="taxonomy categories" ng-show="uiBoolean(post.taxonomy.category)">
					<span ng-repeat="term in post.taxonomy.category">
					    <a pw-href="term.url" class="term category">
							<span ng-bind="::term.name"></span>
						</a>
					</span>
				</div>

				{% if !device.is_mobile %}
					<!-- TAGS -->
					<div class="taxonomy tags" ng-show="uiBoolean(post.taxonomy.post_tag)">
						<i class="pwi-tags"></i>
						<span ng-repeat="term in ::post.taxonomy.post_tag">
						    <a pw-href="term.url" class="term tag">
								<span ng-bind="::term.name"></span>
							</a>
						</span>
					</div>
				{% endif %}

				<!-- TIME -->
				<span
					class="time unit"
					uib-tooltip="{{ post.post_date_gmt }}"
					tooltip-placement="bottom"
					tooltip-popup-delay="333">
					<time datetime="{{ post.post_date }}">
						{{ post.time_ago }}
					</time>
				</span>
			{% endif %}

			<div class="clearfix"></div>

		</header>
	{% endif %}

	{% if post.post_content %}
		<!-- CONTENT -->
		<div class="post-content pad-x-lg columns-{{post.post_meta.pw_meta.post_content.columns}}">
			{{ post.post_content | safe }}
			<div class="clearfix"></div>
		</div>
	{% endif %}

	{% if !post.post_content %}
		{% if post.post_excerpt %}
			<!-- CONTENT FROM EXCERPT -->
			<div class="post-content pad-x-lg columns-{{post.post_meta.pw_meta.post_content.columns}}">
				{{ post.post_excerpt | safe }}
			</div>
		{% endif %}
	{% endif %}

	{% if post.post_meta.pw_meta.gallery.template == 'vertical' %}
		<!-- VERTICAL GALLERY -->
		<div
			pw-include="galleries/gallery-vertical"
			include-post="post"
			include-enable="::showView('galleryVertical')"
			include-vars="{yScrollContainer:'window'}"
			class=""></div>
	{% endif %}

	<div class="clearfix"></div>

	{% if device.is_mobile %}
		{% if post.post_type != 'page' %}
			{% if post.taxonomy.post_tag %}
				<div class="taxonomy-footer pad-x-lg">
					<!-- TAGS -->
					<div class="taxonomy tags">
						<i class="icon pwi-tags"></i>
						<span ng-repeat="term in post.taxonomy.post_tag">
						    <a pw-href="term.url" class="term tag">
								<span ng-bind="::term.name"></span>
							</a>
						</span>
						<div class="clearfix"></div>
						<div class="space-4"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			{% endif %}
		{% endif %}
	{% endif %}

	<div class="social-footer pad-x-lg">
		{% if social_share %}
			<!-- SOCIAL SHARE -->
			<div class="share-social">
				<div class="share-social--label">
					<i class="icon pwi-share"></i>
					Share
				</div>
				<div class="share-social--buttons">
					{{ social_share | safe }}
				</div>
				<div class="clearfix"></div>
			</div>
		{% endif %}
		{% if !device.is_mobile %}
			<!-- SOCIAL WIDGETS -->
			<div class="social-widgets">
				{{ social_widgets | safe }}
			</div>
			<div class="clearfix"></div>
		{% endif %}
		<div class="clearfix"></div>
	</div>

	{% if wordpress_comments_enabled %}
		<div class="comments-wordpress pad-x-lg">
			{{ pw_comments_template | safe }}
		</div>
	{% endif %}

	{% if !device.is_mobile %}
		{% if post.post_type != 'page' %}
			{% if comments %}
				<div class="comments-thirdparty pad-x-lg">
					{{ comments_thirdparty | safe }}
				</div>
			{% endif %}
		{% endif %}
	{% endif %}
	

</article>