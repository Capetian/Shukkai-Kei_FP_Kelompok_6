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
					<h1>Forum</h1>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="card text-center">
	<div class="card-header font-weight-bold">
		<h3>Subforum</h3>
	</div>
	<div class="card-body pb-5">
		<table class="table table-bordered table-hover w-100 h-100">
			<thead>
				<tr>
					<th>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							Name
						</div>
					</th>
					<th>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							Description
						</div>
					</th>
					<th>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							Posts
						</div>
					</th>
					<th><?php if ($this->session->has('auth')) { ?><?php if ($this->session->get('auth')['role'] == 2) { ?><a href="<?= $this->url->get('/Admin/subforum/create') ?>" class="btn btn-sm btn-primary p-2" />New <i class="fas fa-plus"></i></a><?php } ?><?php } ?></th>
				</tr>
			</thead>
			<tbody><?php if ($this->length($subforums) > 0) { ?><?php foreach ($subforums as $subforum) { ?>

				<tr>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h5><?= $subforum->name ?></h5>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h6><?= $subforum->description ?></h6>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<h6><?= $this->length($subforum->threads) ?></h6>
						</div>
					</td>
					<td>
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<form action="<?= $this->url->get('/Forum/subforum/show/') . $subforum->id ?>">
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
					<td colspan="4"><h3>Not found</h3></td>
				</tr><?php } ?></tbody>
		</table>

		<form action="<?= $this->url->get('/Forum/subforum/index') ?>" class="mt-5">
			<input type="submit" class="btn btn-secondary" value="Browse Subforum" />
		</form>
	</div>
</div>

<div class="card text-center">
	<div class="card-header font-weight-bold">
		<h5>Lastest Discussions</h5>
	</div>
	<div class="card-body pb-5">
		<table class="table table-bordered table-hover w-100 h-100">
			<thead>
				<tr>
					<th>Thread title</th>
					<th>Replies</th>
					<th>Created at</th>
					<th>Last Post</th>
					<th></th>
				</tr>
			</thead>
			<tbody><?php if ($this->length($threads) > 0) { ?><?php foreach ($threads as $thread) { ?> <?php $idx = $this->length($thread->replies); ?> <?php $reply = $thread->replies[$idx - 1]; ?> <?php $t = json_decode($thread); ?>

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
					
						<div
							class="d-flex justify-content-center align-items-center w-100 h-100"
						>
							<form action="<?= $this->url->get('/Forum/thread/show/') . $t->id ?>">
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
					<td colspan="5"><h3>Not found</h3></td>
				</tr><?php } ?></tbody>
        </table>
        
        <a href="<?= $this->url->get('/Forum/thread/create') ?>" class="btn btn-primary mt-5">Create a Thread <i class="fas fa-plus"></i></a>
	</div>
</div>


        <?= $this->partial('partials/footer') ?>
    </body>
 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('appJs') ?>

</html>