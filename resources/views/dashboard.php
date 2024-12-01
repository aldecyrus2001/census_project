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
					<div class="row">
						<div class="col-xl-3 col-md-6 col-12">
							<div class="info-box bg-blue">
								<span class="info-box-icon push-bottom"><span class="material-symbols-outlined">
										group
									</span></span>
								<div class="info-box-content">
									<span class="info-box-text">Appointments</span>
									<span class="info-box-number">450</span>
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
										person
									</span></span>
								<div class="info-box-content">
									<span class="info-box-text">New Patients</span>
									<span class="info-box-number">155</span>
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
										content_cut
									</span></span>
								<div class="info-box-content">
									<span class="info-box-text">Operations</span>
									<span class="info-box-number">52</span>
									<div class="progress">
										<div class="progress-bar" style="width: 85%"></div>
									</div>
									<span class="progress-description">
										85% Increase in 28 Days
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
										paid
									</span></span>
								<div class="info-box-content">
									<span class="info-box-text">Hospital Earning</span>
									<span class="info-box-number">13,921</span><span>$</span>
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
								<header>NEWLY INSERTED</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body ">
								<div class="row table-padding">
									<div class="col-md-6 col-sm-6 col-xs-6">
										<div class="btn-group">
											<a href="book_appointment_material.html" id="addRow"
												class="btn btn-info btn-circle">
												Add New <i class="fa fa-plus"></i>
											</a>
										</div>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6">
										<div class="btn-group pull-right">
											<button
												class="btn deepPink-bgcolor btn-circle btn-outline dropdown-toggle"
												data-bs-toggle="dropdown">Tools
												<i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
														<i class="fa fa-print"></i> Print </a>
												</li>
												<li>
													<a href="javascript:;">
														<i class="fa fa-file-pdf-o"></i> Save as PDF </a>
												</li>
												<li>
													<a href="javascript:;">
														<i class="fa fa-file-excel-o"></i> Export to Excel </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table
										class="table table-striped table-bordered table-hover table-checkable order-column"
										id="example4">
										<thead>
											<tr>
												<th>
													<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
														<input type="checkbox" class="group-checkable"
															data-set="#sample_1 .checkboxes" />
														<span></span>
													</label>
												</th>
												<th>Patient Name</th>
												<th>Assigned Doctor</th>
												<th>Date</th>
												<th>Time</th>
												<th>Actions </th>
											</tr>
										</thead>
										<tbody>
											<tr class="odd gradeX">
												<td>
													<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
														<input type="checkbox" class="checkboxes" value="1" />
														<span></span>
													</label>
												</td>
												<td> Jayesh Patel </td>
												<td>
													<a href="mailto:therichposts@gmail.com"> Dr.Rajesh </a>
												</td>
												<td class="center"> 12/05/2016 </td>
												<td class="center"> 10:45 </td>
												<td class="center">
													<div class="btn-group">
														<button
															class="btn btn-xs btn-warning btn-circle dropdown-toggle center no-margin"
															type="button" data-bs-toggle="dropdown"
															aria-expanded="false"> Actions
															<i class="fa fa-angle-down"></i>
														</button>
														<ul class="dropdown-menu pull-left" role="menu">
															<li>
																<a href="javascript:;"><i class="fa fa-trash-o"></i>
																	Delete </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-ban"></i>
																	Cancel </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-clock-o"></i>
																	Postpone </a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td>
													<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
														<input type="checkbox" class="checkboxes" value="1" />
														<span></span>
													</label>
												</td>
												<td> Pooja Patel </td>
												<td>
													<a href="mailto:therichposts@gmail.com"> Dr.Sarah Smith </a>
												</td>
												<td class="center"> 12/05/2016 </td>
												<td class="center"> 10:55 </td>
												<td class="center">
													<div class="btn-group">
														<button
															class="btn btn-xs btn-circle btn-info dropdown-toggle no-margin"
															type="button" data-bs-toggle="dropdown"
															aria-expanded="false"> Actions
															<i class="fa fa-angle-down"></i>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li>
																<a href="javascript:;"><i class="fa fa-trash-o"></i>
																	Delete </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-ban"></i>
																	Cancel </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-clock-o"></i>
																	Postpone </a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td>
													<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
														<input type="checkbox" class="checkboxes" value="1" />
														<span></span>
													</label>
												</td>
												<td> Pankaj Singh </td>
												<td>
													<a href="mailto:sdsd@yahoo.com"> Dr.Rajesh </a>
												</td>
												<td class="center"> 12/05/2016 </td>
												<td class="center"> 11:15 </td>
												<td class="center">
													<div class="btn-group">
														<button
															class="btn btn-xs btn-circle btn-success dropdown-toggle no-margin"
															type="button" data-bs-toggle="dropdown"
															aria-expanded="false"> Actions
															<i class="fa fa-angle-down"></i>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li>
																<a href="javascript:;"><i class="fa fa-trash-o"></i>
																	Delete </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-ban"></i>
																	Cancel </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-clock-o"></i>
																	Postpone </a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td>
													<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
														<input type="checkbox" class="checkboxes" value="1" />
														<span></span>
													</label>
												</td>
												<td> Raj Malhotra </td>
												<td>
													<a href="mailto:sdsdsd@gmail.com"> Dr.Megha Trivedi </a>
												</td>
												<td class="center"> 12/05/2016 </td>
												<td class="center"> 11:25 </td>
												<td class="center">
													<div class="btn-group">
														<button
															class="btn btn-xs btn-circle btn-primary dropdown-toggle no-margin"
															type="button" data-bs-toggle="dropdown"
															aria-expanded="false"> Actions
															<i class="fa fa-angle-down"></i>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li>
																<a href="javascript:;"><i class="fa fa-trash-o"></i>
																	Delete </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-ban"></i>
																	Cancel </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-clock-o"></i>
																	Postpone </a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td>
													<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
														<input type="checkbox" class="checkboxes" value="1" />
														<span></span>
													</label>
												</td>
												<td> Sneha Pandya </td>
												<td>
													<a href="mailto:sdsdsd@gmail.com"> Dr.Sarah Smith </a>
												</td>
												<td class="center"> 12/05/2016 </td>
												<td class="center"> 11:35 </td>
												<td class="center">
													<div class="btn-group">
														<button
															class="btn btn-xs btn-circle btn-warning dropdown-toggle no-margin"
															type="button" data-bs-toggle="dropdown"
															aria-expanded="false"> Actions
															<i class="fa fa-angle-down"></i>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li>
																<a href="javascript:;"><i class="fa fa-trash-o"></i>
																	Delete </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-ban"></i>
																	Cancel </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-clock-o"></i>
																	Postpone </a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<tr class="odd gradeX ">
												<td>
													<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
														<input type="checkbox" class="checkboxes" value="1" />
														<span></span>
													</label>
												</td>
												<td> Sameer Jain </td>
												<td>
													<a href="mailto:sdsdsd@gmail.com"> Dr.Megha Trivedi </a>
												</td>
												<td class="center"> 12/05/2016 </td>
												<td class="center"> 11:45 </td>
												<td class="center">
													<div class="btn-group">
														<button
															class="btn btn-xs btn-circle btn-danger dropdown-toggle no-margin"
															type="button" data-bs-toggle="dropdown"
															aria-expanded="false"> Actions
															<i class="fa fa-angle-down"></i>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li>
																<a href="javascript:;"><i class="fa fa-trash-o"></i>
																	Delete </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-ban"></i>
																	Cancel </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-clock-o"></i>
																	Postpone </a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
											<tr class="odd gradeX">
												<td>
													<label class="rt-chkbox rt-chkbox-single rt-chkbox-outline">
														<input type="checkbox" class="checkboxes" value="1" />
														<span></span>
													</label>
												</td>
												<td> Sarah Smith </td>
												<td>
													<a href="mailto:sdsdsd@gmail.com"> Dr.Priya Patel </a>
												</td>
												<td class="center"> 22/03/2019 </td>
												<td class="center"> 11:55 </td>
												<td class="center">
													<div class="btn-group">
														<button
															class="btn btn-xs btn-circle btn-info dropdown-toggle no-margin"
															type="button" data-bs-toggle="dropdown"
															aria-expanded="false"> Actions
															<i class="fa fa-angle-down"></i>
														</button>
														<ul class="dropdown-menu" role="menu">
															<li>
																<a href="javascript:;"><i class="fa fa-trash-o"></i>
																	Delete </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-ban"></i>
																	Cancel </a>
															</li>
															<li>
																<a href="javascript:;"><i class="fa fa-clock-o"></i>
																	Postpone </a>
															</li>
														</ul>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="card  card-box">
							<div class="card-head">
								<header>EMPLOYEE LIST</header>
								<div class="tools">
									<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
									<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
								</div>
							</div>
							<div class="card-body no-padding height-9">
								<div class="row">
									<ul class="docListWindow">
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/doc/doc1.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#">Dr.Rajesh</a> -(MBBS,MD)
												</div>
												<div>
													<span class="clsAvailable">Available</span>
												</div>
											</div>
										</li>
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/doc/doc2.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#">Dr.Sarah Smith</a> -(MBBS,MD)
												</div>
												<div>
													<span class="clsAvailable">Available</span>
												</div>
											</div>
										</li>
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/doc/doc3.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#">Dr.John Deo</a> - (BDS,MDS)
												</div>
												<div>
													<span class="clsNotAvailable">Not Available</span>
												</div>
											</div>
										</li>
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/doc/doc4.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#">Dr.Jay Soni</a> - (BHMS)
												</div>
												<div>
													<span class="clsOnLeave">On Leave</span>
												</div>
											</div>
										</li>
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/doc/doc5.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#">Dr.Jacob Ryan</a> - (MBBS,MS)
												</div>
												<div>
													<span class="clsNotAvailable">Not Available</span>
												</div>
											</div>
										</li>
										<li>
											<div class="prog-avatar">
												<img src="../assets/img/doc/doc6.jpg" alt="" width="40" height="40">
											</div>
											<div class="details">
												<div class="title">
													<a href="#">Dr.Megha Trivedi</a> - (MBBS,MS)
												</div>
												<div>
													<span class="clsAvailable">Available</span>
												</div>
											</div>
										</li>
									</ul>
									<div class="text-center full-width">
										<a href="#">View all</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12">
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
													<th>No</th>
													<th>Name</th>
													<th>Assigned Doctor</th>
													<th>Date Of Admit</th>
													<th>Diseases</th>
													<th>Room No</th>
													<th>Edit</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Jens Brincker</td>
													<td>Dr.Kenny Josh</td>
													<td>27/05/2016</td>
													<td>
														<span class="label label-sm label-success">Influenza</span>
													</td>
													<td>101</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>2</td>
													<td>Mark Hay</td>
													<td>Dr. Mark</td>
													<td>26/05/2017</td>
													<td>
														<span class="label label-sm label-warning"> Cholera </span>
													</td>
													<td>105</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>3</td>
													<td>Anthony Davie</td>
													<td>Dr.Cinnabar</td>
													<td>21/05/2016</td>
													<td>
														<span
															class="label label-sm label-success ">Amoebiasis</span>
													</td>
													<td>106</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>4</td>
													<td>David Perry</td>
													<td>Dr.Felix </td>
													<td>20/04/2016</td>
													<td>
														<span class="label label-sm label-danger">Jaundice</span>
													</td>
													<td>105</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>5</td>
													<td>Anthony Davie</td>
													<td>Dr.Beryl</td>
													<td>24/05/2016</td>
													<td>
														<span
															class="label label-sm label-success ">Leptospirosis</span>
													</td>
													<td>102</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>6</td>
													<td>Alan Gilchrist</td>
													<td>Dr.Joshep</td>
													<td>22/05/2016</td>
													<td>
														<span class="label label-sm label-warning ">Hepatitis</span>
													</td>
													<td>103</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>7</td>
													<td>Mark Hay</td>
													<td>Dr.Jayesh</td>
													<td>18/06/2016</td>
													<td>
														<span class="label label-sm label-success ">Typhoid</span>
													</td>
													<td>107</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
												<tr>
													<td>8</td>
													<td>Sue Woodger</td>
													<td>Dr.Sharma</td>
													<td>17/05/2016</td>
													<td>
														<span class="label label-sm label-danger">Malaria</span>
													</td>
													<td>108</td>
													<td>
														<a href="javascript:void(0)" class="tblEditBtn">
															<i class="fa fa-pencil"></i>
														</a>
														<a href="javascript:void(0)" class="tblDelBtn">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
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
	
</div>

<?php include '../include/global_scripts.php'; ?>
<?php include '../include/apex.php'; ?>
<?php include '../include/footer.php';