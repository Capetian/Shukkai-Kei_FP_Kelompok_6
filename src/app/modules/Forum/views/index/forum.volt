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
					<h1>Forum</h1>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="card text-center">
	<div class="card-header font-weight-bold">
		<h3>Subforum</h3>
	</div>
	<div class="card-body pb-5">
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
							<a href="{{ url('/Admin/subforum/create') }}" class="btn btn-sm btn-primary p-2" />New <i class="fas fa-plus"></i></a>
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

		<form action="{{ url('/Forum/subforum/index') }}" class="mt-5">
			<input type="submit" class="btn btn-secondary" value="Browse Subforum" />
		</form>
	</div>
</div>

<div class="card text-center">
	<div class="card-header font-weight-bold">
		<h5>Lastest Discussions</h5>
	</div>
	<div class="card-body pb-5">
		<table class="table table-bordered table-hover w-100 h-100">
			<thead>
				<tr>
					<th>Thread title</th>
					<th>Replies</th>
					<th>Created at</th>
					<th>Last Post</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				{%- if threads|length > 0 -%} {% for thread in threads %} {% set idx =
				thread.replies | length %} {% set reply = thread.replies[idx - 1] %} {%
				set t = thread | json_decode %}

				<tr>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h5>{{ thread.title }}</h5>
						</div>
					</td>
					<td>
						{% set idx = thread.replies | length %}
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h6>{{ idx }}</h6>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h6>{{ date('j-M-y', thread.created_at) }}</h6>
						</div>
					</td>
					<td>
						<div
							class="d-flex flex-column justify-content-center align-items-center w-100 h-100"
						>
							<div class="p-2">
								{{ reply.content }}
							</div>

							<div class="p-0 font-italic">by {{ reply.user.username }}</div>

							<div class="p-0">
								{{ date('j-M-y', reply.created_at) }}
							</div>
						</div>
					</td>
					<td>
					
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<form action="{{url('/Forum/thread/show/') ~ t.id}}">
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
					<td colspan="5"><h3>Not found</h3></td>
				</tr>
				{%- endif -%}
			</tbody>
        </table>
        
        <a href="{{ url('/Forum/thread/create') }}" class="btn btn-primary mt-5">Create a Thread <i class="fas fa-plus"></i></a>
	</div>
</div>

{% endblock %}
