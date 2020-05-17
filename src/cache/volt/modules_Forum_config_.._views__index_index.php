<?= $this->tag->getDoctype() ?>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= $this->tag->rendertitle() ?>
        <?= $this->assets->outputCSS('header') ?>
        <?= $this->assets->outputCSS('font') ?>
		<?= $this->assets->outputCSS('appCss') ?>

        <!-- <link rel="shortcut icon" type="image/x-icon" href="<?= $this->url->get('img/favicon.ico') ?>"/> -->
    </head>

    <body>
        <?= $this->partial('partials/navbar') ?>
        

<!-- Page Header -->
<header
	class="masthead"
	style="background-color: lightgreen; margin-bottom: 0px; height: 100vh;"
>
	<div class="overlay" style="height: 100vh;"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Forum</h1>
					<span class="subheading">Search what you need: </span>
					<span class="subheading" style="padding-top: 50px;">
						<form
							class="form-inline ml-2 justify-content-center w-100"
							action="<?= $this->url->get('/Forum/index/search') ?>"
							method="POST"
						>
							<input
								type="hidden"
								name="<?php echo $this->security->getTokenKey() ?>"
								value="<?php echo $this->security->getToken() ?>"
							/>
							<input
								class="form-control mr-sm-2 w-100 mb-3"
								name="search"
								type="search"
								placeholder="Find keyword"
								aria-label="Search"
							/>
							<button class="btn btn-dark my-2 my-sm-0" type="submit">
								Search
							</button>
						</form>
					</span>
				</div>
			</div>
		</div>
	</div>
</header>


    </body>
 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('appJs') ?>

</html>