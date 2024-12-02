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
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query = "SELECT fm.*, ed.*, emp.*, hd.* FROM family_member fm LEFT JOIN education_data ed ON fm.memberID = ed.memberID LEFT JOIN emplyment_data emp ON fm.memberID = emp.memberID LEFT JOIN health_data hd ON fm.memberID = hd.memberID";
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
																<td>$income</td>
																<td style='display: flex'; align-items: center;>
																	<div class='tblViewBtn' onclick='viewResident($memberID)'>
																		<i class='fa fa-eye'></i>
																	</div>
                                                                    <div class='tblEditBtn' onclick='editResident($memberID)>
                                                                        <i class='fa fa-pencil'></i>
                                                                    </div>
                                                                    <div class='tblDelBtn'>
                                                                        <i class='fa fa-trash-o'></i>
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

			<div class="modal-container">
				<div class="modal fade" id="viewResident" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true">
					<div class="modal-dialog modal-dialog-centered" style="margin: auto; max-width: 70% !important;">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">View Resident Details</h5>
							</div>
							<div class="modal-body">
								<div class="resident_name">
									<h2 class="fw-bolder my-1 ms-3">Sample Resident Name</h2>
								</div>
								<hr>
								<div class="container">
									<div class="row d-flex align-items-stretch">
										<div class="col-md-6">
											<div class="members-information p-3 border border-secondary border-1 rounded-3 h-100">
												<div class="grid-title mb-2">
													<span>Member Information</span>
												</div>
												<?php
												echo viewArea::create('firstname', 'First Name :');
												echo viewArea::create('middlename', 'Middle Name :');
												echo viewArea::create('lastname', 'Last Name :');
												echo viewArea::create('gender', 'Gender :');
												echo viewArea::create('birthDate', 'Birthdate :');
												echo viewArea::create('occupation', 'Occupation :');
												echo viewArea::create('relationship_to_head', 'Relationship to Head :');
												?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="row">
												<div class="mb-3">
													<div class="education-information p-3 border border-secondary border-1 rounded-3 h-100">
														<div class="grid-title mb-2">
															<span>Education Information</span>
														</div>
														<?php
														echo viewArea::create('highest_education_level', 'Highest Education Level :');
														echo viewArea::create('currently_enrolled', 'Currently Enrolled ?');
														echo viewArea::create('school_name', 'School Name :');
														?>
													</div>
												</div>
												<div>
													<div class="education-information p-3 border border-secondary border-1 rounded-3 h-100">
														<div class="grid-title mb-2">
															<span>Employment Information</span>
														</div>
														<?php
														echo viewArea::create('employment_status', 'Is Employed ?');
														echo viewArea::create('job_title', 'Job Title :');
														echo viewArea::create('monthly_income', 'Monthly Income :');
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="">
											<div class="education-information p-3 border border-secondary border-1 rounded-3 h-100">
												<div class="grid-title mb-2">
													<span>Health Information</span>
												</div>
												<div class="d-flex justify-content-around text-center">
													<?php
													echo viewArea::create('has_disability', 'Has Disabilities ?');
													echo viewArea::create('pre_exisiting_condition', 'Pre Existing Condition :');
													echo viewArea::create('covid_vaccinated', 'Is Vaccinated ?');
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>



<script src="../js/resident.js"></script>

<?php include '../include/global_scripts.php'; ?>