{% extends 'auth.volt' %} {% block content %}
{% set usr = user |json_decode %}
{% if user.role == 0 %}
{% set role = "User" %}
{% elseif user.role == 1 %}
{% set role = "Moderator" %}
{% else %}
{% set role = "Admin" %}
{% endif %}
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-t-50 p-b-90">
			{% if  session.get('forum')['uid'] == usr.id  %}
			<span class="login100-form-title p-b-51">
				Your Profile
				<h5 class="text-muted"> {{ role }} </h5>
			</span>
			{% else %}
			<span class="login100-form-title p-b-51">
				{{ user.username }}'s Profile
				{% if user.role == 0 %}
				{% set role = "User" %}
				{% elseif user.role == 1 %}
				{% set role = "Moderator" %}
				{% else %}
				{% set role = "Admin" %}
				{% endif %}
				<h5 class="text-muted"> {{ role }} </h5>
				<h5 class="text-muted"> {{ user.email }}</h5>
			</span>
			{% endif %}


			{% if  session.get('forum')['uid'] == usr.id  %}
			<span class="login100-form-title p-b-51">
				Change email
			</span>
			<form
				class="login100-form validate-form flex-sb flex-w"
				action="{{ url('/Forum/user/edit') }}"
				method="POST"
			>
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
			{% endif %}
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
