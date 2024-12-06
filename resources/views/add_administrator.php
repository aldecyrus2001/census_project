<?php include '../include/header.php' ?>


<link rel="stylesheet" href="../css/add_administrator.css">


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
                            <div class="page-title">Add Administrator</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                    href="./dashboard.php">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Add Admin</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card  card-box">
                            <div class="card-head">
                                <header>Administrator's List</header>
                            </div>
                            <div class="card-body">
                                <form action="" class="add-administrator" onsubmit="handleFormSubmit(event)">
                                    <div class="card-head">
                                        <header>Personal Information</header>
                                    </div>

                                    <div class="row p-5">
                                        <div class="img-container text-center col-md-3 p-2">
                                            <div class="preview-container mb-3">
                                                <img id="imagePreview" src="../assets/img/defaultProfile.jpg" alt="Image Preview" class="img-thumbnail">
                                            </div>

                                            <div class="button-container">
                                                <input type="file" id="imageUpload" class="d-none">
                                                <button type="button" id="browseButton" class="btn btn-primary btn-sm">Browse</button>
                                                <button id="resetButton" class="btn btn-secondary btn-sm">Reset</button>
                                            </div>
                                        </div>
                                        <div class="personal-details-container col-md-9 p-4">
                                            <div class="d-flex flex-row gap-3 mb-5">
                                                <?php
                                                echo textInput::create('firstName', 'text',  'Enter Your First Name', 'First Name');
                                                ?>
                                                <?php
                                                echo textInput::create('middleName', 'text', 'Enter Your Middle Name', 'Middle Name');
                                                ?>
                                                <?php
                                                echo textInput::create('lastName', 'text',  'Enter Your Last Name', 'Last Name');
                                                ?>
                                            </div>
                                            <div class="d-flex flex-row gap-3">
                                                <?php
                                                echo textInput::create('email', 'text',  'Enter Your Email', 'Email Address');
                                                ?>
                                                <?php
                                                echo textInput::create('phone', 'text', 'Enter Your Mobile No.', 'Mobile Number');
                                                ?>
                                                <?php
                                                echo dropdownMenuPosition::create('position', 'Job Position');
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end p-4">
                                        <button type="submit" class="btn btn-success">Save</button>
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
        
        <?php echo successModal::create('Successfully Inserted Data', './all_administrator.php') ?>
        <?php echo failedModal::create('Failed to insert Data', './all_administrator.php') ?>
    </div>



</div>

<?php include '../include/global_scripts.php'; ?>

<script src="../js/add-addministrator.js"></script>

<?php include '../include/footer.php'; ?>