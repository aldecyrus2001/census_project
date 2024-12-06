<?php include '../include/header.php' ?>




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
							<div class="page-title">All Household Lists</div>
						</div>
						<ol class="breadcrumb page-breadcrumb pull-right">
							<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
									href="./dashboard.php">Dashboard</a>&nbsp;<i class="fa fa-angle-right"></i>
							</li>
							<li class="active">All Household</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="card  card-box">
							<div class="card-head">
								<header>Household's List |</header>
                                <a href="./add_household.php" class="btn btn-success p-1">Add Household</a>
							</div>
							<div class="card-body ">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table display product-overview mb-30" id="support_table">
											<thead>
												<tr>
													<th>Household ID</th>
													<th>Family Head Name</th>
													<th>Male</th>
													<th>Female</th>
                                                    <th>Total Members</th>
													<th class='center'>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query = "SELECT h.*, SUM(CASE WHEN fm.gender = 'Male' THEN 1 ELSE 0 END) AS male_count, SUM(CASE WHEN fm.gender = 'Female' THEN 1 ELSE 0 END) AS female_count, CONCAT( MAX(CASE WHEN fm.is_head_of_household = 1 THEN fm.first_name ELSE NULL END), ' ', MAX(CASE WHEN fm.is_head_of_household = 1 THEN fm.last_name ELSE NULL END) ) AS head_of_family, COUNT(fm.memberID) AS total_members FROM household h LEFT JOIN family_member fm ON h.householdID = fm.householdID GROUP BY h.householdID";
												$result = $conn->query($query);

												if ($result->num_rows > 0) {
													// Fetch each row and display it
													while ($row = $result->fetch_assoc()) {
														$householdID = $row['householdID'];
														$family_name = $row['head_of_family'];
														$maleCount = $row['male_count'];
														$femaleCount = $row['female_count'];
														$totalCount = $row['total_members'];

														echo "<tr>
																<td>$householdID</td>
																<td>$family_name</td>
																<td>$maleCount</td>
																<td>$femaleCount</td>
																<td>$totalCount</td>
																<td class='center'>
																	<div class='btn-group'>
																		<button
																			class='btn btn-xs btn-circle btn-success dropdown-toggle no-margin'
																			type='button' data-bs-toggle='dropdown'
																			aria-expanded='false'> Actions
																			<i class='fa fa-angle-down'></i>
																		</button>
																		<ul class='dropdown-menu' role='menu' style='min-width: auto;'>
																			<li data-bs-toggle='modal' data-bs-target='#viewResident' onclick='viewResident($householdID)'>
																				<a href='#'><i class='fa fa-eye'></i>
																					View </a>
																			</li>
																			<li data-bs-toggle='modal' data-bs-target='#editResident' onclick='editResident($householdID)'>
																				<a href='#'><i class='fa fa-edit'></i>
																					Update </a>
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

			<div class="modal-container">
				<div class="modal fade" id="specificHousehold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">View Person Details</h5>
							</div>
							<div class="modal-body">
								<div class="profile-container d-flex justify-content-center">
									<div class="preview-container mb-3">
										<img id="imagePreview" src="../assets/img/doc/doc1.jpg" alt="Image Preview" class="img-thumbnail" style="height: 200px;">
									</div>
								</div>
								<div class="name-container text-center">
									<p class="m-0 adminFullname">Sample</p>
									<p class="m-0 adminPosition">Position</p>
									<p class=" adminEmail">sample@gmail.com</p>
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

<?php include '../include/global_scripts.php'; ?>