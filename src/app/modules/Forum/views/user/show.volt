{% extends 'auth.volt' %} {% block content %}

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-t-50 p-b-90">
			<form
				class="login100-form validate-form flex-sb flex-w"
				action="{{ url('/Forum/user/edit') }}"
				method="POST"
			>
				<span class="login100-form-title p-b-51">
					{{ user.username }}'s Profile
				</span>

				<input
					type="hidden"
					name="<?php echo $this->security->getTokenKey() ?>"
					value="<?php echo $this->security->getToken() ?>"
				/>

				<input
					type="hidden"
					name="uid"
					value="{{ session.get('forum')['uid'] }}"
				/>
				<span class="focus-input100"></span>

				<div
					class="wrap-input100 validate-input m-b-16"
					data-validate="Username is required"
				>
					<input
						class="input100"
						type="text"
						name="username"
						value="{{ session.get('auth')['username'] }}"
						disabled
					/>
					<span class="focus-input100"></span>
				</div>

				<div
					class="wrap-input100 validate-input m-b-16"
					data-validate="Email is required"
				>
					<input
						class="input100"
						type="email"
						name="email"
						placeholder="E-mail"
						value="{{ user.email }}"
					/>
					<span class="focus-input100"></span>
				</div>

				<div
					class="wrap-input100 validate-input m-b-16"
					data-validate="Password is required"
				>
					<input
						class="input100"
						type="password"
						name="password"
						placeholder="Password"
					/>
					<span class="focus-input100"></span>
				</div>

				<div
					class="wrap-input100 validate-input m-b-16"
					data-validate="Confirm Password is required"
				>
					<input
						class="input100"
						type="password"
						name="confirm"
						placeholder="Confirm Password"
					/>
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn m-t-17">
					<button type="submit" class="login100-form-btn">
						Update
					</button>
				</div>
			</form>
			<hr />
			<form action="{{ url('/Forum') }}">
				<div class="container-login100-form-btn m-t-17">
					<button class="back100-form-btn">
						Back to Homepage
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

{% endblock %}
