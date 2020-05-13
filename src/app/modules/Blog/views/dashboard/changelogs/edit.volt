{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Posts</h1>
<!-- <p class="mb-4">
		DataTables is a third party plugin that is used to generate the demo table
		below. For more information about DataTables, please visit the
		<a target="_blank" href="https://datatables.net"
			>official DataTables documentation</a
		>.
	</p> -->

<!-- Form Example -->
{%- if record|length > 0 -%}

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Form</h6>
	</div>
	<div class="card-body">
		{% for data in record %}
		<form action="{{url('/Blog/changelogs/update/') ~ data.id }}" method="POST">
			<input type="hidden" name="id" value="{{ data.id }}" />
			<div class="form-group">
				<label for="title">Title</label>
				<input
					type="text"
					class="form-control"
					id="title"
					name="title"
					placeholder="Enter Title"
					value="{{ data.title }}"
				/>
			</div>
			<div class="form-group">
				<label for="activated_pages">Activated Pages: </label>
			</div>
			{%- if posts|length > 0 -%} {% for post in posts %}
			<div class="form-check-inline">
				<label class="form-check-label">
					<input
						type="checkbox"
						name="activated_pages[]"
						class="form-check-input"
						value="{{ post.id }}"
					/>{{ post.title }}
				</label>
			</div>
			{% endfor %} {%- endif -%}
			<hr />
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
		{% endfor %}
	</div>
</div>
{%- else -%}
<h1>There is no such record</h1>
{%- endif -%} {% endblock %}
