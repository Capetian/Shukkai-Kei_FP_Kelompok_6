{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Posts</h1>
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
		<h6 class="m-0 font-weight-bold text-primary">Posts Table</h6>
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
						<th>ID</th>
						<th>Title</th>
						<th>Sub-title</th>
						<th>Created By</th>
						<th>Created At</th>
						<th>
							<div class="d-flex justify-content-center">
								<a
									href="{{ url('/Admin/posts/create') }}"
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
						<th>ID</th>
						<th>Title</th>
						<th>Sub-title</th>
						<th>Created By</th>
						<th>Created At</th>
						<th>
							Action
						</th>
					</tr>
				</tfoot>
				<tbody>
					{%- if records|length > 0 -%} {% for record in records %}
					<tr>
						<td>{{ record.id }}</td>
						<td>{{ record.title }}</td>
						<td>{{ record.subtitle }}</td>
						<td>{{ record.username }}</td>
						<td>{{ record.created_at }}</td>
						<td>
							<div class="d-flex justify-content-center">
								<a
									href="{{url('/Blog/blog/show/') ~ record.id }}"
									class="btn btn-info"
								>
									<i class="fas fa-eye"></i>
								</a>
								<a
									href="{{url('/Admin/posts/edit/') ~ record.id }}"
									class="btn btn-warning"
								>
									<i class="fas fa-edit"></i>
								</a>
								<a
									onclick="return confirm('Are you sure you want to delete this item?');"
									href="{{url('/Admin/posts/delete/') ~ record.id }}"
									class="btn btn-danger"
								>
									<i class="fas fa-trash-alt"></i>
								</a>
							</div>
						</td>
					</tr>
					{% endfor %} {%- else -%}
					<tr>
						<td colspan="5">No posts found</td>
					</tr>
					{%- endif -%}
				</tbody>
			</table>
		</div>
	</div>
</div>
{% endblock %}
