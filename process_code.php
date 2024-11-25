<?php
	if (isset($_POST['kod'])) {
		$kod = $_POST['kod'];
		$arr = json_decode(file_get_contents('qrs/qrs.json'), true);

		foreach ($arr as $qr) {
			if ($kod == $qr['code']) {
				$img = "qrs/" . $qr['name'];
				$info = "Wpisano poprawny kod";
				$success = true;
				break;
			} elseif ($kod == "") {
				$info = "Najpierw podaj kod!";
				$success = false;
			} else {
				$info = "&quot;$kod&quot; to niepoprawny kod!";
				$success = false;
			}
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