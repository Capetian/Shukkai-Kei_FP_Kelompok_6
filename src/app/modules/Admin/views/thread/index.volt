{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Subforum</h1>
<!-- <p class="mb-4">
	DataTables is a third party plugin that is used to generate the demo table
	below. For more information about DataTables, please visit the
	<a target="_blank" href="https://datatables.net"
		>official DataTables documentation</a
	>.
</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Subforum Table</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table
				class="table table-bordered"
				id="dataTable"
				width="100%"
				cellspacing="0"
			>
				<thead>
					<tr>
						<th>Thread title</th>
						<th>Replies</th>
						<th>Created at</th>
						<th>Last Post</th>
						<th>
							<div class="d-flex justify-content-center">
								<a
									href="{{ url('/Forum/thread/create') }}"
									class="btn btn-primary"
								>
									<i class="fas fa-plus"></i> Create
								</a>
							</div>
						</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Thread title</th>
						<th>Replies</th>
						<th>Created at</th>
						<th>Last Post</th>
						<th>
							Action
						</th>
					</tr>
				</tfoot>
				<tbody>
					{%- if threads|length > 0 -%} {% for thread in threads %} {% set idx =
					thread.replies | length %} {% set reply = thread.replies[idx - 1] %}
					{% set t = thread | json_decode %}
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
							<div class="d-flex justify-content-center">
								<a
									href="{{url('/Forum/thread/show/') ~ t.id}}"
									class="btn btn-info"
								>
									<i class="fas fa-eye"></i>
								</a>
								<!-- <a href="#" class="btn btn-warning">
									<i class="fas fa-edit"></i>
								</a>
								<a
									onclick="return confirm('Are you sure you want to delete this item?');"
									href="#"
									class="btn btn-danger"
								>
									<i class="fas fa-trash-alt"></i>
								</a> -->
							</div>
						</td>
					</tr>

					{% endfor %} {%- else -%}
					<tr>
						<td colspan="4">No thread found</td>
					</tr>
					{%- endif -%}
				</tbody>
			</table>
		</div>
	</div>
</div>
{% endblock %}
