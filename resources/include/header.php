<?php

session_start();

if (!isset($_SESSION["adminID"])) {
    
    header("Location: ../views/login.php");
	exit();
}


include("../../database/connection.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
	<title>Census Project</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<link href="../css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="../css/all.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material_style.css">
	<link href="../css/theme_style.css" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="../css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<link href="../css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="../css/theme-color.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/widget_styles.css">
</head>

<?php include '../widgets/text-input.php' ?>
<?php include '../widgets/textarea.php' ?>
<?php include '../widgets/options.php' ?>
<?php include '../widgets/viewarea.php' ?>
<?php include '../widgets/modals/modals.php'?>