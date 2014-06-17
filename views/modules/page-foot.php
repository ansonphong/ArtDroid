
<div
	class="menu-social">
	{{ social_menu | safe }}
</div>

<div class="address">

	<!-- ADDRESS NAME -->
	{% if contact.address_name %}
		<a href="{{url.site_url}}">
			<div class="info address_name">{{ contact.address_name }}</div>
		</a>
	{% endif %}

	<!-- DIVIDER -->
	{% if contact.address_name %}
		{% if contact.address1 %}
			<span class="divider">•</span>
		{% endif %}
	{% endif %}

	<!-- MAPS LINK -->
	{% if contact.address1 %}
		<a
			href="http://maps.google.com/?q={{ contact.address1 }}, {{ contact.city }}, {{ contact.region }}, {{ contact.country }} "
			target="_blank"
			tooltip="View in Google Maps" tooltip-placement="top">
	{% endif %}

		<!-- ADDRESS -->
		{% if contact.address1 %}
			<div class="info address1">{{ contact.address1 }}</div>
		{% endif %}

		<!-- ADDRESS 2 -->
		{% if contact.address2 %}
			<div class="info address2">{{ contact.address2 }}</div>
		{% endif %}

		<!-- CITY -->
		{% if contact.city %}
			<div class="info city">
				{{ contact.city }}

				<!-- REGION -->
				{% if contact.region %}
					<span class="info region">, {{ contact.region }}</span>
				{% endif %}

				<!-- COUNTRY -->
				{% if contact.country %}
					<div class="info country">, {{ contact.country }}
				{% endif %}

				<!-- POSTAL CODE -->
				{% if contact.postal_code %}
					<span class="info postal_code">{{ contact.postal_code }}</span>
				{% endif %}
				</div>

			</div>
		{% endif %}

	{% if contact.address1 %}
	</a>
	{% endif %}

	<!-- DIVIDER -->
	{% if contact.city %}
		{% if contact.phone %}
			<span class="divider">•</span>
		{% endif %}
	{% endif %}
	
	<!-- PHONE -->
	{% if contact.phone %}
		<div class="info phone">{{ contact.phone }}</div>
	{% endif %}

	<!-- INTERNATIONAL PHONE -->
	{% if contact.phone_int %}
		<div class="info phone_int">{{ contact.phone_int }}</div>
	{% endif %}

	<!-- FAX -->
	{% if contact.fax %}
		<div class="info fax">{{ contact.fax }}</div>
	{% endif %}

</div>

{% if subpages %}
	<hr>
	{% for page in subpages %}
	    <a href="{{page.post_permalink}}">{{page.post_title}}</a>
	    {%if !loop.last %} | {% endif %}
	{% endfor %} 
{% endif %}

