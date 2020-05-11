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
<header class="masthead" style="background-image: <?= $this->url->get('img/japan/test.jpg') ?>">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>出会系</h1>
					<span class="subheading">Meet your fellow Japanese enthusiast</span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<h1 class="my-4">
				Blog
				<small>Recent Posts</small>
			</h1>
			<hr />

			<!-- Blog Post --><?php if ($this->length($records) > 0) { ?><?php foreach ($records as $record) { ?>
			
			<div class="post-preview"><?php if ($this->session->get('auth')['is_admin'] == 1) { ?><a href="Blog/blog/<?= $record->id ?>"><?php } else { ?><a href="Blog/auth/login"><?php } ?><h2 class="post-title">
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
			<!-- <ul class="pagination justify-content-center mb-4">
				<li class="page-item">
					<a class="page-link" href="#">&larr; Older</a>
				</li>
				<li class="page-item disabled">
					<a class="page-link" href="#">Newer &rarr;</a>
				</li>
			</ul> --><?php } else { ?><h3>No posts found</h3><?php } ?><!-- Pager -->
			<div class="clearfix"><?php if ($this->session->get('auth')['is_admin'] == 1) { ?><a class="btn btn-primary float-right" href="<?= $this->url->get('Blog/blog') ?>"
					><?php } else { ?><a class="btn btn-primary float-right" href="<?= $this->url->get('Blog/auth/login') ?>"><?php } ?>More Posts &rarr;</a
				>
			</div>
			
			
		</div>
	</div>
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
