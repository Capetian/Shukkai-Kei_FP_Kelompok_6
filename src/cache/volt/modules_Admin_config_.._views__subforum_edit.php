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
<h1 class="h3 mb-2 text-gray-800">Edit Subforum</h1>
<!-- <p class="mb-4">
		DataTables is a third party plugin that is used to generate the demo table
		below. For more information about DataTables, please visit the
		<a target="_blank" href="https://datatables.net"
			>official DataTables documentation</a
		>.
	</p> -->

<!-- Form Example -->
<?php $subforum = json_decode($subforum); ?><?php if ($subforum->id != null) { ?><div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Form</h6>
	</div>
	<div class="card-body">
		<form action="<?= $this->url->get('Admin/subforum/update') . $subforum->id ?>" method="POST">
			<div class="form-group">
				<input
				type="hidden"
				name="<?php echo $this->security->getTokenKey() ?>"
				value="<?php echo $this->security->getToken() ?>"
				/>
				<label for="Name">Name</label>
				<input
					type="text"
					class="form-control"
					id="name"
					name="name"
					placeholder="Subforum Name"
				/>
			</div>
			<div class="form-group">
				<label for="content">Description</label>
				<textarea class="form-control" id="desc" name="desc"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>
</div><?php } else { ?><h1>There is no such record</h1><?php } ?>
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
	<script
		src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"
	></script>
	<?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('adminJs') ?>
</html>
