<?php 
include_once "DatabaseConnection.php";
$db= new DatabaseConnection();
$manageDb = new DatabaseConnection();
$conn = $manageDb->connection(); ?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SKYFI high school timetable generator</title>

	
	<link rel="stylesheet" href="css/header-second-bar.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-2.0.0.min.js"></script>
        <link rel="stylesheet" href="css/helpers-all.css">
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/header-user-dropdown.css">
        
        <!-- Datatable css and js-->
        <link rel="stylesheet" href="datatable/css/dataTables.bootstrap.css">
        <script src="datatable/js/dataTables.bootstrap.js"></script>
        <script src="datatable/js/jquery.dataTables.js"></script>
	
<div class="se-pre-con"></div>

</head>
<style>
    body{
    pointer-events:none;
}
    .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(images/loader-128x/Preloader_3.gif) center no-repeat #fff;
}
</style>
<body >

<header class="header-user-dropdown">

    <div class="header-limiter" style=" background-color: blue;">
		<h1><a href="#">SKY<span>FI</span></a></h1>

		<nav>
                    <a href="addSubject.php">Add Subject</a>
			<a href="addTeacher.php">Add Teacher</a>
			<a href="addClass.php">Add Class<span class="header-new-feature">new</span></a>
                        <a href="viewTeachers.php">View Teachers</a>
                        <a href="viewClasses.php">View Classes</a>
			<a href="generateTT.php">Generate Muster TT</a>
		</nav>


		<div class="header-user-menu">
                    <img src="images/2.jpg" alt="User Image"/>

			<ul>
				<li><a href="#" class="highlight">Logout</a></li>
			</ul>
		</div>

	</div>

</header>

<!-- The content of your page would go here. -->


<script>
$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut(2000);;
	});
        $(document).ready(function(){

		var userMenu = $('.header-user-dropdown .header-user-menu');

		userMenu.on('touchend', function(e){

			userMenu.addClass('show');

			e.preventDefault();
			e.stopPropagation();

		});

		// This code makes the user dropdown work on mobile devices

		$(document).on('touchend', function(e){

			// If the page is touched anywhere outside the user menu, close it
			userMenu.removeClass('show');

		});

	});
$(document).ready(function(){ //on page all
    $('body').css('pointer-events','all'); //activate all pointer-events on body
});
</script>


</body>

</html>
