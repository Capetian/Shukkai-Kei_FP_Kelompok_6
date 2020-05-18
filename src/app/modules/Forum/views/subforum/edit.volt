{% extends 'auth.volt' %} {% block content %}
<div class="container mt-5 mx-auto">
	<div class="row">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/Forum/index">Home</a></li>
				<li class="breadcrumb-item">
					<a href="/Forum/subforum/index">Subforum</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Edit</li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col bg-light p-5">
			<div class="h2 mb-5">Edit a Subforum</div>
			{% set sf = subforum| json_decode%}
			<form action="{{ url('/Forum/admin/updateSub/') ~ sf.id }}" method="POST">
				<input
					type="hidden"
					name="<?php echo $this->security->getTokenKey() ?>"
					value="<?php echo $this->security->getToken() ?>"
				/>
				<div class="form-group row">
					<div class="col-md-8">
						<input
							type="text"
							class="form-control"
							id="name"
							name="name"
							placeholder="Subforum Name"
							value="{{ subforum.name }}"
						/>
					</div>
				</div>
				<div class="form-group row pb-1">
					<div class="col-md-9">
						<textarea
							class="form-control"
							id="desc"
							name="desc"
							placeholder="Insert Subforum Description ..."
							>{{ subforum.description }}</textarea
						>
					</div>
				</div>
				<button type="submit" class="btn btn-primary mr-auto">Update</button>
			</form>
		</div>
	</div>
</div>
{% endblock %}
