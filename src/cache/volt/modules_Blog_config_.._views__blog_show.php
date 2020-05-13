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
		

<header
	class="masthead"
	style="background-image: url('/public/img/japan/test.jpg');"
>
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Post</h1>
					<span class="subheading">Meet your fellow Japanese enthusiast</span>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">
	<div class="row">
		<!-- Post Content Column -->
		<div class="col-lg-7"><?php if ($this->length($records) > 0) { ?><!-- Title -->
			<h1 class="mt-4"><?= $records[0]->title ?></h1>

			<!-- Author -->
			<p class="lead">
				by
				<a href="#"><?= $records[0]->username ?></a>
			</p>

			<hr />

			<!-- Date/Time -->
			<p>Posted on <?= $records[0]->created_at ?></p>

			<hr />

			<!-- Post Content -->
			<p class="lead">
				<?= $records[0]->subtitle ?>
			</p>

			<hr />

			<!-- Comments Form -->
			<div class="card my-4">
				<h5 class="card-header">Leave a Comment:</h5>
				<div class="card-body">
					<form action="<?= $this->url->get('/Blog/comments/create') ?>" method="POST">
						<input type="hidden" name="post_id" value="<?= $records[0]->id ?>" />
						<div class="form-group">
							<textarea class="form-control" rows="3" name="content"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div><?php if ($this->length($comments) > 0) { ?><!-- Single Comment -->

			<div class="card my-4">
				<h5 class="card-header">Comments (<?= $this->length($comments) ?>)</h5>
				<div class="card-body">
					<?php foreach ($comments as $comment) { ?>
					<div class="media mb-4">
						<div class="media-body">
							<h5 class="mt-0"><?= $comment->username ?> said:</h5>
							<?= $comment->content ?>
						</div>
					</div>
					<hr />
					<?php } ?>
				</div>
			</div><?php } else { ?><div class="card my-4">
				<h5 class="card-header">Comments (0)</h5>
				<div class="card-body">Currently no comment for this post</div>
			</div><?php } ?><?php } else { ?><h1>No post found</h1><?php } ?></div>

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
