let memberCount = 0;

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

document.getElementById("add-member-btn").addEventListener("click", function () {
    const memberContainer = document.getElementById("member-container");
    const memberTemplate = document.getElementById("member-template");

    memberCount++;

    const newMember = memberTemplate.cloneNode(true);
    newMember.style.display = "block";
    newMember.id = "";
    newMember.querySelector(".member-count").textContent = `Member ${memberCount}`;

    const inputs = newMember.querySelectorAll("input, select");
    inputs.forEach((input) => {
        const nameAttr = input.getAttribute("name");
        const idAttr = input.getAttribute("id");

        if (nameAttr) {
            const newName = nameAttr.replace(/\d*$/, "") + memberCount;
            input.setAttribute("name", newName);
        }

        if (idAttr) {
            const newId = idAttr.replace(/\d*$/, "") + memberCount;
            input.setAttribute("id", newId);
        }

        input.value = "";
    });

    const minusButton = newMember.querySelector(".minus-member");
    minusButton.addEventListener("click", function () {
        memberContainer.removeChild(newMember);
        updateMemberNumbers();

        memberCount--;
    });

    memberContainer.appendChild(newMember);
});

document.querySelector(".Save_household_data").addEventListener("click", function (event) {
    event.preventDefault();

    const householdInfoContainer = document.querySelector(".personal-details-container");
    const householdInputs = householdInfoContainer.querySelectorAll("input, select");
    const householdData = {};

    householdInputs.forEach((input) => {
        const idAttr = input.getAttribute("id");
        if (idAttr) {
            householdData[idAttr] = input.value;
        }
    });

    const memberContainer = document.getElementById("member-container");
    const members = memberContainer.querySelectorAll(".member-form");
    const allMemberData = [];

    members.forEach((member, index) => {
        if (index === 0) return;

        const inputs = member.querySelectorAll("input, select");
        const memberData = {};

        inputs.forEach((input) => {
            const idAttr = input.getAttribute("id");
            if (idAttr) {
                memberData[idAttr] = input.value;
            }
        });

        allMemberData.push({
            memberNumber: index + 1,
            ...memberData,
        });
    });

    const formData = new FormData();

    Object.keys(householdData).forEach((key) => {
        formData.append(key, householdData[key]);
    });

    allMemberData.forEach((member, index) => {
        Object.keys(member).forEach((key) => {
            formData.append('member' + index + '_input_' + key, member[key]);
        });
    });

    const imageInput = document.getElementById('imageUpload');
    const file = imageInput.files[0];
    if (file) {
        formData.append('image', file);
    }

    console.log('FormData Structure:');
    for (let [key, value] of formData.entries()) {
        console.log(key, value); 
    }

    formData.append('memberCount', memberCount);

    fetch(add_household, {
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
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});



function updateMemberNumbers() {
    const memberContainer = document.getElementById("member-container");
    const members = memberContainer.querySelectorAll(".member-form");

    members.forEach((member, index) => {
        const memberCount = index + 1;


        const memberCountLabel = member.querySelector(".member-count");
        if (memberCountLabel) {
            memberCountLabel.textContent = `Member ${memberCount}`;
        }


        const inputs = member.querySelectorAll("input, select");
        inputs.forEach((input) => {
            const nameAttr = input.getAttribute("name");
            const idAttr = input.getAttribute("id");

            if (nameAttr) {
                const newName = nameAttr.replace(/\d*$/, "") + memberCount;
                input.setAttribute("name", newName);
            }

            if (idAttr) {
                const newId = idAttr.replace(/\d*$/, "") + memberCount;
                input.setAttribute("id", newId);
            }
        });
    });
}
