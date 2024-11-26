function submit() {
	const input = document.querySelector('#kod');
	const formData = new FormData();
	const request = new XMLHttpRequest();

	formData.append(input.name, input.value);
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
				document.querySelector('#qr').style.opacity = '1';
			} else {
				document.querySelector('#info').classList.add('invalid');

				document.querySelector('#qr').style.top = '60dvh';
				document.querySelector('#qr').style.height = '0';
				document.querySelector('#qr').style.opacity = '0';
				document.querySelector('#form-cont').animate(
					[
						{
							transform: "translateX(0)",
							boxShadow: "0 0 15px 3px #c00",
							border: "#c00 2px solid",
							color: "#c00"
						},
						{
							transform: "translateX(-10px)"
						},
						{
							transform: "translateX(10px)"
						},
						{
							transform: "translateX(-10px)"
						},
						{
							transform: "translateX(0)",
							boxShadow: "0 0 15px 3px #c00",
							border: "#c00 2px solid",
							color: "#c00"
						}
					], 500
				)
				document.querySelector('#arrow').animate(
					[
						{
							filter: "brightness(0) saturate(100%) invert(12%) sepia(96%) saturate(4870%) hue-rotate(4deg) brightness(83%) contrast(119%)"
						},
						{
							filter: "brightness(0) saturate(100%) invert(12%) sepia(96%) saturate(4870%) hue-rotate(4deg) brightness(83%) contrast(119%)"
						}
					], 500
				)
				setTimeout(() => {
					document.querySelector('#qr').src = '';
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
		speed: 0.4,
		responsive: [
			{
				breakpoint: 1050,
				options: {
					maxParticles: 150
				}
			},
			{
				breakpoint: 768,
				options: {
					maxParticles: 100
				}
			},
			{
				breakpoint: 425,
				options: {
					maxParticles: 50
				}
			},
			{
				breakpoint: 320,
				options: {
					maxParticles: 30
				}
			}
		]
	});
};