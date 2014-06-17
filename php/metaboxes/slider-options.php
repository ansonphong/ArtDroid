<div>
	<input type="checkbox"
		id="input-this_post"
		ng-model="iMeta.header.slider.query_vars.this_post">
		<label for="input-this_post">Include This Post</label>

	<div class="indent" ng-show="iMeta.header.slider.query_vars.this_post">
		<hr>
		<input type="checkbox"
			id="input-this_post_only"
			ng-model="iMeta.header.slider.query_vars.this_post_only">
			<label for="input-this_post_only">Only this post</label>
	</div>
</div>

<hr>

<div ng-hide="iMeta.header.slider.query_vars.this_post && iMeta.header.slider.query_vars.this_post_only">
	<h4>Query</h4>

	<hr>

	<input type="checkbox"
		id="input-hasimage"
		ng-model="iMeta.header.slider.query_vars.has_image">
		<label for="input-hasimage">Only include posts with an image</label>

	<hr>

	<input type="checkbox"
		id="input-children"
		ng-model="iMeta.header.slider.query_vars.show_children">
		<label for="input-children">Show Child Posts</label>

	<hr>

	<label for="select-feature_term">Taxonomy :</label>
	<select
		class="labeled"
		id="select-feature_term"
		ng-model="iMeta.header.slider.query_vars.tax_query_taxonomy"
		ng-options="key as tax.labels.name for (key,tax) in tax_terms">
		<option value="">Select Taxonomy</option>
	</select>

	<label for="select-feature_term">Term :</label>
	<select
		class="labeled"
		id="select-feature_term"
		ng-model="iMeta.header.slider.query_vars.tax_query_term_id"
		ng-options="term.term_id as term.name group by term.parent_name for term in tax_terms[ iMeta.header.slider.query_vars.tax_query_taxonomy ].terms">
		<option value="">Select Term</option>
	</select>

	<hr>

</div>

<div>
	<h4>Galleries</h4>

	<hr>

	<input type="checkbox"
		id="input-galleries"
		ng-model="iMeta.header.slider.query_vars.include_galleries">
		<label for="input-galleries">Include images found in galleries</label>

	<div class="indent" ng-show="iMeta.header.slider.query_vars.include_galleries">
		
		<hr>
		<input type="checkbox"
			id="input-only_galleries"
			ng-model="iMeta.header.slider.query_vars.only_galleries">
			<label for="input-only_galleries">Only show images from galleries</label>

		<hr>
		<input type="checkbox"
			id="input-hide_galleries"
			ng-model="iMeta.header.slider.query_vars.hide_galleries">
			<label for="input-hide_galleries">Hide galleries in this post</label>

	</div>

	<hr>	

</div>

<div>

	<h4>Settings</h4>

	<hr>
	<label for="input-height">Height :</label>
	<input
		id="input-height"
		size="3"
		ng-model="iMeta.header.slider.height">

	<hr>
	<label for="input-interval">Interval :</label>
	<input
		id="input-interval"
		size="3"
		ng-model="iMeta.header.slider.interval">
		milliseconds

	<hr>
	<label for="input-maxposts">Maximum slides : </label>
	<input type="text"
		id="input-maxposts"
		size="3"
		ng-model="iMeta.header.slider.query_vars.max_posts">
	
	<hr>
	<label for="select-transition">Transition :</label>
	<select
		class="labeled"
		id="select-transition"
		ng-model="iMeta.header.slider.transition"
		ng-options="option.slug as option.name for option in options.slider.transition">
	</select>

	<hr>
	<input type="checkbox"
		id="input-no_pause"
		ng-model="iMeta.header.slider.no_pause">
		<label for="input-no_pause">Do not pause slider on mouse over</label>

</div>
<!--
<code><pre>{{ iMeta.header.slider | json }}</pre></code>
-->