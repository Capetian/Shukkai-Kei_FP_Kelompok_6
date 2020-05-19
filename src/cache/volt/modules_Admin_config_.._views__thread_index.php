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
<h1 class="h3 mb-2 text-gray-800">Subforum</h1>
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
		<h6 class="m-0 font-weight-bold text-primary">Subforum Table</h6>
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
						<th>Thread title</th>
						<th>Replies</th>
						<th>Created at</th>
						<th>Last Post</th>
						<th>
							<div class="d-flex justify-content-center">
								<a
									href="<?= $this->url->get('/Forum/thread/create') ?>"
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
						<th>Thread title</th>
						<th>Replies</th>
						<th>Created at</th>
						<th>Last Post</th>
						<th>
							Action
						</th>
					</tr>
				</tfoot>
				<tbody><?php if ($this->length($threads) > 0) { ?><?php foreach ($threads as $thread) { ?> <?php $idx = $this->length($thread->replies); ?> <?php $reply = $thread->replies[$idx - 1]; ?>
					<?php $t = json_decode($thread); ?>
					<tr>
						<td>
							<div
								class="d-flex justify-content-center align-items-center w-100 h-100"
							>
								<h5><?= $thread->title ?></h5>
							</div>
						</td>
						<td>
							<?php $idx = $this->length($thread->replies); ?>
							<div
								class="d-flex justify-content-center align-items-center w-100 h-100"
							>
								<h6><?= $idx ?></h6>
							</div>
						</td>
						<td>
							<div
								class="d-flex justify-content-center align-items-center w-100 h-100"
							>
								<h6><?= date('j-M-y', $thread->created_at) ?></h6>
							</div>
						</td>
						<td>
							<div
								class="d-flex flex-column justify-content-center align-items-center w-100 h-100"
							>
								<div class="p-2">
									<?= $reply->content ?>
								</div>

								<div class="p-0 font-italic">by <?= $reply->user->username ?></div>

								<div class="p-0">
									<?= date('j-M-y', $reply->created_at) ?>
								</div>
							</div>
						</td>
						<td>
							<div class="d-flex justify-content-center">
								<a
									href="<?= $this->url->get('/Forum/thread/show/') . $t->id ?>"
									class="btn btn-info"
								>
									<i class="fas fa-eye"></i>
								</a>
								<!-- <a href="#" class="btn btn-warning">
									<i class="fas fa-edit"></i>
								</a>
								<a
									onclick="return confirm('Are you sure you want to delete this item?');"
									href="#"
									class="btn btn-danger"
								>
									<i class="fas fa-trash-alt"></i>
								</a> -->
							</div>
						</td>
					</tr>

					<?php } ?><?php } else { ?><tr>
						<td colspan="4">No thread found</td>
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
	<script
		src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"
	></script>
	<?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('adminJs') ?>
</html>
