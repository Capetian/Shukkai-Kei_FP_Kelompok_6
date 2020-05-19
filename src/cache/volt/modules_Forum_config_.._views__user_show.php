<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <?= $this->tag->rendertitle() ?>
		<?= $this->assets->outputCSS('header') ?>
		<?= $this->assets->outputCSS('authCss') ?>

	</head>
	<body>
		<?= $this->flashSession->output() ?>
		
<?php $usr = json_decode($user); ?>
<?php if ($user->role == 0) { ?>
<?php $role = 'User'; ?>
<?php } elseif ($user->role == 1) { ?>
<?php $role = 'Moderator'; ?>
<?php } else { ?>
<?php $role = 'Admin'; ?>
<?php } ?>
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-t-50 p-b-90">
			<?php if ($this->session->get('forum')['uid'] == $usr->id) { ?>
			<span class="login100-form-title p-b-51">
				Your Profile
				<h5 class="text-muted"> <?= $role ?> </h5>
			</span>
			<?php } else { ?>
			<span class="login100-form-title p-b-51">
				<?= $user->username ?>'s Profile
				<?php if ($user->role == 0) { ?>
				<?php $role = 'User'; ?>
				<?php } elseif ($user->role == 1) { ?>
				<?php $role = 'Moderator'; ?>
				<?php } else { ?>
				<?php $role = 'Admin'; ?>
				<?php } ?>
				<h5 class="text-muted"> <?= $role ?> </h5>
				<h5 class="text-muted"> <?= $user->email ?></h5>
			</span>
			<?php } ?>


			<?php if ($this->session->get('forum')['uid'] == $usr->id) { ?>
			<span class="login100-form-title p-b-51">
				Change email
			</span>
			<form
				class="login100-form validate-form flex-sb flex-w"
				action="<?= $this->url->get('/Forum/user/edit') ?>"
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
					value="<?= $this->session->get('forum')['uid'] ?>"
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
						value="<?= $user->email ?>"
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
			<?php } ?>
			<form action="<?= $this->url->get('/Forum') ?>">
				<div class="container-login100-form-btn m-t-17">
					<button class="back100-form-btn">
						Back to Homepage
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


	</body>
	<script
		src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"
	></script>
	<?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('appJs') ?>
</html>
