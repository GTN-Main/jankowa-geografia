function submit() {
	const kod = document.querySelector('#kod');
	const formData = new FormData();
	const request = new XMLHttpRequest();

	formData.append(kod.name, kod.value);
	request.open('POST', '/process_code.php');
	request.send(formData);
	request.onreadystatechange = () => {
		if (request.readyState === 4 && request.status === 200) {
			const response = JSON.parse(request.responseText);

			if (response.success) {
				document.querySelector('#info').classList.remove('invalid');

				document.querySelector('#qr').src = response.img;
				document.querySelector('#qr').style.top = '0';
				document.querySelector('#qr').style.height = '200px';
			} else {
				document.querySelector('#info').classList.add('invalid');

				document.querySelector('#qr').style.top = '60dvh';
				document.querySelector('#qr').style.height = '0';
				document.querySelector('#form-cont').classList.add('shake');
				document.querySelector('#form-cont').style.boxShadow = "0 0 15px 3px #c00";
				document.querySelector('#form-cont').style.border = "#c00 2px solid";
				setTimeout(() => {
					document.querySelector('#qr').src = '';
					document.querySelector('#form-cont').classList.remove('shake');
					document.querySelector('#form-cont').removeAttribute('style');
				}, 500);
			}
			document.querySelector('#info').innerHTML = response.info;
		}
	};

	document.querySelector('form').reset();
}

document.querySelector('input').addEventListener('keydown', (e) => {
	if (e.key === 'Enter') {
		e.preventDefault();
		submit();
	}
});

window.onload = function () {
	Particles.init({
		selector: '.background',
		maxParticles: 200,
		color: ['#600edf', '#00ffb3'],
		connectParticles: true,
		speed: 0.4
	});
};