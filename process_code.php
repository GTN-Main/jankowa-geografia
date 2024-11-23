<?php
	if (isset($_POST['kod'])) {
		$kod = $_POST['kod'];

		if ($kod == "sierota") {
			$img = "qrs/sample.jpg";
			$info = "Wpisano poprawny kod";
			$success = true;
		} elseif ($kod == "") {
			$info = "Najpierw podaj kod!";
			$success = false;
		} else {
			$info = "&quot;$kod&quot; to niepoprawny kod!";
			$success = false;
		}
	} else {
		$info = "Wpisz kod, aby zobaczyć kod QR.";
		$success = false;
	}

	$output = array(
		'success' => $success,
		'info' => $info,
		'img' => $img ?? null
	);

	echo json_encode($output);
?>