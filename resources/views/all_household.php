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
								<header>Resident's List |</header>
                                <a href="./add_household.php" class="btn btn-success p-1">Add Household</a>
							</div>
							<div class="card-body ">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table display product-overview mb-30" id="support_table">
											<thead>
												<tr>
													<th>Household ID</th>
													<th>Head of Family</th>
													<th>Male</th>
													<th>Female</th>
                                                    <th>Total Members</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												// $query = "SELECT *, CASE WHEN token IS NOT NULL AND token != '' THEN 'online' ELSE 'offline' END AS online_status FROM administrator";
												// $result = $conn->query($query);

												// if ($result->num_rows > 0) {
												// 	// Fetch each row and display it
												// 	while ($row = $result->fetch_assoc()) {
												// 		$adminID = $row['adminID'];
												// 		$name = $row['firstname'] . ' ' . strtoupper(substr($row['middlename'], 0, 1)) . '.' . ' ' . $row['lastname'];
												// 		$email = $row['email'];
												// 		$createdAt = $row['created_at'];
												// 		$status = $row['online_status'];

												// 		echo "<tr>
												// 				<td>$adminID</td>
												// 				<td>$name</td>
												// 				<td>$email</td>
												// 				<td>$createdAt</td>
												// 				<td>";
												// 		if ($status == 'online') {
												// 			echo "<span class='label label-sm label-success'>$status</span>";
												// 		} else {
												// 			echo "<span class='label label-sm label-danger'>$status</span>";
												// 		}
												// 		echo "
												// 				<td style='display: flex'; align-items: center;>
												// 					<div class='tblViewBtn' onclick='viewAdmin($adminID)'>
												// 						<i class='fa fa-eye'></i>
												// 					</div>
                                                //                     <div class='tblEditBtn' onclick='viewAdmin($adminID)>
                                                //                         <i class='fa fa-pencil'></i>
                                                //                     </div>
                                                //                     <div class='tblDelBtn'>
                                                //                         <i class='fa fa-trash-o'></i>
                                                //                     </div>
																	
												// 				</td>
												// 				";
												// 		"</tr>";
												// 	}
												// } else {
												// 	echo "<tr><td colspan='6'>No records found</td></tr>";
												// }
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