{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Changelogs</h1>
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
		<h6 class="m-0 font-weight-bold text-primary">Changelogs Table</h6>
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
						<th>Activated Pages</th>
						<th>Created By</th>
						<th>Created At</th>
						<th>
							<div class="d-flex justify-content-center">
								<a href="/dashboard/changelogs/create" class="btn btn-primary">
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
						<th>Activated Pages</th>
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
						<td>{{ record.activated_pages }}</td>
						<td>{{ record.username }}</td>
						<td>{{ record.created_at }}</td>
						<td>
							<div class="d-flex justify-content-center">
								{%- if record.setted == 1 -%}
								<a href="/dashboard/changelogs/unset" class="btn btn-secondary">
									<i class="fas fa-wrench"></i> Unset
								</a>
								{%- else -%}
								<a
									href="/dashboard/changelogs/{{ record.id }}/set"
									class="btn btn-success"
								>
									<i class="fas fa-wrench"></i> Set
								</a>
								{%- endif -%}
								<a
									href="/dashboard/changelogs/{{ record.id }}/edit"
									class="btn btn-warning"
								>
									<i class="fas fa-edit"></i>
								</a>
								<a
									onclick="return confirm('Are you sure you want to delete this item?');"
									href="/dashboard/changelogs/{{ record.id }}/delete"
									class="btn btn-danger"
								>
									<i class="fas fa-trash-alt"></i>
								</a>
							</div>
						</td>
					</tr>

					{% endfor %} {%- else -%}{%- endif -%}
				</tbody>
			</table>
		</div>
	</div>
</div>
{% endblock %}
