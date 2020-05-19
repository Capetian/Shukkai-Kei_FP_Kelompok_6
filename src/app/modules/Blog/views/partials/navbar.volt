<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand" href="{{ url('Blog/') }}">Shukkai-kei</a>
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
					<a class="nav-link" href="{{ url('/Blog/') }}">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Blog/index/about') }}">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Blog/index/contact') }}"
						>Contact</a
					>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Forum') }}">Forum</a>
				</li>

				{%- if session.has('auth') -%}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Blog/blog') }}">Blog</a>
				</li>
				{%- if session.get('auth')['role'] == 2-%}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Admin') }}">Dashboard</a>
				</li>
				{%- endif -%}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Blog/auth/logout') }}"
						>{{ session.get('auth')['username'] }}, Logout</a
					>
				</li>
				{%- else -%}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Blog/auth/login') }}">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Blog/auth/register') }}"
						>Register</a
					>
				</li>
				{%- endif -%}
			</ul>
		</div>
	</div>
</nav>
