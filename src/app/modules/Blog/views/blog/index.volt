{% extends 'app.volt' %} {% block content %}
<!-- Page Header -->
<header
	class="masthead"
	style="background-image: url('/public/img/japan/test.jpg');"
>
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Blog</h1>
					<span class="subheading">Meet your fellow Japanese enthusiast</span>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-7">
			<h1 class="my-4">
				Blog
				<small>Posts</small>
			</h1>
			<hr />

			<!-- Blog Post -->
			{%- if records|length > 0 -%} {% for record in records %}
			<div class="post-preview">
				<a href="/blog/{{ record.id }}">
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
			<ul class="pagination justify-content-center mb-4">
				<li class="page-item">
					<a class="page-link" href="#">&larr; Older</a>
				</li>
				<li class="page-item disabled">
					<a class="page-link" href="#">Newer &rarr;</a>
				</li>
			</ul>
			{%- else -%}
			<h3>No posts found</h3>
			{%- endif -%}
		</div>

		<div class="col-md-1"></div>

		<!-- Sidebar Widgets Column -->
		{% include '/partials/blog/sidebar.volt' %}
	</div>
	<!-- /.row -->
</div>

{% endblock %}
