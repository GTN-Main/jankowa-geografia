<!DOCTYPE html>
<html lang="pl">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="static/style.css">
		<?php
			if ((isset($_SERVER['HTTP_DNT']) && $_SERVER['HTTP_DNT'] == 0) || !isset($_SERVER['HTTP_DNT'])) {
				echo "<script defer src=\"https://cloud.umami.is/script.js\" data-website-id=\"bb0c6be7-cc01-477c-a4d3-9b982cf4e332\"></script>";
			};
		?>
		<title>Konkurs</title>
	</head>

	<body>
		<?php
			if (isset($_GET['kod'])) {
				echo "<script>document.addEventListener('DOMContentLoaded', () => {document.getElementById('kod').value = '$_GET[kod]'; submit();});</script>";
			}
		?>
		<div class="container">
			<h1>Wpisz kod:</h1>
			<div class="form-cont" id="form-cont">
				<form autocomplete="off" onsubmit="submit()">
					<input type="text" name="kod" id="kod" placeholder="sierota" autofocus>
				</form>
				<button onclick="submit()"><img src="static/arrow.svg" alt="prześlij" id="arrow"></button>
			</div>

			<p class="info" id="info">Wpisz kod, aby zobaczyć kod QR.</p>
		</div>

		<img id="qr" src="" alt="qr">

		<canvas class="background"></canvas>
		<script src="static/particles.min.js"></script>
		<script src="static/script.js"></script>
	</body>

</html>