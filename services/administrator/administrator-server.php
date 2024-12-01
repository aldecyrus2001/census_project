<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

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
}
else if(isset($_GET['action']) && $_GET['action'] === 'view_administrator') {
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
}
else if(isset($_GET['action']) && $_GET['action'] === 'add_household') {

    try {
        error_log(print_r($_POST, true));

        $conn->begin_transaction();

        // Extract household data
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

        // Insert household data
        $sql = "INSERT INTO `household`(
            `family_name`, `address`, `household_income`, 
            `email`, `mobile_num`, `house_type`, `ethnicity`, 
            `religion`, `primary_lang`, `secondary_lang`, `has_electricity`, 
            `has_water`, `ownership`, `image`
        ) VALUES (
            '".$householdData['input_familyName']."', 
            '".$householdData['input_householdAddress']."', 
            ".$householdData['input_householdIncome'].", 
            '".$householdData['input_householdemail']."', 
            '".$householdData['input_householdphone']."', 
            '".$householdData['input_houseType']."', 
            '".$householdData['input_ethnicity']."', 
            '".$householdData['input_religon']."', 
            '".$householdData['input_primaryLanguage']."', 
            '".$householdData['input_secondaryLanguage']."', 
            ".$householdData['input_hasElecticity'].", 
            ".$householdData['input_hasWater'].", 
            '".$householdData['input_ownership']."', 
            '".$imageName."'
        )";
    
        if ($conn->query($sql) === TRUE) {
            $householdId = $conn->insert_id;
        } else {
            throw new Exception("Failed to insert household: " . $conn->error);
        }

        $memberIndex = 0;
        $familyMembersInserted = true;
        $insertedMembersData = [];
        $memberNumber = $_POST['memberCount'];

        while ($memberNumber != 0) {
            // Extract member data
            $firstName = $_POST['member' . $memberIndex . '_input_input_Firstname' . ($memberIndex + 1)];
            $middleName = $_POST['member' . $memberIndex . '_input_input_Middlename'. ($memberIndex + 1)];
            $lastName = $_POST['member' . $memberIndex . '_input_input_lastname'. ($memberIndex + 1)];
            $relationshipToHead = $_POST['member' . $memberIndex . '_input_input_relationship'. ($memberIndex + 1)];
            $gender = $_POST['member' . $memberIndex . '_input_input_gender'. ($memberIndex + 1)];
            $birthdate = $_POST['member' . $memberIndex . '_input_input_birthDate'. ($memberIndex + 1)];
            $occupation = $_POST['member' . $memberIndex . '_input_input_occupation'. ($memberIndex + 1)];
            $educationLevel = $_POST['member' . $memberIndex . '_input_input_educationLevel'. ($memberIndex + 1)];
            $currently_enrolled = $_POST['member' . $memberIndex . '_input_input_currentlyEnrolled'. ($memberIndex + 1)];
            $school_name = $_POST['member' . $memberIndex . '_input_input_schoolName'. ($memberIndex + 1)];
            $income = $_POST['member' . $memberIndex . '_input_input_income'. ($memberIndex + 1)];
            $isHeadOfHousehold = $_POST['member' . $memberIndex . '_input_input_isHead'. ($memberIndex + 1)];
            $isEmployed = $_POST['member' . $memberIndex . '_input_input_employmentStatus'. ($memberIndex + 1)];
            $jobTitle = $_POST['member' . $memberIndex . '_input_input_jobTitle'. ($memberIndex + 1)];
            $hasDisabilities = $_POST['member' . $memberIndex . '_input_input_hasDisabilities'. ($memberIndex + 1)];
            $hasPreExistingCondition = $_POST['member' . $memberIndex . '_input_input_preExistingCondition'. ($memberIndex + 1)];
            $isVaccinated = $_POST['member' . $memberIndex . '_input_input_covidVaccinated'. ($memberIndex + 1)];

            // Construct SQL query for inserting the family member
            $sqlFamilyMember = "INSERT INTO `family_member`(`memberID`, `householdID`, `first_name`, `last_name`, `middle_name`, `relationship_to_head`, `gender`, `birthdate`, `occupation`, `education_level`, `currently_enrolled`, `school_name`, `income`, `is_head_of_household`, `is_employed`, `job_title`, `has_disabilities`, `has_pre_existing_condition`, `is_vaccinated`) 
            VALUES (NULL,'$householdId','$firstName','$lastName','$middleName','$relationshipToHead','$gender','$birthdate','$occupation','$educationLevel','$currently_enrolled','$school_name','$income','$isHeadOfHousehold','$isEmployed','$jobTitle','$hasDisabilities','$hasPreExistingCondition','$isVaccinated')";

            if (!$conn->query($sqlFamilyMember)) {
                // If the insert fails, set flag and rollback
                $familyMembersInserted = false;
                error_log("Error inserting family member: " . $conn->error);
                break;
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
}
