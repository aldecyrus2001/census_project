function viewAdmin(adminID) {
    var myModal = new bootstrap.Modal(document.getElementById('viewAdministrator'));
    myModal.show();

    var formData = new FormData();
    formData.append('adminID', adminID);

    fetch(View_administrator, {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                document.querySelector('#imagePreview').src = '../assets/profile_pictures/administrator/' + data.data.profile_picture;
                document.querySelector('.adminFullname').textContent = data.data.firstname + ' ' + data.data.lastname;
                document.querySelector('.adminPosition').textContent = data.data.role;
                document.querySelector('.adminEmail').textContent = data.data.email;
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}