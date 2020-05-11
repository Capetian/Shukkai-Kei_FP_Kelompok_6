<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Shukkaikei</title>

		<link
			rel="stylesheet"
			href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
			crossorigin="anonymous"
		/>
		<!-- <link rel="shortcut icon" type="image/x-icon" href="<?= $this->url->get('img/favicon.ico') ?>"/> -->
		<!-- Bootstrap core CSS -->
		<link
			href="../../public/vendor/app/bootstrap/css/bootstrap.min.css"
			rel="stylesheet"
		/>

		<!-- Custom fonts for this template -->
		<link
			href="../../public/vendor/app/fontawesome-free/css/all.min.css"
			rel="stylesheet"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic"
			rel="stylesheet"
			type="text/css"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
			rel="stylesheet"
			type="text/css"
		/>

		<!-- Custom styles for this template -->
		<link href="../../public/css/app/style.min.css" rel="stylesheet" />
	</head>
	<body>
		<?= $this->partial('partials/navbar') ?>
		
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/wp1929861.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="page-heading">
					<h1>Contact Me</h1>
					<span class="subheading">Questions or Feedbacks? Sure.</span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<p>
				Want to get in touch? Fill out the form below to send me any of your
				question and feedback and I will get back to you as soon as possible!
			</p>
			<!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
			<!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
			<!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
			<form action="/dashboard/feedbacks/create" method="POST">
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Name</label>
						<input
							type="text"
							class="form-control"
							placeholder="Name"
							id="name"
							name="name"
							required
							data-validation-required-message="Please enter your name."
						/>
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Email Address</label>
						<input
							type="email"
							class="form-control"
							placeholder="Email Address"
							id="email"
							name="email"
							required
							data-validation-required-message="Please enter your email address."
						/>
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<div class="control-group">
					<div class="form-group col-xs-12 floating-label-form-group controls">
						<label>Phone Number</label>
						<input
							type="tel"
							class="form-control"
							placeholder="Phone Number"
							id="phone"
							name="phone"
							required
							data-validation-required-message="Please enter your phone number."
						/>
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<div class="control-group">
					<div class="form-group floating-label-form-group controls">
						<label>Message</label>
						<textarea
							rows="5"
							class="form-control"
							placeholder="Message"
							id="message"
							name="content"
							required
							data-validation-required-message="Please enter a message."
						></textarea>
						<p class="help-block text-danger"></p>
					</div>
				</div>
				<br />
				<div id="success"></div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" id="sendMessageButton">
						Send
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
 
		<?= $this->partial('partials/footer') ?>

	</body>
	<script
		src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"
	></script>

	<script
		src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"
	></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"
	></script>

	<!-- Bootstrap core JavaScript -->
	<script src="../../public/vendor/app/jquery/jquery.min.js"></script>
	<script src="../../public/vendor/app/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Contact Form JavaScript -->
	<script src="../../public/js/app/jqBootstrapValidation.js"></script>
	<script src="../../public/js/app/contact_me.js"></script>

	<!-- Custom scripts for this template -->
	<script src="../../public/js/app/clean-blog.min.js"></script>
</html>
