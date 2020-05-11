{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Comments</h1>
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
		<h6 class="m-0 font-weight-bold text-primary">Comments Table</h6>
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
						<th>Post Title</th>
						<th>Username</th>
						<th>Content</th>
						<th>
							Action
						</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Post Title</th>
						<th>Username</th>
						<th>Content</th>
						<th>
							Action
						</th>
					</tr>
				</tfoot>
				<tbody>
					{%- if records|length > 0 -%} {% for record in records %}
					<tr>
						<td>{{ record.comments.id }}</td>
						<td>{{ record.posts.title }}</td>
						<td>{{ record.comments.username }}</td>
						<td>{{ record.comments.content }}</td>
						<td>
							<div class="d-flex justify-content-center">
								<a
									onclick="return confirm('Are you sure you want to delete this comments?');"
									href="/dashboard/comments/{{ record.comments.id }}/delete"
									class="btn btn-danger"
								>
									<i class="fas fa-trash-alt"></i> Delete
								</a>
							</div>
						</td>
					</tr>
					{% endfor %} {%- endif -%}
				</tbody>
			</table>
		</div>
	</div>
</div>
{% endblock %}
