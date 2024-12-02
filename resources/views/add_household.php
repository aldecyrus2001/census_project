<?php include '../include/header.php' ?>


<link rel="stylesheet" href="../css/add_household.css">


<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo"></body>


<div class="page-wrapper" id="page-wrapper">
    <?php include '../include/navigation_bar.php'; ?>

    <div class="page-container">

        <?php include '../include/sidebar.php'; ?>

        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Add Household</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                    href="./dashboard.php">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Add Household</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card  card-box">
                            <div class="card-head">
                                <header>Household's Form</header>
                            </div>
                            <div class="card-body">
                                <form action="" class="add-administrator" onsubmit="handleFormSubmit(event)">
                                    <div class="card-head">
                                        <div class="header-container d-flex align-items-center justify-content-between">
                                            <header style="margin-right: 20px; height: 100%;">Household Information</header>
                                            <?php
                                            echo dateInput::create('dateNow', 'text', 'Current Date', 'Current Date Time');
                                            ?>
                                        </div>
                                    </div>



                                    <div class="row p-5">
                                        <div class="img-container text-center col-md-3 p-2">
                                            <label>Family Head Picture</label>
                                            <div class="preview-container mb-3">
                                                <img id="imagePreview" src="../assets/img/defaultProfile.jpg" alt="Image Preview" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: fill;">
                                            </div>

                                            <div class="button-container">
                                                <input type="file" id="imageUpload" class="d-none">
                                                <button type="button" id="browseButton" class="btn btn-primary btn-sm">Browse</button>
                                                <button id="resetButton" class="btn btn-secondary btn-sm">Reset</button>
                                            </div>
                                        </div>
                                        <div class="personal-details-container col-md-9 p-4">
                                            <div class="mb-5">
                                                <?php
                                                echo textArea::create('note', 'Note', 'Note');
                                                ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php
                                                echo textInput::create('familyName', 'text', 'Family Name', 'Family Name');
                                                ?>
                                                <?php
                                                echo textInput::create('householdIncome', 'number',  'Household Income', 'Household Income');
                                                ?>
                                                <?php
                                                echo textInput::create('householdAddress', 'text',  'Address', 'Address');
                                                ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php
                                                echo textInput::create('householdemail', 'text',  'Email Address', 'Email Address');
                                                ?>
                                                <?php
                                                echo textInput::create('householdphone', 'text', 'Mobile No.', 'Mobile Number');
                                                ?>
                                                <?php
                                                echo dropdownMenuHouseType::create('houseType', 'House Type');
                                                ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php
                                                echo textInput::create('ethnicity', 'text', 'Ethnicity', 'Ethnicity');
                                                ?>
                                                <?php
                                                echo textInput::create('religon', 'text',  'Religion', 'Religion');
                                                ?>
                                                <?php
                                                echo textInput::create('primaryLanguage', 'text',  'Primary Language', 'Primary Language');
                                                ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php
                                                echo textInput::create('secondaryLanguage', 'text', 'Secondary Language', 'Secondary Language');
                                                ?>
                                                <?php
                                                echo dropdownMenuYesNo::create('hasElecticity', 'Has Electricity?');
                                                ?>
                                                <?php
                                                echo dropdownMenuYesNo::create('hasWater', 'Has Water?');
                                                ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3">
                                                <?php
                                                echo dropdownMenuHouseOwnership::create('ownership', 'House Ownership Status');
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-head">
                                        <header>Member's Form</header>
                                        <a class="btn btn-success p-1" id="add-member-btn">Add Member</a>
                                    </div>

                                    <div id="member-container" class="member-container p-4">
                                        <div id="member-template" class="member-form flex-column gap-3 mb-5" style="display: none;">
                                            <div class="header-container d-flex align-items-center justify-content-between">
                                                <label class="member-count">Member 0</label>
                                                <span class="material-symbols-outlined bg-danger px-4 py-1 minus-member" style="border-radius: 10px; cursor: pointer;">person_remove</span>
                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php echo dropdownMenuYesNo::create('isHead', 'Head of Family?') ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php echo textInput::create('Firstname', 'text', 'First Name', 'First Name'); ?>
                                                <?php echo textInput::create('Middlename', 'text', 'Middle Name', 'Middle Name'); ?>
                                                <?php echo textInput::create('lastname', 'text', 'Last Name', 'Last Name'); ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php echo dropdownMenuRelationshipToHead::create('relationship', 'Relationship to head'); ?>
                                                <?php echo dropdownMenuGender::create('gender', 'Gender'); ?>
                                                <?php echo birthDate::create('birthDate', 'date', 'Birth Date', 'Birth Date'); ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php echo dropdownMenuEducationLevel::create('educationLevel', 'Education Level'); ?>
                                                <?php echo dropdownMenuYesNo::create('currentlyEnrolled'. 'Currently Enrolled ?'); ?>
                                                <?php echo textInput::create('schoolName', 'text', 'N/A if none', 'School Name'); ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php echo dropdownMenuYesNo::create('employmentStatus', 'Employment Status?'); ?>
                                                <?php echo textInput::create('occupation', 'text', 'Occupation', 'Occupation'); ?>
                                                <?php echo textInput::create('jobTitle', 'text', 'N/A if none', 'Job Title'); ?>
                                                <?php echo textInput::create('income', 'number', 'Income', 'Monthly Income'); ?>


                                            </div>
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php echo dropdownMenuYesNo::create('hasDisabilities', 'Has Disabilities?'); ?>
                                                <?php echo textInput::create('preExistingCondition', 'text', 'N/A if none', 'Pre Existing Condition?'); ?>
                                                <?php echo dropdownMenuYesNo::create('covidVaccinated', 'Covid Vaccinated?'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end p-4">
                                        <button type="submit" class="btn btn-success Save_household_data">Save</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal-container" id="modal-container">

        <?php echo successModal::create('Successfully Inserted Data', './all_household.php') ?>
        <?php echo failedModal::create() ?>
    </div>



</div>

<?php include '../include/global_scripts.php'; ?>
<script src="../js/add-household.js"></script>

<?php include '../include/footer.php'; ?>