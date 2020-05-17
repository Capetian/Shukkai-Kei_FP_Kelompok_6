{% extends 'app.volt' %} {% block content %}

<!-- Page Header -->
<header
	class="masthead"
	style="background-color: lightgreen; margin-bottom: 0px;"
>
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading" style="padding: 100px 0;">
					<h1>Search</h1>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="card text-center">
	<div class="card-header">
		Thread Search Result ({{ results | length }} found)
	</div>
	<div class="card-body pb-5">
		<table class="table table-bordered table-hover w-100 h-100">
			<thead>
				<tr>
					<th>Title</th>
					<th>Created By</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				{%- if results|length > 0 -%} {% for result in results %} {% set r =
				result | json_decode%}

				<tr>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h5>{{ r.title }}</h5>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h6>{{ result.user.username }}</h6>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<form action="/Forum/thread/show/{{ r.id }}">
								<input
									type="submit"
									class="btn btn-outline-success"
									value="Open"
								/>
							</form>
						</div>
					</td>
				</tr>
				{% endfor %} {%- else -%}
				<tr>
					<td colspan="3"><h3>Not found</h3></td>
				</tr>
				{%- endif -%}
			</tbody>
		</table>
	</div>
</div>



{% endblock %}
