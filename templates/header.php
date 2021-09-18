<?php

	session_start();

	if($_SERVER['QUERY_STRING'] == 'noname') {
		unset($_SESSION['name']);
	}

	$name = $_SESSION['name'] ?? 'Guest';


	$gender = $_COOKIE['gender'] ?? 'Unknown';

?>

<head>
	<title>Ninja Pizza</title>
	
	 <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            

	<style type="text/css">
		.brand{
			background: #cbb09c !important;
		}
		.brand-text{
			color: #cbb09c !important;
		}
		form{
			max-width: 460px;
			margin: 20px auto;
			padding: 20px;
		}
		.pizza{
			width: 150px;
			margin: 40px auto -30px;
			display: block;
			position: relative;
			top: -30px;
		}
		.logo{
			width: 50px;
			height: 50px;
			margin: 10px;
		}
		
	</style>

</head>

<body class="grey lighten-4">

	<nav class="white z-depth-0">
		<div class="container">
			<img src="image/pizza.svg" alt="logo" class="logo" />
			<a href="#" class="brand-logo brand-text" style="font-size: 40px; ">Ninja Pizza</a>
			<ul id="nav-mobile" class="right hide-on-small-and-down">
				<li class="grey-text">Hello <?php echo htmlspecialchars($name); ?> </li>
				<li class="grey-text"> ( <?php echo htmlspecialchars($gender); ?> ) </li>
				<li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
			</ul>
		</div>
	</nav>