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
							<div class="page-title">Dashboard</div>
						</div>
						<ol class="breadcrumb page-breadcrumb pull-right">
							<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
									href="dashboard.php">Dashboard</a>
							</li>
						</ol>
					</div>
				</div>
				<div class="state-overview">
					<?php

					$sql = "SELECT (SELECT COUNT(*) FROM `administrator`) AS administrator_count, (SELECT COUNT(*) FROM `family_member` WHERE `isDeleted` = 0) AS member_count, (SELECT COUNT(*) FROM `family_member` WHERE DATE(`date_Inserted`) = CURDATE()) AS newly_inserted, (SELECT COUNT(*) FROM `family_member` WHERE DATE(`date_Inserted`) = CURDATE() - INTERVAL 1 DAY) AS yesterday_inserted, (SELECT COUNT(*) FROM `household`) AS household_count, (SELECT COUNT(*) FROM `family_member`) AS total_population";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();

						echo '
							<div class="row">
								<div class="col-xl-3 col-md-6 col-12">
									<div class="info-box bg-blue">
										<span class="info-box-icon push-bottom"><span class="material-symbols-outlined">
												person
											</span></span>
										<div class="info-box-content">
											<span class="info-box-text">STAFF</span>
											<span class="info-box-number">'. $row['administrator_count'] .'</span>
											<div class="progress">
												<div class="progress-bar" style="width: 45%"></div>
											</div>
											<span class="progress-description">
												45% Increase in 28 Days
											</span>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-md-6 col-12">
									<div class="info-box bg-orange">
										<span class="info-box-icon push-bottom"><span class="material-symbols-outlined">
												house
											</span></span>
										<div class="info-box-content">
											<span class="info-box-text">HOUSEHOLDS</span>
											<span class="info-box-number">' . $row['household_count'] . '</span>
											<div class="progress">
												<div class="progress-bar" style="width: 40%"></div>
											</div>
											<span class="progress-description">
												40% Increase in 28 Days
											</span>
										</div>
										<!-- /.info-box-content -->
									</div>
									<!-- /.info-box -->
								</div>
								<!-- /.col -->
								<div class="col-xl-3 col-md-6 col-12">
									<div class="info-box bg-purple">
										<span class="info-box-icon push-bottom"><span class="material-symbols-outlined">
												group
											</span></span>
										<div class="info-box-content">
											<span class="info-box-text">RESIDENTS</span>
											<span class="info-box-number">' . $row['member_count'] . '</span>
											<div class="progress">
												<div class="progress-bar" style="width: '. ($row['newly_inserted'] / $row['yesterday_inserted']) * 100 .'%"></div>
											</div>
											<span class="progress-description">
												'. ($row['newly_inserted'] / $row['yesterday_inserted']) * 100 .'% Increase from yesterday
											</span>
										</div>
										<!-- /.info-box-content -->
									</div>
									<!-- /.info-box -->
								</div>
								<!-- /.col -->
								<div class="col-xl-3 col-md-6 col-12">
									<div class="info-box bg-success">
										<span class="info-box-icon push-bottom"><span class="material-symbols-outlined">
												group
											</span></span>
										<div class="info-box-content">
											<span class="info-box-text">TOTAL POPULATION</span>
											<span class="info-box-number">'. $row['total_population'] .'</span>
											<div class="progress">
												<div class="progress-bar" style="width: 50%"></div>
											</div>
											<span class="progress-description">
												50% Increase in 28 Days
											</span>
										</div>
										<!-- /.info-box-content -->
									</div>
									<!-- /.info-box -->
								</div>
								<!-- /.col -->
							</div>
	
							';
					}

					?>
					
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="card card-box">
							<div class="card-head">
								<header>POPULATION</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body no-padding height-9">
								<div class="recent-report__chart">
									<div id="chart1"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-box">
							<div class="card-head">
								<header>INSERTED DATA</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body no-padding height-9">
								<div class="recent-report__chart">
									<div id="chart2"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<div class="card  card-box">
							<div class="card-head">
								<header>ALL USERS</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body ">
								<div class="table-wrap">
									<div class="table-responsive">
										<table class="table display product-overview mb-30" id="support_table">
											<thead>
												<tr>
													<th style="min-width: 150px !important;">Resident Name</th>
													<th class="center">Gender</th>
													<th class="center">Date Inserted</th>
													<th class="center">Time Inserted</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query = "SELECT *, CONCAT(`first_name`, ' ', `last_name`) AS fullname, DATE(`date_Inserted`) AS date_only, TIME(`date_Inserted`) AS time_only FROM `family_member` ORDER BY `date_Inserted` DESC LIMIT 10";
												$result = $conn->query($query);

												if ($result->num_rows > 0) {
													// Fetch each row and display it
													while ($row = $result->fetch_assoc()) {
														$name = $row['fullname'];
														$gender = $row['gender'];
														$dateInserted = $row['date_only'];
														$timeInserted = $row['time_only'];

														echo '
														<tr class="odd gradeX">
															<td>' . $name . '</td>
															
															<td class="center">' . $gender . '</td>
															<td class="center">' . $dateInserted . '</td>
															<td class="center">' . $timeInserted . '</td>
															
														</tr>
														';
													}
												}
												?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="card  card-box">
							<div class="card-head">
								<header>ONLINE STAFFS</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body no-padding height-9">
								<div class="row">
									<ul class="docListWindow">
										<?php

										$sql = "SELECT * , CONCAT(firstname , ' ' , lastname) AS fullname FROM `administrator` WHERE `token` IS NOT NULL AND `token` <> '' LIMIT 6";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// Fetch each row and display it
											while ($row = $result->fetch_assoc()) {

												echo '
												<li>
													<div class="prog-avatar">
														<img src="../assets/profile_pictures/administrator/' . $row['profile_picture'] . '" alt="" width="40" height="40">
													</div>
													<div class="details">
														<div class="title">
															' . $row['fullname'] . '
														</div>
														<div>
															<span class="clsAvailable">Available</span>
														</div>
													</div>
												</li>
												';
											}
										}

										?>
									</ul>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>

<?php include '../include/global_scripts.php'; ?>
<?php include '../include/apex.php'; ?>
<?php include '../include/footer.php';
