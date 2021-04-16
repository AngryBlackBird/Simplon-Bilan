<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="ASSET/css/style.css">
	<link rel="stylesheet" href="ASSET/css/media.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>TRICATEL</title>
	<script src="https://cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>

	<script src="ASSET/js/script.js" defer></script>
	<script src="ASSET/js/scriptInsert.js" defer></script>
	<script src="ASSET/js/scriptHome.js" defer></script>


</head>

<body>

	<header>

		<nav class="nav1">
			<div>
				<a href="/">
					<img src="ASSET/img/tricatel.png" alt="">
				</a>
			</div>
			<svg width="20px" height="71px" viewBox="0 0 20 71" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<defs></defs>
				<g id="Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<g id="1.0-Home" transform="translate(-940.000000, -42.000000)" fill="#000000">
						<g id="Black-Icon-Only" transform="translate(940.000000, 42.000000)">
							<g id="Page-1">
								<polygon id="Fill-1" points="17.5231537 0 9.96976431 10.7818851 2.5071774 0 0 0 0 14.3837451 2.53750847 14.3837451 2.53750847 3.83861756 9.96976431 14.5354331 17.4626823 3.86075894 17.4626823 14.3837451 20 14.3837451 20 0"></polygon>
								<polygon id="Fill-2" points="17.5231537 13.976378 9.96976431 24.7584071 2.5071774 13.976378 0 13.976378 0 28.3601211 2.53750847 28.3601211 2.53750847 17.8150468 9.96976431 28.511811 17.4626823 17.8369943 17.4626823 28.3601211 20 28.3601211 20 13.976378"></polygon>
								<polygon id="Fill-3" points="17.5231537 27.9527559 9.96976431 38.734785 2.5071774 27.9527559 0 27.9527559 0 42.336499 2.53750847 42.336499 2.53750847 31.7914248 9.96976431 42.488189 17.4626823 31.8133722 17.4626823 42.336499 20 42.336499 20 27.9527559"></polygon>
								<polygon id="Fill-4" points="17.5231537 42.488189 9.96976431 53.2702181 2.5071774 42.488189 0 42.488189 0 56.8719321 2.53750847 56.8719321 2.53750847 46.3268578 9.96976431 57.023622 17.4626823 46.3489995 17.4626823 56.8719321 20 56.8719321 20 42.488189"></polygon>
								<polygon id="Fill-5" points="17.5231537 56.4645669 9.96976431 67.2465961 2.5071774 56.4645669 0 56.4645669 0 70.84831 2.53750847 70.84831 2.53750847 60.3032358 9.96976431 71 17.4626823 60.3253775 17.4626823 70.84831 20 70.84831 20 56.4645669"></polygon>
							</g>
						</g>
					</g>
				</g>
			</svg>
			<div>
				<?php if (isset($_SESSION["pseudo"])) : ?>
					<a href="/">Accueil</a>
					<a href="?page=admin">Gestion</a>
					<a href="?page=deconnect">Se déconnecter</a>

				<?php
				else : ?>
					<a href="/">Accueil</a>
					<a href="?page=connect">Se connecter</a>
				<?php
				endif; ?>
			</div>
		</nav>
		<div class="topnav" id="myTopnav">
			<a href="#home" class="active">TRICATEL</a>
			<?php if (isset($_SESSION["pseudo"])) : ?>
				<a href="/">Accueil</a>
				<a href="?page=admin">Gestion</a>
				<a href="?page=deconnect">Se déconnecter</a>

			<?php
			else : ?>
				<a href="/">Accueil</a>
				<a href="?page=connect">Se connecter</a>
			<?php
			endif; ?>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
	</header>