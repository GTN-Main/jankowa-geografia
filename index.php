<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Konkurs</title>
</head>

<body>
	<form>
		<label for="kod">Kod:</label>
		<input type="text" id="kod" name="kod">
	</form>
	<?php
		if (isset($_GET['kod'])) {
			$kod = $_GET['kod'];

			if ($kod == "radaś") {
				$img_name = "sample.jpg";
			} else {
				echo "&quot;$kod&quot; to niepoprawny kod!";
			}

			if (isset($img_name) && $img_name != null) {
				echo "<img src=\"$img_name\" alt=\"qr\">";
			}
		}
	?>
</body>

</html>