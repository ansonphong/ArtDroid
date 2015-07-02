<!--///// FONTS /////-->
<div class="well">
	<div class="save-right"><?php pw_save_option_button( PW_OPTIONS_THEME, 'pwOptions'); ?></div>
	<h2>
		<span class="icon-md"><i class="pwi-quill"></i></span>
		Fonts
	</h2>
	<div class="well">

		<table>
			<tr>
				<td align="right">
					Body :
				</td>
				<td>
					<!-- DROPDOWN -->
					<span
						dropdown
						class="dropdown">
						<!-- SELECTED ITEM -->
						<span dropdown-toggle
							class="area-select area-select-font"
							ng-style="{'font-family': pwOptions.fonts.body }">
							{{ pwOptions.fonts.body }}
						</span>
						<!-- MENU -->
						<ul
							class="dropdown-menu grid"
							role="menu">
							<li
								class="select-font"
								ng-repeat="font in fontOptions"
								ng-click="pwOptions.fonts.body = font.name"
								ng-style="{'font-family': font.name }">
								{{ font.name }}
							</li>
						</ul>
					</span>
				</td>
				<td>
					<small>
						The overall document body font.
					</small>
				</td>
			</tr>
			<tr>
				<td align="right">
					Title :
				</td>
				<td>
					<!-- DROPDOWN -->
					<span
						dropdown
						class="dropdown">
						<!-- SELECTED ITEM -->
						<span dropdown-toggle
							class="area-select area-select-font"
							ng-style="{'font-family': pwOptions.fonts.title }">
							{{ pwOptions.fonts.title }}
						</span>
						<!-- MENU -->
						<ul
							class="dropdown-menu grid"
							role="menu">
							<li
								class="select-font"
								ng-repeat="font in fontOptions"
								ng-click="pwOptions.fonts.title = font.name"
								ng-style="{'font-family': font.name }">
								{{ font.name }}
							</li>
						</ul>
					</span>
				</td>
				<td>
					<small>
						The post title font.
					</small>
				</td>
			</tr>
			<tr>
				<td align="right">
					Content :
				</td>
				<td>
					<!-- DROPDOWN -->
					<span
						dropdown
						class="dropdown">
						<!-- SELECTED ITEM -->
						<span dropdown-toggle
							class="area-select area-select-font"
							ng-style="{'font-family': pwOptions.fonts.content }">
							{{ pwOptions.fonts.content }}
						</span>
						<!-- MENU -->
						<ul
							class="dropdown-menu grid"
							role="menu">
							<li
								class="select-font"
								ng-repeat="font in fontOptions"
								ng-click="pwOptions.fonts.content = font.name"
								ng-style="{'font-family': font.name }">
								{{ font.name }}
							</li>
						</ul>
					</span>
				</td>
				<td>
					<small>
						The post body font.
					</small>
				</td>
			</tr>
		</table>


	</div>

	<div class="well">
		<h3>
			Preview
		</h3>
		<small
			class="preview-font-body"
			ng-style="{'font-family': pwOptions.fonts.body }">
			<?php echo date("F j, Y, g:i a"); ?>
		</small>
		<h1
			class="preview-font-title"
			ng-style="{'font-family': pwOptions.fonts.title }">
			Lorem Ipsum Dolor Sit Amet
		</h1>
		
		<div
			class="preview-font-content"
			ng-style="{'font-family': pwOptions.fonts.content }">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nunc massa, ullamcorper tincidunt vulputate sit amet, condimentum sit amet arcu. Sed eget aliquam nibh, quis convallis ligula. Suspendisse non diam egestas, maximus sem vel, efficitur lacus. Suspendisse blandit lobortis ornare. Integer rhoncus molestie egestas. Vestibulum vehicula leo et lectus pharetra, sit amet venenatis elit rhoncus. Nam venenatis porttitor nibh. Integer scelerisque rhoncus mauris nec cursus. Sed dolor magna, malesuada scelerisque orci rutrum, ultricies pellentesque augue.
		</div>

	</div>

</div>