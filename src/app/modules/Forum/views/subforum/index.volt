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
					<h1>Subforum</h1>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="card text-center">
	<div class="card-header font-weight-bold">
		<h3>Subforum List</h3>
	</div>
	<div class="card-body pb-5">
		<form action="{{ url('/Forum/forum') }}" class="d-flex">
			<input type="submit" class="btn btn-danger align-self-start" value="Go Back" />
		</form>
		<table class="table table-bordered table-hover w-100 h-100">
			<thead>
				<tr>
					<th>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							Name
						</div>
					</th>
					<th>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							Description
						</div>
					</th>
					<th>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							Posts
						</div>
					</th>
					<th>
						{%- if session.has('auth') -%} {%- if session.get('auth')['role'] ==
						2-%}
							<a href="{{ url('/Forum/admin/createSub') }}" class="btn btn-sm btn-primary p-2" />New <i class="fas fa-plus"></i></a>
						{%-endif-%}
						{%-endif-%}
						
					</th>
				</tr>
			</thead>
			<tbody>
				{%- if subforums|length > 0 -%} {% for subforum in subforums %}

				<tr>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h5>{{ subforum.name }}</h5>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h6>{{ subforum.description }}</h6>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h6>{{ subforum.threads | length }}</h6>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<form action="{{url('/Forum/subforum/show/') ~ subforum.id}}">
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
					<td colspan="4"><h3>Not found</h3></td>
				</tr>
				{%- endif -%}
			</tbody>
		</table>


	</div>
</div>

{% endblock %}
