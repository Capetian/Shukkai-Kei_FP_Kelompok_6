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
	style="background-image: url('/public/img/japan/364322.jpg');"
>
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1>About Me</h1>
					<span class="subheading">This is what I do.</span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum
				ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta
				odio, adipisci quas excepturi maxime quae totam ducimus consectetur?
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius
				praesentium recusandae illo eaque architecto error, repellendus iusto
				reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in
				officia voluptas voluptatibus, minus!
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut
				consequuntur magnam, excepturi aliquid ex itaque esse est vero natus
				quae optio aperiam soluta voluptatibus corporis atque iste neque sit
				tempora!
			</p>
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
