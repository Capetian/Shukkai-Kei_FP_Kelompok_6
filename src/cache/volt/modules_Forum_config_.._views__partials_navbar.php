<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand" href="<?= $this->url->get('/Forum/index') ?>">Shukkaikei Forum</a>
		<button
			class="navbar-toggler navbar-toggler-right"
			type="button"
			data-toggle="collapse"
			data-target="#navbarResponsive"
			aria-controls="navbarResponsive"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			Menu
			<i class="fas fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= $this->url->get('/Forum') ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= $this->url->get('/Blog') ?>">Blog</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= $this->url->get('/Forum/forum') ?>">Forum</a>
				</li><?php if ($this->session->has('auth')) { ?><?php if ($this->session->get('auth')['role'] == 2) { ?><li class="nav-item">
					<a class="nav-link" href="<?= $this->url->get('/Admin') ?>">Dashboard</a>
				</li><?php } ?><li class="nav-item">
					<a
						class="nav-link"
						href="<?= $this->url->get('/Forum/user/show/') . $this->session->get('forum')['uid'] ?>"
						><?= $this->session->get('auth')['username'] ?><span class="sr-only"></span
					></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= $this->url->get('/Forum/auth/logout') ?>">Logout</a>
				</li><?php } else { ?><li class="nav-item">
					<a class="nav-link" href="<?= $this->url->get('/Forum/auth/login') ?>">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= $this->url->get('/Forum/auth/register') ?>"
						>Register <span class="sr-only"></span
					></a>
				</li><?php } ?></ul>
		</div>
	</div>
</nav>
