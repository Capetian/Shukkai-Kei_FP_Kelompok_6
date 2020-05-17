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
        
<div class="container mt-5">
	<div class="row-center mt-5">
		<div class="col-md-auto bg-white">
			<div class="text-center">
				<table class="table table-hover">
					<thead class="thead bg-primary text-white text-center">
						<tr>
							<th scope="col" class="th text-justify">
								<h5><?= $name ?></h5>
							</th>
							<th scope="col"><h6>Replies</h6></th>
							<th scope="col"><h6>Created</h6></th>
							<th scope="col"><h6>Last Post</h6></th>
						</tr>
					</thead>
					<tbody class="th text-center">
						<?php foreach ($threads as $thread) { ?>
						<?php $idx = $this->length($thread->replies); ?>
						<?php $reply = $thread->replies[$idx - 1]; ?>
						<?php $t = json_decode($thread); ?>
						<tr>
							<th scope="row" class="th text-justify">
								<a href="<?= $this->url->get('/Forum/thread/show/') . $t->id ?>"
									><h5><?= $thread->title ?></h5></a>
							</th>
							<th scope="row">
								<h6><?= $idx ?></h6>
							</th>
							<th scope="row"><?= date('j-M-y', $thread->created_at) ?></th>
							<th scope="row">
								<div class="col">
									<div class="row">
										<?= $reply->content ?>
									</div>
									<div class="row">
										<?= $reply->user->username ?>
									</div>
									<div class="row">
										<?= date('j-M-y', $reply->created_at) ?>
									</div>
								</div>
							</th>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row-center">
		<div class="col-md-auto bg-white">
			<a href="<?= $this->url->get('/Forum/thread/create/') ?>">Create a Thread >></a>
		</div>
	</div>
</div>

        <?= $this->partial('partials/footer') ?>
    </body>
 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('appJs') ?>

</html>