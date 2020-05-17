<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="{{ url('/Forum') }}">Navbar</a>
	<button
		class="navbar-toggler"
		type="button"
		data-toggle="collapse"
		data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent"
		aria-expanded="false"
		aria-label="Toggle navigation"
	>
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/Forum') }}"
					>Home <span class="sr-only">(current)</span></a
				>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/Blog') }}">Blog</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="{{ url('/Forum') }}">Forum</a>
			</li>
		</ul>
		<form
			class="form-inline ml-2"
			action="{{ url('/Forum/index/search') }}"
			method="POST"
		>
			<input
				type="hidden"
				name="<?php echo $this->security->getTokenKey() ?>"
				value="<?php echo $this->security->getToken() ?>"
			/>
			<input
				class="form-control mr-sm-2"
				type="search"
				placeholder="Search"
				aria-label="Search"
			/>
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">
				Search
			</button>
		</form>
		<ul class="navbar-nav ml-3">
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/Forum/auth/register') }}"
					>Register <span class="sr-only"></span
				></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ url('/Forum/auth/login') }}">Login</a>
			</li>
		</ul>
	</div>
</nav>
