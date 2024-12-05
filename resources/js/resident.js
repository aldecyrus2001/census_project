let currently_updated_member = "";

function viewResident(id) {
  const formData = new FormData();
  formData.append("resident_ID", id);

  fetchresident(formData)
    .then((residentData) => {
      const birthdate = residentData.birthdate;

      const dateObject = new Date(birthdate);

      const formattedDate = new Intl.DateTimeFormat("en-US", {
        year: "numeric",
        month: "long",
        day: "numeric",
      }).format(dateObject);

      console.log("Fetched Resident Data:", residentData);

      document.querySelector(
        ".view_resident_name"
      ).innerHTML = `${residentData.first_name} ${residentData.middle_name} ${residentData.last_name}`;

      // Member Information
      document.querySelector(
        ".view_firstname "
      ).innerHTML = `${residentData.first_name}`;
      document.querySelector(
        ".view_middlename"
      ).innerHTML = `${residentData.middle_name}`;
      document.querySelector(
        ".view_lastname"
      ).innerHTML = `${residentData.last_name}`;
      document.querySelector(
        ".view_gender"
      ).innerHTML = `${residentData.gender}`;
      document.querySelector(".view_birthDate").innerHTML = `${formattedDate}`;
      document.querySelector(
        ".view_occupation"
      ).innerHTML = `${residentData.occupation}`;
      document.querySelector(
        ".view_relationship_to_head"
      ).innerHTML = `${residentData.relationship_to_head}`;

      //Education Information
      document.querySelector(
        ".view_highest_education_level"
      ).innerHTML = `${residentData.highest_level_completed}`;
      document.querySelector(
        ".view_currently_enrolled"
      ).innerHTML = `${checkValue(residentData.currently_enrolled)}`;
      document.querySelector(
        ".view_school_name"
      ).innerHTML = `${residentData.school_name}`;

      //Employment Information
      document.querySelector(
        ".view_employment_status"
      ).innerHTML = `${checkValue(residentData.employment_status)}`;
      document.querySelector(
        ".view_job_title"
      ).innerHTML = `${residentData.job_title}`;
      document.querySelector(
        ".view_monthly_income"
      ).innerHTML = `₱ ${residentData.monthly_income}`;

      //Health Information
      document.querySelector(".view_has_disability").innerHTML = `${checkValue(
        residentData.has_disability
      )}`;
      document.querySelector(
        ".view_pre_exisiting_condition"
      ).innerHTML = `${residentData.pre_existing_condition}`;
      document.querySelector(
        ".view_covid_vaccinated"
      ).innerHTML = `${checkValue(residentData.covid_vaccinated)}`;
    })
    .catch((error) => {
      console.error(error.message);
    });
}

function editResident(id) {
  console.log(id);
  currently_updated_member = id;

  const formData = new FormData();
  formData.append("resident_ID", id);

  fetchresident(formData)
    .then((residentData) => {
      document.querySelector(
        ".edit_resident_name"
      ).innerHTML = `${residentData.first_name} ${residentData.middle_name} ${residentData.last_name}`;

      document.getElementById("input_edit_firstname").value =
        residentData.first_name;
      document.getElementById("input_edit_middlename").value =
        residentData.middle_name;
      document.getElementById("input_edit_lastname").value =
        residentData.last_name;
      document.getElementById("input_edit_relationship").value =
        residentData.relationship_to_head || "N/A";
      document.getElementById("input_edit_gender").value =
        residentData.gender || "N/A";
      document.getElementById("input_edit_birthDate").value =
        residentData.birthdate;
      document.getElementById("input_edit_educationLevel").value =
        residentData.highest_level_completed;
      document.getElementById("input_edit_currentlyEnrolled").value =
        residentData.currently_enrolled;
      document.getElementById("input_edit_schoolName").value =
        residentData.school_name || "N/A";
      document.getElementById("input_edit_employmentStatus").value =
        residentData.employment_status;
      document.getElementById("input_edit_jobTitle").value =
        residentData.job_title;
      document.getElementById("input_edit_income").value =
        residentData.monthly_income;
      document.getElementById("input_edit_hasDisabilities").value =
        residentData.has_disability;
      document.getElementById("input_edit_preExistingCondition").value =
        residentData.pre_existing_condition;
      document.getElementById("input_edit_covidVaccinated").value =
        residentData.covid_vaccinated;
    })
    .catch((error) => {
      console.error(error.message);
    });
}

document.querySelector(".update_member_data").addEventListener("click", function (event) {
    event.preventDefault();

    

    const memberForm = document.querySelector(".member-form");
    const memberInputs = memberForm.querySelectorAll("input, select");
    const memberData = {};

    memberInputs.forEach((input) => {
      const idAttr = input.getAttribute("id");
      if (idAttr) {
        memberData[idAttr] = input.value;
      }
    });

    const formData = new FormData();
    formData.append('member_ID', currently_updated_member);

    Object.keys(memberData).forEach((key) => {
      formData.append(key, memberData[key]);
    });

    console.log("FormData Structure:");
    for (let [key, value] of formData.entries()) {
      console.log(key, value);
    }

    

    fetch(update_resident, {
      method: 'POST',
      body: formData,
    })
    .then(response=> response.json())
    .then(data => {
      if(data.status === 'success'){
        var editModal = new bootstrap.Modal(document.getElementById('editResident'));
        editModal.hide();
        var myModal = new bootstrap.Modal(document.getElementById('successModal'));
        myModal.show();

        currently_updated_member = "";
      }
      else {
        var myModal = new bootstrap.Modal(document.getElementById('failedMessage').innerHTML = "<b>Error:</b> " + data.message);
        myModal.show();
      }
    })
    .catch(error => {
      console.error('Error: ', error)
    });
});

function deleteResident(id) {


  var confirmButton = document.querySelector(".btn-confirm");
  confirmButton.addEventListener("click", function () {
    const formData = new FormData();
    formData.append('resident_ID', id)

    fetch(delete_resident, {
      method: 'POST',
      body: formData,
    })
    .then(response=> response.json())
    .then(data => {
      if(data.status === 'success'){
        var myModal = new bootstrap.Modal(document.getElementById('successModal'));
        myModal.show();
      }
      else {
        var myModal = new bootstrap.Modal(document.getElementById('failedMessage').innerHTML = "<b>Error:</b> " + data.message);
        myModal.show();
      }
    })
    .catch(error => {
      console.error('Error: ', error)
    });

  });
}

function fetchresident(formData) {
  return fetch(view_resident, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        return data.data;
      } else {
        var myModal = new bootstrap.Modal(
          document.getElementById("failedModal")
        );
        myModal.show();
        throw new Error("Failed to fetch resident data");
      }
    });
}

function checkValue(value) {
  if (value == 0) {
    return "N/A";
  } else if (value == 1) {
    return "Yes";
  } else {
    return "Invalid Input"; // Optional: Handle cases other than 0 or 1
  }
}
