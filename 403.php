<!DOCTYPE html>
<html lang="pl">

<head>
	<?php
		if ((isset($_SERVER['HTTP_DNT']) && $_SERVER['HTTP_DNT'] == 0) || !isset($_SERVER['HTTP_DNT'])) {
			echo "<script defer src=\"https://cloud.umami.is/script.js\" data-website-id=\"bb0c6be7-cc01-477c-a4d3-9b982cf4e332\"></script>";
		};
	?>
	<title>403 | GeoQR 🌍</title>
	<style>
		@font-face {
			font-family: 'Nosifer Regular';
			src: url(/static/Nosifer-Regular.woff2) format('woff2');
			font-weight: normal;
			font-style: normal;
			font-display: swap;
		}

		@keyframes slideup {
			0% {
				opacity: 0.8;
				transform: translateY(20%);
			}

			100% {
				opacity: 1;
				transform: translateY(0);
			}
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			background-color: #000;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100dvh;
			transition: background-color ease-in-out 2s;
			overflow: clip;
		}

		div {
			color: #ff0000;
			font-family: "Nosifer Regular", sans-serif;
			font-size: 10dvw;
			width: 65dvw;
			height: 2lh;
			text-align: center;
			transition: opacity ease-in-out 2s;
			animation: slideup 1.6s cubic-bezier(0.46, 0.03, 0.52, 0.96);
		}
	</style>
	<link rel="prefetch" href="/" type="text/html" crossorigin="anonymous">
</head>

<body>
	<div></div>
	<script>
		let i = 0;
		const body = document.getElementsByTagName("body")[0];
		const div = document.getElementsByTagName("div")[0];
		const txt = 'Szukasz czegoś?';
		const intervalId = setInterval(() => {
			if (i < txt.length) {
				div.innerHTML += txt.charAt(i);
				i++;
			} else {
				flash();
			};
		}, 200);

		function flash() {
			clearInterval(intervalId);
			body.style.backgroundColor = "#fff";
			div.style.opacity = "0";
			setTimeout(() => {
				window.location.replace("/");
			}, 2000);
		};
	</script>
</body>

</html>