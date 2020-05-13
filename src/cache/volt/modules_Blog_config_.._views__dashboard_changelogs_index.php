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
<h1 class="h3 mb-2 text-gray-800">Changelogs</h1>
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
		<h6 class="m-0 font-weight-bold text-primary">Changelogs Table</h6>
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
						<th>Title</th>
						<th>Activated Pages</th>
						<th>Created By</th>
						<th>Created At</th>
						<th>
							<div class="d-flex justify-content-center">
								<a
									href="<?= $this->url->get('/Blog/changelogs/create') ?>"
									class="btn btn-primary"
								>
									<i class="fas fa-plus"></i> Create
								</a>
							</div>
						</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Activated Pages</th>
						<th>Created By</th>
						<th>Created At</th>
						<th>
							Action
						</th>
					</tr>
				</tfoot>
				<tbody><?php if ($this->length($records) > 0) { ?><?php foreach ($records as $record) { ?>
					<tr>
						<td><?= $record->id ?></td>
						<td><?= $record->title ?></td>
						<td><?= $record->activated_pages ?></td>
						<td><?= $record->username ?></td>
						<td><?= $record->created_at ?></td>
						<td>
							<div class="d-flex justify-content-center"><?php if ($record->setted == 1) { ?><a
									href="<?= $this->url->get('/Blog/changelogs/unset') ?>"
									class="btn btn-secondary"
								>
									<i class="fas fa-wrench"></i> Unset
								</a><?php } else { ?><a
									href="<?= $this->url->get('/Blog/changelogs/set/') . $record->id ?>"
									class="btn btn-success"
								>
									<i class="fas fa-wrench"></i> Set
								</a><?php } ?><a
									href="<?= $this->url->get('/Blog/changelogs/edit/') . $record->id ?>"
									class="btn btn-warning"
								>
									<i class="fas fa-edit"></i>
								</a>
								<a
									onclick="return confirm('Are you sure you want to delete this item?');"
									href="<?= $this->url->get('/Blog/changelogs/delete/') . $record->id ?>"
									class="btn btn-danger"
								>
									<i class="fas fa-trash-alt"></i>
								</a>
							</div>
						</td>
					</tr>

					<?php } ?><?php } else { ?><tr>
						<td colspan="5">No changelogs found</td>
					</tr><?php } ?></tbody>
			</table>
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
