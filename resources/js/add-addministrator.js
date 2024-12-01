

document.getElementById('browseButton').addEventListener('click', function () {
    document.getElementById('imageUpload').click();
});

document.getElementById('imageUpload').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    if (file) {
        reader.onload = function (e) {
            document.getElementById('imagePreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('resetButton').addEventListener('click', function () {
    document.getElementById('imagePreview').src = "../assets/img/doc/doc1.jpg";
    document.getElementById('imageUpload').value = '';
});

function handleFormSubmit(event) {
    event.preventDefault();

    var firstname = document.getElementById('input_firstName').value;
    var middlename = document.getElementById('input_middleName').value;
    var lastname = document.getElementById('input_lastName').value;
    var email = document.getElementById('input_email').value;
    var phone_number = document.getElementById('input_phone').value;
    var position = document.getElementById('input_position').value;

    if (!firstname.trim() || !middlename.trim() || !lastname.trim() || !email.trim() || !phone_number.trim() || position === "N/A") {
        const alertPlaceholder = document.getElementById('modal-container');
        const alertMessage = `
            <div id="alertContainer" class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="min-width: 300px;">
                    Please fill up the required fields!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        `;
        alertPlaceholder.innerHTML = alertMessage;
    }
    else {
        const formData = new FormData();
        formData.append('firstName', firstname);
        formData.append('middleName', middlename);
        formData.append('lastName', lastname);
        formData.append('email', email);
        formData.append('phone', phone_number);
        formData.append('position', position);

        const imageInput = document.getElementById('imageUpload');
        const file = imageInput.files[0];
        if (file) {
            formData.append('image', file);
        }

        fetch(add_administrator, {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {

                if (data.status === 'success') {

                    var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                    myModal.show();

                } else {
                    var myModal = new bootstrap.Modal(document.getElementById('failedMessage').innerHTML = "<b>Error:</b> " + data.message);
                    myModal.show();

                    console.error('Error:', data.message);
                }

            })
            .catch(error => {
                console.error('Error:', error);
            });
    }



}
