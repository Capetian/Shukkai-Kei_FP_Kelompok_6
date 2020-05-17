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
	style="background-color: lightgreen; margin-bottom: 0px;"
>
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading" style="padding: 100px 0;">
					<h1>Search</h1>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="card text-center">
	<div class="card-header">
		Thread Search Result (<?= $this->length($results) ?> found)
	</div>
	<div class="card-body pb-5">
		<table class="table table-bordered table-hover w-100 h-100">
			<thead>
				<tr>
					<th>Title</th>
					<th>Created By</th>
					<th></th>
				</tr>
			</thead>
			<tbody><?php if ($this->length($results) > 0) { ?><?php foreach ($results as $result) { ?> <?php $r = json_decode($result); ?>

				<tr>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h5><?= $r->title ?></h5>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h6><?= $result->user->username ?></h6>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<form action="/Forum/thread/show/<?= $r->id ?>">
								<input
									type="submit"
									class="btn btn-outline-success"
									value="Open"
								/>
							</form>
						</div>
					</td>
				</tr>
				<?php } ?><?php } else { ?><tr>
					<td colspan="3"><h3>Not found</h3></td>
				</tr><?php } ?></tbody>
		</table>
	</div>
</div>


        <?= $this->partial('partials/footer') ?>
    </body>
 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('appJs') ?>

</html>