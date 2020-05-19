{% extends 'dashboard.volt' %} {% block content %}
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
		><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a
	> -->
</div>

<!-- Content Row -->
<div class="row">
	<!-- Subforum -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div
							class="text-xs font-weight-bold text-danger text-uppercase mb-1"
						>
							Subforum
						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							{{ subforums | length }}
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-stream fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Thread Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-secondary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div
							class="text-xs font-weight-bold text-secondary text-uppercase mb-1"
						>
							Thread
						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							{{ threads | length }}
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-clone fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Content Row -->
<div class="row">
	<!-- Content Column -->
	<!-- <div class="col-lg-6 mb-4"></div> -->

	<div class="col-lg-12 mb-4">
		<!-- Illustrations -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">
					Illustrations
				</h6>
			</div>
			<div class="card-body">
				<div class="text-center">
					<img
						class="img-fluid px-3 px-sm-4 mt-3 mb-4"
						style="width: 25rem;"
						src="img/undraw_posting_photo.svg"
						alt=""
					/>
				</div>
				<p>[Under Construction]</p>
				<!-- <p>
					Add some quality, svg illustrations to your project courtesy of
					<a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a
					>, a constantly updated collection of beautiful svg images that you
					can use completely free and without attribution!
				</p>
				<a target="_blank" rel="nofollow" href="https://undraw.co/"
					>Browse Illustrations on unDraw &rarr;</a
				> -->
			</div>
		</div>

		<!-- Approach -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">
					Development Approach
				</h6>
			</div>
			<div class="card-body">
				<p>[Under Construction]</p>
				<!-- <p>
					SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order
					to reduce CSS bloat and poor page performance. Custom CSS classes are
					used to create custom components and custom utility classes.
				</p>
				<p class="mb-0">
					Before working with this theme, you should become familiar with the
					Bootstrap framework, especially the utility classes.
				</p> -->
			</div>
		</div>
	</div>
</div>

{% endblock %}
