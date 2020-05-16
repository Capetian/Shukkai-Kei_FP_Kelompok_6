a:3:{i:0;s:437:"<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <?= $this->tag->rendertitle() ?>
		<?= $this->assets->outputCSS('header') ?>
		<?= $this->assets->outputCSS('font') ?>
		<?= $this->assets->outputCSS('appCss') ?>

	</head>
	<body>
		<?= $this->partial('partials/navbar') ?>
		";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:1:" ";s:4:"file";s:141:"D:\DeveloperTools\xamppREINSTALL\htdocs\_Phalcon\shukkaikei-kelompok\Shukkai-Kei_FP_Kelompok_6\src\app\modules\Blog\config/../views/\app.volt";s:4:"line";i:15;}}i:1;s:346:" 
		<?= $this->partial('partials/footer') ?>

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