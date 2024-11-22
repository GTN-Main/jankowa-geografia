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
            } else {
                document.querySelector('#info').classList.add('invalid');
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