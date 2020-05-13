{% extends 'app.volt' %} {% block content %}

<!-- Page Header -->
<header class="masthead" style="background-image: url('/public/img/japan/test.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>出会系</h1>
					<span class="subheading">Meet your fellow Japanese enthusiast</span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<h1 class="my-4">
				Blog
				<small>Recent Posts</small>
			</h1>
			<hr />

			<!-- Blog Post -->
			{%- if records|length > 0 -%} {% for record in records %}
			
			<div class="post-preview">
				{%- if session.get('auth')['is_admin'] == 1 -%}
				<a href="Blog/blog/{{ record.id }}">
				{%- else -%}
				<a href="Blog/auth/login">
				{%- endif -%}
					<h2 class="post-title">
						{{ record.title }}
					</h2>
					<h3 class="post-subtitle">
						{{ record.subtitle }}
					</h3>
				</a>
				<p class="post-meta">
					Posted by
					<a href="#">{{ record.username }}</a>
					on {{ record.created_at }}
				</p>
			</div>
			<hr />
			{% endfor %}

			<!-- Pagination -->
			<!-- <ul class="pagination justify-content-center mb-4">
				<li class="page-item">
					<a class="page-link" href="#">&larr; Older</a>
				</li>
				<li class="page-item disabled">
					<a class="page-link" href="#">Newer &rarr;</a>
				</li>
			</ul> -->
			{%- else -%}
			<h3>No posts found</h3>
			{%- endif -%}

			<!-- Pager -->
			<div class="clearfix">
				{%- if session.get('auth')['is_admin'] == 1 -%}
				<a class="btn btn-primary float-right" href="{{ url('Blog/blog') }}"
					>
					{%- else -%}
					<a class="btn btn-primary float-right" href="{{ url('Blog/auth/login') }}">
					{%- endif -%}
					More Posts &rarr;</a
				>
			</div>
			
			
		</div>
	</div>
</div>

{% endblock %}
