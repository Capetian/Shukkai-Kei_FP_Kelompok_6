{% extends 'app.volt' %} {% block content %}

<header
	class="masthead"
	style="background-image: url('/public/img/japan/test.jpg');"
>
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Post</h1>
					<span class="subheading">Meet your fellow Japanese enthusiast</span>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<div class="row">
		<!-- Post Content Column -->
		<div class="col-lg-7">
			{%- if records|length > 0-%}
			<!-- Title -->
			<h1 class="mt-4">{{ records[0].title }}</h1>

			<!-- Author -->
			<p class="lead">
				by
				<a href="#">{{ records[0].username }}</a>
			</p>

			<hr />

			<!-- Date/Time -->
			<p>Posted on {{ records[0].created_at }}</p>

			<hr />

			<!-- Post Content -->
			<p class="lead">
				{{ records[0].subtitle }}
			</p>

			<hr />

			<!-- Comments Form -->
			<div class="card my-4">
				<h5 class="card-header">Leave a Comment:</h5>
				<div class="card-body">
					<form action="{{ url('/Blog/comments/create') }}" method="POST">
						<input type="hidden" name="post_id" value="{{ records[0].id }}" />
						<div class="form-group">
							<textarea class="form-control" rows="3" name="content"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
			{%- if comments|length > 0 -%}
			<!-- Single Comment -->

			<div class="card my-4">
				<h5 class="card-header">Comments ({{ comments | length }})</h5>
				<div class="card-body">
					{% for comment in comments %}
					<div class="media mb-4">
						<div class="media-body">
							<h5 class="mt-0">{{ comment.username }} said:</h5>
							{{ comment.content }}
						</div>
					</div>
					<hr />
					{% endfor %}
				</div>
			</div>

			{%- else -%}
			<div class="card my-4">
				<h5 class="card-header">Comments (0)</h5>
				<div class="card-body">Currently no comment for this post</div>
			</div>
			{%- endif -%} {%-else-%}
			<h1>No post found</h1>
			{%-endif-%}
		</div>

		<div class="col-md-1"></div>

		<!-- Sidebar Widgets Column -->
		{% include '/partials/blog/sidebar.volt' %}
	</div>
	<!-- /.row -->
</div>

{% endblock %}
