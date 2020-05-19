{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Users</h1>
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
		<h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
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
						<th>Username</th>
						<th>Email</th>
						<th>
							Action
						</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Username</th>
						<th>Email</th>
						<th>
							Action
						</th>
					</tr>
				</tfoot>
				<tbody>
					{%- if users |length > 0 -%} {% for user in users %} {%- if
					user.role != 2 -%}
					<tr>
						<td>{{ user.username }}</td>
						<td>{{ user.email }}</td>

						<td>

							<div class="d-flex justify-content-center">
								<form class="form-inline ml-2" action="{{url('Admin/moderator/update')}}" method="POST">
                             
									<input type='hidden' name='<?php echo $this->security->getTokenKey() ?>'
										value='<?php echo $this->security->getToken() ?>'/>
									<input type="hidden" name="uid" value="{{ user.id }}">
									<select name="role" class="form-control" >
										{% if user.role == 0 %}
										<option value="" disabled selected> User </option>
										<option value="1">Moderator</option>
										{% else %}
										<option value="" disabled selected> Moderator </option>
										<option value="0">User</option>
										{% endif %}
									</select>
									<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Change Role</button>
								</form>
							</div>

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
