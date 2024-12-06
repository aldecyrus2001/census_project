<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

$adminID = $_SESSION["adminID"];
$dateNow = date("Y-m-d");

include("../../database/connection.php");

if (isset($_GET['action']) && $_GET['action'] === 'add_administrator') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $position = $_POST['position'];
        $auth_token = bin2hex(random_bytes(32));
        $password = md5('DefaultPassword123');
        $dateNow = date('Y-m-d H:i:s');

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../../resources/assets/profile_pictures/administrator/';
            $imageName = basename($_FILES['image']['name']);
            $uploadFilePath = $uploadDir . $imageName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {

                $sql = "INSERT INTO `administrator`(`adminID`, `firstname`, `middlename`, `lastname`, `email`, `password`, `role`, `phone`, `profile_picture`, `last_login`, `created_at`, `update_at`, `token`) 
                VALUES (NULL,'$firstName','$middleName','$lastName','$email','$password','$position','$phone','$imageName','$dateNow','$dateNow','$dateNow','$auth_token')";

                if ($conn->query($sql) === TRUE) {
                    echo json_encode(["status" => "success", "message" => "Administrator added successfully!"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Database insertion failed: " . $conn->error]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to upload image."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "No image uploaded or invalid file."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    }
} else if (isset($_GET['action']) && $_GET['action'] === 'view_administrator') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $adminID = $_POST['adminID'];

        $sql = "SELECT * FROM `administrator` WHERE `adminID` = '$adminID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Administrator not found']);
        }
    }
} else if (isset($_GET['action']) && $_GET['action'] === 'add_household') {

    try {
        error_log(print_r($_POST, true));

        $conn->begin_transaction();

        $householdData = [];
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'input_') !== false) {
                $householdData[$key] = $value;
            }
        }

        if (!$householdData) {
            throw new Exception("Invalid household data.");
        }

        // Handle the uploaded image
        $imagePath = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../../resources/assets/profile_pictures/household_head/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $imageName = uniqid() . "_" . basename($_FILES['image']['name']);
            $imagePath = $uploadDir . $imageName;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                throw new Exception("Failed to upload the family head image.");
            }
        }

        $sql = "INSERT INTO `household`(`householdID`, `family_name`, `address`, `household_income`, `household_email`, `household_phone`, `house_type`, `ownership`,`image`) 
        VALUES (NULL,'" . $householdData['input_familyName'] . "','" . $householdData['input_householdAddress'] . "','" . $householdData['input_householdIncome'] . "','" . $householdData['input_householdemail'] . "','" . $householdData['input_householdphone'] . "','" . $householdData['input_houseType'] . "','" . $householdData['input_ownership'] . "','" . $imageName . "')";



        if ($conn->query($sql) === TRUE) {
            $householdId = $conn->insert_id;

            $sqlUtilities = "INSERT INTO `utilities`(`utilityID`, `householdID`, `has_electricity`, `has_water`) 
            VALUES (NULL,'$householdId','" . $householdData['input_hasElecticity'] . "','" . $householdData['input_hasWater'] . "')";

            $sqlSurvey = "INSERT INTO `census_survey`(`surveyID`, `householdID`, `survey_date`, `survey_by`, `notes`) 
            VALUES (NULL,'$householdId','" . $householdData['input_dateNow'] . "','$adminID','" . $householdData['input_note'] . "')";

            $sqlDemographic = "INSERT INTO `demographics`(`demographicsID`, `householdID`, `ethnicity`, `religion`, `primary_language`, `secondary_language`) 
                VALUES (NULL,'$householdId','" . $householdData['input_ethnicity'] . "','" . $householdData['input_religon'] . "','" . $householdData['input_primaryLanguage'] . "','" . $householdData['input_secondaryLanguage'] . "')";


            if ($conn->query($sqlSurvey) && $conn->query($sqlDemographic) && $conn->query($sqlUtilities)) {
            } else {
                throw new Exception("Error inserting Survey & Demographic data: " . $conn->error);
            }
        } else {
            throw new Exception("Failed to insert household: " . $conn->error);
        }

        $memberIndex = 0;
        $familyMembersInserted = true;
        $insertedMembersData = [];
        $memberNumber = $_POST['memberCount'];
        $currentDateTime = date('Y-m-d H:i:s');

        while ($memberNumber != 0) {
            // Extract member data
            $firstName = $_POST['member' . $memberIndex . '_input_input_Firstname' . ($memberIndex + 1)];
            $middleName = $_POST['member' . $memberIndex . '_input_input_Middlename' . ($memberIndex + 1)];
            $lastName = $_POST['member' . $memberIndex . '_input_input_lastname' . ($memberIndex + 1)];
            $relationshipToHead = $_POST['member' . $memberIndex . '_input_input_relationship' . ($memberIndex + 1)];
            $gender = $_POST['member' . $memberIndex . '_input_input_gender' . ($memberIndex + 1)];
            $birthdate = $_POST['member' . $memberIndex . '_input_input_birthDate' . ($memberIndex + 1)];
            $occupation = $_POST['member' . $memberIndex . '_input_input_occupation' . ($memberIndex + 1)];
            $educationLevel = $_POST['member' . $memberIndex . '_input_input_educationLevel' . ($memberIndex + 1)];
            $currently_enrolled = $_POST['member' . $memberIndex . '_input_input_currentlyEnrolled' . ($memberIndex + 1)];
            $school_name = $_POST['member' . $memberIndex . '_input_input_schoolName' . ($memberIndex + 1)];
            $income = $_POST['member' . $memberIndex . '_input_input_income' . ($memberIndex + 1)];
            $isHeadOfHousehold = $_POST['member' . $memberIndex . '_input_input_isHead' . ($memberIndex + 1)];
            $isEmployed = $_POST['member' . $memberIndex . '_input_input_employmentStatus' . ($memberIndex + 1)];
            $jobTitle = $_POST['member' . $memberIndex . '_input_input_jobTitle' . ($memberIndex + 1)];
            $hasDisabilities = $_POST['member' . $memberIndex . '_input_input_hasDisabilities' . ($memberIndex + 1)];
            $hasPreExistingCondition = $_POST['member' . $memberIndex . '_input_input_preExistingCondition' . ($memberIndex + 1)];
            $isVaccinated = $_POST['member' . $memberIndex . '_input_input_covidVaccinated' . ($memberIndex + 1)];


            $sqlFamilyMember = "INSERT INTO `family_member`(`memberID`, `householdID`, `first_name`, `last_name`, `middle_name`, `relationship_to_head`, `gender`, `birthdate`, `occupation`, `education_level`, `income`, `is_head_of_household`, `date_Inserted`) 
            VALUES (NULL,'$householdId','$firstName','$lastName','$middleName','$relationshipToHead','$gender','$birthdate','$occupation','$educationLevel','$income','$isHeadOfHousehold', '$currentDateTime')";

            if ($conn->query($sqlFamilyMember)) {
                // Retrieve the ID of the newly inserted record
                $newMemberID = $conn->insert_id;

                $sqlEducation_data = "INSERT INTO `education_data`(`educationID`, `memberID`, `highest_level_completed`, `currently_enrolled`, `school_name`) 
                VALUES (NULL,'$newMemberID','$educationLevel','$currently_enrolled','$school_name')";

                $sqlEmploymentData = "INSERT INTO `emplyment_data`(`employementID`, `memberID`, `employment_status`, `job_title`, `monthly_income`) 
                VALUES (NULL,'$newMemberID','$isEmployed','$jobTitle','$income')";

                $sqlHealthData = "INSERT INTO `health_data`(`healthID`, `memberID`, `has_disability`, `pre_existing_condition`, `covid_vaccinated`) 
                VALUES (NULL,'$newMemberID','$hasDisabilities','$hasPreExistingCondition','$isVaccinated')";

                if ($conn->query($sqlEducation_data) && $conn->query($sqlEmploymentData) && $conn->query($sqlHealthData)) {

                    $insertedMembersData[] = [
                        "memberID" => $newMemberID,
                        "firstName" => $firstName,
                        "middleName" => $middleName,
                        "lastName" => $lastName,
                        "relationshipToHead" => $relationshipToHead,
                        "gender" => $gender,
                        "birthdate" => $birthdate,
                        "occupation" => $occupation,
                        "educationLevel" => $educationLevel,
                        "income" => $income,
                        "isHeadOfHousehold" => $isHeadOfHousehold,
                        "currently_enrolled" => $currently_enrolled,
                        "schoolName" => $school_name,
                        "isEmployed" => $isEmployed,
                        "jobTitle" => $jobTitle,
                        "Income" => $income,
                        "hasDisabilities" => $hasDisabilities,
                        "preExistingCondition" => $hasPreExistingCondition,
                        "isVaccinated" => $isVaccinated
                    ];
                } else {
                    throw new Exception("Error inserting Education, Employment Data & Health data: " . $conn->error);
                }
            } else {
                // If the insert fails, set flag and rollback
                $familyMembersInserted = false;
                error_log("Error inserting family member: " . $conn->error);
            }

            $memberIndex++;
            $memberNumber--;
        }

        if (!$familyMembersInserted) {
            $conn->rollback(); // Rollback transaction if any member insertion fails
            echo json_encode(["status" => "error", "message" => "Failed to insert family members. Transaction rolled back."]);
        } else {
            $conn->commit(); // Commit transaction if all family members are inserted
            echo json_encode([
                "status" => "success",
                "message" => "Household and family members added successfully",
                "members" => $insertedMembersData
            ]);
        }
    } catch (Exception $e) {
        $conn->rollback(); // Rollback the transaction if any error occurs
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else if (isset($_GET['action']) && $_GET['action'] === 'view_resident') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $resident_ID = $_POST['resident_ID'];

        $sql = "SELECT family_member.*, emplyment_data.*, education_data.*, health_data.* FROM `family_member` JOIN emplyment_data ON family_member.memberID = emplyment_data.memberID JOIN education_data ON family_member.memberID = education_data.memberID JOIN health_data ON family_member.memberID = health_data.memberID WHERE family_member.memberID = '$resident_ID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            echo json_encode(['status' => 'success', 'data' => $data]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Administrator not found']);
        }
    }
} else if (isset($_GET['action']) && $_GET['action'] === 'update_resident') {

    try {
        error_log(print_r($_POST, true));

        $conn->begin_transaction();

        $memberData = [];
        foreach ($_POST as $key => $value) {
            if (strpos($key, '') !== false) {
                $memberData[$key] = $value;
            }
        }

        if (!$memberData) {
            throw new Exception("Invalid member data.");
        }


        $sqlMemberDetails = "UPDATE `family_member` SET `first_name`='" . $memberData['input_edit_firstname'] . "',`last_name`='" . $memberData['input_edit_lastname'] . "',`middle_name`='" . $memberData['input_edit_middlename'] . "',`relationship_to_head`='" . $memberData['input_edit_relationship'] . "',`gender`='" . $memberData['input_edit_gender'] . "',`birthdate`='" . $memberData['input_edit_birthDate'] . "',`education_level`='" . $memberData['input_edit_educationLevel'] . "',`income`='" . $memberData['input_edit_income'] . "' WHERE `memberID` = '" . $memberData['member_ID'] . "'";

        $sqlEmployment = "UPDATE `emplyment_data` SET `employment_status`='" . $memberData['input_edit_employmentStatus'] . "',`job_title`='" . $memberData['input_edit_jobTitle'] . "',`monthly_income`='" . $memberData['input_edit_income'] . "' WHERE `memberID` = '" . $memberData['member_ID'] . "'";

        $sqlEducation = "UPDATE `education_data` SET `highest_level_completed`='" . $memberData['input_edit_educationLevel'] . "',`currently_enrolled`='" . $memberData['input_edit_currentlyEnrolled'] . "',`school_name`='" . $memberData['input_edit_schoolName'] . "' WHERE `memberID` = '" . $memberData['member_ID'] . "'";

        $sqlHealth = "UPDATE `health_data` SET `has_disability`='" . $memberData['input_edit_hasDisabilities'] . "',`pre_existing_condition`='" . $memberData['input_edit_preExistingCondition'] . "',`covid_vaccinated`='" . $memberData['input_edit_covidVaccinated'] . "' WHERE `memberID` = '" . $memberData['member_ID'] . "'";

        $conn->begin_transaction();

        try {
            // Execute your SQL queries
            $conn->query($sqlMemberDetails);
            $conn->query($sqlEmployment);
            $conn->query($sqlEducation);
            $conn->query($sqlHealth);

            $conn->commit();

            echo json_encode([
                "status" => "success",
                "message" => "Members updated successfully"
            ]);
        } catch (Exception $e) {

            $conn->rollback();

            echo json_encode([
                "status" => "error",
                "message" => "Failed to update members. Transaction rolled back.",
                "error" => $e->getMessage()
            ]);
        }

    } catch (Exception $e) {
        $conn->rollback(); // Rollback the transaction if any error occurs
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
}else if (isset($_GET['action']) && $_GET['action'] === 'delete_resident') {

    try {
        error_log(print_r($_POST, true));

        $conn->begin_transaction();

        $Data = [];
        foreach ($_POST as $key => $value) {
            if (strpos($key, '') !== false) {
                $Data[$key] = $value;
            }
        }

        if (!$Data) {
            throw new Exception("Invalid member data.");
        }


        $sqlMemberDetails = "UPDATE `family_member` SET `isDeleted`='1' WHERE `memberID` = '" . $Data['resident_ID'] . "'";

        $conn->begin_transaction();

        try {
            // Execute your SQL queries
            $conn->query($sqlMemberDetails);
            $conn->commit();

            echo json_encode([
                "status" => "success",
                "message" => "Members Deleted successfully"
            ]);
        } catch (Exception $e) {

            $conn->rollback();

            echo json_encode([
                "status" => "error",
                "message" => "Failed to update members. Transaction rolled back.",
                "error" => $e->getMessage()
            ]);
        }

    } catch (Exception $e) {
        $conn->rollback(); // Rollback the transaction if any error occurs
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
}
