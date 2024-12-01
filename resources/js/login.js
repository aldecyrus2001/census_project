function authentication(e) {
    e.preventDefault();

    var username = document.querySelector('.username').value;
    var password = document.querySelector('.password').value;

    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);

    fetch(login, { 
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                window.location.href = '../views/dashboard.php';
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}