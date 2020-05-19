{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Members</h1>
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
		<h6 class="m-0 font-weight-bold text-primary">Members Table</h6>
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
						<th>Username</th>
						<th>Email</th>
						<th>
							Action
						</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>
							Action
						</th>
					</tr>
				</tfoot>
				<tbody>
					{%- if records|length > 0 -%} {% for record in records %} {%- if
					record.is_admin != 1 -%}
					<tr>
						<td>{{ record.id }}</td>
						<td>{{ record.username }}</td>
						<td>{{ record.email }}</td>

						<td>
							{%- if record.active == 1-%}
							<div class="d-flex justify-content-center">
								<a
									onclick="return confirm('Are you sure you want to update this account?');"
									href="{{ url('/Admin/members/update/') ~ record.id }}"
									class="btn btn-danger"
								>
									<i class="fas fa-ban"></i> Deactivate
								</a>
							</div>

							{%- else -%}
							<div class="d-flex justify-content-center">
								<a
									onclick="return confirm('Are you sure you want to update this account?');"
									href="{{ url('/Admin/members/update/') ~ record.id }}"
									class="btn btn-success"
								>
									<i class="fas fa-check"></i> Activate
								</a>
							</div>
							{%- endif -%}
						</td>
					</tr>
					{%- endif -%} {% endfor %} {%- else -%}
					<tr>
						<td colspan="5">No members found</td>
					</tr>
					{%- endif -%}
				</tbody>
			</table>
		</div>
	</div>
</div>
{% endblock %}
