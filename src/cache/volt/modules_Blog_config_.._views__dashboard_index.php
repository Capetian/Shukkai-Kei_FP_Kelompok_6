<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Shukkai-kei Dashboard</title>

		<?= $this->assets->outputCSS('font') ?>
		<?= $this->assets->outputCSS('adminCss') ?>
	</head>

	<body id="page-top">
		<!-- Page Wrapper -->
		<div id="wrapper">
			<!-- Sidebar -->
			<?= $this->partial('partials/dashboard/sidebar') ?>

			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
				<!-- Main Content -->
				<div id="content">
					<!-- Topbar -->
					<?= $this->partial('partials/dashboard/topbar') ?>

					<!-- End of Topbar -->

					<!-- Begin Page Content -->
					<div class="container-fluid">
						<?= $this->flashSession->output() ?>
						
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
		><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a
	> -->
</div>

<!-- Content Row -->
<div class="row">
	<!-- Posts -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div
							class="text-xs font-weight-bold text-primary text-uppercase mb-1"
						>
							Posts
						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?= $this->length($posts) ?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-paper-plane fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Member Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div
							class="text-xs font-weight-bold text-success text-uppercase mb-1"
						>
							Members
						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?= $this->length($users) ?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-user-friends fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Comments Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div
							class="text-xs font-weight-bold text-success text-uppercase mb-1"
						>
							Comments
						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?= $this->length($comments) ?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-comments fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div
							class="text-xs font-weight-bold text-warning text-uppercase mb-1"
						>
							Feedbacks
						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?= $this->length($feedbacks) ?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-smile fa-2x text-gray-300"></i>
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


					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; Shukkai-kei 2020</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
			</div>
			<!-- End of Content Wrapper -->
		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<?= $this->partial('partials/dashboard/logout_modal') ?>

	</body>
	<?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('adminJs') ?>

</html>
