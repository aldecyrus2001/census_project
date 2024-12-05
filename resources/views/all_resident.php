<?php include '../include/header.php' ?>

<link rel="stylesheet" href="../css/resident.css">


<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo"></body>


<div class="page-wrapper">
	<?php include '../include/navigation_bar.php'; ?>

	<div class="page-container">

		<?php include '../include/sidebar.php'; ?>

		<div class="page-content-wrapper">
			<div class="page-content">
				<div class="page-bar">
					<div class="page-title-breadcrumb">
						<div class=" pull-left">
							<div class="page-title">All Residents Lists</div>
						</div>
						<ol class="breadcrumb page-breadcrumb pull-right">
							<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
									href="./dashboard.php">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
							</li>
							<li class="active">All Resident</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card  card-box">
							<div class="card-head">
								<header>Resident's List</header>
							</div>
							<div class="card-body ">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table display product-overview mb-30" id="support_table">
											<thead>
												<tr>
													<th>Resident ID</th>
													<th>Name</th>
													<th>Date Of Birth</th>
													<th>Gender</th>
													<th>Income</th>
													<th class='center'>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query = "SELECT fm.*, ed.*, emp.*, hd.* FROM family_member fm LEFT JOIN education_data ed ON fm.memberID = ed.memberID LEFT JOIN emplyment_data emp ON fm.memberID = emp.memberID LEFT JOIN health_data hd ON fm.memberID = hd.memberID WHERE fm.isDeleted = 0";
												$result = $conn->query($query);

												if ($result->num_rows > 0) {
													// Fetch each row and display it
													while ($row = $result->fetch_assoc()) {
														$memberID = $row['memberID'];
														$name = $row['first_name'] . ' ' . strtoupper(substr($row['middle_name'], 0, 1)) . '.' . ' ' . $row['last_name'];
														$birthdate = $row['birthdate'];
														$gender = $row['gender'];
														$income = $row['income'];

														echo "<tr>
																<td>$memberID</td>
																<td>$name</td>
																<td>$birthdate</td>
																<td>$gender</td>
																<td>₱ $income</td>
																<td class='center'>
																	<div class='btn-group'>
																		<button
																			class='btn btn-xs btn-circle btn-success dropdown-toggle no-margin'
																			type='button' data-bs-toggle='dropdown'
																			aria-expanded='false'> Actions
																			<i class='fa fa-angle-down'></i>
																		</button>
																		<ul class='dropdown-menu' role='menu' style='min-width: auto;'>
																			<li data-bs-toggle='modal' data-bs-target='#viewResident' onclick='viewResident($memberID)'>
																				<a href='#'><i class='fa fa-eye'></i>
																					View </a>
																			</li>
																			<li data-bs-toggle='modal' data-bs-target='#editResident' onclick='editResident($memberID)'>
																				<a href='#'><i class='fa fa-edit'></i>
																					Update </a>
																			</li>
																			<li data-bs-toggle='modal' data-bs-target='#confirmationModal' onclick='deleteResident($memberID)'>
																				<a href='#'><i class='fa fa-trash-o'></i>
																					Delete </a>
																			</li>
																		</ul>
																	</div>
																</td>
																";
														"</tr>";
													}
												} else {
													echo "<tr><td colspan='6'>No records found</td></tr>";
												}
												?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
	<div class="modal-container" id="modal-container">

        <?php 
		echo viewResidentModal::create();
		echo EditResidentModal::create();
		echo successModal::create("Execution Completed!", './all_resident.php');
		echo failedModal::create('Failed to execute the data adjustment, Please try again!', './all_resident.php');
		echo confirmationModal::create('Are you Sure you want to delete this resident ?', './all_household.php') ;
		?>
    </div>

</div>



<script src="../js/resident.js"></script>

<?php include '../include/global_scripts.php'; ?>