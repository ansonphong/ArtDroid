{% if subpages %}
	{% for page in subpages %}
	    <a href="{{page.post_permalink}}">{{page.post_title}}</a>
	    {%if !loop.last %} | {% endif %}
	{% endfor %} 
{% endif %}