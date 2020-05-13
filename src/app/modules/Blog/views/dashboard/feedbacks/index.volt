{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Feedbacks</h1>
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
		<h6 class="m-0 font-weight-bold text-primary">Feedbacks Table</h6>
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
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Content</th>
						<th>
							Action
						</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Content</th>
						<th>
							Action
						</th>
					</tr>
				</tfoot>
				<tbody>
					{%- if records|length > 0 -%} {% for record in records %}
					<tr>
						<td>{{ record.id }}</td>
						<td>{{ record.name }}</td>
						<td>{{ record.email }}</td>
						<td>{{ record.phone }}</td>
						<td>{{ record.content }}</td>
						<td>
							<div class="d-flex justify-content-center">
								<a
									onclick="return confirm('Are you sure you want to delete this feedbacks?');"
									href="{{ url('/Blog/feedbacks/delete/') ~ record.id }}"
									class="btn btn-danger"
								>
									<i class="fas fa-trash-alt"></i> Delete
								</a>
							</div>
						</td>
					</tr>
					{% endfor %} {%- else -%}
					<tr>
						<td colspan="5">No feedbacks found</td>
					</tr>
					{%- endif -%}
				</tbody>
			</table>
		</div>
	</div>
</div>
{% endblock %}
