<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <?= $this->tag->rendertitle() ?>
		<?= $this->assets->outputCSS('header') ?>
		<?= $this->assets->outputCSS('font') ?>
		<?= $this->assets->outputCSS('appCss') ?>

	</head>
	<body>
		<?= $this->partial('partials/navbar') ?>
		
<!-- Page Header -->
<header
	class="masthead"
	style="background-image: url('/public/img/japan/test.jpg');"
>
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Blog</h1>
					<span class="subheading">Meet your fellow Japanese enthusiast</span>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<div class="row">
		<!-- Blog Entries Column -->
		<div class="col-md-7">
			<h1 class="my-4">
				Blog
				<small>Posts</small>
			</h1>
			<hr />

			<!-- Blog Post --><?php if ($this->length($records) > 0) { ?><?php foreach ($records as $record) { ?>
			<div class="post-preview">
				<a href="<?= $this->url->get('/Blog/blog/show/') . $record->id ?>">
					<h2 class="post-title">
						<?= $record->title ?>
					</h2>
					<h3 class="post-subtitle">
						<?= $record->subtitle ?>
					</h3>
				</a>
				<p class="post-meta">
					Posted by
					<a href="#"><?= $record->username ?></a>
					on <?= $record->created_at ?>
				</p>
			</div>
			<hr />
			<?php } ?>

			<!-- Pagination -->
			<ul class="pagination justify-content-center mb-4">
				<li class="page-item">
					<a class="page-link" href="#">&larr; Older</a>
				</li>
				<li class="page-item disabled">
					<a class="page-link" href="#">Newer &rarr;</a>
				</li>
			</ul><?php } else { ?><h3>No posts found</h3><?php } ?></div>

		<div class="col-md-1"></div>

		<!-- Sidebar Widgets Column -->
		<div class="col-md-4">
	<!-- Search Widget -->
	<div class="card my-4">
		<h5 class="card-header">Search</h5>
		<div class="card-body">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for..." />
				<span class="input-group-btn">
					<button class="btn btn-secondary" type="button">Go!</button>
				</span>
			</div>
		</div>
	</div>

	<!-- Categories Widget -->
	<div class="card my-4">
		<h5 class="card-header">Categories</h5>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
					<ul class="list-unstyled mb-0">
						<li>
							<a href="#">Resources</a>
						</li>
						<li>
							<a href="#">Culture</a>
						</li>
						<li>
							<a href="#">Grammar</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="list-unstyled mb-0">
						<li>
							<a href="#">Experience</a>
						</li>
						<li>
							<a href="#">Anime</a>
						</li>
						<li>
							<a href="#">Tutorials</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Side Widget -->
	<!-- <div class="card my-4">
		<h5 class="card-header">Side Widget</h5>
		<div class="card-body">
			You can put anything you want inside of these side widgets. They are easy
			to use, and feature the new Bootstrap 4 card containers!
		</div>
	</div> -->
</div>

	</div>
	<!-- /.row -->
</div>

 
		<?= $this->partial('partials/footer') ?>

	</body>
	<script
		src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"
	></script>
	<?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('appJs') ?>

</html>
