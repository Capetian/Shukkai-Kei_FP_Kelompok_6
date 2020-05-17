{% extends 'home.volt' %} {% block content %}

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
							action="{{ url('/Forum/index/search') }}"
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

{% endblock %}
