<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/Forum/index') }}">Shukkaikei Forum</a>
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
					<a class="nav-link" href="{{ url('/Forum') }}">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Blog') }}">Blog</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Forum/forum') }}">Forum</a>
				</li>

				{%- if session.has('auth') -%} {%- if session.get('auth')['role'] ==
				2-%}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Admin') }}">Dashboard</a>
				</li>
				{%- endif -%}
				<li class="nav-item">
					<a
						class="nav-link"
						href="{{url('/Forum/user/show/') ~ session.get('forum')['uid'] }}"
						>{{ session.get('auth')['username'] }}<span class="sr-only"></span
					></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Forum/auth/logout') }}">Logout</a>
				</li>
				{%- else -%}
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Forum/auth/login') }}">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ url('/Forum/auth/register') }}"
						>Register <span class="sr-only"></span
					></a>
				</li>
				{%- endif -%}
			</ul>
		</div>
	</div>
</nav>
