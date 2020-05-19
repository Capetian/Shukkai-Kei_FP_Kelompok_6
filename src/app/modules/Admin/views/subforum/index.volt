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
						<th>Name</th>
						<th>Description</th>
						<th>Posts</th>
						<th>
							<div class="d-flex justify-content-center">
								<a
									href="{{ url('/Admin/subforum/create') }}"
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
						<th>Name</th>
						<th>Description</th>
						<th>Posts</th>
						<th>
							Action
						</th>
					</tr>
				</tfoot>
				<tbody>
					{%- if subforums|length > 0 -%} {% for subforum in subforums %}
					<tr>
						<td>{{ subforum.name }}</td>
						<td>{{ subforum.description }}</td>
						<td>{{ subforum.threads | length }}</td>
						<td>
							<div class="d-flex justify-content-center">
								<a
									href="{{url('/Forum/subforum/show/') ~ subforum.id}}"
									class="btn btn-info"
								>
									<i class="fas fa-eye"></i>
								</a>
								<a
									href="{{url('/Admin/subforum/edit/') ~ subforum.id}}"
									class="btn btn-warning"
								>
									<i class="fas fa-edit"></i>
								</a>
								<a
									onclick="return confirm('Are you sure you want to delete this item?');"
									href="{{url('/Admin/subforum/delete/') ~ subforum.id}}"
									class="btn btn-danger"
								>
									<i class="fas fa-trash-alt"></i>
								</a>
							</div>
						</td>
					</tr>

					{% endfor %} {%- else -%}
					<tr>
						<td colspan="4">No subforum found</td>
					</tr>
					{%- endif -%}
				</tbody>
			</table>
		</div>
	</div>
</div>
{% endblock %}
