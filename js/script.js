function switchForm(form, event) {
    event.preventDefault();
    document.getElementById('login-form').style.display = form === 'login' ? 'block' : 'none';
    document.getElementById('register-form').style.display = form === 'register' ? 'block' : 'none';
}

function processForm(form, event) {
    event.preventDefault();
    const formData = new FormData(document.getElementById(form));
    fetch(form + '.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        if (form === 'register') {
            switchForm('login', event);
        }
    })
    .catch(error => console.error('Error:', error));
    return false;
}
