a:3:{i:0;s:391:"<!DOCTYPE html>
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
		";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:1:" ";s:4:"file";s:143:"D:\DeveloperTools\xamppREINSTALL\htdocs\_Phalcon\shukkaikei-kelompok\Shukkai-Kei_FP_Kelompok_6\src\app\modules\Forum\config/../views/\auth.volt";s:4:"line";i:14;}}i:1;s:297:"
	</body>
	<script
		src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"
	></script>
	<?= $this->assets->outputJS('js') ?>
	<?= $this->assets->outputJS('appJs') ?>
</html>
";}