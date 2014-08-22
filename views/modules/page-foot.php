{% if 0 %}
	<div
		class="menu-social grayscale">
		{{ social_menu | safe }}
	</div>
{% endif %}

{% if subpages %}
	{% for page in subpages %}
	    <a href="{{page.post_permalink}}">{{page.post_title}}</a>
	    {%if !loop.last %} | {% endif %}
	{% endfor %} 
{% endif %}

