<?php
	if (isset($_POST['kod'])) {
		$kod = $_POST['kod'];
		$arr = json_decode(file_get_contents('qrs/qrs.json'), true);

		foreach ($arr as $qr) {
			if ($kod == $qr['code']) {
				$success = true;
				$info = "Wpisano poprawny kod";
				$encoded_img = 'data:image/' . $qr['format'] . ';base64,' . base64_encode(file_get_contents('qrs/' . $qr['name']));
				break;
			} elseif ($kod == "") {
				$success = false;
				$info = "Najpierw podaj kod!";
			} else {
				$success = false;
				$info = "&quot;" . ((strlen($kod) > 103) ? substr($kod, 0, 100) . '…' : $kod) . "&quot; to niepoprawny kod!";
			}
		}
	} else {
		$info = "Wpisz kod, aby zobaczyć kod QR.";
		$success = false;
	}

	$output = array(
		'success' => $success,
		'info' => $info,
		'img' => $encoded_img ?? null
	);

	echo json_encode($output);
?>