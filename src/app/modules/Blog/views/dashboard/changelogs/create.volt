{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create Changelogs</h1>
<!-- <p class="mb-4">
		DataTables is a third party plugin that is used to generate the demo table
		below. For more information about DataTables, please visit the
		<a target="_blank" href="https://datatables.net"
			>official DataTables documentation</a
		>.
	</p> -->

<!-- Form Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Form</h6>
	</div>
	<div class="card-body">
		<form action="/dashboard/changelogs/store" method="POST">
			<div class="form-group">
				<label for="title">Title</label>
				<input
					type="text"
					class="form-control"
					id="title"
					name="title"
					placeholder="Enter Title"
				/>
			</div>
			<div class="form-group">
				<label for="activated_pages">Activated Pages: </label>
			</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input id="select-all" type="checkbox" class="form-check-input" />
					Select All
				</label>
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
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Create</button>
			</div>
		</form>
	</div>
</div>

<script>
	document.getElementById('select-all').onclick = function () {
		console.log('HALO');
		let checkboxes = document.getElementsByName('activated_pages[]');
		for (let checkbox of checkboxes) {
			checkbox.checked = this.checked;
		}
	};
</script>
{% endblock %}
